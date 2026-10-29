<?php
/**
 * Get trending feed.
 * Run with --offline to inspect a real saved response, or edit inputs for one live request. LazyJsonMapper supplies the getters.
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
foreach ($page?->getAwemeList() ?? [] as $video) {
    echo $video->getAwemeId(), ' — ', $video->getDesc(), PHP_EOL;
    echo 'Author: ', $video->getAuthor()?->getNickname(), '; views: ', $video->getStatistics()?->getPlayCount() ?? 0, PHP_EOL;
}
echo 'More: ', $page?->getHasMore() ?? 0, PHP_EOL;
echo 'Response cursor metadata: ', $page?->getCursor() ?? $page?->getMaxCursor() ?? 'none', PHP_EOL;
// This endpoint documents region and pull_type, not a pagination cursor input.

exampleOutput($response); // Optional full JSON: --output=response.json
