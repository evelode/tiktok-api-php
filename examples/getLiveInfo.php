<?php
/**
 * Get live info.
 * Run with --offline to inspect a real saved response, or edit inputs for one live request. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/get_live_info.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getLiveInfo([
    'room_id' => '7620881460702087949',
    'user_id' => '7427227547880047662',
]);
exampleCheck($response);

// This method's data is an object; searchLive and getLiveFeed return lists.
$room = $response->getTiktok()?->getData();
echo 'Room: ', $room?->getIdStr(), ' — ', $room?->getTitle(), PHP_EOL;
echo 'Host: ', $room?->getOwner()?->getNickname(), PHP_EOL;
echo 'Viewers: ', $room?->getUserCount() ?? 0, PHP_EOL;

exampleOutput($response); // Optional full JSON: --output=response.json
