# Search comment suggested users

[All examples](../README.md) · [Runnable PHP](../searchCommentSuggestedUsers.php) · [Response excerpt](../responses/searchCommentSuggestedUsers.json)

`GET /searchCommentSuggestedUsers` · Source: Local Postman collection

## Run it

```sh
php examples/searchCommentSuggestedUsers.php --offline
php examples/searchCommentSuggestedUsers.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->searchCommentSuggestedUsers([
    'keyword' => 'appletv',
]);
exampleCheck($response);

foreach ($response->getTiktok()?->getSugList() ?? [] as $suggestion) {
    echo 'Suggested account: ', $suggestion->getContent(), PHP_EOL;
}
// Suggestions are suggestion records, not the user_list returned by searchUser.
```

## Captured output

```text
Suggested account: appletv
Suggested account: AppleTv+
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `sug_list`, `status_code`, `status_msg`, `rid`, `has_more`

[Open the saved JSON](../responses/searchCommentSuggestedUsers.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `keyword` | `appletv` | Any text or keyword |
| `count` | `10` | Number of results you want to get. For example: 10. |
| `region` | `US` | Region (country) code. Default: US |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
