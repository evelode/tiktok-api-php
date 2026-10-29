<?php
/**
 * Get non watermarked video url by video ID.
 * One request; edit the sample inputs below. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/get_no_watermark_url_by_id.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getNoWatermarkUrlByID('7106855913906081070');
exampleCheck($response);

echo 'URL: ', $response->getTiktok()?->getUrl() ?? 'not supplied', PHP_EOL;

exampleOutput($response); // Optional full JSON: --output=response.json
