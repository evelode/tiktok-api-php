<?php
/** Shared CLI setup only. Requests and model access stay in each example. */
declare(strict_types=1);

use TikTokRESTAPI\TikTok;
use TikTokRESTAPI\Response\APIResponse;
use LazyJsonMapper\LazyJsonMapper;

if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit;
}

$options = getopt('', ['help', 'timeout:', 'cache_timeout:', 'output:']);
if (isset($options['help'])) {
    echo "LazyJsonMapper model example — one licensed request.\n"
        . "Set JSONSCRAPER_TIKTOK_LICENSE_KEY and edit the sample inputs in the PHP file.\n"
        . "Options: --help, --timeout=30, --cache_timeout=60, --output=response.json\n"
        . "For query-parameter flags, use the matching examples/endpoints/ CLI program.\n";
    exit(0);
}
// Do not silently ignore old query flags: the full CLI programs retain them.
foreach (array_slice($_SERVER['argv'] ?? [], 1) as $argument) {
    if (!preg_match('/^--(?:timeout|cache_timeout|output)=.+$/D', $argument)) {
        fwrite(STDERR, "Use --option=value. Query flags are supported in examples/endpoints/.\n");
        exit(2);
    }
}

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

set_exception_handler(static function (Throwable $error): void {
    // SDK transport errors are redacted. Never print credential-bearing URLs.
    fwrite(STDERR, get_class($error) . ': ' . $error->getMessage() . PHP_EOL);
    exit(1);
});

function exampleClient(): TikTok
{
    global $options;
    $key = trim((string) getenv('JSONSCRAPER_TIKTOK_LICENSE_KEY'));
    if ($key === '') {
        fwrite(STDERR, "Set JSONSCRAPER_TIKTOK_LICENSE_KEY before making a licensed request.\n");
        exit(2);
    }
    $timeoutInput = (string) ($options['timeout'] ?? '30');
    $timeout = (float) $timeoutInput;
    $cache = (string) ($options['cache_timeout'] ?? '60');
    if (!is_numeric($timeoutInput) || !is_finite($timeout) || $timeout <= 0 || !ctype_digit($cache) || (float) $cache > PHP_INT_MAX) {
        fwrite(STDERR, "Timeout must be positive; cache_timeout must be a non-negative integer.\n");
        exit(2);
    }
    $client = new TikTok($key);
    $client->setTimeout($timeout);
    $client->setCacheTimeout((int) $cache);
    return $client;
}

function exampleCheck(APIResponse $response): void
{
    // HTTP success alone is insufficient. Check the envelope before reading data.
    if (!$response->isOk() || $response->getRateLimitReached()) {
        fwrite(STDERR, "API application error or quota limit.\n");
        exampleJson($response);
        exit(1);
    }
}

function exampleJson(?LazyJsonMapper $model): void
{
    echo json_encode($model?->exportObjectDataCopy('array'),
        JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR), PHP_EOL;
}

function exampleOutput(APIResponse $response): void
{
    global $options;
    if (!isset($options['output'])) return;
    $json = json_encode($response->exportObjectDataCopy('array'),
        JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR) . PHP_EOL;
    if (file_put_contents($options['output'], $json) === false) {
        throw new RuntimeException('Could not save response');
    }
}
