# Get non watermarked video url

[All examples](../README.md) · [Runnable PHP](../getNoWatermarkUrl.php) · [Response excerpt](../responses/getNoWatermarkUrl.json)

`GET /getNoWatermarkUrl` · Source: Local Postman collection

## Run it

```sh
php examples/getNoWatermarkUrl.php --offline
php examples/getNoWatermarkUrl.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getNoWatermarkUrl('https://www.tiktok.com/@therock/video/7106855913906081070');
exampleCheck($response);

$download = $response->getTiktok();
echo 'Video ID: ', $download?->getId() ?? 'not supplied', PHP_EOL;
echo 'Playback URL: ', $download?->getUrl() ?? 'not supplied', PHP_EOL;
// Signed CDN URLs expire. Request a fresh URL before downloading later.
```

## Captured output

```text
Video ID: v12044gd0000cag9t3bc77u3jjjafum0
Playback URL: https://v16m.tiktokcdn-us.com/77871aa156803617c713b39c984e0248/69a8a0f7/video/tos/useast5/tos-useast5-ve-0068c003-tx/bdecb26504d24b92b8c3ba183a035139/?a=1233&bti=OUBzOTg7QGo6OjZAL3AjLTAzYCMxNDNg&ch=0&cr=13&dr=0&er=0&lr=all&net … [shortened]
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `id`, `url`

[Open the saved JSON](../responses/getNoWatermarkUrl.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `video_url` | `https://www.tiktok.com/@therock/video/7106855913906081070` | TikTok video URL. |
| `region` | `US` | Region (country) code. Default: US |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
