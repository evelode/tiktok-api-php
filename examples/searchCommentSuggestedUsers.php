<?php
/**
 * Search comment suggested users.
 * Run with --offline to inspect a real saved response, or edit inputs for one live request. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/search_comment_suggested_users.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->searchCommentSuggestedUsers([
    'keyword' => 'appletv',
]);
exampleCheck($response);

foreach ($response->getTiktok()?->getSugList() ?? [] as $suggestion) {
    echo 'Suggested account: ', $suggestion->getContent(), PHP_EOL;
}
// Suggestions are suggestion records, not the user_list returned by searchUser.

exampleOutput($response); // Optional full JSON: --output=response.json
