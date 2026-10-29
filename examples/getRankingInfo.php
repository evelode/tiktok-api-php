<?php
/**
 * Get ranking info.
 * Run with --offline to inspect a real saved response, or edit inputs for one live request. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/get_ranking_info.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getRankingInfo([
    'rank_type' => '8',
    'room_id' => '7620881460702087949',
    'user_id' => '7427227547880047662',
]);
exampleCheck($response);

$ranking = $response->getTiktok()?->getData()?->getRankView();
echo 'Ranking: ', $ranking?->getTitle(), PHP_EOL;
foreach ($ranking?->getRanks() ?? [] as $entry) {
    echo '#', $entry->getRank(), ' ', $entry->getUser()?->getNickname(), ' — ', $entry->getScore(), PHP_EOL;
}

exampleOutput($response); // Optional full JSON: --output=response.json
