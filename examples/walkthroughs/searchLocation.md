# Search for location by keyword

[All examples](../README.md) · [Runnable PHP](../searchLocation.php) · [Response excerpt](../responses/searchLocation.json)

`GET /searchLocation` · Source: Local Postman collection

## Run it

```sh
php examples/searchLocation.php --offline
php examples/searchLocation.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->searchLocation([
    'keyword' => 'apple',
]);
exampleCheck($response);

$page = $response->getTiktok();
foreach ($page?->getPoiInfo()?->getPoiInfo() ?? [] as $place) {
    echo $place->getPoiIdStr(), ' — ', $place->getPoiName(), ' (', $place->getVideoCount(), ' videos)', PHP_EOL;
}
echo 'Next cursor: ', $page?->getCursor() ?? 0, PHP_EOL;
```

## Captured output

```text
22535865205228906 — Apple (centralwOrld) (1011 videos)
42203861086154043 — Apple (0 videos)
Next cursor: 10
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `status_code`, `poi_info`, `cursor`, `has_more`, `global_doodle_config`, `feedback_type`

[Open the saved JSON](../responses/searchLocation.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `keyword` | `apple` |  |
| `cursor` | `` | Used for scrolling (pagination) in location items, you can get cursor value from the previous response. |
| `count` | `10` | Number of results you want to get. For example: 10. |
| `region` | `US` | Region (country) code. Default: US |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
