# Working with LazyJsonMapper response models

The PHP client uses `sergeykomlev/lazyjsonmapper` as a core component, alongside Guzzle for HTTP. Responses are not limited to raw arrays: the API envelope and nested TikTok data are mapped to objects with IDE-visible getters, `is...()` checks, setters and preserved upstream fields.

## Model hierarchy

```text
APIResponse
├── getStatus(), isOk(), getRateLimitReached()
├── getLimitsInfo() → LimitsInfo
└── getTiktok() → TikTok
    ├── getUser() → User
    ├── getAwemeDetail() → AwemeDetail
    │   ├── getAuthor() → Author
    │   ├── getStatistics() → Statistics
    │   └── getVideo() → Video → getPlayAddr() → Play
    ├── getComments() → Comment[]
    ├── getAwemeList() → AwemeListItem[]
    └── getUserList() → UserSearchItem[]
```

## Video, author, statistics and playback URLs

```php
<?php
require __DIR__.'/vendor/autoload.php';

$client = new TikTokRESTAPI\TikTok(getenv('JSONSCRAPER_TIKTOK_LICENSE_KEY'));
$client->setCacheTimeout(60);
$client->setTimeout(30);

try {
    $response = $client->getVideoByID('7106855913906081070');
    if (!$response->isOk() || $response->getRateLimitReached()) {
        throw new RuntimeException('The API returned an application error or rate limit');
    }
    $video = $response->getTiktok()?->getAwemeDetail();
    if (!$video) throw new RuntimeException('Video data is absent in this response');

    echo 'Video ID: ', $video->getAwemeId(), PHP_EOL;
    echo 'Author: ', $video->getAuthor()?->getNickname() ?? 'unknown', PHP_EOL;
    echo 'Views: ', $video->getStatistics()?->getPlayCount() ?? 0, PHP_EOL;
    foreach ($video->getVideo()?->getPlayAddr()?->getUrlList() ?? [] as $url) {
        echo $url, PHP_EOL;
    }
} catch (TikTokRESTAPI\Exception\TooManyRequestsException $error) {
    fwrite(STDERR, 'Rate limited: wait before making another request.' . PHP_EOL);
} catch (TikTokRESTAPI\Exception\TikTokException $error) {
    fwrite(STDERR, $error->getMessage() . PHP_EOL);
}
```

The author, statistics and URL getter chains above were checked against a live video response. URLs can expire; do not assume they are permanent.

## Profile

```php
$response = $client->getUserInfo('therock');
if ($response->isOk() && $response->getTiktok()?->isUser()) {
    $user = $response->getTiktok()->getUser();
    echo $user->getUniqueId();
}
```

## Comments and pagination metadata

```php
$response = $client->call('getCommentsByID', [
    'video_id' => '7106855913906081070',
    'count' => 10,
    'cursor' => '0',
    'cache_timeout' => 60,
]);
if ($response->isOk()) {
    $payload = $response->getTiktok();
    foreach ($payload?->getComments() ?? [] as $comment) {
        echo $comment->getText(), PHP_EOL;
    }
    $nextCursor = $payload?->getCursor();
    $hasMore = $payload?->getHasMore();
    // Pass $nextCursor into the next call only if needed. Set a page budget.
}
```

## Raw data and unknown fields

`$response->exportObjectDataCopy('array')` returns the complete nested data as arrays for JSON output, storage or framework integration. Numeric platform identifiers remain strings when the JSON decoder needs to preserve precision. Unknown upstream properties are retained and available via LazyJsonMapper's virtual getters; a missing property can be null. Do not assume that every field in a third-party payload is always present.

Inspect [src/Response/Model](../src/Response/Model) for the named model classes and each `JSON_PROPERTY_MAP`. `exportClassAnalysis()` can diagnose schema mismatches during development; avoid logging full payloads or credentials in production.
