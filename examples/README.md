# TikTok PHP examples with LazyJsonMapper

Start with the readable model examples. Each makes **one request** through a named SDK method and reads the returned `APIResponse` through LazyJsonMapper getters. The SDK constructs the response and nested models for you; do not wrap them in another mapper or convert them to arrays before reading fields.

```php
$client = new TikTokRESTAPI\TikTok(getenv('JSONSCRAPER_TIKTOK_LICENSE_KEY'));
$response = $client->getVideoByID('7106855913906081070');

if ($response->isOk() && !$response->getRateLimitReached()) {
    $video = $response->getTiktok()?->getAwemeDetail();
    echo $video?->getAuthor()?->getNickname() ?? 'not supplied';
    echo $video?->getStatistics()?->getPlayCount() ?? 'not supplied';
}
```

`APIResponse`, `AwemeDetail`, `User`, `Comment` and other declared nested models inherit from `LazyJsonMapper`. Objects are mapped lazily when accessed. Getters may return `null` for absent fields. Fields without a declared nested schema remain raw values; those examples say so and export the payload explicitly.

Install dependencies and set `JSONSCRAPER_TIKTOK_LICENSE_KEY` as described in the [main README](../README.md). Live requests may consume quota. No example automatically paginates.

## Start here

| Example | Model access demonstrated |
| --- | --- |
| [Profile](getUserInfo.php) | `getUser()`, `getUniqueId()`, `getFollowerCount()` |
| [Video](getVideoByID.php) | `getAwemeDetail()`, `getAuthor()`, `getStatistics()`, playback URLs |
| [Comments](getCommentsByID.php) | `Comment[]`, nested users, cursor and has-more |
| [Profile feed](getUserFeed.php) | `AwemeListItem[]`, authors, views, next cursor |
| [Video search](searchVideo.php) | Search results as models |
| [User search](searchUser.php) | `UserSearchItem[]` → `User` |
| [Music search](searchMusic.php) | `MusicSearchItem[]` |
| [Hashtag search](searchHashtag.php) | `ChallengeList[]` → `ChallengeInfo` |

Shared [CLI setup](support/bootstrap.php) handles keys, timeouts, errors and optional JSON export. The request and getter chains remain in each example. Edit the sample inputs in the PHP file before running it:

```sh
php examples/getUserInfo.php --help
php examples/getUserInfo.php --timeout=30 --cache_timeout=60
php examples/getVideoByID.php --output=video.json
```

`--help` requires no installed dependencies or API key and makes no request. `--output` saves the complete envelope, including unknown upstream fields; normal output demonstrates model access. The short paths `quickstart.php`, `video.php`, `models.php`, `feed.php` and `search.php` reuse these same examples.

## Full query-parameter CLI programs

All 54 original parameterized programs remain in [endpoints/](endpoints/). Use these when you need flags such as `--query`, `--region` or `--count` without editing PHP. They intentionally export the complete JSON response for inspection. The primary model examples use named methods; `call()` in the diagnostic programs also returns the same LazyJsonMapper-backed `APIResponse`.

```sh
php examples/endpoints/get_user_info.php --help
php examples/endpoints/get_user_info.php --query=therock --region=US
```

The old query flags on the top-level examples now belong to these diagnostic programs. The CLI rejects unsupported flags instead of silently ignoring them.

## All examples

| Endpoint | Readable model example | Full parameter CLI / JSON |
| --- | --- | --- |
| `getAvailableRankingList` | [Get available ranking list](getAvailableRankingList.php) | [CLI](endpoints/get_available_ranking_list.php) |
| `getBasicUserInfo` | [Get user info by username](getBasicUserInfo.php) | [CLI](endpoints/get_basic_user_info.php) |
| `getCommentsByID` | [Get comments list by video ID](getCommentsByID.php) | [CLI](endpoints/get_comments_by_id.php) |
| `getCommentsByUrl` | [Get comments list by video URL](getCommentsByUrl.php) | [CLI](endpoints/get_comments_by_url.php) |
| `getCommentsReplies` | [Get comments replies](getCommentsReplies.php) | [CLI](endpoints/get_comments_replies.php) |
| `getFollowers` | [Get user followers by profile URL or nickname](getFollowers.php) | [CLI](endpoints/get_followers.php) |
| `getFollowersByID` | [Get user followers by profile ID](getFollowersByID.php) | [CLI](endpoints/get_followers_by_id.php) |
| `getFollowing` | [Get user following by profile URL or nickname](getFollowing.php) | [CLI](endpoints/get_following.php) |
| `getFollowingByID` | [Get user following by profile ID](getFollowingByID.php) | [CLI](endpoints/get_following_by_id.php) |
| `getHashtagFeed` | [Get hashtag feed by URL or tag name](getHashtagFeed.php) | [CLI](endpoints/get_hashtag_feed.php) |
| `getHashtagFeedByID` | [Get hashtag feed by ID](getHashtagFeedByID.php) | [CLI](endpoints/get_hashtag_feed_by_id.php) |
| `getHashtagInfo` | [Get hashtag info by URL or tag name](getHashtagInfo.php) | [CLI](endpoints/get_hashtag_info.php) |
| `getInstagramUsername` | [Get Instagram username by profile URL, nickname or TikTok user ID](getInstagramUsername.php) | [CLI](endpoints/get_instagram_username.php) |
| `getLiveEventInfoByID` | [Get live event info by ID](getLiveEventInfoByID.php) | [CLI](endpoints/get_live_event_info_by_id.php) |
| `getLiveFeed` | [Get live feed](getLiveFeed.php) | [CLI](endpoints/get_live_feed.php) |
| `getLiveInfo` | [Get live info](getLiveInfo.php) | [CLI](endpoints/get_live_info.php) |
| `getLocationFeedByID` | [Get videos by location ID](getLocationFeedByID.php) | [CLI](endpoints/get_location_feed_by_id.php) |
| `getLocationInfoByID` | [Get location info by ID](getLocationInfoByID.php) | [CLI](endpoints/get_location_info_by_id.php) |
| `getMusicCharts` | [Get music charts](getMusicCharts.php) | [CLI](endpoints/get_music_charts.php) |
| `getMusicFeed` | [Get music feed by URL or ID](getMusicFeed.php) | [CLI](endpoints/get_music_feed.php) |
| `getMusicInfo` | [Get music info by URL or ID](getMusicInfo.php) | [CLI](endpoints/get_music_info.php) |
| `getNoWatermarkUrl` | [Get non watermarked video url](getNoWatermarkUrl.php) | [CLI](endpoints/get_no_watermark_url.php) |
| `getNoWatermarkUrlByID` | [Get non watermarked video url by video ID](getNoWatermarkUrlByID.php) | [CLI](endpoints/get_no_watermark_url_by_id.php) |
| `getRankingInfo` | [Get ranking info](getRankingInfo.php) | [CLI](endpoints/get_ranking_info.php) |
| `getStickerByID` | [Get effect information by ID](getStickerByID.php) | [CLI](endpoints/get_sticker_by_id.php) |
| `getStickerFeedByID` | [Get videos by effect ID](getStickerFeedByID.php) | [CLI](endpoints/get_sticker_feed_by_id.php) |
| `getStickersByID` | [Get effect information by IDs](getStickersByID.php) | [CLI](endpoints/get_stickers_by_id.php) |
| `getStoryInfoByID` | [Get story info by ID](getStoryInfoByID.php) | [CLI](endpoints/get_story_info_by_id.php) |
| `getTrendingCategoriesList` | [Get trending categories list](getTrendingCategoriesList.php) | [CLI](endpoints/get_trending_categories_list.php) |
| `getTrendingFeed` | [Get trending feed](getTrendingFeed.php) | [CLI](endpoints/get_trending_feed.php) |
| `getTwitterUsername` | [Get Twitter username by profile URL, nickname or TikTok user ID](getTwitterUsername.php) | [CLI](endpoints/get_twitter_username.php) |
| `getUnshortenedUrl` | [Convert short TikTok video URL to full TikTok video URL](getUnshortenedUrl.php) | [CLI](endpoints/get_unshortened_url.php) |
| `getUserFeed` | [Get user feed by profile URL or nickname](getUserFeed.php) | [CLI](endpoints/get_user_feed.php) |
| `getUserFeedByID` | [Get user feed by profile ID](getUserFeedByID.php) | [CLI](endpoints/get_user_feed_by_id.php) |
| `getUserID` | [Get user ID by profile URL or nickname](getUserID.php) | [CLI](endpoints/get_user_id.php) |
| `getUserInfo` | [Get user info by profile URL or nickname](getUserInfo.php) | [CLI](endpoints/get_user_info.php) |
| `getUserInfoByID` | [Get user info by profile ID](getUserInfoByID.php) | [CLI](endpoints/get_user_info_by_id.php) |
| `getUserPlaylistByID` | [Get user playlist by ID](getUserPlaylistByID.php) | [CLI](endpoints/get_user_playlist_by_id.php) |
| `getUserPlaylists` | [Get user playlists](getUserPlaylists.php) | [CLI](endpoints/get_user_playlists.php) |
| `getUserStories` | [Get user stories](getUserStories.php) | [CLI](endpoints/get_user_stories.php) |
| `getUsernameByID` | [Get username by TikTok user ID](getUsernameByID.php) | [CLI](endpoints/get_username_by_id.php) |
| `getVideoByID` | [Get video info by ID](getVideoByID.php) | [CLI](endpoints/get_video_by_id.php) |
| `getVideoByPlaylistID` | [Get video by playlist ID](getVideoByPlaylistID.php) | [CLI](endpoints/get_video_by_playlist_id.php) |
| `getVideoByUrl` | [Get video info by URL](getVideoByUrl.php) | [CLI](endpoints/get_video_by_url.php) |
| `getYoutubeChannel` | [Get YouTube channel info by profile URL, nickname or TikTok user ID](getYoutubeChannel.php) | [CLI](endpoints/get_youtube_channel.php) |
| `searchCommentSuggestedUsers` | [Search comment suggested users](searchCommentSuggestedUsers.php) | [CLI](endpoints/search_comment_suggested_users.php) |
| `searchHashtag` | [Search for hashtag by keyword](searchHashtag.php) | [CLI](endpoints/search_hashtag.php) |
| `searchInsights` | [Search insights by text query](searchInsights.php) | [CLI](endpoints/search_insights.php) |
| `searchLive` | [Search for live by keyword](searchLive.php) | [CLI](endpoints/search_live.php) |
| `searchLocation` | [Search for location by keyword](searchLocation.php) | [CLI](endpoints/search_location.php) |
| `searchMusic` | [Search for music by keyword](searchMusic.php) | [CLI](endpoints/search_music.php) |
| `searchTop` | [Top search by text query](searchTop.php) | [CLI](endpoints/search_top.php) |
| `searchUser` | [Search for user by keyword](searchUser.php) | [CLI](endpoints/search_user.php) |
| `searchVideo` | [Search for video by keyword](searchVideo.php) | [CLI](endpoints/search_video.php) |
