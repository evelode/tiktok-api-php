<?php
/**
 * Get video by playlist ID.
 * Run with --offline to inspect a real saved response, or edit inputs for one live request. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/get_video_by_playlist_id.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getVideoByPlaylistID([
    'user_id' => '6745191554350760966',
    'playlist_id' => '7359404761613208363',
]);
exampleCheck($response);

$page = $response->getTiktok();
foreach ($page?->getVideos() ?? [] as $video) {
    echo $video->getAwemeId(), ' — ', $video->getDesc(), PHP_EOL;
    echo 'Author: ', $video->getAuthor()?->getNickname(), '; views: ', $video->getStatistics()?->getPlayCount() ?? 0, PHP_EOL;
}
echo 'Next max_cursor: ', $page?->getMaxCursor() ?? 'none', PHP_EOL;

exampleOutput($response); // Optional full JSON: --output=response.json
