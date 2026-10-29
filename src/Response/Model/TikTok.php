<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * @method SearchVideoItem[] getSearchItemList()
 * @method PoiResults getPoiInfo()
 * @method Inspiration[] getInspirationList()
 * @method Suggestion[] getSugList()
 * @method User[] getFollowers()
 * @method User[] getFollowings()
 * @method string getNextPageToken()
 * @method string getMinTime()
 * @method string getMaxTime()
 * @method LiveEvent getEvent()
 * @method string getChaName()
 * @method string getCid()
 * @method int getUseCount()
 * @method int getViewCount()
 * @method string getPoiName()
 * @method string getFormattedAddress()
 * @method int getVideoCount()
 * @method Music getMusicInfo()
 * @method MusicChartItem[] getMusicList()
 * @method TrendingCategory[] getCategoryList()
 * @method StickerDetail[] getStickerInfos()
 * @method UserStory getUserStory()
 * @method Playlist[] getMixList()
 * @method Playlist getMix()
 * @method AwemeDetail[] getVideos()
 * @method string getAwemeId()
 * @method string getDesc()
 * @method Author getAuthor()
 * @method Statistics getStatistics()
 * @method string getStatusMsg()
 * @method Extra getExtra()
 * @method string getMaxCursor()
 * @method string getMinCursor()
 * @method int getHasFilteredComments()
 * TikTok.
 *
 * @method string               getId()
 * @method string               getUrl()
 * @method int                  getStatusCode()
 * @method AwemeDetail          getAwemeDetail()
 * @method Comment[]           getComments()
 * @method int                  getCursor()
 * @method int                  getHasMore()
 * @method int                  getTotal()
 * @method string               getInputKeyword()
 * @method UserSearchItem[]     getUserList()
 * @method AwemeListItem[]      getAwemeList()
 * @method MusicSearchItem[]    getMusic()
 * @method Data[]               getData()
 * @method ChallengeList[]      getChallengeList()
 * @method User                 getUser()
 * @method bool                 isId()
 * @method bool                 isUrl()
 * @method bool                 isStatusCode()
 * @method bool                 isAwemeDetail()
 * @method bool                 isComments()
 * @method bool                 isCursor()
 * @method bool                 isHasMore()
 * @method bool                 isTotal()
 * @method bool                 isInputKeyword()
 * @method bool                 isUserList()
 * @method bool                 isAwemeList()
 * @method bool                 isMusic()
 * @method bool                 isData()
 * @method bool                 isUser()
 * @method bool                 isChallengeList()
 * @method $this                setId(string $value)
 * @method $this                setUrl(string $value)
 * @method $this                setStatusCode(int $value)
 * @method $this                setAwemeDetail(AwemeDetail $value)
 * @method $this                setComments(Comment $value)
 * @method $this                setCursor(int $value)
 * @method $this                setHasMore(int $value)
 * @method $this                setTotal(int $value)
 * @method $this                setInputKeyword(string $value)
 * @method $this                setUserList(UserSearchItem[] $value)
 * @method $this                setAwemeList(AwemeListItem[] $value)
 * @method $this                setMusic(MusicSearchItem[] $value)
 * @method $this                setData(Data[] $value)
 * @method $this                setChallengeList(ChallengeList[] $value)
 * @method $this                setUser(User $value)
 * @method $this                unsetId()
 * @method $this                unsetUrl()
 * @method $this                unsetStatusCode()
 * @method $this                unsetAwemeDetail()
 * @method $this                unsetComments()
 * @method $this                unsetCursor()
 * @method $this                unsetHasMore()
 * @method $this                unsetTotal()
 * @method $this                unsetInputKeyword()
 * @method $this                unsetUserList()
 * @method $this                unsetAwemeList()
 * @method $this                unsetMusic()
 * @method $this                unsetData()
 * @method $this                unsetChallengeList()
 * @method $this                unsetUser()
 */
class TikTok extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'search_item_list' => 'SearchVideoItem[]',
        'poi_info' => 'PoiResults',
        'inspiration_list' => 'Inspiration[]',
        'sug_list' => 'Suggestion[]',
        'followers' => 'User[]',
        'followings' => 'User[]',
        'next_page_token' => 'string',
        'min_time' => 'string',
        'max_time' => 'string',
        'event' => 'LiveEvent',
        'cha_name' => 'string',
        'cid' => 'string',
        'use_count' => 'int',
        'view_count' => 'int',
        'poi_name' => 'string',
        'formatted_address' => 'string',
        'video_count' => 'int',
        'music_info' => 'Music',
        'music_list' => 'MusicChartItem[]',
        'category_list' => 'TrendingCategory[]',
        'sticker_infos' => 'StickerDetail[]',
        'user_story' => 'UserStory',
        'mix_list' => 'Playlist[]',
        'mix' => 'Playlist',
        'videos' => 'AwemeDetail[]',
        'aweme_id' => 'string',
        'desc' => 'string',
        'author' => 'Author',
        'statistics' => 'Statistics',

        'id'                    => 'string',
        'status_msg' => 'string',
        'extra' => 'Extra',
        'max_cursor' => 'string',
        'min_cursor' => 'string',
        'has_filtered_comments' => 'int',
        'url'                   => 'string',
        'status_code'           => 'int',
        'aweme_detail'          => 'AwemeDetail',
        'comments'              => 'Comment[]',
        'cursor'                => 'int',
        'has_more'              => 'int',
        'total'                 => 'int',
        'input_keyword'         => 'string',
        'user_list'             => 'UserSearchItem[]',
        'aweme_list'            => 'AwemeListItem[]',
        'music'                 => 'MusicSearchItem[]',
        'data'                  => 'Data[]',
        'challenge_list'        => 'ChallengeList[]',
        'user'                  => 'User'
    ];
}
