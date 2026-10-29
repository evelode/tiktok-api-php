# Get comments replies

[All examples](../README.md) · [Runnable PHP](../getCommentsReplies.php) · [Response excerpt](../responses/getCommentsReplies.json)

`GET /getCommentsReplies` · Source: Local Postman collection

## Run it

```sh
php examples/getCommentsReplies.php --offline
php examples/getCommentsReplies.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getCommentsReplies([
    'video_id' => '7141505394869898538',
    'comment_id' => '7141509601794540334',
]);
exampleCheck($response);

$page = $response->getTiktok();
foreach ($page?->getComments() ?? [] as $comment) { // Comment models.
    echo 'Comment ID: ', $comment->getCid(), PHP_EOL;
    echo $comment->getUser()?->getNickname() ?? 'unknown', ': ', $comment->getText(), PHP_EOL;
}
echo 'Next cursor: ', $page?->getCursor() ?? 'not supplied', PHP_EOL;
echo 'More comments: ', $page?->getHasMore() ?? 'not supplied', PHP_EOL;
// Fetch another page explicitly only if needed; this example makes one request.
```

## Captured output

```text
Comment ID: 7148756277332968197
Emesethegreat: Cannot unhear it from now on. 🤣
Comment ID: 7147895044354638635
conifur5: Says*
Next cursor: 9
More comments: 0
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `comments`, `cursor`, `has_more`, `status_code`, `status_msg`, `total`

[Open the saved JSON](../responses/getCommentsReplies.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `video_id` | `7141505394869898538` | TikTok video ID. |
| `comment_id` | `7141509601794540334` | TikTok comment ID. |
| `cursor` | `` | Used for scrolling (pagination) in comments items, you can get cursor value from the previous response. |
| `count` | `` | Number of comments you want to get. For example: 30. |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
