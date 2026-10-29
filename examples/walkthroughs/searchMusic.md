# Search for music by keyword

[All examples](../README.md) · [Runnable PHP](../searchMusic.php) · [Response excerpt](../responses/searchMusic.json)

`GET /searchMusic` · Source: Local Postman collection

## Run it

```sh
php examples/searchMusic.php --offline
php examples/searchMusic.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->searchMusic('apple', '', 10);
exampleCheck($response);

$page = $response->getTiktok();
foreach ($page?->getMusic() ?? [] as $music) { // MusicSearchItem models.
    echo $music->getIdStr(), ' — ', $music->getTitle(), ' / ', $music->getAuthor(), PHP_EOL;
    echo 'Duration (seconds): ', $music->getDuration() ?? 0, PHP_EOL;
}
echo 'Next cursor: ', $page?->getCursor() ?? 0, PHP_EOL;
```

## Captured output

```text
7377196584867760145 — Apple / Charli xcx
Duration (seconds): 60
7388859369162541825 — apple by charliiiii / babyloncowboy 🍉
Duration (seconds): 18
Next cursor: 10
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `status_code`, `music`, `has_more`, `cursor`, `qc`, `ad_info`, `music_info_list`, `global_doodle_config`, `feedback_type`, `total`

[Open the saved JSON](../responses/searchMusic.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `keyword` | `apple` | Any text or keyword |
| `cursor` | `` | Used for scrolling (pagination) in music items, you can get cursor value from the previous response. |
| `count` | `10` | Number of results you want to get. For example: 10. |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |
| `filter_by` | `0` | Filter by type, can be empty or one of: 0 - All, 1 - Title, 2 - Creators |
| `sort_type` | `0` | Sort type, can be empty or one of: 0 - Relevance, 1 - Most used, 2 - Most recent, 3 - Shortest, 4 - Longest |
| `region` | `US` | Region (country) code. Default: US |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
