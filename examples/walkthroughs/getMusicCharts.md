# Get music charts

[All examples](../README.md) · [Runnable PHP](../getMusicCharts.php) · [Response excerpt](../responses/getMusicCharts.json)

`GET /getMusicCharts` · Source: Local Postman collection

## Run it

```sh
php examples/getMusicCharts.php --offline
php examples/getMusicCharts.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getMusicCharts([
]);
exampleCheck($response);

foreach ($response->getTiktok()?->getMusicList() ?? [] as $entry) {
    $music = $entry->getMusicInfo();
    echo $music?->getIdStr(), ' — ', $music?->getTitle(), ' / ', $music?->getAuthor(), PHP_EOL;
}
```

## Captured output

```text
7613193955303917585 — Motion Party / BossMan Dlow
86044725 — Satellites / Kevin Gates
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `chart_info`, `cover_image_url`, `cursor`, `has_more`, `msg`, `music_list`, `status_code`, `status_msg`

[Open the saved JSON](../responses/getMusicCharts.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `chart_type` | `0` | Possible values: 0 - Top 50 (standard chart ranking), 1 - Viral 50 (tracks gaining rapid popularity); all available values can be retrieved from the music_chart_rank.chart_music_info field in the music detail response. |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |
| `region` | `US` | Region (country) code. Default: US |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
