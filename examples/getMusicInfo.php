<?php
/**
 * Get music info by URL or ID.
 * Run with --offline to inspect a real saved response, or edit inputs for one live request. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/get_music_info.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getMusicInfo([
    'query' => '6928004115846924290',
]);
exampleCheck($response);

$music = $response->getTiktok()?->getMusicInfo();
echo 'Music ID: ', $music?->getIdStr(), PHP_EOL;
echo 'Track: ', $music?->getTitle(), ' — ', $music?->getAuthor(), PHP_EOL;
echo 'Duration (seconds): ', $music?->getDuration() ?? 0, PHP_EOL;
foreach ($music?->getPlayUrl()?->getUrlList() ?? [] as $url) echo 'Preview: ', $url, PHP_EOL;

exampleOutput($response); // Optional full JSON: --output=response.json
