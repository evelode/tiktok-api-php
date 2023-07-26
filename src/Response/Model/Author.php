<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * Author.
 * 
 * @method string   getRegion()
 * @method int      getCommentFilterStatus()
 * @method int      getShortId()
 * @method string   getUniqueId()
 * @method Media    getAvatar_168x168()
 * @method int      getCommentSetting()
 * @method string   getCustomVerify()
 * @method int      getSecret()
 * @method int      getFollowStatus()
 * @method bool     getIsStar()
 * @method string   getNickname()
 * @method Media    getAvatarMedium()
 * @method bool     getIsAdFake()
 * @method int      getCommerceUserLevel()
 * @method bool     getPreventDownload()
 * @method Media    getAvatarThumb()
 * @method int      getDuetSetting()
 * @method int      getStitchSetting()
 * @method string   getUid()
 * @method bool     getIsBlock()
 * @method int      getRoomId()
 * @method string   getRoomTitle()
 * @method string   getRoomIdStr()
 * @method string   getSearchUserName()
 * @method string   getSearchUserDesc()
 * @method Media    getAvatarLarger()
 * @method int      getFollowerCount()
 * @method string   getLanguage()
 * @method string   getSecUid()
 * @method string   getInsId()
 * @method string   getEnterpriseVerifyReason()
 * @method int      getDownloadSetting()
 * @method bool     isRegion()
 * @method bool     isCommentFilterStatus()
 * @method bool     isShortId()
 * @method bool     isUniqueId()
 * @method bool     isAvatar_168x168()
 * @method bool     isCommentSetting()
 * @method bool     isCustomVerify()
 * @method bool     isSecret()
 * @method bool     isFollowStatus()
 * @method bool     isIsStar()
 * @method bool     isNickname()
 * @method bool     isAvatarMedium()
 * @method bool     isIsAdFake()
 * @method bool     isCommerceUserLevel()
 * @method bool     isPreventDownload()
 * @method bool     isAvatarThumb()
 * @method bool     isDuetSetting()
 * @method bool     isStitchSetting()
 * @method bool     isUid()
 * @method bool     isIsBlock()
 * @method bool     isRoomId()
 * @method bool     isRoomTitle()
 * @method bool     isRoomIdStr()
 * @method bool     isSearchUserName()
 * @method bool     isSearchUserDesc()
 * @method bool     isAvatarLarger()
 * @method bool     isFollowerCount()
 * @method bool     isLanguage()
 * @method bool     isSecUid()
 * @method bool     isInsId()
 * @method bool     isEnterpriseVerifyReason()
 * @method bool     isDownloadSetting()
 * @method $this    setRegion(string $value)
 * @method $this    setCommentFilterStatus(int $value)
 * @method $this    setShortId(int $value)
 * @method $this    setUniqueId(string $value)
 * @method $this    setAvatar_168x168(Media $value)
 * @method $this    setCommentSetting(int $value)
 * @method $this    setCustomVerify(string $value)
 * @method $this    setSecret(int $value)
 * @method $this    setFollowStatus(int $value)
 * @method $this    setIsStar(bool $value)
 * @method $this    setNickname(string $value)
 * @method $this    setAvatarMedium(Media $value)
 * @method $this    setIsAdFake(bool $value)
 * @method $this    setCommerceUserLevel(int $value)
 * @method $this    setPreventDownload(bool $value)
 * @method $this    setAvatarThumb(Media $value)
 * @method $this    setDuetSetting(int $value)
 * @method $this    setStitchSetting(int $value)
 * @method $this    setUid(string $value)
 * @method $this    setIsBlock(bool $value)
 * @method $this    setRoomId(int $value)
 * @method $this    setRoomTitle(string $value)
 * @method $this    setRoomIdStr(string $value)
 * @method $this    setSearchUserName(string $value)
 * @method $this    setSearchUserDesc(string $value)
 * @method $this    setAvatarLarger(Media $value)
 * @method $this    setFollowerCount(int $value)
 * @method $this    setLanguage(string $value)
 * @method $this    setSecUid(string $value)
 * @method $this    setInsId(string $value)
 * @method $this    setEnterpriseVerifyReason(string $value)
 * @method $this    setDownloadSetting(int $value)
 * @method $this    unsetRegion()
 * @method $this    unsetCommentFilterStatus()
 * @method $this    unsetShortId()
 * @method $this    unsetUniqueId()
 * @method $this    unsetAvatar_168x168()
 * @method $this    unsetCommentSetting()
 * @method $this    unsetCustomVerify()
 * @method $this    unsetSecret()
 * @method $this    unsetFollowStatus()
 * @method $this    unsetIsStar()
 * @method $this    unsetNickname()
 * @method $this    unsetAvatarMedium()
 * @method $this    unsetIsAdFake()
 * @method $this    unsetCommerceUserLevel()
 * @method $this    unsetPreventDownload()
 * @method $this    unsetAvatarThumb()
 * @method $this    unsetDuetSetting()
 * @method $this    unsetStitchSetting()
 * @method $this    unsetUid()
 * @method $this    unsetIsBlock()
 * @method $this    unsetRoomId()
 * @method $this    unsetRoomTitle()
 * @method $this    unsetRoomIdStr()
 * @method $this    unsetSearchUserName()
 * @method $this    unsetSearchUserDesc()
 * @method $this    unsetAvatarLarger()
 * @method $this    unsetFollowerCount()
 * @method $this    unsetLanguage()
 * @method $this    unsetSecUid()
 * @method $this    unsetInsId()
 * @method $this    unsetEnterpriseVerifyReason()
 * @method $this    unsetDownloadSetting()
 */
class Author extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'region'                    =>  'string',
        'comment_filter_status'     =>  'int',
        'short_id'                  =>  'int',
        'unique_id'                 =>  'string',
        'avatar_168x168'            =>  'Media',
        'comment_setting'           =>  'int',
        'custom_verify'             =>  'string',
        'secret'                    =>  'int',
        'follow_status'             =>  'int',
        'is_star'                   =>  'bool',
        'nickname'                  =>  'string',
        'avatar_medium'             =>  'Media',
        'is_ad_fake'                =>  'bool',
        'commerce_user_level'       =>  'int',
        'prevent_download'          =>  'bool',
        'avatar_thumb'              =>  'Media',
        'duet_setting'              =>  'int',
        'stitch_setting'            =>  'int',
        'uid'                       =>  'string',
        'is_block'                  =>  'bool',
        'room_id'                   =>  'int',
        'room_title'                =>  'string',
        'room_id_str'               =>  'string',
        'search_user_name'          =>  'string',
        'search_user_desc'          =>  'string',
        'avatar_larger'             =>  'Media',
        'follower_count'            =>  'int',      
        'language'                  =>  'string',
        'sec_uid'                   =>  'string',
        'ins_id'                    =>  'string',
        'enterprise_verify_reason'  =>  'string',
        'download_setting'          =>  'int'
    ];
}
