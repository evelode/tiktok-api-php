<?php
/**
 * Search insights by text query.
 * Run with --offline to inspect a real saved response, or edit inputs for one live request. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/search_insights.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->searchInsights([
    'keyword' => 'appletv',
]);
exampleCheck($response);

$page = $response->getTiktok();
foreach ($page?->getInspirationList() ?? [] as $idea) {
    echo $idea->getQueryText(), ' (ID ', $idea->getQueryIdStr(), ')', PHP_EOL;
    echo 'Popularity: ', $idea->getPopularity(), '; videos: ', $idea->getVideoNum(), PHP_EOL;
}
echo 'Next cursor: ', $page?->getCursor() ?? 0, PHP_EOL;

exampleOutput($response); // Optional full JSON: --output=response.json
