<?php
/**
 * Search for user by keyword.
 * Run with --offline to inspect a real saved response, or edit inputs for one live request. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/search_user.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->searchUser('apple', '', 10);
exampleCheck($response);

foreach ($response->getTiktok()?->getUserList() ?? [] as $item) { // UserSearchItem models.
    $user = $item->getUserInfo();
    echo 'ID: ', $user?->getUid(), '; followers: ', $user?->getFollowerCount() ?? 0, PHP_EOL;
    echo $user?->getUniqueId() ?? 'unknown', ' | ', $user?->getNickname() ?? 'not supplied', PHP_EOL;
}

echo 'Next cursor: ', $response->getTiktok()?->getCursor() ?? 0, PHP_EOL;

exampleOutput($response); // Optional full JSON: --output=response.json
