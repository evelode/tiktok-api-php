# Get live feed

[All examples](../README.md) · [Runnable PHP](../getLiveFeed.php) · [Response excerpt](../responses/getLiveFeed.json)

`GET /getLiveFeed` · Source: Local Postman collection

## Run it

```sh
php examples/getLiveFeed.php --offline
php examples/getLiveFeed.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getLiveFeed([
    'draw_room_id' => '7620936076353440533',
]);
exampleCheck($response);

foreach ($response->getTiktok()?->getData() ?? [] as $entry) {
    $room = new \TikTokRESTAPI\Response\Model\LiveRoomInfo($entry->getData() ?? []);
    echo $room->getIdStr(), ' — ', $room->getTitle(), PHP_EOL;
    echo 'Host: ', $room->getOwner()?->getNickname(), '; viewers: ', $room->getUserCount(), PHP_EOL;
}
```

## Captured output

```text
7620954383781481246 — MYSTERY BOX MAYHEM W/ Homi
Host: Unvaulted Hype; viewers: 554
7620959749021960991 — #HoldFast Chat!
Host: MikeGeraghtyAuthor; viewers: 9
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `status_code`, `data`

[Open the saved JSON](../responses/getLiveFeed.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `draw_room_id` | `7620936076353440533` | The first livestream id (data[0].id_str) from initial live feed response. |
| `max_time` | `` | Unix timestamp, use extra.max_time value from previous response. |
| `region` | `US` | Region (country) code. Default: US |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
