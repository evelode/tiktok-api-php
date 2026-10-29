<?php
/**
 * Get trending feed.
 * One request; edit the sample inputs below. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/get_trending_feed.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getTrendingFeed([
]);
exampleCheck($response);

$page = $response->getTiktok();
foreach ($page?->getAwemeList() ?? [] as $video) { // AwemeListItem models.
    echo $video->getAwemeId(), ' | ', $video->getAuthor()?->getNickname() ?? 'unknown',
        ' | views: ', $video->getStatistics()?->getPlayCount() ?? 'not supplied', PHP_EOL;
}
echo 'More videos: ', $page?->getHasMore() ?? 'not supplied', PHP_EOL;

exampleOutput($response); // Optional full JSON: --output=response.json
