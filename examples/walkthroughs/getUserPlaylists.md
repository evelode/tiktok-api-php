# Get user playlists

[All examples](../README.md) · [Runnable PHP](../getUserPlaylists.php) · [Response excerpt](../responses/getUserPlaylists.json)

`GET /getUserPlaylists` · Source: Local Postman collection

## Run it

```sh
php examples/getUserPlaylists.php --offline
php examples/getUserPlaylists.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getUserPlaylists([
    'user_id' => '6745191554350760966',
]);
exampleCheck($response);

$page = $response->getTiktok();
foreach ($page?->getMixList() ?? [] as $playlist) {
    echo $playlist->getMixId(), ' — ', $playlist->getName(), PHP_EOL;
    echo 'Videos: ', $playlist->getStatistic()?->getTotal() ?? 0, PHP_EOL;
}
echo 'Next cursor: ', $page?->getCursor() ?? 0, PHP_EOL;
```

## Captured output

```text
7359404761613208363 — DJ x Chris Janson
Videos: 4
7356431522917845803 — Uncut Leg Day
Videos: 4
Next cursor: 3
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `cursor`, `has_more`, `mix_list`, `status_code`, `status_msg`, `total`

[Open the saved JSON](../responses/getUserPlaylists.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `user_id` | `6745191554350760966` | TikTok User ID. |
| `cursor` | `` | Used for scrolling (pagination) in stories items, you can get cursor value from the previous response. |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
