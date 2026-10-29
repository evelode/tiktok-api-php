# Get user stories

[All examples](../README.md) · [Runnable PHP](../getUserStories.php) · [Response excerpt](../responses/getUserStories.json)

`GET /getUserStories` · Source: Local Postman collection

## Run it

```sh
php examples/getUserStories.php --offline
php examples/getUserStories.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getUserStories([
    'user_id' => '7603011916704809991',
]);
exampleCheck($response);

$story = $response->getTiktok()?->getUserStory();
foreach ($story?->getStories() ?? [] as $video) {
    echo $video->getAwemeId(), ' — ', $video->getDesc(), PHP_EOL;
    echo 'Author: ', $video->getAuthor()?->getNickname(), '; views: ', $video->getStatistics()?->getPlayCount() ?? 0, PHP_EOL;
}
echo 'Total stories: ', $story?->getTotalCount() ?? 0, PHP_EOL;
echo 'Next min_cursor: ', $story?->getMinCursor() ?? 'none', PHP_EOL;
```

## Captured output

```text
7620713971015798023 — 
Author: Merlin season 1 episode 13; views: 19
7620722814982704402 — 
Author: Merlin season 1 episode 13; views: 11
Total stories: 8
Next min_cursor: 1774337812005
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `status_code`, `status_msg`, `user_story`

[Open the saved JSON](../responses/getUserStories.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `user_id` | `7603011916704809991` | TikTok User ID. |
| `count` | `5` | Number of items you want to get. For example: 5. |
| `min_cursor` | `None` | Used for scrolling (pagination) in stories items, you can get min_cursor value from the previous response. |
| `region` | `US` | Region (country) code. Default: US |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
