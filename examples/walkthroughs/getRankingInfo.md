# Get ranking info

[All examples](../README.md) · [Runnable PHP](../getRankingInfo.php) · [Response excerpt](../responses/getRankingInfo.json)

`GET /getRankingInfo` · Source: Local Postman collection

## Run it

```sh
php examples/getRankingInfo.php --offline
php examples/getRankingInfo.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getRankingInfo([
    'rank_type' => '8',
    'room_id' => '7620881460702087949',
    'user_id' => '7427227547880047662',
]);
exampleCheck($response);

$ranking = $response->getTiktok()?->getData()?->getRankView();
echo 'Ranking: ', $ranking?->getTitle(), PHP_EOL;
foreach ($ranking?->getRanks() ?? [] as $entry) {
    echo '#', $entry->getRank(), ' ', $entry->getUser()?->getNickname(), ' — ', $entry->getScore(), PHP_EOL;
}
```

## Captured output

```text
Ranking: Daily Ranking
#1 🦂💣🚀 — 5089947
#2 ALVAROTHEBADBOY💣💣💣🇺🇲🇳🇮 — 3255388
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `data`, `status_code`

[Open the saved JSON](../responses/getRankingInfo.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `rank_type` | `8` | Rank type can be obtained from /getAvailableRankingList response |
| `room_id` | `7620881460702087949` | TikTok Live Room ID. |
| `user_id` | `7427227547880047662` | TikTok User ID. |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
