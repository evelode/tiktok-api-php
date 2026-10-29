<?php
/**
 * Search for hashtag by keyword.
 * One request; edit the sample inputs below. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/search_hashtag.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->searchHashtag('apple', '', 10);
exampleCheck($response);

foreach ($response->getTiktok()?->getChallengeList() ?? [] as $item) { // ChallengeList models.
    echo $item->getChallengeInfo()?->getChaName() ?? 'not supplied', PHP_EOL;
}

exampleOutput($response); // Optional full JSON: --output=response.json
