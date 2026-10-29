<?php
/**
 * Get videos by location ID.
 * One request; edit the sample inputs below. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/get_location_feed_by_id.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getLocationFeedByID([
    'location_id' => '22535796485353377',
]);
exampleCheck($response);

$page = $response->getTiktok();
foreach ($page?->getAwemeList() ?? [] as $video) { // AwemeListItem models.
    echo $video->getAwemeId(), ' | ', $video->getAuthor()?->getNickname() ?? 'unknown',
        ' | views: ', $video->getStatistics()?->getPlayCount() ?? 'not supplied', PHP_EOL;
}
echo 'More videos: ', $page?->getHasMore() ?? 'not supplied', PHP_EOL;

exampleOutput($response); // Optional full JSON: --output=response.json
