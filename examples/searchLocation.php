<?php
/**
 * Search for location by keyword.
 * Run with --offline to inspect a real saved response, or edit inputs for one live request. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/search_location.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->searchLocation([
    'keyword' => 'apple',
]);
exampleCheck($response);

$page = $response->getTiktok();
foreach ($page?->getPoiInfo()?->getPoiInfo() ?? [] as $place) {
    echo $place->getPoiIdStr(), ' — ', $place->getPoiName(), ' (', $place->getVideoCount(), ' videos)', PHP_EOL;
}
echo 'Next cursor: ', $page?->getCursor() ?? 0, PHP_EOL;

exampleOutput($response); // Optional full JSON: --output=response.json
