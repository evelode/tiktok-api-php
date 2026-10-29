# Get video info by URL

[All examples](../README.md) · [Runnable PHP](../getVideoByUrl.php) · [Response excerpt](../responses/getVideoByUrl.json)

`GET /getVideoByUrl` · Source: Local Postman collection

## Run it

```sh
php examples/getVideoByUrl.php --offline
php examples/getVideoByUrl.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getVideoByUrl('https://www.tiktok.com/@onerepublic/video/7141505394869898538');
exampleCheck($response);

$video = $response->getTiktok()?->getAwemeDetail(); // AwemeDetail model.
if ($video === null) {
    echo 'No video was returned.', PHP_EOL;
} else {
    echo 'Video ID: ', $video->getAwemeId(), PHP_EOL;
    echo 'Author: ', $video->getAuthor()?->getNickname() ?? 'not supplied', PHP_EOL;
    echo 'Views: ', $video->getStatistics()?->getPlayCount() ?? 'not supplied', PHP_EOL;
    foreach ($video->getVideo()?->getPlayAddr()?->getUrlList() ?? [] as $url) {
        echo $url, PHP_EOL;
    }
}
```

## Captured output

```text
Video ID: 7141505394869898538
Author: OneRepublic
Views: 185133
https://v16m.tiktokcdn-us.com/a13486fed0c14b27e41815ca1b0f34ef/69a8a159/video/tos/useast5/tos-useast5-ve-0068c002-tx/2041584b6cc044a78016a407b1d9cfbe/?a=1233&bti=OUBzOTg7QGo6OjZAL3AjLTAzYCMxNDNg&&bt=1776&ft=gKfIn8s6oA-O12NvTJcn.IxRe2x0~3_45 … [shortened]
https://v19.tiktokcdn-us.com/77b05178a98511b136523a56d20a0484/69a8a159/video/tos/useast5/tos-useast5-ve-0068c002-tx/2041584b6cc044a78016a407b1d9cfbe/?a=1233&bti=OUBzOTg7QGo6OjZAL3AjLTAzYCMxNDNg&&bt=1776&ft=gKfIn8s6oA-O12NvTJcn.IxRe2x0~3_45S … [shortened]
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `aweme_detail`, `status_code`, `status_msg`

[Open the saved JSON](../responses/getVideoByUrl.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `video_url` | `https://www.tiktok.com/@onerepublic/video/7141505394869898538` |  |
| `region` | `US` | Region (country) code. Default: US |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
