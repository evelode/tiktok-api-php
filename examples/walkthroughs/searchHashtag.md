# Search for hashtag by keyword

[All examples](../README.md) · [Runnable PHP](../searchHashtag.php) · [Response excerpt](../responses/searchHashtag.json)

`GET /searchHashtag` · Source: Local Postman collection

## Run it

```sh
php examples/searchHashtag.php --offline
php examples/searchHashtag.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->searchHashtag('apple', '', 10);
exampleCheck($response);

foreach ($response->getTiktok()?->getChallengeList() ?? [] as $item) { // ChallengeList models.
    $tag = $item->getChallengeInfo();
    echo '#', $tag?->getChaName(), ' (ID ', $tag?->getCid(), ')', PHP_EOL;
}

echo 'Next cursor: ', $response->getTiktok()?->getCursor() ?? 0, PHP_EOL;
```

## Captured output

```text
#apple (ID 13100)
#apple🍎 (ID 1615063159898118)
Next cursor: 10
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `ad_info`, `challenge_list`, `cursor`, `feedback_type`, `global_doodle_config`, `has_more`, `is_match`, `keyword_disabled`, `qc`, `status_code`

[Open the saved JSON](../responses/searchHashtag.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `keyword` | `apple` | Any text or keyword |
| `cursor` | `` | Used for scrolling (pagination) in hashtag items, you can get cursor value from the previous response. |
| `count` | `10` | Number of results you want to get. For example: 10. |
| `region` | `US` | Region (country) code. Default: US |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
