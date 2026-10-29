<?php
/**
 * Search for live by keyword.
 * Run with --offline to inspect a real saved response, or edit inputs for one live request. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/search_live.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->searchLive('apple', '', 10);
exampleCheck($response);

$page = $response->getTiktok();
foreach ($page?->getData() ?? [] as $entry) {
    $live = $entry->getLives();
    echo 'Host: ', $live?->getAuthor()?->getNickname(), PHP_EOL;
    echo 'Room: ', $live?->getRoom()?->getId(), ' — ', $live?->getRoom()?->getTitle(), PHP_EOL;
}
echo 'Next cursor: ', $page?->getCursor() ?? 0, PHP_EOL;

exampleOutput($response); // Optional full JSON: --output=response.json
