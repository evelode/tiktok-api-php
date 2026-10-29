# Get comments list by video ID

[All examples](../README.md) · [Runnable PHP](../getCommentsByID.php) · [Response excerpt](../responses/getCommentsByID.json)

`GET /getCommentsByID` · Source: Local Postman collection

## Run it

```sh
php examples/getCommentsByID.php --offline
php examples/getCommentsByID.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getCommentsByID('7141505394869898538', '', 30);
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
Comment ID: 7141509601794540334
Kristin: Not the “Are you working, daddy?” at the end 😂😂😂
Comment ID: 7141508293499634474
fromthepovoft: The fact that they made this song in like a day too 🙌🏻🔥 so good
Next cursor: 30
More comments: 1
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `status_code`, `comments`, `cursor`, `has_more`, `reply_style`, `total`, `top_gifts`, `has_filtered_comments`, `alias_comment_deleted`, `status_msg`

[Open the saved JSON](../responses/getCommentsByID.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `video_id` | `7141505394869898538` | TikTok video ID. |
| `region` | `US` | Region (country) code. Default: US |
| `cursor` | `` | Used for scrolling (pagination) in comments items, you can get cursor value from the previous response. |
| `count` | `` | Number of comments you want to get. For example: 30. |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
