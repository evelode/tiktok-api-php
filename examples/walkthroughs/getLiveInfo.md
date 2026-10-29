# Get live info

[All examples](../README.md) · [Runnable PHP](../getLiveInfo.php) · [Response excerpt](../responses/getLiveInfo.json)

`GET /getLiveInfo` · Source: Local Postman collection

## Run it

```sh
php examples/getLiveInfo.php --offline
php examples/getLiveInfo.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getLiveInfo([
    'room_id' => '7620881460702087949',
    'user_id' => '7427227547880047662',
]);
exampleCheck($response);

// This method's data is an object; searchLive and getLiveFeed return lists.
$room = $response->getTiktok()?->getData();
echo 'Room: ', $room?->getIdStr(), ' — ', $room?->getTitle(), PHP_EOL;
echo 'Host: ', $room?->getOwner()?->getNickname(), PHP_EOL;
echo 'Viewers: ', $room?->getUserCount() ?? 0, PHP_EOL;
```

## Captured output

```text
Room: 7620881460702087949 — 30 and over
Host: Apple
Viewers: 8
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `data`, `status_code`

[Open the saved JSON](../responses/getLiveInfo.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `room_id` | `7620881460702087949` | TikTok Live Room ID. |
| `user_id` | `7427227547880047662` | TikTok User ID. |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
