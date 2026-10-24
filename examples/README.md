# TikTok php request examples

Every file below is a complete single-request CLI program with environment-based authentication, all documented query options, timeout configuration, error handling and full response output. Sample defaults come from Postman; replace account names, IDs and URLs for your use case. `--help` requires no API key and makes no network request.

Set `JSONSCRAPER_TIKTOK_LICENSE_KEY` and install the SDK as described in the main README. Each execution makes one live request and may consume quota. None of these programs loops through a feed automatically.

## Get non watermarked video url

[Open the complete example](endpoints/get_no_watermark_url.php) · `GET /getNoWatermarkUrl`

```sh
php examples/endpoints/get_no_watermark_url.php --help
```

## Get non watermarked video url by video ID

[Open the complete example](endpoints/get_no_watermark_url_by_id.php) · `GET /getNoWatermarkUrlByID`

```sh
php examples/endpoints/get_no_watermark_url_by_id.php --help
```

## Get video info by ID

[Open the complete example](endpoints/get_video_by_id.php) · `GET /getVideoByID`

```sh
php examples/endpoints/get_video_by_id.php --help
```

## Get video info by URL

[Open the complete example](endpoints/get_video_by_url.php) · `GET /getVideoByUrl`

```sh
php examples/endpoints/get_video_by_url.php --help
```

## Convert short TikTok video URL to full TikTok video URL

[Open the complete example](endpoints/get_unshortened_url.php) · `GET /getUnshortenedUrl`

```sh
php examples/endpoints/get_unshortened_url.php --help
```

## Get comments list by video URL

[Open the complete example](endpoints/get_comments_by_url.php) · `GET /getCommentsByUrl`

```sh
php examples/endpoints/get_comments_by_url.php --help
```

## Get comments list by video ID

[Open the complete example](endpoints/get_comments_by_id.php) · `GET /getCommentsByID`

```sh
php examples/endpoints/get_comments_by_id.php --help
```

## Get comments replies

[Open the complete example](endpoints/get_comments_replies.php) · `GET /getCommentsReplies`

```sh
php examples/endpoints/get_comments_replies.php --help
```

## Search for user by keyword

[Open the complete example](endpoints/search_user.php) · `GET /searchUser`

```sh
php examples/endpoints/search_user.php --help
```

## Search for video by keyword

[Open the complete example](endpoints/search_video.php) · `GET /searchVideo`

```sh
php examples/endpoints/search_video.php --help
```

## Search for music by keyword

[Open the complete example](endpoints/search_music.php) · `GET /searchMusic`

```sh
php examples/endpoints/search_music.php --help
```

## Search for live by keyword

[Open the complete example](endpoints/search_live.php) · `GET /searchLive`

```sh
php examples/endpoints/search_live.php --help
```

## Search for hashtag by keyword

[Open the complete example](endpoints/search_hashtag.php) · `GET /searchHashtag`

```sh
php examples/endpoints/search_hashtag.php --help
```

## Search for location by keyword

[Open the complete example](endpoints/search_location.php) · `GET /searchLocation`

```sh
php examples/endpoints/search_location.php --help
```

## Top search by text query

[Open the complete example](endpoints/search_top.php) · `GET /searchTop`

```sh
php examples/endpoints/search_top.php --help
```

## Search insights by text query

[Open the complete example](endpoints/search_insights.php) · `GET /searchInsights`

```sh
php examples/endpoints/search_insights.php --help
```

## Search comment suggested users

[Open the complete example](endpoints/search_comment_suggested_users.php) · `GET /searchCommentSuggestedUsers`

```sh
php examples/endpoints/search_comment_suggested_users.php --help
```

## Get user info by profile URL or nickname

[Open the complete example](endpoints/get_user_info.php) · `GET /getUserInfo`

```sh
php examples/endpoints/get_user_info.php --help
```

## Get user info by profile ID

[Open the complete example](endpoints/get_user_info_by_id.php) · `GET /getUserInfoByID`

```sh
php examples/endpoints/get_user_info_by_id.php --help
```

## Get user info by username

[Open the complete example](endpoints/get_basic_user_info.php) · `GET /getBasicUserInfo`

```sh
php examples/endpoints/get_basic_user_info.php --help
```

## Get user feed by profile URL or nickname

[Open the complete example](endpoints/get_user_feed.php) · `GET /getUserFeed`

```sh
php examples/endpoints/get_user_feed.php --help
```

## Get user feed by profile ID

[Open the complete example](endpoints/get_user_feed_by_id.php) · `GET /getUserFeedByID`

```sh
php examples/endpoints/get_user_feed_by_id.php --help
```

## Get user ID by profile URL or nickname

[Open the complete example](endpoints/get_user_id.php) · `GET /getUserID`

```sh
php examples/endpoints/get_user_id.php --help
```

## Get username by TikTok user ID

[Open the complete example](endpoints/get_username_by_id.php) · `GET /getUsernameByID`

```sh
php examples/endpoints/get_username_by_id.php --help
```

## Get Twitter username by profile URL, nickname or TikTok user ID

[Open the complete example](endpoints/get_twitter_username.php) · `GET /getTwitterUsername`

```sh
php examples/endpoints/get_twitter_username.php --help
```

## Get Instagram username by profile URL, nickname or TikTok user ID

[Open the complete example](endpoints/get_instagram_username.php) · `GET /getInstagramUsername`

```sh
php examples/endpoints/get_instagram_username.php --help
```

## Get YouTube channel info by profile URL, nickname or TikTok user ID

[Open the complete example](endpoints/get_youtube_channel.php) · `GET /getYoutubeChannel`

```sh
php examples/endpoints/get_youtube_channel.php --help
```

## Get user followers by profile URL or nickname

[Open the complete example](endpoints/get_followers.php) · `GET /getFollowers`

```sh
php examples/endpoints/get_followers.php --help
```

## Get user followers by profile ID

[Open the complete example](endpoints/get_followers_by_id.php) · `GET /getFollowersByID`

```sh
php examples/endpoints/get_followers_by_id.php --help
```

## Get user following by profile URL or nickname

[Open the complete example](endpoints/get_following.php) · `GET /getFollowing`

```sh
php examples/endpoints/get_following.php --help
```

## Get user following by profile ID

[Open the complete example](endpoints/get_following_by_id.php) · `GET /getFollowingByID`

```sh
php examples/endpoints/get_following_by_id.php --help
```

## Get live event info by ID

[Open the complete example](endpoints/get_live_event_info_by_id.php) · `GET /getLiveEventInfoByID`

```sh
php examples/endpoints/get_live_event_info_by_id.php --help
```

## Get hashtag info by URL or tag name

[Open the complete example](endpoints/get_hashtag_info.php) · `GET /getHashtagInfo`

```sh
php examples/endpoints/get_hashtag_info.php --help
```

## Get hashtag feed by URL or tag name

[Open the complete example](endpoints/get_hashtag_feed.php) · `GET /getHashtagFeed`

```sh
php examples/endpoints/get_hashtag_feed.php --help
```

## Get hashtag feed by ID

[Open the complete example](endpoints/get_hashtag_feed_by_id.php) · `GET /getHashtagFeedByID`

```sh
php examples/endpoints/get_hashtag_feed_by_id.php --help
```

## Get location info by ID

[Open the complete example](endpoints/get_location_info_by_id.php) · `GET /getLocationInfoByID`

```sh
php examples/endpoints/get_location_info_by_id.php --help
```

## Get videos by location ID

[Open the complete example](endpoints/get_location_feed_by_id.php) · `GET /getLocationFeedByID`

```sh
php examples/endpoints/get_location_feed_by_id.php --help
```

## Get music info by URL or ID

[Open the complete example](endpoints/get_music_info.php) · `GET /getMusicInfo`

```sh
php examples/endpoints/get_music_info.php --help
```

## Get music feed by URL or ID

[Open the complete example](endpoints/get_music_feed.php) · `GET /getMusicFeed`

```sh
php examples/endpoints/get_music_feed.php --help
```

## Get music charts

[Open the complete example](endpoints/get_music_charts.php) · `GET /getMusicCharts`

```sh
php examples/endpoints/get_music_charts.php --help
```

## Get trending categories list

[Open the complete example](endpoints/get_trending_categories_list.php) · `GET /getTrendingCategoriesList`

```sh
php examples/endpoints/get_trending_categories_list.php --help
```

## Get trending feed

[Open the complete example](endpoints/get_trending_feed.php) · `GET /getTrendingFeed`

```sh
php examples/endpoints/get_trending_feed.php --help
```

## Get effect information by IDs

[Open the complete example](endpoints/get_stickers_by_id.php) · `GET /getStickersByID`

```sh
php examples/endpoints/get_stickers_by_id.php --help
```

## Get effect information by ID

[Open the complete example](endpoints/get_sticker_by_id.php) · `GET /getStickerByID`

```sh
php examples/endpoints/get_sticker_by_id.php --help
```

## Get videos by effect ID

[Open the complete example](endpoints/get_sticker_feed_by_id.php) · `GET /getStickerFeedByID`

```sh
php examples/endpoints/get_sticker_feed_by_id.php --help
```

## Get user stories

[Open the complete example](endpoints/get_user_stories.php) · `GET /getUserStories`

```sh
php examples/endpoints/get_user_stories.php --help
```

## Get story info by ID

[Open the complete example](endpoints/get_story_info_by_id.php) · `GET /getStoryInfoByID`

```sh
php examples/endpoints/get_story_info_by_id.php --help
```

## Get user playlists

[Open the complete example](endpoints/get_user_playlists.php) · `GET /getUserPlaylists`

```sh
php examples/endpoints/get_user_playlists.php --help
```

## Get user playlist by ID

[Open the complete example](endpoints/get_user_playlist_by_id.php) · `GET /getUserPlaylistByID`

```sh
php examples/endpoints/get_user_playlist_by_id.php --help
```

## Get video by playlist ID

[Open the complete example](endpoints/get_video_by_playlist_id.php) · `GET /getVideoByPlaylistID`

```sh
php examples/endpoints/get_video_by_playlist_id.php --help
```

## Get available ranking list

[Open the complete example](endpoints/get_available_ranking_list.php) · `GET /getAvailableRankingList`

```sh
php examples/endpoints/get_available_ranking_list.php --help
```

## Get ranking info

[Open the complete example](endpoints/get_ranking_info.php) · `GET /getRankingInfo`

```sh
php examples/endpoints/get_ranking_info.php --help
```

## Get live info

[Open the complete example](endpoints/get_live_info.php) · `GET /getLiveInfo`

```sh
php examples/endpoints/get_live_info.php --help
```

## Get live feed

[Open the complete example](endpoints/get_live_feed.php) · `GET /getLiveFeed`

```sh
php examples/endpoints/get_live_feed.php --help
```

