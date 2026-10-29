<?php
/**
 * Get user info by profile URL or nickname.
 * One request; edit the sample inputs below. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/get_user_info.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getUserInfo('therock');
exampleCheck($response);

$user = $response->getTiktok()?->getUser(); // User model, mapped lazily.
if ($user === null) {
    echo 'No user was returned.', PHP_EOL;
} else {
    echo 'ID: ', $user->getUid() ?? 'not supplied', PHP_EOL;
    echo 'Username: ', $user->getUniqueId() ?? 'not supplied', PHP_EOL;
    echo 'Name: ', $user->getNickname() ?? 'not supplied', PHP_EOL;
    echo 'Followers: ', $user->getFollowerCount() ?? 'not supplied', PHP_EOL;
}

exampleOutput($response); // Optional full JSON: --output=response.json
