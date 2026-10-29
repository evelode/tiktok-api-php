<?php
/**
 * Get non watermarked video url.
 * One request; edit the sample inputs below. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/get_no_watermark_url.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getNoWatermarkUrl('https://www.tiktok.com/@therock/video/7106855913906081070');
exampleCheck($response);

echo 'URL: ', $response->getTiktok()?->getUrl() ?? 'not supplied', PHP_EOL;

exampleOutput($response); // Optional full JSON: --output=response.json
