# Get music info by URL or ID

[All examples](../README.md) · [Runnable PHP](../getMusicInfo.php) · [Response excerpt](../responses/getMusicInfo.json)

`GET /getMusicInfo` · Source: Local Postman collection

## Run it

```sh
php examples/getMusicInfo.php --offline
php examples/getMusicInfo.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getMusicInfo([
    'query' => '6928004115846924290',
]);
exampleCheck($response);

$music = $response->getTiktok()?->getMusicInfo();
echo 'Music ID: ', $music?->getIdStr(), PHP_EOL;
echo 'Track: ', $music?->getTitle(), ' — ', $music?->getAuthor(), PHP_EOL;
echo 'Duration (seconds): ', $music?->getDuration() ?? 0, PHP_EOL;
foreach ($music?->getPlayUrl()?->getUrlList() ?? [] as $url) echo 'Preview: ', $url, PHP_EOL;
```

## Captured output

```text
Music ID: 6928004115846924290
Track: Nikes — Nimstarr & kid toni
Duration (seconds): 60
Preview: https://sf16-ies-music-sg.tiktokcdn.com/obj/tos-alisg-ve-2774/oAFOwAfiDwiJ0Kvo8MAZsxBG1IIZiUWPB4MZLT
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `ai_recommend_music`, `ai_recommend_video`, `behind_the_song_exist`, `msg`, `music_chart_rank`, `music_info`, `rec_list`, `similar_music`, `similar_music_ids`, `status_code`, `status_msg`

[Open the saved JSON](../responses/getMusicInfo.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `query` | `6928004115846924290` |  |
| `region` | `US` | Region (country) code. Default: US |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
