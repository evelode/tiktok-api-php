# Get available ranking list

[All examples](../README.md) · [Runnable PHP](../getAvailableRankingList.php) · [Response excerpt](../responses/getAvailableRankingList.json)

`GET /getAvailableRankingList` · Source: Local Postman collection

## Run it

```sh
php examples/getAvailableRankingList.php --offline
php examples/getAvailableRankingList.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getAvailableRankingList([
    'room_id' => '7620881460702087949',
    'user_id' => '7427227547880047662',
]);
exampleCheck($response);

foreach ($response->getTiktok()?->getData() ?? [] as $group) {
    // This nested data object differs from the top-level data list.
    $details = new \TikTokRESTAPI\Response\Model\RankingGroup($group->getData() ?? []);
    foreach ($details->getTabs() ?? [] as $tab) {
        echo 'Rank type: ', $tab->getRankType(), ' — ', $tab->getTitle(), PHP_EOL;
    }
}
```

## Captured output

```text
Rank type: 8 — Daily Ranking
Rank type: 15 — Popular LIVE
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `data`, `status_code`

[Open the saved JSON](../responses/getAvailableRankingList.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `room_id` | `7620881460702087949` | TikTok Live Room ID. |
| `user_id` | `7427227547880047662` | TikTok User ID. |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
