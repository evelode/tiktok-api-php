# TikTok PHP examples

**54 endpoints · real response excerpts · LazyJsonMapper getters · offline replay**

Every named PHP file shows one request followed by endpoint-specific field access. Start with a saved response, inspect the getter chains, then switch to your own live input.

```sh
composer install
php examples/getMusicInfo.php --offline
php examples/searchVideo.php --offline
php examples/getUserPlaylists.php --offline --output=playlists.json
```

Offline mode requires no license and makes no network request. It replays a saved response through Guzzle and the real SDK mapper. Arrays in the saved excerpts contain at most two items, so list lengths differ from the original response. Timestamps, counters, pagination values and CDN URLs are historical; they are not current results or usable download guarantees.

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the sample inputs in the PHP file, and omit `--offline`. Each execution makes one request and may consume quota. Use PHP 8.1 or later.

```sh
export JSONSCRAPER_TIKTOK_LICENSE_KEY='YOUR_LICENSE_KEY'
php examples/getMusicInfo.php --timeout=30 --cache_timeout=60
```

**Read each walkthrough for:** the request, concrete model getters, actual captured output, response shape, input options and links to the runnable example and JSON excerpt. The full query-parameter programs in [endpoints/](endpoints/) retain their diagnostic JSON output; use their `--help` for all input flags.

> The three linked-account methods have no successful response in Postman. A live `therock` probe on 2026-10-29 returned HTTP 404 with `status=fail` for each. Their saved examples demonstrate that failure and exit with code 1. An HTTP 404 does not establish that the endpoint is unavailable for every account; a success schema remains unverified.

## Video and download

| Walkthrough | Runnable PHP | Saved response |
| --- | --- | --- |
| [getVideoByID](walkthroughs/getVideoByID.md) | [getVideoByID.php](getVideoByID.php) | [JSON](responses/getVideoByID.json) |
| [getVideoByUrl](walkthroughs/getVideoByUrl.md) | [getVideoByUrl.php](getVideoByUrl.php) | [JSON](responses/getVideoByUrl.json) |
| [getNoWatermarkUrl](walkthroughs/getNoWatermarkUrl.md) | [getNoWatermarkUrl.php](getNoWatermarkUrl.php) | [JSON](responses/getNoWatermarkUrl.json) |
| [getNoWatermarkUrlByID](walkthroughs/getNoWatermarkUrlByID.md) | [getNoWatermarkUrlByID.php](getNoWatermarkUrlByID.php) | [JSON](responses/getNoWatermarkUrlByID.json) |
| [getUnshortenedUrl](walkthroughs/getUnshortenedUrl.md) | [getUnshortenedUrl.php](getUnshortenedUrl.php) | [JSON](responses/getUnshortenedUrl.json) |

## Profiles and linked accounts

| Walkthrough | Runnable PHP | Saved response |
| --- | --- | --- |
| [getUserInfo](walkthroughs/getUserInfo.md) | [getUserInfo.php](getUserInfo.php) | [JSON](responses/getUserInfo.json) |
| [getUserInfoByID](walkthroughs/getUserInfoByID.md) | [getUserInfoByID.php](getUserInfoByID.php) | [JSON](responses/getUserInfoByID.json) |
| [getBasicUserInfo](walkthroughs/getBasicUserInfo.md) | [getBasicUserInfo.php](getBasicUserInfo.php) | [JSON](responses/getBasicUserInfo.json) |
| [getUserID](walkthroughs/getUserID.md) | [getUserID.php](getUserID.php) | [JSON](responses/getUserID.json) |
| [getUsernameByID](walkthroughs/getUsernameByID.md) | [getUsernameByID.php](getUsernameByID.php) | [JSON](responses/getUsernameByID.json) |
| [getTwitterUsername](walkthroughs/getTwitterUsername.md) | [getTwitterUsername.php](getTwitterUsername.php) | [JSON](responses/getTwitterUsername.json) |
| [getInstagramUsername](walkthroughs/getInstagramUsername.md) | [getInstagramUsername.php](getInstagramUsername.php) | [JSON](responses/getInstagramUsername.json) |
| [getYoutubeChannel](walkthroughs/getYoutubeChannel.md) | [getYoutubeChannel.php](getYoutubeChannel.php) | [JSON](responses/getYoutubeChannel.json) |

## Feeds and social graph

| Walkthrough | Runnable PHP | Saved response |
| --- | --- | --- |
| [getUserFeed](walkthroughs/getUserFeed.md) | [getUserFeed.php](getUserFeed.php) | [JSON](responses/getUserFeed.json) |
| [getUserFeedByID](walkthroughs/getUserFeedByID.md) | [getUserFeedByID.php](getUserFeedByID.php) | [JSON](responses/getUserFeedByID.json) |
| [getFollowers](walkthroughs/getFollowers.md) | [getFollowers.php](getFollowers.php) | [JSON](responses/getFollowers.json) |
| [getFollowersByID](walkthroughs/getFollowersByID.md) | [getFollowersByID.php](getFollowersByID.php) | [JSON](responses/getFollowersByID.json) |
| [getFollowing](walkthroughs/getFollowing.md) | [getFollowing.php](getFollowing.php) | [JSON](responses/getFollowing.json) |
| [getFollowingByID](walkthroughs/getFollowingByID.md) | [getFollowingByID.php](getFollowingByID.php) | [JSON](responses/getFollowingByID.json) |

## Comments

| Walkthrough | Runnable PHP | Saved response |
| --- | --- | --- |
| [getCommentsByID](walkthroughs/getCommentsByID.md) | [getCommentsByID.php](getCommentsByID.php) | [JSON](responses/getCommentsByID.json) |
| [getCommentsByUrl](walkthroughs/getCommentsByUrl.md) | [getCommentsByUrl.php](getCommentsByUrl.php) | [JSON](responses/getCommentsByUrl.json) |
| [getCommentsReplies](walkthroughs/getCommentsReplies.md) | [getCommentsReplies.php](getCommentsReplies.php) | [JSON](responses/getCommentsReplies.json) |

## Search

| Walkthrough | Runnable PHP | Saved response |
| --- | --- | --- |
| [searchUser](walkthroughs/searchUser.md) | [searchUser.php](searchUser.php) | [JSON](responses/searchUser.json) |
| [searchVideo](walkthroughs/searchVideo.md) | [searchVideo.php](searchVideo.php) | [JSON](responses/searchVideo.json) |
| [searchMusic](walkthroughs/searchMusic.md) | [searchMusic.php](searchMusic.php) | [JSON](responses/searchMusic.json) |
| [searchLive](walkthroughs/searchLive.md) | [searchLive.php](searchLive.php) | [JSON](responses/searchLive.json) |
| [searchHashtag](walkthroughs/searchHashtag.md) | [searchHashtag.php](searchHashtag.php) | [JSON](responses/searchHashtag.json) |
| [searchLocation](walkthroughs/searchLocation.md) | [searchLocation.php](searchLocation.php) | [JSON](responses/searchLocation.json) |
| [searchTop](walkthroughs/searchTop.md) | [searchTop.php](searchTop.php) | [JSON](responses/searchTop.json) |
| [searchInsights](walkthroughs/searchInsights.md) | [searchInsights.php](searchInsights.php) | [JSON](responses/searchInsights.json) |
| [searchCommentSuggestedUsers](walkthroughs/searchCommentSuggestedUsers.md) | [searchCommentSuggestedUsers.php](searchCommentSuggestedUsers.php) | [JSON](responses/searchCommentSuggestedUsers.json) |

## Hashtags and places

| Walkthrough | Runnable PHP | Saved response |
| --- | --- | --- |
| [getHashtagInfo](walkthroughs/getHashtagInfo.md) | [getHashtagInfo.php](getHashtagInfo.php) | [JSON](responses/getHashtagInfo.json) |
| [getHashtagFeed](walkthroughs/getHashtagFeed.md) | [getHashtagFeed.php](getHashtagFeed.php) | [JSON](responses/getHashtagFeed.json) |
| [getHashtagFeedByID](walkthroughs/getHashtagFeedByID.md) | [getHashtagFeedByID.php](getHashtagFeedByID.php) | [JSON](responses/getHashtagFeedByID.json) |
| [getLocationInfoByID](walkthroughs/getLocationInfoByID.md) | [getLocationInfoByID.php](getLocationInfoByID.php) | [JSON](responses/getLocationInfoByID.json) |
| [getLocationFeedByID](walkthroughs/getLocationFeedByID.md) | [getLocationFeedByID.php](getLocationFeedByID.php) | [JSON](responses/getLocationFeedByID.json) |

## Music and trends

| Walkthrough | Runnable PHP | Saved response |
| --- | --- | --- |
| [getMusicInfo](walkthroughs/getMusicInfo.md) | [getMusicInfo.php](getMusicInfo.php) | [JSON](responses/getMusicInfo.json) |
| [getMusicFeed](walkthroughs/getMusicFeed.md) | [getMusicFeed.php](getMusicFeed.php) | [JSON](responses/getMusicFeed.json) |
| [getMusicCharts](walkthroughs/getMusicCharts.md) | [getMusicCharts.php](getMusicCharts.php) | [JSON](responses/getMusicCharts.json) |
| [getTrendingCategoriesList](walkthroughs/getTrendingCategoriesList.md) | [getTrendingCategoriesList.php](getTrendingCategoriesList.php) | [JSON](responses/getTrendingCategoriesList.json) |
| [getTrendingFeed](walkthroughs/getTrendingFeed.md) | [getTrendingFeed.php](getTrendingFeed.php) | [JSON](responses/getTrendingFeed.json) |

## Effects

| Walkthrough | Runnable PHP | Saved response |
| --- | --- | --- |
| [getStickerByID](walkthroughs/getStickerByID.md) | [getStickerByID.php](getStickerByID.php) | [JSON](responses/getStickerByID.json) |
| [getStickersByID](walkthroughs/getStickersByID.md) | [getStickersByID.php](getStickersByID.php) | [JSON](responses/getStickersByID.json) |
| [getStickerFeedByID](walkthroughs/getStickerFeedByID.md) | [getStickerFeedByID.php](getStickerFeedByID.php) | [JSON](responses/getStickerFeedByID.json) |

## Stories and playlists

| Walkthrough | Runnable PHP | Saved response |
| --- | --- | --- |
| [getUserStories](walkthroughs/getUserStories.md) | [getUserStories.php](getUserStories.php) | [JSON](responses/getUserStories.json) |
| [getStoryInfoByID](walkthroughs/getStoryInfoByID.md) | [getStoryInfoByID.php](getStoryInfoByID.php) | [JSON](responses/getStoryInfoByID.json) |
| [getUserPlaylists](walkthroughs/getUserPlaylists.md) | [getUserPlaylists.php](getUserPlaylists.php) | [JSON](responses/getUserPlaylists.json) |
| [getUserPlaylistByID](walkthroughs/getUserPlaylistByID.md) | [getUserPlaylistByID.php](getUserPlaylistByID.php) | [JSON](responses/getUserPlaylistByID.json) |
| [getVideoByPlaylistID](walkthroughs/getVideoByPlaylistID.md) | [getVideoByPlaylistID.php](getVideoByPlaylistID.php) | [JSON](responses/getVideoByPlaylistID.json) |

## Live and rankings

| Walkthrough | Runnable PHP | Saved response |
| --- | --- | --- |
| [getLiveEventInfoByID](walkthroughs/getLiveEventInfoByID.md) | [getLiveEventInfoByID.php](getLiveEventInfoByID.php) | [JSON](responses/getLiveEventInfoByID.json) |
| [getLiveInfo](walkthroughs/getLiveInfo.md) | [getLiveInfo.php](getLiveInfo.php) | [JSON](responses/getLiveInfo.json) |
| [getLiveFeed](walkthroughs/getLiveFeed.md) | [getLiveFeed.php](getLiveFeed.php) | [JSON](responses/getLiveFeed.json) |
| [getAvailableRankingList](walkthroughs/getAvailableRankingList.md) | [getAvailableRankingList.php](getAvailableRankingList.php) | [JSON](responses/getAvailableRankingList.json) |
| [getRankingInfo](walkthroughs/getRankingInfo.md) | [getRankingInfo.php](getRankingInfo.php) | [JSON](responses/getRankingInfo.json) |

## How LazyJsonMapper is used

```php
$response = $client->getMusicInfo(['query' => '6928004115846924290']);
exampleCheck($response); // status, quota and upstream status_code
$music = $response->getTiktok()?->getMusicInfo(); // Music object, created lazily
$title = $music?->getTitle();
$urls = $music?->getPlayUrl()?->getUrlList() ?? [];
```

`getUserID` and `getUsernameByID` return scalar payloads. `getRankingInfo` and `getLiveInfo` contain an object in `data`; search/feed endpoints contain lists there. Endpoint-specific response classes preserve these differences. `searchVideo` reads `search_item_list[].aweme_info`; it must not assume `aweme_list` contains the results.

Missing objects use null-safe getters, missing lists use `?? []`, and unknown fields remain available on JSON export. Keep IDs and pagination tokens unchanged. A successful outer status can still contain a nonzero upstream `status_code`. None of the examples automatically fetches the next page.

## Verification and provenance

The [manifest](responses/manifest.json) records the response source and observed HTTP status for every endpoint. The 51 successful samples come from the repository's local TikTok Postman collection; the three failures come from live probes on 2026-10-29. No success fixture is invented. Run `composer test` to verify all 54 replays, model mapping, full JSON exports, request paths, HTTP failures, CLI options and convenience aliases.

The short aliases [quickstart.php](quickstart.php), [models.php](models.php), [video.php](video.php), [feed.php](feed.php) and [search.php](search.php) also accept `--offline`.
