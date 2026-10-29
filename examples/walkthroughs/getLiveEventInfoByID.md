# Get live event info by ID

[All examples](../README.md) · [Runnable PHP](../getLiveEventInfoByID.php) · [Response excerpt](../responses/getLiveEventInfoByID.json)

`GET /getLiveEventInfoByID` · Source: Local Postman collection

## Run it

```sh
php examples/getLiveEventInfoByID.php --offline
php examples/getLiveEventInfoByID.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getLiveEventInfoByID([
    'event_id' => '7611130821763661845',
]);
exampleCheck($response);

$event = $response->getTiktok()?->getEvent();
echo 'Event: ', $event?->getTitle(), ' (', $event?->getId(), ')', PHP_EOL;
echo 'Host: @', $event?->getHost()?->getUniqueId(), PHP_EOL;
echo 'Start (Unix seconds): ', $event?->getStartTime(), PHP_EOL;
echo 'Duration (seconds): ', $event?->getDuration(), PHP_EOL;
```

## Captured output

```text
Event: Săn Deal Không Giới Hạn (7611130821763661845)
Host: @tunpham97
Start (Unix seconds): 1774582200
Duration (seconds): 25200
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `status_code`, `status_msg`, `event`, `promotion_exp_group`, `use_new_mp`, `guest_list_red_number`, `story_message`, `should_show_checkbox`, `notice`

[Open the saved JSON](../responses/getLiveEventInfoByID.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `event_id` | `7611130821763661845` | Live event ID, can be obtained from user info in events array. |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
