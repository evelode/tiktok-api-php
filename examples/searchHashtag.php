<?php
/**
 * Search for hashtag by keyword.
 * Run with --offline to inspect a real saved response, or edit inputs for one live request. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/search_hashtag.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->searchHashtag('apple', '', 10);
exampleCheck($response);

foreach ($response->getTiktok()?->getChallengeList() ?? [] as $item) { // ChallengeList models.
    $tag = $item->getChallengeInfo();
    echo '#', $tag?->getChaName(), ' (ID ', $tag?->getCid(), ')', PHP_EOL;
}

echo 'Next cursor: ', $response->getTiktok()?->getCursor() ?? 0, PHP_EOL;

exampleOutput($response); // Optional full JSON: --output=response.json
