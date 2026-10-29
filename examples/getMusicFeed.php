<?php
/**
 * Get music feed by URL or ID.
 * One request; edit the sample inputs below. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/get_music_feed.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getMusicFeed([
    'query' => '6928004115846924290',
]);
exampleCheck($response);

$page = $response->getTiktok();
foreach ($page?->getAwemeList() ?? [] as $video) { // AwemeListItem models.
    echo $video->getAwemeId(), ' | ', $video->getAuthor()?->getNickname() ?? 'unknown',
        ' | views: ', $video->getStatistics()?->getPlayCount() ?? 'not supplied', PHP_EOL;
}
echo 'More videos: ', $page?->getHasMore() ?? 'not supplied', PHP_EOL;

exampleOutput($response); // Optional full JSON: --output=response.json
