# Search for user by keyword

[All examples](../README.md) · [Runnable PHP](../searchUser.php) · [Response excerpt](../responses/searchUser.json)

`GET /searchUser` · Source: Local Postman collection

## Run it

```sh
php examples/searchUser.php --offline
php examples/searchUser.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->searchUser('apple', '', 10);
exampleCheck($response);

foreach ($response->getTiktok()?->getUserList() ?? [] as $item) { // UserSearchItem models.
    $user = $item->getUserInfo();
    echo 'ID: ', $user?->getUid(), '; followers: ', $user?->getFollowerCount() ?? 0, PHP_EOL;
    echo $user?->getUniqueId() ?? 'unknown', ' | ', $user?->getNickname() ?? 'not supplied', PHP_EOL;
}

echo 'Next cursor: ', $response->getTiktok()?->getCursor() ?? 0, PHP_EOL;
```

## Captured output

```text
ID: 6809782522139870213; followers: 7028364
apple | apple
ID: 6815991884222514181; followers: 1317697
appletv | Apple TV
Next cursor: 10
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `challenge_list`, `cursor`, `feedback_type`, `global_doodle_config`, `has_more`, `input_keyword`, `music_list`, `qc`, `rid`, `status_code`, `type`, `user_list`

[Open the saved JSON](../responses/searchUser.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `keyword` | `apple` | Any text or keyword |
| `cursor` | `0` | Used for scrolling (pagination) in user items, you can get cursor value from the previous response. |
| `count` | `10` | Number of results you want to get. For example: 10. |
| `region` | `US` | Region (country) code. Default: US |
| `follower_count` | `` | Filter by followers count, can be empty or one of: ZERO_TO_ONE_K (0 to 1k), ONE_K_TO_TEN_K (1k to 10k), TEN_K_TO_ONE_H_K(10k to 100k), ONE_H_K_PLUS(100k+) |
| `profile_type` | `` | Filter by user profile type, can be empty or one of: VERIFIED |
| `other_pref` | `` | Filter by other preference, can be empty or one of: USERNAME (keyword usage in username). |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here.  |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
