<?php
/**
 * Get non watermarked video url by video ID.
 * Run with --offline to inspect a real saved response, or edit inputs for one live request. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/get_no_watermark_url_by_id.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getNoWatermarkUrlByID('7106855913906081070');
exampleCheck($response);

$download = $response->getTiktok();
echo 'Video ID: ', $download?->getId() ?? 'not supplied', PHP_EOL;
echo 'Playback URL: ', $download?->getUrl() ?? 'not supplied', PHP_EOL;
// Signed CDN URLs expire. Request a fresh URL before downloading later.

exampleOutput($response); // Optional full JSON: --output=response.json
