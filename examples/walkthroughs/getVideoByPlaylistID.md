# Get video by playlist ID

[All examples](../README.md) · [Runnable PHP](../getVideoByPlaylistID.php) · [Response excerpt](../responses/getVideoByPlaylistID.json)

`GET /getVideoByPlaylistID` · Source: Local Postman collection

## Run it

```sh
php examples/getVideoByPlaylistID.php --offline
php examples/getVideoByPlaylistID.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getVideoByPlaylistID([
    'user_id' => '6745191554350760966',
    'playlist_id' => '7359404761613208363',
]);
exampleCheck($response);

$page = $response->getTiktok();
foreach ($page?->getVideos() ?? [] as $video) {
    echo $video->getAwemeId(), ' — ', $video->getDesc(), PHP_EOL;
    echo 'Author: ', $video->getAuthor()?->getNickname(), '; views: ', $video->getStatistics()?->getPlayCount() ?? 0, PHP_EOL;
}
echo 'Next max_cursor: ', $page?->getMaxCursor() ?? 'none', PHP_EOL;
```

## Captured output

```text
7359300238349241642 — PART 1: How me and @Chris Janson became buddies🥃🍻🤜🏾🤛🏼 should we drop part 2 with the full song? #whatchaseeiswhatchaget 
Author: The Rock; views: 490407
7359355058435198251 — Replying to @LOCO Luchador PART 2: How me and Chris Janson became buddies🥃🍻🤜🏾🤛🏼  #whatchaseeiswhatchaget 
Author: The Rock; views: 1328017
Next max_cursor: 4
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `has_more`, `has_more_of_load_more`, `max_cursor`, `min_cursor`, `status_code`, `status_msg`, `videos`

[Open the saved JSON](../responses/getVideoByPlaylistID.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `user_id` | `6745191554350760966` | TikTok User ID. |
| `playlist_id` | `7359404761613208363` | TikTok Playlist ID (mix_id). |
| `max_cursor` | `None` | If in a response you get parameter has_more equal to 1 then you also have max_cursor value for a next set. |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
