# Get user ID by profile URL or nickname

[All examples](../README.md) · [Runnable PHP](../getUserID.php) · [Response excerpt](../responses/getUserID.json)

`GET /getUserID` · Source: Local Postman collection

## Run it

```sh
php examples/getUserID.php --offline
php examples/getUserID.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getUserID([
    'query' => 'therock',
]);
exampleCheck($response);

// These endpoints return tiktok as a scalar, not a user object.
$value = $response->getTiktok();
if (is_scalar($value)) echo 'Result: ', (string) $value, PHP_EOL;
else echo 'No account value returned.', PHP_EOL;
// Keep platform IDs as strings; never cast them to float.
```

## Captured output

```text
Result: 6745191554350760966
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: A scalar string, not an object.

[Open the saved JSON](../responses/getUserID.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `query` | `therock` | TikTok profile URL or nickname |
| `region` | `US` | Region (country) code. Default: US |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
