# TikTok Scraper API for PHP

[![Latest release](https://img.shields.io/github/v/tag/evelode/tiktok-api-php?label=release&style=flat-square)](https://github.com/evelode/tiktok-api-php/tags)
[![PHP requirements](https://img.shields.io/badge/PHP-8.1%2B-777BB4?logo=php&logoColor=white&style=flat-square)](#1-install)
[![Last commit](https://img.shields.io/github/last-commit/evelode/tiktok-api-php?style=flat-square)](https://github.com/evelode/tiktok-api-php/commits)
[![MIT license](https://img.shields.io/github/license/evelode/tiktok-api-php?style=flat-square)](LICENSE)

[![Run in Postman](https://run.pstmn.io/button.svg)](https://www.postman.com/evelode/workspace/evelode/collection/24862082-d886cc87-4267-4e0c-b57a-2d083add50ad)


Official PHP client for the [jsonscraper TikTok Scraper API](https://jsonscraper.com/services/tiktok-scraper-api?utm_source=github&utm_medium=sdk&utm_campaign=evelode-tiktok-api-php&utm_content=readme). **54 documented GET routes**, simple installation, configurable requests, working examples, and responses ready for your application.

![From API access to your first JSON response](docs/quickstart.svg)

**[Get an API key](https://jsonscraper.com/services/tiktok-scraper-api?utm_source=github&utm_medium=sdk&utm_campaign=evelode-tiktok-api-php&utm_content=get_access) · [Current pricing](https://jsonscraper.com/services/tiktok-scraper-api?utm_source=github&utm_medium=sdk&utm_campaign=evelode-tiktok-api-php&utm_content=pricing#pricing) · [Endpoint reference](docs/endpoints.md) · [Runnable examples](examples) · [Postman](https://www.postman.com/evelode/workspace/evelode/collection/24862082-d886cc87-4267-4e0c-b57a-2d083add50ad)**

## Navigation

- [What you can build](#what-you-can-build)
- [Installation](#1-install)
- [License key and access](#2-get-api-access)
- [First request](#3-make-your-first-request)
- [Request examples](#more-request-examples)
- [Complete example catalogue](#complete-request-example-catalogue)
- [Endpoint reference](docs/endpoints.md)
- [Configuration](#configuration)
- [Errors, pagination and caching](#errors-pagination-and-caching)
- [FAQ](#faq)
- [Development and releases](#development-and-releases)
- [Privacy](#privacy)

## What you can build

Read public profiles and videos; retrieve comments and feeds; search users/videos/music/hashtags; inspect trending/live routes; obtain no-watermark video URLs returned by the API.

This repository contains the **TikTok SDK only**. It calls the hosted jsonscraper API; you do not need to maintain browser automation, platform sessions or a scraping server.

## 1. Install

Requirements: **PHP 8.1+, Composer, cURL and mbstring**.

```sh
composer config repositories.tiktok vcs https://github.com/evelode/tiktok-api-php
composer require evelode/tiktok-api-php:^2.0
```

The GitHub installation above works independently of package registry registration. A public PyPI/npm/Packagist listing is a separate release step; this README does not claim those listings already exist.

To develop from a checkout, clone this repository and install its dependencies. Python: `python -m pip install .`; Node.js: `npm ci`; PHP: `composer install`; Go: `go mod download`; Java: `mvn install`; C#: `dotnet build`.

## 2. Get API access

The SDK source uses the **MIT license**. Hosted API usage requires a separate **TikTok API license** with its own quota and validity period.

1. Open the [TikTok product page](https://jsonscraper.com/services/tiktok-scraper-api?utm_source=github&utm_medium=sdk&utm_campaign=evelode-tiktok-api-php&utm_content=onboarding).
2. Check the current plans and follow **Get Access** to obtain your license key.
3. Save the key on your server as an environment variable:

```sh
export JSONSCRAPER_TIKTOK_LICENSE_KEY='your-license-key'
```

Current prices and limits are linked from the product page rather than copied into this README. That keeps the purchase information current. Do not commit your key or put it in browser/mobile frontend code.

## 3. Make your first request

```php
<?php
require __DIR__.'/vendor/autoload.php';

$client = new TikTokRESTAPI\TikTok(getenv('JSONSCRAPER_TIKTOK_LICENSE_KEY'));
$client->setCacheTimeout(60);
$response = $client->getUserInfo('therock');
if ($response->isOk() && $response->getTiktok()?->isUser()) {
    echo $response->getTiktok()->getUser()->getUniqueId();
}
```

**[Open the runnable version](examples/quickstart.php)**. The example uses a public account and a short server-side cache. You can replace the account with one relevant to your project. A licensed live request may consume quota.

The profile response follows this shape (shortened; fields can be absent or null):

```json
{
  "status": "ok",
  "tiktok": {
    "user": {
      "unique_id": "therock"
    }
  }
}
```

**[Response handling guide](docs/responses.md)** explains the envelope, application errors and identifiers. Profile responses were verified against the live API on 2026-10-25.

## Find the request you need

The [endpoint reference](docs/endpoints.md) lists every named SDK method, exact API path, query parameter and purpose. The [Postman collection](https://www.postman.com/evelode/workspace/evelode/collection/24862082-d886cc87-4267-4e0c-b57a-2d083add50ad) contains current descriptions, parameter examples and endpoint groups.

Use the generic request method for newly added routes without waiting for an SDK release. Parameter names remain identical to Postman. For example, cache controls are always `cache_timeout`; platform IDs are passed as strings.

## More request examples

- [Read a video](examples/video.php) — `GET /getVideoByID`.
- [Search public videos](examples/search.php) — `GET /searchVideo`.
- [Read a page of user videos](examples/feed.php) — `GET /getUserFeed`.

These examples make one request each. They never loop automatically through your quota. For feed pagination, inspect the returned cursor and `has_more`, then pass the cursor back to the same endpoint.

## Complete request example catalogue

Every link opens a full program with parameters, authentication, timeout, errors and output handling. **[Running the examples](examples/README.md)** explains the commands.

<details>
<summary>Video · 6 examples</summary>

- [Get non watermarked video url](examples/endpoints/get_no_watermark_url.php) — `GET /getNoWatermarkUrl`.
- [Get non watermarked video url by video ID](examples/endpoints/get_no_watermark_url_by_id.php) — `GET /getNoWatermarkUrlByID`.
- [Get video info by ID](examples/endpoints/get_video_by_id.php) — `GET /getVideoByID`.
- [Get video info by URL](examples/endpoints/get_video_by_url.php) — `GET /getVideoByUrl`.
- [Convert short TikTok video URL to full TikTok video URL](examples/endpoints/get_unshortened_url.php) — `GET /getUnshortenedUrl`.
- [Get video by playlist ID](examples/endpoints/get_video_by_playlist_id.php) — `GET /getVideoByPlaylistID`.

</details>

<details>
<summary>Comments · 3 examples</summary>

- [Get comments list by video URL](examples/endpoints/get_comments_by_url.php) — `GET /getCommentsByUrl`.
- [Get comments list by video ID](examples/endpoints/get_comments_by_id.php) — `GET /getCommentsByID`.
- [Get comments replies](examples/endpoints/get_comments_replies.php) — `GET /getCommentsReplies`.

</details>

<details>
<summary>Search · 9 examples</summary>

- [Search for user by keyword](examples/endpoints/search_user.php) — `GET /searchUser`.
- [Search for video by keyword](examples/endpoints/search_video.php) — `GET /searchVideo`.
- [Search for music by keyword](examples/endpoints/search_music.php) — `GET /searchMusic`.
- [Search for live by keyword](examples/endpoints/search_live.php) — `GET /searchLive`.
- [Search for hashtag by keyword](examples/endpoints/search_hashtag.php) — `GET /searchHashtag`.
- [Search for location by keyword](examples/endpoints/search_location.php) — `GET /searchLocation`.
- [Top search by text query](examples/endpoints/search_top.php) — `GET /searchTop`.
- [Search insights by text query](examples/endpoints/search_insights.php) — `GET /searchInsights`.
- [Search comment suggested users](examples/endpoints/search_comment_suggested_users.php) — `GET /searchCommentSuggestedUsers`.

</details>

<details>
<summary>Users And Feeds · 16 examples</summary>

- [Get user info by profile URL or nickname](examples/endpoints/get_user_info.php) — `GET /getUserInfo`.
- [Get user info by profile ID](examples/endpoints/get_user_info_by_id.php) — `GET /getUserInfoByID`.
- [Get user info by username](examples/endpoints/get_basic_user_info.php) — `GET /getBasicUserInfo`.
- [Get user feed by profile URL or nickname](examples/endpoints/get_user_feed.php) — `GET /getUserFeed`.
- [Get user feed by profile ID](examples/endpoints/get_user_feed_by_id.php) — `GET /getUserFeedByID`.
- [Get user ID by profile URL or nickname](examples/endpoints/get_user_id.php) — `GET /getUserID`.
- [Get username by TikTok user ID](examples/endpoints/get_username_by_id.php) — `GET /getUsernameByID`.
- [Get Twitter username by profile URL, nickname or TikTok user ID](examples/endpoints/get_twitter_username.php) — `GET /getTwitterUsername`.
- [Get Instagram username by profile URL, nickname or TikTok user ID](examples/endpoints/get_instagram_username.php) — `GET /getInstagramUsername`.
- [Get user followers by profile URL or nickname](examples/endpoints/get_followers.php) — `GET /getFollowers`.
- [Get user followers by profile ID](examples/endpoints/get_followers_by_id.php) — `GET /getFollowersByID`.
- [Get user following by profile URL or nickname](examples/endpoints/get_following.php) — `GET /getFollowing`.
- [Get user following by profile ID](examples/endpoints/get_following_by_id.php) — `GET /getFollowingByID`.
- [Get user stories](examples/endpoints/get_user_stories.php) — `GET /getUserStories`.
- [Get user playlists](examples/endpoints/get_user_playlists.php) — `GET /getUserPlaylists`.
- [Get user playlist by ID](examples/endpoints/get_user_playlist_by_id.php) — `GET /getUserPlaylistByID`.

</details>

<details>
<summary>Other Endpoints · 11 examples</summary>

- [Get YouTube channel info by profile URL, nickname or TikTok user ID](examples/endpoints/get_youtube_channel.php) — `GET /getYoutubeChannel`.
- [Get location info by ID](examples/endpoints/get_location_info_by_id.php) — `GET /getLocationInfoByID`.
- [Get videos by location ID](examples/endpoints/get_location_feed_by_id.php) — `GET /getLocationFeedByID`.
- [Get trending categories list](examples/endpoints/get_trending_categories_list.php) — `GET /getTrendingCategoriesList`.
- [Get trending feed](examples/endpoints/get_trending_feed.php) — `GET /getTrendingFeed`.
- [Get effect information by IDs](examples/endpoints/get_stickers_by_id.php) — `GET /getStickersByID`.
- [Get effect information by ID](examples/endpoints/get_sticker_by_id.php) — `GET /getStickerByID`.
- [Get videos by effect ID](examples/endpoints/get_sticker_feed_by_id.php) — `GET /getStickerFeedByID`.
- [Get story info by ID](examples/endpoints/get_story_info_by_id.php) — `GET /getStoryInfoByID`.
- [Get available ranking list](examples/endpoints/get_available_ranking_list.php) — `GET /getAvailableRankingList`.
- [Get ranking info](examples/endpoints/get_ranking_info.php) — `GET /getRankingInfo`.

</details>

<details>
<summary>Live · 3 examples</summary>

- [Get live event info by ID](examples/endpoints/get_live_event_info_by_id.php) — `GET /getLiveEventInfoByID`.
- [Get live info](examples/endpoints/get_live_info.php) — `GET /getLiveInfo`.
- [Get live feed](examples/endpoints/get_live_feed.php) — `GET /getLiveFeed`.

</details>

<details>
<summary>Hashtags · 3 examples</summary>

- [Get hashtag info by URL or tag name](examples/endpoints/get_hashtag_info.php) — `GET /getHashtagInfo`.
- [Get hashtag feed by URL or tag name](examples/endpoints/get_hashtag_feed.php) — `GET /getHashtagFeed`.
- [Get hashtag feed by ID](examples/endpoints/get_hashtag_feed_by_id.php) — `GET /getHashtagFeedByID`.

</details>

<details>
<summary>Music · 3 examples</summary>

- [Get music info by URL or ID](examples/endpoints/get_music_info.php) — `GET /getMusicInfo`.
- [Get music feed by URL or ID](examples/endpoints/get_music_feed.php) — `GET /getMusicFeed`.
- [Get music charts](examples/endpoints/get_music_charts.php) — `GET /getMusicCharts`.

</details>

## Configuration

Default API base URL: **`https://tiktok.evelode.com`**. Configure `setBaseUrl()`, `setTimeout()` (seconds), `setCacheTimeout()`, and an injectable Guzzle `httpClient`. HTTPS is required except for explicit localhost test servers. Default timeout is 30 seconds.

This compatibility client does not retry automatically. Catch its existing HTTP exception classes and retry deliberately within your request budget.

The configured license key is sent using the API's `license_key` query parameter. It overrides per-request attempts to supply a different key. Redirects are disabled, TLS verification stays enabled, and transport errors do not include request URLs. Keep credential-bearing URLs out of your application and reverse-proxy logs.

## Errors, pagination and caching

Existing exceptions include `BadRequestException`, `ForbiddenException`, `NotFoundException`, `ProxyAuthException`, `TooManyRequestsException` and `NetworkException`. HTTP 200 alone is not application success: inspect `status` and any quota/product error fields. HTTP 403 can indicate an access restriction; 429 means you should wait or check the plan's limits.

Pagination is endpoint-specific. Pass a returned cursor unchanged to the next request, stop when `has_more` is false/0, and stop if a cursor repeats. Always set your own page/request budget. The SDK does not invent cursor fields or automatically spend your quota.

`cache_timeout=60` enables API-side caching for 60 seconds; `0` disables it. See the current product terms for quota treatment. The SDK does not cache responses locally.

Large IDs must remain strings in your application. Python preserves integer precision; JavaScript converts unsafe JSON integers to strings; PHP uses `JSON_BIGINT_AS_STRING`; Go provides `Decode()` with `json.Number`; Java returns response bytes for your chosen JSON library; C# exposes bytes and `JsonDocument`.

## FAQ

**Is this the official platform API?** This is the jsonscraper service SDK. jsonscraper is independent and is not affiliated with or endorsed by TikTok.

**Is the library free?** The SDK source is MIT-licensed. The hosted API requires a separate paid license. See [current plans and access](https://jsonscraper.com/services/tiktok-scraper-api?utm_source=github&utm_medium=sdk&utm_campaign=evelode-tiktok-api-php&utm_content=faq).

**Does it work without a key?** A valid product license key is required for normal API requests. Never use a README example as a source of credentials.

**Can I use it in an existing application?** Yes. Install the package, configure the client, and call it from your server-side service. It does not require a web framework.

**Where do I ask for help?** For reproducible SDK bugs, open a [GitHub issue](https://github.com/evelode/tiktok-api-php/issues) with sanitized details. For plans, license questions and service support, use [jsonscraper contacts](https://jsonscraper.com/contacts?utm_source=github&utm_medium=sdk&utm_campaign=evelode-tiktok-api-php&utm_content=support).

## Development and releases

```sh
composer test
```

Tests run offline against a local/mock HTTP server and require no API key. A GitHub Actions template is included in `docs/github-actions.yml`; enabling it later requires `workflow` permission. No automatic workflow is enabled by this release.

See [CHANGELOG.md](CHANGELOG.md) for release notes. Package registry publishing is tracked separately from the public GitHub source release.

## Privacy

The SDK includes no installation, API usage or conversion telemetry. It sends requests only to the configured API endpoint. README website links carry UTM campaign parameters so jsonscraper can attribute website visits and actions to this repository; website tracking respects Do Not Track and Global Privacy Control. Purchase clicks are measured as intent, not confirmed payment.

## Migration from 1.x

This client retains `TikTokRESTAPI` namespaces, positional method signatures and the fluent request builder from `evelode/tiktok-api-php`. New methods accept query arrays; `call(endpoint, parameters)` works for all routes. PHP 8.1+ is now required. See the original project's migration notes before replacing a legacy installation.
