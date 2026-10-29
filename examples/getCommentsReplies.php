<?php
/**
 * Get comments replies.
 * One request; edit the sample inputs below. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/get_comments_replies.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getCommentsReplies([
    'video_id' => '7141505394869898538',
    'comment_id' => '7141509601794540334',
]);
exampleCheck($response);

$page = $response->getTiktok();
foreach ($page?->getComments() ?? [] as $comment) { // Comment models.
    echo $comment->getUser()?->getNickname() ?? 'unknown', ': ', $comment->getText(), PHP_EOL;
}
echo 'Next cursor: ', $page?->getCursor() ?? 'not supplied', PHP_EOL;
echo 'More comments: ', $page?->getHasMore() ?? 'not supplied', PHP_EOL;
// Fetch another page explicitly only if needed; this example makes one request.

exampleOutput($response); // Optional full JSON: --output=response.json
