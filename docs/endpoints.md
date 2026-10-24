# TikTok API endpoint reference

54 unique GET routes from the published Postman collection. Configure `license_key` on the client. Query parameters below use the same names as the API; check Postman for required/optional rules.

| SDK method | GET path | Query parameters | Purpose |
| --- | --- | --- | --- |
| `getNoWatermarkUrl` | `/getNoWatermarkUrl` | `video_url`, `region`, `cache_timeout` | Get non watermarked video url |
| `getNoWatermarkUrlByID` | `/getNoWatermarkUrlByID` | `video_id`, `region`, `cache_timeout` | Get non watermarked video url by video ID |
| `getVideoByID` | `/getVideoByID` | `video_id`, `region`, `cache_timeout` | Get video info by ID |
| `getVideoByUrl` | `/getVideoByUrl` | `video_url`, `region`, `cache_timeout` | Get video info by URL |
| `getUnshortenedUrl` | `/getUnshortenedUrl` | `video_url`, `cache_timeout` | Convert short TikTok video URL to full TikTok video URL |
| `getCommentsByUrl` | `/getCommentsByUrl` | `video_url`, `region`, `cursor`, `count`, `cache_timeout` | Get comments list by video URL |
| `getCommentsByID` | `/getCommentsByID` | `video_id`, `region`, `cursor`, `count`, `cache_timeout` | Get comments list by video ID |
| `getCommentsReplies` | `/getCommentsReplies` | `video_id`, `comment_id`, `cursor`, `count`, `cache_timeout` | Get comments replies |
| `searchUser` | `/searchUser` | `keyword`, `cursor`, `count`, `region`, `follower_count`, `profile_type`, `other_pref`, `cache_timeout` | Search for user by keyword |
| `searchVideo` | `/searchVideo` | `keyword`, `cursor`, `count`, `cache_timeout`, `date_posted`, `sort_by`, `region` | Search for video by keyword |
| `searchMusic` | `/searchMusic` | `keyword`, `cursor`, `count`, `cache_timeout`, `filter_by`, `sort_type`, `region` | Search for music by keyword |
| `searchLive` | `/searchLive` | `keyword`, `offset`, `count`, `cache_timeout`, `region` | Search for live by keyword |
| `searchHashtag` | `/searchHashtag` | `keyword`, `cursor`, `count`, `region`, `cache_timeout` | Search for hashtag by keyword |
| `searchLocation` | `/searchLocation` | `keyword`, `cursor`, `count`, `region`, `cache_timeout` | Search for location by keyword |
| `searchTop` | `/searchTop` | `keyword`, `cursor`, `count`, `region`, `sort_type`, `publish_time`, `cache_timeout` | Top search by text query |
| `searchInsights` | `/searchInsights` | `keyword`, `cursor`, `count`, `region`, `cache_timeout` | Search insights by text query |
| `searchCommentSuggestedUsers` | `/searchCommentSuggestedUsers` | `keyword`, `count`, `region`, `cache_timeout` | Search comment suggested users |
| `getUserInfo` | `/getUserInfo` | `query`, `region`, `cache_timeout` | Get user info by profile URL or nickname |
| `getUserInfoByID` | `/getUserInfoByID` | `user_id`, `region`, `cache_timeout` | Get user info by profile ID |
| `getBasicUserInfo` | `/getBasicUserInfo` | `query`, `region`, `cache_timeout` | Get user info by username |
| `getUserFeed` | `/getUserFeed` | `query`, `max_cursor`, `count`, `region`, `with_pinned_posts`, `sort_type`, `cache_timeout` | Get user feed by profile URL or nickname |
| `getUserFeedByID` | `/getUserFeedByID` | `user_id`, `max_cursor`, `count`, `region`, `with_pinned_posts`, `sort_type`, `cache_timeout` | Get user feed by profile ID |
| `getUserID` | `/getUserID` | `query`, `region`, `cache_timeout` | Get user ID by profile URL or nickname |
| `getUsernameByID` | `/getUsernameByID` | `user_id`, `region`, `cache_timeout` | Get username by TikTok user ID |
| `getTwitterUsername` | `/getTwitterUsername` | `query`, `region`, `cache_timeout` | Get Twitter username by profile URL, nickname or TikTok user ID |
| `getInstagramUsername` | `/getInstagramUsername` | `query`, `region`, `cache_timeout` | Get Instagram username by profile URL, nickname or TikTok user ID |
| `getYoutubeChannel` | `/getYoutubeChannel` | `query`, `region`, `cache_timeout` | Get YouTube channel info by profile URL, nickname or TikTok user ID |
| `getFollowers` | `/getFollowers` | `query`, `count`, `min_time`, `cache_timeout` | Get user followers by profile URL or nickname |
| `getFollowersByID` | `/getFollowersByID` | `user_id`, `count`, `min_time`, `cache_timeout` | Get user followers by profile ID |
| `getFollowing` | `/getFollowing` | `query`, `count`, `min_time`, `cache_timeout` | Get user following by profile URL or nickname |
| `getFollowingByID` | `/getFollowingByID` | `user_id`, `count`, `min_time`, `cache_timeout` | Get user following by profile ID |
| `getLiveEventInfoByID` | `/getLiveEventInfoByID` | `event_id`, `cache_timeout` | Get live event info by ID |
| `getHashtagInfo` | `/getHashtagInfo` | `query`, `region`, `cache_timeout` | Get hashtag info by URL or tag name |
| `getHashtagFeed` | `/getHashtagFeed` | `query`, `cursor`, `count`, `region`, `cache_timeout` | Get hashtag feed by URL or tag name |
| `getHashtagFeedByID` | `/getHashtagFeedByID` | `id`, `cursor`, `count`, `region`, `cache_timeout` | Get hashtag feed by ID |
| `getLocationInfoByID` | `/getLocationInfoByID` | `location_id`, `cache_timeout` | Get location info by ID |
| `getLocationFeedByID` | `/getLocationFeedByID` | `location_id`, `count`, `cursor`, `region`, `cache_timeout` | Get videos by location ID |
| `getMusicInfo` | `/getMusicInfo` | `query`, `region`, `cache_timeout` | Get music info by URL or ID |
| `getMusicFeed` | `/getMusicFeed` | `query`, `cursor`, `count`, `cache_timeout`, `region` | Get music feed by URL or ID |
| `getMusicCharts` | `/getMusicCharts` | `chart_type`, `cache_timeout`, `region` | Get music charts |
| `getTrendingCategoriesList` | `/getTrendingCategoriesList` | `region`, `offset`, `count`, `cache_timeout` | Get trending categories list |
| `getTrendingFeed` | `/getTrendingFeed` | `region`, `pull_type`, `cache_timeout` | Get trending feed |
| `getStickersByID` | `/getStickersByID` | `sticker_ids`, `cache_timeout` | Get effect information by IDs |
| `getStickerByID` | `/getStickerByID` | `sticker_id`, `cache_timeout` | Get effect information by ID |
| `getStickerFeedByID` | `/getStickerFeedByID` | `sticker_id`, `count`, `cursor`, `region`, `cache_timeout` | Get videos by effect ID |
| `getUserStories` | `/getUserStories` | `user_id`, `count`, `min_cursor`, `region`, `cache_timeout` | Get user stories |
| `getStoryInfoByID` | `/getStoryInfoByID` | `story_id`, `region`, `cache_timeout` | Get story info by ID |
| `getUserPlaylists` | `/getUserPlaylists` | `user_id`, `cursor`, `cache_timeout` | Get user playlists |
| `getUserPlaylistByID` | `/getUserPlaylistByID` | `user_id`, `playlist_id`, `cache_timeout` | Get user playlist by ID |
| `getVideoByPlaylistID` | `/getVideoByPlaylistID` | `user_id`, `playlist_id`, `max_cursor`, `cache_timeout` | Get video by playlist ID |
| `getAvailableRankingList` | `/getAvailableRankingList` | `room_id`, `user_id`, `cache_timeout` | Get available ranking list |
| `getRankingInfo` | `/getRankingInfo` | `rank_type`, `room_id`, `user_id`, `cache_timeout` | Get ranking info |
| `getLiveInfo` | `/getLiveInfo` | `room_id`, `user_id`, `cache_timeout` | Get live info |
| `getLiveFeed` | `/getLiveFeed` | `draw_room_id`, `max_time`, `region`, `cache_timeout` | Get live feed |
