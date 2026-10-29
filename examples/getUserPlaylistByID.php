<?php
/**
 * Get user playlist by ID.
 * Run with --offline to inspect a real saved response, or edit inputs for one live request. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/get_user_playlist_by_id.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getUserPlaylistByID([
    'user_id' => '6745191554350760966',
    'playlist_id' => '7359404761613208363',
]);
exampleCheck($response);

$playlist = $response->getTiktok()?->getMix();
echo 'Playlist: ', $playlist?->getName(), ' (', $playlist?->getMixId(), ')', PHP_EOL;
echo 'Creator: ', $playlist?->getCreatorName(), PHP_EOL;
echo 'Videos: ', $playlist?->getStatistic()?->getTotal() ?? 0, PHP_EOL;
echo 'Views: ', $playlist?->getStatistic()?->getTotalPlayCount() ?? 0, PHP_EOL;

exampleOutput($response); // Optional full JSON: --output=response.json
