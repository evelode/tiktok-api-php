<?php
/**
 * Get music charts.
 * Run with --offline to inspect a real saved response, or edit inputs for one live request. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/get_music_charts.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getMusicCharts([
]);
exampleCheck($response);

foreach ($response->getTiktok()?->getMusicList() ?? [] as $entry) {
    $music = $entry->getMusicInfo();
    echo $music?->getIdStr(), ' — ', $music?->getTitle(), ' / ', $music?->getAuthor(), PHP_EOL;
}

exampleOutput($response); // Optional full JSON: --output=response.json
