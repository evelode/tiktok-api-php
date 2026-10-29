# Search for video by keyword

[All examples](../README.md) · [Runnable PHP](../searchVideo.php) · [Response excerpt](../responses/searchVideo.json)

`GET /searchVideo` · Source: Local Postman collection

## Run it

```sh
php examples/searchVideo.php --offline
php examples/searchVideo.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->searchVideo('appletv', '', 10, 'all-time', 'relevance');
exampleCheck($response);

$page = $response->getTiktok();
foreach ($page?->getSearchItemList() ?? [] as $item) {
    $video = $item->getAwemeInfo();
    if ($video === null) continue; // Mixed search cards may have another type.
    echo $video->getAwemeId(), ' — ', $video->getDesc(), PHP_EOL;
    echo 'Author: ', $video->getAuthor()?->getNickname(), '; views: ', $video->getStatistics()?->getPlayCount() ?? 0, PHP_EOL;
}
echo 'Next cursor: ', $page?->getCursor() ?? 0, PHP_EOL;
```

## Captured output

```text
7611630876337655070 — Classic 80s trick. Jennifer Garner is back in Season 2 of The Last Thing He Told Me — Now Streaming #TheLastThingHeToldMe #JenniferGarner #AngourieRice #AppleTV 
Author: Apple TV; views: 62602
7612025144747281694 — The reverse Derek special is not for the weak. Shrinking — New Episode Wednesday #Shrinking #TedMcGinley #MichaelUrie #ChristaMiller #AppleTV
Author: Apple TV; views: 89155
Next cursor: 12
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `aweme_list`, `backtrace`, `components`, `cursor`, `feedback_type`, `global_doodle_config`, `has_more`, `search_item_list`, `status_code`

[Open the saved JSON](../responses/searchVideo.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `keyword` | `appletv` | Any text or keyword |
| `cursor` | `` | Used for scrolling (pagination) in video items, you can get cursor value from the previous response. |
| `count` | `10` | Number of results you want to get. For example: 10. |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |
| `date_posted` | `all-time` | How long ago was the video posted. Valid values: 'yesterday', 'this-week', 'this-month', 'last-3-months', 'last-6-months' and 'all-time'. |
| `sort_by` | `relevance` | Sort videos by metrics. Valid values: 'most-liked', 'relevance' or 'date-posted'. |
| `region` | `US` | Region (country) code. Default: US |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
