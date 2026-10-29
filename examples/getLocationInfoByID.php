<?php
/**
 * Get location info by ID.
 * Run with --offline to inspect a real saved response, or edit inputs for one live request. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/get_location_info_by_id.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getLocationInfoByID([
    'location_id' => '22535796485353377',
]);
exampleCheck($response);

$place = $response->getTiktok();
echo 'Place: ', $place?->getPoiName(), PHP_EOL;
echo 'Address: ', $place?->getFormattedAddress(), PHP_EOL;
echo 'Videos: ', $place?->getVideoCount() ?? 0, PHP_EOL;

exampleOutput($response); // Optional full JSON: --output=response.json
