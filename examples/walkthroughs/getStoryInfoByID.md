# Get story info by ID

[All examples](../README.md) · [Runnable PHP](../getStoryInfoByID.php) · [Response excerpt](../responses/getStoryInfoByID.json)

`GET /getStoryInfoByID` · Source: Local Postman collection

## Run it

```sh
php examples/getStoryInfoByID.php --offline
php examples/getStoryInfoByID.php --offline --output=response.json
```

For a live request, set `JSONSCRAPER_TIKTOK_LICENSE_KEY`, edit the inputs in the PHP example and omit `--offline`. Live input may return different data. The shared bootstrap handles authentication, timeout validation, offline transport and error reporting.

## Request and mapped fields

```php
$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getStoryInfoByID([
    'story_id' => '7620713971015798023',
]);
exampleCheck($response);

// The story detail is directly in tiktok, without an aweme_detail wrapper.
$story = $response->getTiktok();
echo 'Story: ', $story?->getAwemeId(), PHP_EOL;
echo 'Author: ', $story?->getAuthor()?->getNickname(), PHP_EOL;
echo 'Views: ', $story?->getStatistics()?->getPlayCount() ?? 0, PHP_EOL;
```

## Captured output

```text
Story: 7620713971015798023
Author: Merlin season 1 episode 13
Views: 19
```

Output above comes from executing this example on its own saved response. Long lines and lists may be shortened for display. The fixture is a historical excerpt, not a live result.

## Response shape

The fields directly inside `tiktok` are: `added_sound_music_info`, `aigc_info`, `anchors`, `anchors_extras`, `animated_image_info`, `author`, `author_user_id`, `aweme_acl`, `aweme_id`, `aweme_type`, `banners`, `behind_the_song_music_ids`, `behind_the_song_video_music_ids`, `bodydance_score`, `bottom_products`, `branded_content_accounts`, `c2pa_info`, `cc_template_info`, `cha_list`, `challenge_position`, `cmt_swt`, `collect_stat`, `comment_config`, `comment_topbar_info`, `commerce_config_data`, `commerce_info`, `content_desc`, `content_desc_extra`, `content_level`, `content_model`, `content_original_type`, `content_size_type`, `content_type`, `cover_labels`, `create_time`, `creation_info`, `creator_ai_comment`, `desc`, `desc_language`, `disable_search_trending_bar`, `distance`, `distribute_type`, `ecosystem_perception_enhancement`, `follow_up_publish_from_id`, `geofencing`, `geofencing_regions`, `green_screen_materials`, `group_id`, `group_id_list`, `has_danmaku`, `has_promote_entry`, `has_vs_entry`, `have_dashboard`, `hybrid_label`, `image_infos`, `interact_permission`, `interaction_stickers`, `is_ads`, `is_description_translatable`, `is_hash_tag`, `is_nff_or_nr`, `is_on_this_day`, `is_paid_content`, `is_pgcshow`, `is_preview`, `is_relieve`, `is_text_sticker_translatable`, `is_tiktok_story`, `is_title_translatable`, `is_top`, `is_vr`, `item_comment_settings`, `item_duet`, `item_react`, `item_stitch`, `label_top`, `label_top_text`, `long_video`, `main_arch_common`, `mask_infos`, `meme_reg_info`, `misc_info`, `muf_comment_info_v2`, `music`, `music_begin_time_in_ms`, `music_end_time_in_ms`, `music_selected_from`, `music_title_style`, `music_volume`, `need_trim_step`, `need_vs_entry`, `nickname_position`, `no_selected_music`, `operator_boost_info`, `origin_comment_ids`, `origin_volume`, `original_client_text`, `paid_content_info`, `picked_users`, `playlist_blocked`, `poi_re_tag_signal`, `position`, `prevent_download`, `products_info`, `promote`, `promote_capcut_toggle`, `promote_icon_text`, `promote_toast`, `promote_toast_key`, `question_list`, `quick_reply_emojis`, `rate`, `reference_tts_voice_ids`, `reference_voice_filter_ids`, `region`, `retry_type`, `right_products`, `risk_infos`, `search_highlight`, `share_info`, `share_to_story_info`, `share_url`, `smart_search_info`, `social_interaction_blob`, `solaria_profile`, `sort_label`, `statistics`, `status`, `story_metadata`, `story_type`, `support_danmaku`, `survey_info`, `tako_bubble_info`, `text_extra`, `text_sticker_major_lang`, `title_language`, `tns_ue_feed_info`, `ttec_suggest_words`, `tts_voice_ids`, `uniqid_position`, `used_full_song`, `user_digged`, `video`, `video_control`, `video_labels`, `video_text`, `visual_search_info`, `voice_filter_ids`, `with_promotional_music`, `without_watermark`

[Open the saved JSON](../responses/getStoryInfoByID.json) to inspect nested fields. Lists in the excerpt contain at most two items; counters and cursors retain their recorded values. Unknown fields survive `--output` export.

## Request options

The complete parameter CLI remains available in `examples/endpoints/`; its file is linked in the runnable example's header. These options come from Postman:

| Parameter | Sample value | Description |
| --- | --- | --- |
| `story_id` | `7620713971015798023` | TikTok Story ID. |
| `region` | `US` | Region (country) code. Default: US |
| `cache_timeout` | `0` | Cache timeout in seconds. By default we use caching system with 3600 seconds window to speed up next requests to API. If you want to disable caching, you can set 0 here. |

Pagination values are response-specific. Pass the returned cursor or token unchanged using this method’s documented parameter; a saved historical cursor may no longer work in a live call.
