<?php
/**
 * Search for music by keyword.
 * Run with --offline to inspect a real saved response, or edit inputs for one live request. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/search_music.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->searchMusic('apple', '', 10);
exampleCheck($response);

$page = $response->getTiktok();
foreach ($page?->getMusic() ?? [] as $music) { // MusicSearchItem models.
    echo $music->getIdStr(), ' — ', $music->getTitle(), ' / ', $music->getAuthor(), PHP_EOL;
    echo 'Duration (seconds): ', $music->getDuration() ?? 0, PHP_EOL;
}
echo 'Next cursor: ', $page?->getCursor() ?? 0, PHP_EOL;

exampleOutput($response); // Optional full JSON: --output=response.json
