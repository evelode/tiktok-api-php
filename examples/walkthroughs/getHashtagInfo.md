# Get hashtag info by URL or tag name

[All examples](../README.md) · [Runnable PHP](../getHashtagInfo.php) · [Response excerpt](../responses/getHashtagInfo.json)

`GET /getHashtagInfo` · Source: Local Postman collection

## Run it

```sh
php examples/getHashtagInfo.php --offline
php examples/getHashtagInfo.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getHashtagInfo([
    'query' => 'apple',
]);
exampleCheck($response);

$tag = $response->getTiktok();
echo '#', $tag?->getChaName(), ' (ID ', $tag?->getCid(), ')', PHP_EOL;
echo 'Uses: ', $tag?->getUseCount() ?? 0, PHP_EOL;
echo 'Views: ', $tag?->getViewCount() ?? 0, PHP_EOL;
```

## Captured output

```text
#apple (ID 13100)
Uses: 7606271
Views: 242451514373
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `banner_list`, `cha_attrs`, `cha_name`, `cid`, `collect_stat`, `connect_music`, `desc`, `extra_attr`, `hashtag_profile`, `is_challenge`, `is_commerce`, `is_pgcshow`, `schema`, `search_cha_name`, `search_highlight`, `share_info`, `show_items`, `sub_type`, `type`, `use_count`, `user_count`, `view_count`

[Open the saved JSON](../responses/getHashtagInfo.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `query` | `apple` | TikTok hashtag URL or tag name |
| `region` | `US` | Region (country) code. Default: US |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
