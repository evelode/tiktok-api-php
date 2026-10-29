<?php
/**
 * Get user playlists.
 * Run with --offline to inspect a real saved response, or edit inputs for one live request. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/get_user_playlists.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getUserPlaylists([
    'user_id' => '6745191554350760966',
]);
exampleCheck($response);

$page = $response->getTiktok();
foreach ($page?->getMixList() ?? [] as $playlist) {
    echo $playlist->getMixId(), ' — ', $playlist->getName(), PHP_EOL;
    echo 'Videos: ', $playlist->getStatistic()?->getTotal() ?? 0, PHP_EOL;
}
echo 'Next cursor: ', $page?->getCursor() ?? 0, PHP_EOL;

exampleOutput($response); // Optional full JSON: --output=response.json
