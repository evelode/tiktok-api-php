# Top search by text query

[All examples](../README.md) · [Runnable PHP](../searchTop.php) · [Response excerpt](../responses/searchTop.json)

`GET /searchTop` · Source: Local Postman collection

## Run it

```sh
php examples/searchTop.php --offline
php examples/searchTop.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->searchTop([
    'keyword' => 'appletv',
]);
exampleCheck($response);

$page = $response->getTiktok();
foreach ($page?->getData() ?? [] as $item) {
    $video = $item->getAwemeInfo();
    if ($video === null) continue; // Mixed search cards may have another type.
    echo $video->getAwemeId(), ' — ', $video->getDesc(), PHP_EOL;
    echo 'Author: ', $video->getAuthor()?->getNickname(), '; views: ', $video->getStatistics()?->getPlayCount() ?? 0, PHP_EOL;
}
echo 'Next cursor: ', $page?->getCursor() ?? 0, PHP_EOL;
```

## Captured output

```text
7619576678871780638 — If you have an iPhone and you can afford this… get it! You must. #appletv #apple #homekit #smarthome #techtok @apple please sponsor
Author: Caleb’s Mac; views: 2509
7610085037874138390 — Apple TV is the best streaming box ? #apple #applehome #appletv #homekit #smarthome 
Author: AppleHome Authority; views: 214737
Next cursor: 10
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `ad_info`, `backtrace`, `components`, `cursor`, `data`, `global_doodle_config`, `has_more`, `headers`, `prefer_layout`, `qc`, `result_status`, `status_code`

[Open the saved JSON](../responses/searchTop.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `keyword` | `appletv` | Any text or keyword |
| `cursor` | `` | Used for scrolling (pagination) in video items, you can get cursor value from the previous response. |
| `count` | `10` | Number of results you want to get. For example: 10. |
| `region` | `US` | Region (country) code. Default: US |
| `sort_type` | `` | Sort type, can be empty or one of: 1 - Most liked, 0 - Relevance |
| `publish_time` | `` | Date posted filter, can be empty or one of: 0 - All time, 1 - Yesterday, 7 - This week, 30 - This month, 90 - Last 3 months, 180 - Last 6 months |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
