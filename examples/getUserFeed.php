<?php
/**
 * Get user feed by profile URL or nickname.
 * Endpoint: GET /getUserFeed
 *
 * Run: php examples/getUserFeed.php --help
 * Set JSONSCRAPER_TIKTOK_LICENSE_KEY. Each run performs one licensed request.
 * Default sample parameters come from the public Postman collection.
 * Replace sample IDs, accounts and URLs with the inputs for your application.
 */
declare(strict_types=1);
if (PHP_SAPI !== 'cli') { http_response_code(404); exit; }
$options = getopt('', ['help', 'timeout:', 'output:', 'query:', 'max_cursor:', 'count:', 'region:', 'with_pinned_posts:', 'sort_type:', 'cache_timeout:']);
if (isset($options['help'])) {
    echo "Get user feed by profile URL or nickname\nGET /getUserFeed\n\nEnvironment: JSONSCRAPER_TIKTOK_LICENSE_KEY\nCommon options: --timeout=30, --help\nQuery options:\n  --query=VALUE  TikTok profile URL or nickname\n  --max_cursor=VALUE  Used for scrolling (pagination) in feed items, you can get max_cursor value from the previous response.\n  --count=VALUE  Number of items you want to get. For example: 10.\n  --region=VALUE  Region (country) code. Default: US\n  --with_pinned_posts=VALUE  Add pinned posts in response. Default: 1\n  --sort_type=VALUE  Sort type for feed: 0 - Recent, 1 - Popular.\n  --cache_timeout=VALUE  Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here.\n\nValues omitted from the command use the public Postman sample defaults. Replace IDs/URLs with your own inputs. Each run makes one request; live requests may consume quota." . PHP_EOL;
    exit(0);
}
require dirname(__DIR__) . '/vendor/autoload.php';
$key = trim((string)getenv('JSONSCRAPER_TIKTOK_LICENSE_KEY'));
if ($key === '') {
    fwrite(STDERR, 'Set JSONSCRAPER_TIKTOK_LICENSE_KEY before making a licensed request.' . PHP_EOL);
    exit(2);
}
$timeout = (float)($options['timeout'] ?? 30);
if (!is_finite($timeout) || $timeout <= 0) {
    fwrite(STDERR, 'Timeout must be a positive number of seconds.' . PHP_EOL);
    exit(2);
}
$params = ['query'=>'therock', 'max_cursor'=>null, 'count'=>null, 'region'=>null, 'with_pinned_posts'=>null, 'sort_type'=>null, 'cache_timeout'=>'60'];
foreach ($params as $name => $value) {
    if (array_key_exists($name, $options)) $params[$name] = $options[$name];
}
try {
    $client = new \TikTokRESTAPI\TikTok($key);
    $client->setTimeout($timeout);
    $model = $client->call('getUserFeed', $params);
    $response = $model->exportObjectDataCopy('array');
    if (!is_array($response)) {
        if (empty($options['output'])) throw new \RuntimeException('Binary response: provide --output=filename');
        if (file_put_contents($options['output'], $response) === false) throw new \RuntimeException('Could not save response');
        exit(0);
    }
    // HTTP 200 is not sufficient: inspect the application's status and quota.
    if (($response['status'] ?? null) !== 'ok' || !empty($response['rate_limit_reached'])) {
        fwrite(STDERR, 'API application error or quota limit. Inspect the envelope below.' . PHP_EOL);
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR) . PHP_EOL;
        exit(1);
    }
    // Preserve IDs as strings and retain unknown upstream fields.
    $json = json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR) . PHP_EOL;
    if (!empty($options['output'])) {
        if (file_put_contents($options['output'], $json) === false) throw new \RuntimeException('Could not save response');
    } else { echo $json; }
} catch (\Throwable $error) {
    // SDK exceptions contain safe messages; do not log request URLs or license keys.
    fwrite(STDERR, get_class($error) . ': ' . $error->getMessage() . PHP_EOL);
    exit(1);
}
