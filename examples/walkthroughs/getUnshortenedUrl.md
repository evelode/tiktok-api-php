# Convert short TikTok video URL to full TikTok video URL

[All examples](../README.md) · [Runnable PHP](../getUnshortenedUrl.php) · [Response excerpt](../responses/getUnshortenedUrl.json)

`GET /getUnshortenedUrl` · Source: Local Postman collection

## Run it

```sh
php examples/getUnshortenedUrl.php --offline
php examples/getUnshortenedUrl.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getUnshortenedUrl('https://vt.tiktok.com/ZSFx4cagA/');
exampleCheck($response);

echo 'Full video URL: ', $response->getTiktok()?->getUrl() ?? 'not supplied', PHP_EOL;
```

## Captured output

```text
Full video URL: https://www.tiktok.com/@/video/7058552416551111937?_r=1&_d=secCgYIASAHKAESPgo8crTGZ5v7Eh2H7AtOuvt8HX78lbg7LJNlAoJoCNqLvN0czNKpyRT2E9hCxCiTmucrEsQqz5YaUIQ3e%2FhzGgA%3D&u_code=d3bmj3472b78eh&share_item_id=7058552416551111937&t … [shortened]
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `url`

[Open the saved JSON](../responses/getUnshortenedUrl.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `video_url` | `https://vt.tiktok.com/ZSFx4cagA/` | Short TikTok video URL. |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
