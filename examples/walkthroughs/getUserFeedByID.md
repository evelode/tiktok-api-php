# Get user feed by profile ID

[All examples](../README.md) · [Runnable PHP](../getUserFeedByID.php) · [Response excerpt](../responses/getUserFeedByID.json)

`GET /getUserFeedByID` · Source: Local Postman collection

## Run it

```sh
php examples/getUserFeedByID.php --offline
php examples/getUserFeedByID.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getUserFeedByID([
    'user_id' => '6745191554350760966',
]);
exampleCheck($response);

$page = $response->getTiktok();
foreach ($page?->getAwemeList() ?? [] as $video) {
    echo $video->getAwemeId(), ' — ', $video->getDesc(), PHP_EOL;
    echo 'Author: ', $video->getAuthor()?->getNickname(), '; views: ', $video->getStatistics()?->getPlayCount() ?? 0, PHP_EOL;
}
echo 'More: ', $page?->getHasMore() ?? 0, PHP_EOL;
echo 'Next cursor: ', $page?->getCursor() ?? $page?->getMaxCursor() ?? 'none', PHP_EOL;
// Pass max_cursor unchanged on the next request.
```

## Captured output

```text
7612750522935741710 — Man I was emotional here, because my heart was full listening to everyone’s powerful speeches, then “My Way” was played as I walked on stage. I was also deeply inspired, because I’m a proud, self respecting Black Samoa … [shortened]
Author: The Rock; views: 223859
7611223051342056718 — In a blink, the years roll on.  We look back and hope we’ve made a positive impact on all those around us, but more importantly ~ a positive impact on ourselves.  Life changes, but the hunger doesn’t.  Remember your wh … [shortened]
Author: The Rock; views: 227027
More: 1
Next cursor: 1767808071910
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `status_code`, `min_cursor`, `max_cursor`, `has_more`, `aweme_list`, `has_locate_item`, `status_msg`

[Open the saved JSON](../responses/getUserFeedByID.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `user_id` | `6745191554350760966` | TikTok User ID. |
| `max_cursor` | `1766978753290` | Used for scrolling (pagination) in feed items, you can get max_cursor value from the previous response. |
| `count` | `20` | Number of items you want to get. For example: 10. |
| `region` | `US` | Region (country) code. Default: US |
| `with_pinned_posts` | `1` | Add pinned posts in response. Default: 1 |
| `sort_type` | `0` | Sort type for feed: 0 - Recent, 1 - Popular. |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
