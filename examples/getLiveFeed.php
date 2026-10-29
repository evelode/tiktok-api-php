<?php
/**
 * Get live feed.
 * Run with --offline to inspect a real saved response, or edit inputs for one live request. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/get_live_feed.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getLiveFeed([
    'draw_room_id' => '7620936076353440533',
]);
exampleCheck($response);

foreach ($response->getTiktok()?->getData() ?? [] as $entry) {
    $room = new \TikTokRESTAPI\Response\Model\LiveRoomInfo($entry->getData() ?? []);
    echo $room->getIdStr(), ' — ', $room->getTitle(), PHP_EOL;
    echo 'Host: ', $room->getOwner()?->getNickname(), '; viewers: ', $room->getUserCount(), PHP_EOL;
}

exampleOutput($response); // Optional full JSON: --output=response.json
