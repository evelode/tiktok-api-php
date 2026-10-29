<?php
/**
 * Search for music by keyword.
 * One request; edit the sample inputs below. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/search_music.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->searchMusic('apple', '', 10);
exampleCheck($response);

foreach ($response->getTiktok()?->getMusic() ?? [] as $music) { // MusicSearchItem models.
    echo $music->getTitle() ?? 'not supplied', ' | ', $music->getOwnerNickname() ?? 'not supplied', PHP_EOL;
}

exampleOutput($response); // Optional full JSON: --output=response.json
