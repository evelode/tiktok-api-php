# Response models and real examples

See the [example catalogue](../examples/README.md) and [response-source manifest](../examples/responses/manifest.json) for all 54 endpoints. Each walkthrough links to its captured JSON, request code, getter chains and verified console output.

The default `APIResponse` maps `tiktok` to `Model\TikTok`. `ScalarResponse` retains scalar account identifiers. `RankingResponse`, `LiveResponse` and `StoryResponse` select the payload schema for object-valued `data` and directly wrapped story details. These classes extend `APIResponse`, so the existing public return type remains valid.

`searchVideo` results live in `search_item_list[].aweme_info`; an empty `aweme_list` does not mean the search returned no results. Followers and following use different collections (`followers` and `followings`). Music detail is in `music_info`; music charts use `music_list[].music_info`. Playlist detail is in `mix`, lists in `mix_list`, and playlist videos in `videos`. Story collections are under `user_story.stories`.

Always check the outer status, rate limit and upstream status_code when present. Unknown fields are retained, missing values may be null, and cached responses can omit quota fields. IDs and cursor tokens should remain strings where declared. The three social-link probes captured only failures; their success payloads remain intentionally untyped.
