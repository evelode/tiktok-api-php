<?php
/**
 * Convert short TikTok video URL to full TikTok video URL.
 * Run with --offline to inspect a real saved response, or edit inputs for one live request. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/get_unshortened_url.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getUnshortenedUrl('https://vt.tiktok.com/ZSFx4cagA/');
exampleCheck($response);

echo 'Full video URL: ', $response->getTiktok()?->getUrl() ?? 'not supplied', PHP_EOL;

exampleOutput($response); // Optional full JSON: --output=response.json
