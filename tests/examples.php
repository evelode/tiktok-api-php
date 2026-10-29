<?php
declare(strict_types=1);
require dirname(__DIR__) . '/examples/support/bootstrap.php';

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use TikTokRESTAPI\TikTok;

function expect(bool $condition, string $message): void
{
    if (!$condition) throw new RuntimeException($message);
}
function runExample(string $file, array $arguments): array
{
    $process = proc_open(array_merge([PHP_BINARY, dirname(__DIR__) . '/examples/' . $file], $arguments),
        [1 => ['pipe', 'w'], 2 => ['pipe', 'w']], $pipes, null, ['JSONSCRAPER_TIKTOK_LICENSE_KEY' => '']);
    if (!is_resource($process)) throw new RuntimeException('Cannot start example');
    $out = stream_get_contents($pipes[1]); fclose($pipes[1]);
    $err = stream_get_contents($pipes[2]); fclose($pipes[2]);
    return [proc_close($process), $out, $err];
}

$root = dirname(__DIR__);
$manifest = json_decode(file_get_contents($root . '/examples/responses/manifest.json'), true, 512, JSON_THROW_ON_ERROR);
expect(count($manifest) === 54, 'Every endpoint needs a documented response source');
$comment = new TikTokRESTAPI\Response\Model\Comment(['text_extra' => [['user_id' => '6745191554350760966']]]);
expect($comment->getTextExtra()[0] instanceof TikTokRESTAPI\Response\Model\TextExtra, 'Comment mentions must be a typed list');
$unknown = new TikTokRESTAPI\Response\APIResponse(['status' => 'ok', 'tiktok' => ['future_field' => ['preserved' => true]]]);
expect($unknown->exportObjectDataCopy('array')['tiktok']['future_field']['preserved'] === true, 'Unknown fields must survive export');
$temp = tempnam(sys_get_temp_dir(), 'tiktok-export-');
try {
    foreach ($manifest as $endpoint => $metadata) {
        $raw = file_get_contents($root . '/examples/responses/' . $endpoint . '.json');
        $fixture = json_decode($raw, true, 512, JSON_BIGINT_AS_STRING | JSON_THROW_ON_ERROR);
        [$exit, $output, $error] = runExample($endpoint . '.php', ['--offline', '--output=' . $temp]);
        $success = $fixture['status'] === 'ok';
        expect($exit === ($success ? 0 : 1), "$endpoint: unexpected exit code: $error");
        expect(!str_contains($error, 'Warning') && !str_contains($error, 'Exception'), "$endpoint: $error");
        expect(strlen(trim($output)) > 0, "$endpoint: no useful output");
        if ($success) {
            $saved = json_decode(file_get_contents($temp), true, 512, JSON_BIGINT_AS_STRING | JSON_THROW_ON_ERROR);
            expect($saved['status'] === 'ok', "$endpoint: JSON export failed");
            // Representative real IDs and nested titles must survive mapping and export.
            if (is_string($fixture['tiktok'])) expect($saved['tiktok'] === $fixture['tiktok'], "$endpoint: scalar payload changed");
        } else {
            expect($metadata['http_status'] === 404 && str_contains($error, 'API application error'), "$endpoint: live failure must be explicit");
        }
        [$helpExit, $help] = runExample($endpoint . '.php', ['--help']);
        expect($helpExit === 0 && str_contains($help, '--offline'), "$endpoint: help failed without a key");
        // Replay the actual HTTP status separately: CLI offline mode deliberately lets us inspect failure envelopes.
        $history = [];
        $handler = HandlerStack::create(new MockHandler([new Response($metadata['http_status'], ['Content-Type' => 'application/json'], $raw)]));
        $handler->push(Middleware::history($history));
        $client = new TikTok('offline-secret');
        $client->httpClient = new Client(['handler' => $handler]);
        try {
            $model = $client->call($endpoint, ['query' => 'test']);
            expect($success && $model->isOk(), "$endpoint: failure should throw");
            $model->exportObjectDataCopy('array');
        } catch (TikTokRESTAPI\Exception\TikTokException $failure) {
            expect(!$success, "$endpoint: unexpected transport error");
            expect(!str_contains($failure->getMessage(), 'offline-secret'), "$endpoint: leaked license");
        }
        $source = file_get_contents($root . '/examples/' . $endpoint . '.php');
        $code = str_replace(['<?php', 'declare(strict_types=1);', "require __DIR__ . '/support/bootstrap.php';", '$client = exampleClient();'], '', $source);
        foreach ([['status' => 'ok'], ['status' => 'ok', 'tiktok' => []]] as $empty) {
            $mock = new MockHandler([new Response(200, ['Content-Type' => 'application/json'], json_encode($empty))]);
            $client = new TikTok('offline-secret');
            $client->httpClient = new Client(['handler' => HandlerStack::create($mock)]);
            ob_start();
            try { eval($code); } finally { ob_end_clean(); }
        }
        expect(count($history) === 1, "$endpoint: expected exactly one request");
        expect($history[0]['request']->getUri()->getPath() === '/' . $endpoint, "$endpoint: wrong request path");
    }
    $needles = [
        'searchVideo' => ['7611630876337655070', 'Apple TV', '62602'],
        'getUserID' => ['6745191554350760966'],
        'getMusicInfo' => ['Nikes', '6928004115846924290'],
        'getRankingInfo' => ['Daily Ranking', '5089947'],
        'getLiveFeed' => ['7620954383781481246', '554'],
        'getUserStories' => ['7620713971015798023', '1774337812005'],
        'getUserPlaylistByID' => ['7359404761613208363', 'DJ x Chris Janson'],
        'getAvailableRankingList' => ['Daily Ranking', 'Popular LIVE'],
    ];
    foreach ($needles as $endpoint => $expected) {
        [, $output] = runExample($endpoint . '.php', ['--offline']);
        foreach ($expected as $value) expect(str_contains($output, $value), "$endpoint: missing real value $value");
    }
    foreach (['feed.php', 'video.php', 'search.php', 'models.php', 'quickstart.php'] as $alias) {
        [$exit, , $error] = runExample($alias, ['--offline']);
        expect($exit === 0, "$alias: alias failed: $error");
    }
    [$exit] = runExample('getUserInfo.php', []);
    expect($exit === 2, 'Live mode requires a key');
    foreach (['--timeout=0', '--cache_timeout=-1', '--query=ignored'] as $argument) {
        [$exit] = runExample('getUserInfo.php', ['--offline', $argument]);
        expect($exit === 2, 'Invalid option must be rejected: ' . $argument);
    }
} finally { unlink($temp); }
echo "54 real response replays, exports, transport statuses, request paths, CLI help, aliases and error cases passed.\n";
