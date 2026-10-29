# Get user playlist by ID

[All examples](../README.md) · [Runnable PHP](../getUserPlaylistByID.php) · [Response excerpt](../responses/getUserPlaylistByID.json)

`GET /getUserPlaylistByID` · Source: Local Postman collection

## Run it

```sh
php examples/getUserPlaylistByID.php --offline
php examples/getUserPlaylistByID.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getUserPlaylistByID([
    'user_id' => '6745191554350760966',
    'playlist_id' => '7359404761613208363',
]);
exampleCheck($response);

$playlist = $response->getTiktok()?->getMix();
echo 'Playlist: ', $playlist?->getName(), ' (', $playlist?->getMixId(), ')', PHP_EOL;
echo 'Creator: ', $playlist?->getCreatorName(), PHP_EOL;
echo 'Videos: ', $playlist?->getStatistic()?->getTotal() ?? 0, PHP_EOL;
echo 'Views: ', $playlist?->getStatistic()?->getTotalPlayCount() ?? 0, PHP_EOL;
```

## Captured output

```text
Playlist: DJ x Chris Janson (7359404761613208363)
Creator: therock
Videos: 4
Views: 0
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `is_collect`, `mix`, `status_code`, `status_msg`

[Open the saved JSON](../responses/getUserPlaylistByID.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `user_id` | `6745191554350760966` | TikTok User ID. |
| `playlist_id` | `7359404761613208363` | TikTok Playlist ID (mix_id). |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
