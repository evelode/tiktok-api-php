# Get location info by ID

[All examples](../README.md) · [Runnable PHP](../getLocationInfoByID.php) · [Response excerpt](../responses/getLocationInfoByID.json)

`GET /getLocationInfoByID` · Source: Local Postman collection

## Run it

```sh
php examples/getLocationInfoByID.php --offline
php examples/getLocationInfoByID.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getLocationInfoByID([
    'location_id' => '22535796485353377',
]);
exampleCheck($response);

$place = $response->getTiktok();
echo 'Place: ', $place?->getPoiName(), PHP_EOL;
echo 'Address: ', $place?->getFormattedAddress(), PHP_EOL;
echo 'Videos: ', $place?->getVideoCount() ?? 0, PHP_EOL;
```

## Captured output

```text
Place: Lol
Address: New Aquitaine, France
Videos: 0
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `city_code`, `claim_store_status`, `collect_info`, `cover`, `cover_dark_mode`, `dynamic_map_params`, `edit_poi_status`, `formatted_address`, `have_product_shelf`, `is_ba_account`, `is_collected`, `location`, `poi_mapkit_collect`, `poi_name`, `real_time_fav_cnt`, `region_code`, `share_info`, `status_code`, `status_msg`, `type_level`, `video_count`

[Open the saved JSON](../responses/getLocationInfoByID.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `location_id` | `22535796485353377` |  |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
