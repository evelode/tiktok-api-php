# Get Twitter username by profile URL, nickname or TikTok user ID

[All examples](../README.md) · [Runnable PHP](../getTwitterUsername.php) · [Response excerpt](../responses/getTwitterUsername.json)

`GET /getTwitterUsername` · Source: Live API probe, 2026-10-29, query=therock

## Run it

```sh
php examples/getTwitterUsername.php --offline
php examples/getTwitterUsername.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getTwitterUsername([
    'query' => 'therock',
]);
exampleCheck($response);

// No success sample exists in Postman. The real therock probe returned HTTP 404.
// exampleCheck() handles its status=fail envelope; do not invent a success schema.
$value = $response->getTiktok();
if (is_string($value)) echo 'Linked account: ', $value, PHP_EOL;
elseif (is_array($value)) echo json_encode($value, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR), PHP_EOL;
else echo 'No linked account returned for this profile.', PHP_EOL;
```

## Captured output

```text
HTTP 404
{
  "status": "fail",
  "message": "Not found response from TikTok. Please check your request parameters and try again.",
  "timestamp": 1793302060
}
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. Offline replay reports the saved failure envelope and exits with code 1; live HTTP 404 is converted to an SDK exception. A successful social-link response structure has not been verified.

## Response shape

The fields directly inside `tiktok` are: No success payload in the captured failure.

[Open the saved JSON](../responses/getTwitterUsername.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `query` | `therock` | TikTok profile URL, nickname or TikTok user ID |
| `region` | `US` | Region (country) code. Default: US |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
