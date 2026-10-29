<?php
/**
 * Get user stories.
 * Run with --offline to inspect a real saved response, or edit inputs for one live request. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/get_user_stories.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getUserStories([
    'user_id' => '7603011916704809991',
]);
exampleCheck($response);

$story = $response->getTiktok()?->getUserStory();
foreach ($story?->getStories() ?? [] as $video) {
    echo $video->getAwemeId(), ' — ', $video->getDesc(), PHP_EOL;
    echo 'Author: ', $video->getAuthor()?->getNickname(), '; views: ', $video->getStatistics()?->getPlayCount() ?? 0, PHP_EOL;
}
echo 'Total stories: ', $story?->getTotalCount() ?? 0, PHP_EOL;
echo 'Next min_cursor: ', $story?->getMinCursor() ?? 'none', PHP_EOL;

exampleOutput($response); // Optional full JSON: --output=response.json
