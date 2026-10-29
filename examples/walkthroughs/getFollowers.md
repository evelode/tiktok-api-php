# Get user followers by profile URL or nickname

[All examples](../README.md) · [Runnable PHP](../getFollowers.php) · [Response excerpt](../responses/getFollowers.json)

`GET /getFollowers` · Source: Local Postman collection

## Run it

```sh
php examples/getFollowers.php --offline
php examples/getFollowers.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getFollowers([
    'query' => 'diana_abissinian_cat',
]);
exampleCheck($response);

$page = $response->getTiktok();
foreach ($page?->getFollowers() ?? [] as $user) {
    echo $user->getUid(), ' @', $user->getUniqueId(), ' — ', $user->getNickname(), PHP_EOL;
}
echo 'More: ', $page?->getHasMore() ?? 0, PHP_EOL;
echo 'Next page token: ', $page?->getNextPageToken() ?? 'none', PHP_EOL;
echo 'min_time: ', $page?->getMinTime() ?? 'none', PHP_EOL;
// The documented pagination input is min_time. Preserve next_page_token as metadata.
```

## Captured output

```text
7565435925619655691 @fighter8029 — Anna❤️‍🔥💡
6936423085499630594 @readshad — readshad
More: 1
Next page token: eyJtYXhfY3Vyc29yIjoxNzcxNTAzODU4LCJtaW5fY3Vyc29yIjoxNzAwMTQxODY4fQ==
min_time: 1700141868
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `followers`, `has_more`, `max_time`, `min_time`, `myself_user_id`, `next_page_token`, `offset`, `status_code`, `status_msg`, `total`

[Open the saved JSON](../responses/getFollowers.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `query` | `diana_abissinian_cat` | TikTok profile URL or nickname |
| `count` | `20` | Number of items you want to get. For example: 20. |
| `min_time` | `` | Used for scrolling (pagination) in followers array, you can get min_time value from the previous response. |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
