# Search for live by keyword

[All examples](../README.md) · [Runnable PHP](../searchLive.php) · [Response excerpt](../responses/searchLive.json)

`GET /searchLive` · Source: Local Postman collection

## Run it

```sh
php examples/searchLive.php --offline
php examples/searchLive.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->searchLive('apple', '', 10);
exampleCheck($response);

$page = $response->getTiktok();
foreach ($page?->getData() ?? [] as $entry) {
    $live = $entry->getLives();
    echo 'Host: ', $live?->getAuthor()?->getNickname(), PHP_EOL;
    echo 'Room: ', $live?->getRoom()?->getId(), ' — ', $live?->getRoom()?->getTitle(), PHP_EOL;
}
echo 'Next cursor: ', $page?->getCursor() ?? 0, PHP_EOL;
```

## Captured output

```text
Host: SIERA
Room:  — 
Host: Eden
Room:  — 
Next cursor: 10
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `status_code`, `data`, `has_more`, `cursor`, `guide_search_words`, `global_doodle_config`, `extra_data`, `feedback_type`

[Open the saved JSON](../responses/searchLive.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `keyword` | `apple` | Any text or keyword |
| `offset` | `0` | Used for scrolling (pagination) in live items, you can get offset value from the previous response. |
| `count` | `10` | Number of results you want to get. For example: 10. |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |
| `region` | `US` | Region (country) code. Default: US |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
