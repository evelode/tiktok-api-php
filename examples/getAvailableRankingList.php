<?php
/**
 * Get available ranking list.
 * Run with --offline to inspect a real saved response, or edit inputs for one live request. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/get_available_ranking_list.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getAvailableRankingList([
    'room_id' => '7620881460702087949',
    'user_id' => '7427227547880047662',
]);
exampleCheck($response);

foreach ($response->getTiktok()?->getData() ?? [] as $group) {
    // This nested data object differs from the top-level data list.
    $details = new \TikTokRESTAPI\Response\Model\RankingGroup($group->getData() ?? []);
    foreach ($details->getTabs() ?? [] as $tab) {
        echo 'Rank type: ', $tab->getRankType(), ' — ', $tab->getTitle(), PHP_EOL;
    }
}

exampleOutput($response); // Optional full JSON: --output=response.json
