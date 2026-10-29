# Get user info by profile ID

[All examples](../README.md) · [Runnable PHP](../getUserInfoByID.php) · [Response excerpt](../responses/getUserInfoByID.json)

`GET /getUserInfoByID` · Source: Local Postman collection

## Run it

```sh
php examples/getUserInfoByID.php --offline
php examples/getUserInfoByID.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getUserInfoByID([
    'user_id' => '6745191554350760966',
]);
exampleCheck($response);

$user = $response->getTiktok()?->getUser(); // User model, mapped lazily.
if ($user === null) {
    echo 'No user was returned.', PHP_EOL;
} else {
    echo 'ID: ', $user->getUid() ?? 'not supplied', PHP_EOL;
    echo 'Username: ', $user->getUniqueId() ?? 'not supplied', PHP_EOL;
    echo 'Name: ', $user->getNickname() ?? 'not supplied', PHP_EOL;
    echo 'Followers: ', $user->getFollowerCount() ?? 'not supplied', PHP_EOL;
}
```

## Captured output

```text
ID: 6745191554350760966
Username: therock
Name: The Rock
Followers: 79633176
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `user`

[Open the saved JSON](../responses/getUserInfoByID.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `user_id` | `6745191554350760966` | TikTok User ID. |
| `region` | `US` | Region (country) code. Default: US |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
