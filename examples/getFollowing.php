<?php
/**
 * Get user following by profile URL or nickname.
 * Run with --offline to inspect a real saved response, or edit inputs for one live request. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/get_following.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getFollowing([
    'query' => 'diana_abissinian_cat',
]);
exampleCheck($response);

$page = $response->getTiktok();
foreach ($page?->getFollowings() ?? [] as $user) {
    echo $user->getUid(), ' @', $user->getUniqueId(), ' — ', $user->getNickname(), PHP_EOL;
}
echo 'More: ', $page?->getHasMore() ?? 0, PHP_EOL;
echo 'Next page token: ', $page?->getNextPageToken() ?? 'none', PHP_EOL;
echo 'min_time: ', $page?->getMinTime() ?? 'none', PHP_EOL;
// The documented pagination input is min_time. Preserve next_page_token as metadata.

exampleOutput($response); // Optional full JSON: --output=response.json
