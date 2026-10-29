<?php
declare(strict_types=1);
require dirname(__DIR__) . '/examples/support/bootstrap.php';

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use TikTokRESTAPI\TikTok;
use TikTokRESTAPI\Response\APIResponse;
use TikTokRESTAPI\Response\Model\AwemeDetail;
use LazyJsonMapper\LazyJsonMapper;

function expect(bool $condition, string $message): void
{
    if (!$condition) throw new RuntimeException($message);
}

$video = ['aweme_id' => '7106855913906081070', 'author' => ['nickname' => 'Fixture author'],
    'statistics' => ['play_count' => 12345],
    'video' => ['play_addr' => ['url_list' => ['https://example.test/video.mp4']]]];
$user = ['uid' => '7106855913906081070', 'unique_id' => 'fixture-user', 'nickname' => 'Fixture user', 'follower_count' => 42];
$payload = ['status_code' => 0, 'user' => $user, 'aweme_detail' => $video,
    'aweme_list' => [$video], 'comments' => [['text' => 'Fixture comment', 'user' => $user]],
    'user_list' => [['user_info' => $user]], 'music' => [['title' => 'Fixture music', 'owner_nickname' => 'Fixture artist']],
    'challenge_list' => [['challenge_info' => ['cha_name' => 'Fixture hashtag']]],
    'cursor' => 17, 'max_cursor' => '9007199254740999', 'has_more' => 1, 'url' => 'https://example.test/video',
    'unknown_upstream' => ['preserved' => true]];
$envelope = ['status' => 'ok', 'tiktok' => $payload];
$model = new APIResponse($envelope);
expect($model instanceof LazyJsonMapper, 'Envelope must be a LazyJsonMapper');
expect($model->getTiktok()->getAwemeDetail() instanceof AwemeDetail, 'Nested video must be mapped');
expect($model->getTiktok()->getAwemeDetail() instanceof LazyJsonMapper, 'Nested video must inherit LazyJsonMapper');
expect($model->getTiktok()->getAwemeDetail()->getAwemeId() === '7106855913906081070', 'Large ID must stay a string');

$root = dirname(__DIR__);
$count = 0;
foreach (glob($root . '/examples/*.php') as $file) {
    $source = file_get_contents($file);
    if (!str_contains($source, '$client = exampleClient();')) continue;
    // Execute the shipped request and getter code with an injected mock client.
    // Only the shared CLI bootstrap/client construction is replaced, in memory.
    $code = str_replace(["<?php", "declare(strict_types=1);", "require __DIR__ . '/support/bootstrap.php';", '$client = exampleClient();'], '', $source);
    $name = pathinfo($file, PATHINFO_FILENAME);
    foreach ([$envelope, ['status' => 'ok'], ['status' => 'ok', 'tiktok' => []]] as $fixture) {
        $history = [];
        $stack = HandlerStack::create(new MockHandler([new Response(200, ['Content-Type' => 'application/json'], json_encode($fixture))]));
        $stack->push(Middleware::history($history));
        $client = new TikTok('offline-example-secret');
        $client->httpClient = new Client(['handler' => $stack]);
        ob_start();
        try { eval($code); $output = ob_get_contents(); }
        finally { ob_end_clean(); }
        expect(count($history) === 1, "$name must make exactly one request");
        expect($history[0]['request']->getUri()->getPath() === '/' . $name, "$name uses the wrong endpoint");
        expect(!str_contains($output, 'offline-example-secret'), "$name leaked the license key");
        if ($fixture !== $envelope) continue;
        if (in_array($name, ['getVideoByID', 'getVideoByUrl', 'getUserFeed', 'searchVideo'], true)) {
            expect(str_contains($output, 'Fixture author') && str_contains($output, '12345'), "$name did not read nested models");
        }
        if (in_array($name, ['getUserInfo', 'getBasicUserInfo', 'getUserInfoByID', 'searchUser'], true)) {
            expect(str_contains($output, 'fixture-user'), "$name did not read the user model");
        }
        if (str_starts_with($name, 'getComments')) expect(str_contains($output, 'Fixture comment'), "$name did not read comment models");
        if ($name === 'getUserFeed') expect(str_contains($output, '9007199254740999'), 'Feed cursor must stay unchanged');
    }
    $count++;
}
expect($count === 54, 'Expected all 54 named examples');

$temp = tempnam(sys_get_temp_dir(), 'tiktok-example-output-');
$options = ['output' => $temp];
try {
    exampleOutput($model);
    $saved = json_decode(file_get_contents($temp), true, 512, JSON_THROW_ON_ERROR);
    expect($saved['tiktok']['unknown_upstream']['preserved'] === true, 'JSON export lost unknown fields');
    expect($saved['tiktok']['aweme_detail']['aweme_id'] === '7106855913906081070', 'JSON export changed ID');
} finally { unlink($temp); }

// Run real CLI entry points to check no-key/no-dependency help and rejection paths.
function cli(string $file, array $arguments = [], ?string $fixture = null): array
{
    global $root;
    if ($fixture === null) {
        $command = array_merge([PHP_BINARY, $root . '/examples/' . $file], $arguments);
    } else {
        // Test shared error handling in a separate process: no HTTP client exists.
        $program = 'require ' . var_export($root . '/examples/support/bootstrap.php', true) . ';';
        $program .= $fixture === 'http'
            ? 'throw new TikTokRESTAPI\\Exception\\ForbiddenException("Access denied");'
            : 'exampleCheck(new TikTokRESTAPI\\Response\\APIResponse(' . var_export($fixture === 'quota' ? ['status' => 'ok', 'rate_limit_reached' => true] : ['status' => 'fail'], true) . '));';
        $temporaryProgram = tempnam(sys_get_temp_dir(), 'tiktok-example-error-');
        file_put_contents($temporaryProgram, '<?php ' . $program);
        $command = [PHP_BINARY, $temporaryProgram];
    }
    $process = proc_open($command, [1 => ['pipe', 'w'], 2 => ['pipe', 'w']], $pipes, $root,
        ['PATH' => getenv('PATH'), 'JSONSCRAPER_TIKTOK_LICENSE_KEY' => $fixture === null ? '' : 'offline-cli-secret', 'EXAMPLE_TEST_STATUS' => $fixture ?? '']);
    $stdout = stream_get_contents($pipes[1]); fclose($pipes[1]);
    $stderr = stream_get_contents($pipes[2]); fclose($pipes[2]);
    $status = proc_close($process);
    if (isset($temporaryProgram)) unlink($temporaryProgram);
    return [$status, $stdout . $stderr];
}
foreach (glob($root . '/examples/*.php') as $file) {
    [$status, $output] = cli(basename($file), ['--help']);
    expect($status === 0 && str_contains($output, 'LazyJsonMapper'), basename($file) . ' help failed');
}
foreach (glob($root . '/examples/endpoints/*.php') as $file) {
    [$status, $output] = cli('endpoints/' . basename($file), ['--help']);
    expect($status === 0 && str_contains($output, 'GET /'), basename($file) . ' diagnostic help failed');
}
[$status] = cli('getUserInfo.php'); expect($status === 2, 'Missing key must fail before HTTP');
[$status] = cli('getUserInfo.php', ['--query=other']); expect($status === 2, 'Unsupported flags must not be ignored');
foreach (['fail', 'quota', 'http'] as $fixture) {
    [$status, $output] = cli('getUserInfo.php', [], $fixture);
    expect($status === 1, "$fixture should fail");
    expect(!str_contains($output, 'Username:'), "$fixture must not render a success model");
    expect(!str_contains($output, 'offline-cli-secret'), "$fixture leaked license");
}
echo "Examples: 54 named requests × populated/missing/empty payloads; model inheritance, getters, IDs, cursor, JSON preservation, CLI help, application/quota/HTTP failures passed.\n";
