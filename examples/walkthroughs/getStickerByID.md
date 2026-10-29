# Get effect information by ID

[All examples](../README.md) · [Runnable PHP](../getStickerByID.php) · [Response excerpt](../responses/getStickerByID.json)

`GET /getStickerByID` · Source: Local Postman collection

## Run it

```sh
php examples/getStickerByID.php --offline
php examples/getStickerByID.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getStickerByID([
    'sticker_id' => '1108584',
]);
exampleCheck($response);

foreach ($response->getTiktok()?->getStickerInfos() ?? [] as $effect) {
    echo $effect->getId(), ' — ', $effect->getName(), PHP_EOL;
    echo 'Creator: ', $effect->getOwnerNickname(), PHP_EOL;
    echo 'Uses: ', $effect->getUserCount() ?? 0, PHP_EOL;
}
```

## Captured output

```text
1108584 — Зернистость
Creator: TikTok
Uses: 15700884
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `status_code`, `status_msg`, `sticker_infos`

[Open the saved JSON](../responses/getStickerByID.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `sticker_id` | `1108584` |  |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
