<?php
/**
 * Get live event info by ID.
 * Run with --offline to inspect a real saved response, or edit inputs for one live request. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/get_live_event_info_by_id.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getLiveEventInfoByID([
    'event_id' => '7611130821763661845',
]);
exampleCheck($response);

$event = $response->getTiktok()?->getEvent();
echo 'Event: ', $event?->getTitle(), ' (', $event?->getId(), ')', PHP_EOL;
echo 'Host: @', $event?->getHost()?->getUniqueId(), PHP_EOL;
echo 'Start (Unix seconds): ', $event?->getStartTime(), PHP_EOL;
echo 'Duration (seconds): ', $event?->getDuration(), PHP_EOL;

exampleOutput($response); // Optional full JSON: --output=response.json
