# Get trending feed

[All examples](../README.md) · [Runnable PHP](../getTrendingFeed.php) · [Response excerpt](../responses/getTrendingFeed.json)

`GET /getTrendingFeed` · Source: Local Postman collection

## Run it

```sh
php examples/getTrendingFeed.php --offline
php examples/getTrendingFeed.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getTrendingFeed([
]);
exampleCheck($response);

$page = $response->getTiktok();
foreach ($page?->getAwemeList() ?? [] as $video) {
    echo $video->getAwemeId(), ' — ', $video->getDesc(), PHP_EOL;
    echo 'Author: ', $video->getAuthor()?->getNickname(), '; views: ', $video->getStatistics()?->getPlayCount() ?? 0, PHP_EOL;
}
echo 'More: ', $page?->getHasMore() ?? 0, PHP_EOL;
echo 'Response cursor metadata: ', $page?->getCursor() ?? $page?->getMaxCursor() ?? 'none', PHP_EOL;
// This endpoint documents region and pull_type, not a pagination cursor input.
```

## Captured output

```text
7604534375476137247 — អរុណ​សួស្ដី​បង​ប្អូន​ កុំ​ភ្លេច​ញញឹម​ណា​ 🥺🥰🌻
Author: Kanitha - កនិដ្ឋា; views: 80405
7606157827836513558 — 
Author: ⠀ ⠀; views: 14511821
More: 1
Response cursor metadata: 5
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `status_code`, `min_cursor`, `max_cursor`, `has_more`, `aweme_list`, `home_model`, `refresh_clear`, `preload_ads`, `preload_awemes`, `log_info`

[Open the saved JSON](../responses/getTrendingFeed.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `region` | `US` | Region (country) code. Default: US |
| `pull_type` | `0` | The type of loading feed (0 - Initial loading, 2 - Load more, 8 - Reload) |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here.  |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
