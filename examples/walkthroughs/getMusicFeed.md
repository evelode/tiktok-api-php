# Get music feed by URL or ID

[All examples](../README.md) · [Runnable PHP](../getMusicFeed.php) · [Response excerpt](../responses/getMusicFeed.json)

`GET /getMusicFeed` · Source: Local Postman collection

## Run it

```sh
php examples/getMusicFeed.php --offline
php examples/getMusicFeed.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getMusicFeed([
    'query' => '6928004115846924290',
]);
exampleCheck($response);

$page = $response->getTiktok();
foreach ($page?->getAwemeList() ?? [] as $video) {
    echo $video->getAwemeId(), ' — ', $video->getDesc(), PHP_EOL;
    echo 'Author: ', $video->getAuthor()?->getNickname(), '; views: ', $video->getStatistics()?->getPlayCount() ?? 0, PHP_EOL;
}
echo 'More: ', $page?->getHasMore() ?? 0, PHP_EOL;
echo 'Next cursor: ', $page?->getCursor() ?? $page?->getMaxCursor() ?? 'none', PHP_EOL;
// Pass cursor unchanged on the next request.
```

## Captured output

```text
7004857575682493701 — 😄😄 we love that!
Author: Slime City; views: 8959931
6991242454603222278 — #tuff #fypシ #Skateboarding #skate @cesarrluvsyou
Author: chito.isreal; views: 2899425
More: 1
Next cursor: 12
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `aweme_list`, `can_pin_video`, `cursor`, `has_more`, `need_lazy_loading`, `status_code`, `status_msg`

[Open the saved JSON](../responses/getMusicFeed.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `query` | `6928004115846924290` |  |
| `cursor` | `` |  |
| `count` | `` |  |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |
| `region` | `US` | Region (country) code. Default: US |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
