# Get trending categories list

[All examples](../README.md) · [Runnable PHP](../getTrendingCategoriesList.php) · [Response excerpt](../responses/getTrendingCategoriesList.json)

`GET /getTrendingCategoriesList` · Source: Local Postman collection

## Run it

```sh
php examples/getTrendingCategoriesList.php --offline
php examples/getTrendingCategoriesList.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getTrendingCategoriesList([
]);
exampleCheck($response);

foreach ($response->getTiktok()?->getCategoryList() ?? [] as $category) {
    echo 'Category type: ', $category->getCategoryType(), PHP_EOL;
    echo '#', $category->getChallengeInfo()?->getChaName(), ' — ', $category->getDesc(), PHP_EOL;
    foreach ($category->getAwemeList() ?? [] as $video) echo 'Video: ', $video->getAwemeId(), PHP_EOL;
}
```

## Captured output

```text
Category type: 0
#springshine — Trending hashtag
Video: 7612581418157313311
Video: 7611507921427451149
Category type: 0
#tiktokgocreator — Trending hashtag
Video: 7553781862494194975
Video: 7612696069243161869
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `category_list`, `cursor`, `device_type`, `has_more`, `status_code`, `status_msg`

[Open the saved JSON](../responses/getTrendingCategoriesList.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `region` | `US` | Region (country) code. Default: US |
| `offset` | `0` | If in a response you get parameter hasMore equal to 1 then you also have cursor value for a next set of data. |
| `count` | `10` | Number of items to return. For example: 10. |
| `cache_timeout` | `0` |  |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
