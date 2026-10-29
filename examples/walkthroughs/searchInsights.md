# Search insights by text query

[All examples](../README.md) · [Runnable PHP](../searchInsights.php) · [Response excerpt](../responses/searchInsights.json)

`GET /searchInsights` · Source: Local Postman collection

## Run it

```sh
php examples/searchInsights.php --offline
php examples/searchInsights.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->searchInsights([
    'keyword' => 'appletv',
]);
exampleCheck($response);

$page = $response->getTiktok();
foreach ($page?->getInspirationList() ?? [] as $idea) {
    echo $idea->getQueryText(), ' (ID ', $idea->getQueryIdStr(), ')', PHP_EOL;
    echo 'Popularity: ', $idea->getPopularity(), '; videos: ', $idea->getVideoNum(), PHP_EOL;
}
echo 'Next cursor: ', $page?->getCursor() ?? 0, PHP_EOL;
```

## Captured output

```text
Apple tv  (ID 7449223089587552262)
Popularity: 72; videos: 848
AppleTVPartner (ID 7584320780683444236)
Popularity: 64; videos: 0
Next cursor: 25
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `banners`, `cost_tracker`, `cursor`, `has_more`, `inspiration_list`, `session_refresh_index`, `status_code`, `status_msg`

[Open the saved JSON](../responses/searchInsights.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `keyword` | `appletv` | Any text or keyword |
| `cursor` | `` | Used for scrolling (pagination) in video items, you can get cursor value from the previous response. |
| `count` | `25` | Number of results you want to get. For example: 25. |
| `region` | `US` | Region (country) code. Default: US |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
