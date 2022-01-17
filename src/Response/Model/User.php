<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * User.
 * 
 * @method bool     getAcceptPrivatePolicy()
 * @method string   getAccountRegion()
 * @method mixed    getAdCoverUrl()
 * @method mixed    getAdvanceFeatureItemOrder()
 * @method int      getAppleAccount()
 * @method int      getAuthorityStatus()
 * @method Media    getAvatar168x168()
 * @method Media    getAvatar300x300()
 * @method Media    getAvatarLarger()
 * @method Media    getAvatarMedium()
 * @method Media    getAvatarThumb()
 * @method string   getAvatarUri()
 * @method int      getAwemeCount()
 * @method mixed    getBindPhone()
 * @method mixed    getBoldFields()
 * @method mixed    getCanSetGeofencing()
 * @method mixed    getChaList()
 * @method int      getCommentFilterStatus()
 * @method int      getCommentSetting()
 * @method int      getCommerceUserLevel()
 * @method Media    getCoverUrl()
 * @method int      getCreateTime()
 * @method string   getCustomVerify()
 * @method string   getCvLevel()
 * @method int      getDownloadPromptTs()
 * @method int      getDownloadSetting()
 * @method int      getDuetSetting()
 * @method string   getEnterpriseVerifyReason()
 * @method mixed    getEvents()
 * @method int      getFavoritingCount()
 * @method int      getFbExpireTime()
 * @method int      getFollowStatus()
 * @method int      getFollowerCount()
 * @method int      getFollowerStatus()
 * @method mixed    getFollowersDetail()
 * @method int      getFollowingCount()
 * @method mixed    getGeofencing()
 * @method string   getGoogleAccount()
 * @method bool     getHasEmail()
 * @method bool     getHasFacebookToken()
 * @method bool     getHasInsights()
 * @method bool     getHasOrders()
 * @method bool     getHasTwitterToken()
 * @method bool     getHasYoutubeToken()
 * @method bool     getHideSearch()
 * @method mixed    getHomepageBottomToast()
 * @method string   getInsId()
 * @method bool     getIsAdFake()
 * @method bool     getIsBlock()
 * @method bool     getIsDisciplineMember()
 * @method bool     getIsPhoneBinded()
 * @method bool     getIsStar()
 * @method mixed    getItemList()
 * @method string   getLanguage()
 * @method int      getLiveAgreement()
 * @method bool     getLiveCommerce()
 * @method int      getLiveVerify()
 * @method mixed    getMutualRelationAvatars()
 * @method mixed    getNeedPoints()
 * @method mixed    getNeedRecommend()
 * @method string   getNickname()
 * @method mixed    getPlatformSyncInfo()
 * @method bool     getPreventDownload()
 * @method int      getReactSetting()
 * @method string   getRegion()
 * @method mixed    getRelativeUsers()
 * @method int      getRoomId()
 * @method mixed    getSearchHighlight()
 * @method string   getSecUid()
 * @method int      getSecret()
 * @method int      getShieldCommentNotice()
 * @method int      getShieldDiggNotice()
 * @method int      getShieldFollowNotice()
 * @method int      getShortId()
 * @method bool     getShowImageBubble()
 * @method string   getSignature()
 * @method int      getSpecialLock()
 * @method int      getStatus()
 * @method int      getStitchSetting()
 * @method int      getTotalFavorited()
 * @method int      getTwExpireTime()
 * @method string   getTwitterId()
 * @method string   getTwitterName()
 * @method mixed    getTypeLabel()
 * @method string   getUid()
 * @method string   getUniqueId()
 * @method int      getUniqueIdModifyTime()
 * @method bool     getUserCanceled()
 * @method int      getUserMode()
 * @method int      getUserPeriod()
 * @method int      getUserRate()
 * @method mixed    getUserTags()
 * @method int      getVerificationType()
 * @method string   getVerifyInfo()
 * @method Media    getVideoIcon()
 * @method mixed    getWhiteCoverUrl()
 * @method bool     getWithCommerceEntry()
 * @method bool     getWithShopEntry()
 * @method string   getYoutubeChannelId()
 * @method string   getYoutubeChannelTitle()
 * @method int      getYoutubeExpireTime() 
 * @method bool     isAcceptPrivatePolicy()
 * @method bool     isAccountRegion()
 * @method bool     isAdCoverUrl()
 * @method bool     isAdvanceFeatureItemOrder()
 * @method bool     isAppleAccount()
 * @method bool     isAuthorityStatus()
 * @method bool     isAvatar168x168()
 * @method bool     isAvatar300x300()
 * @method bool     isAvatarLarger()
 * @method bool     isAvatarMedium()
 * @method bool     isAvatarThumb()
 * @method bool     isAvatarUri()
 * @method bool     isAwemeCount()
 * @method bool     isBindPhone()
 * @method bool     isBoldFields()
 * @method bool     isCanSetGeofencing()
 * @method bool     isChaList()
 * @method bool     isCommentFilterStatus()
 * @method bool     isCommentSetting()
 * @method bool     isCommerceUserLevel()
 * @method bool     isCoverUrl()
 * @method bool     isCreateTime()
 * @method bool     isCustomVerify()
 * @method bool     isCvLevel()
 * @method bool     isDownloadPromptTs()
 * @method bool     isDownloadSetting()
 * @method bool     isDuetSetting()
 * @method bool     isEnterpriseVerifyReason()
 * @method bool     isEvents()
 * @method bool     isFavoritingCount()
 * @method bool     isFbExpireTime()
 * @method bool     isFollowStatus()
 * @method bool     isFollowerCount()
 * @method bool     isFollowerStatus()
 * @method bool     isFollowersDetail()
 * @method bool     isFollowingCount()
 * @method bool     isGeofencing()
 * @method bool     isGoogleAccount()
 * @method bool     isHasEmail()
 * @method bool     isHasFacebookToken()
 * @method bool     isHasInsights()
 * @method bool     isHasOrders()
 * @method bool     isHasTwitterToken()
 * @method bool     isHasYoutubeToken()
 * @method bool     isHideSearch()
 * @method bool     isHomepageBottomToast()
 * @method bool     isInsId()
 * @method bool     isIsAdFake()
 * @method bool     isIsBlock()
 * @method bool     isIsDisciplineMember()
 * @method bool     isIsPhoneBinded()
 * @method bool     isIsStar()
 * @method bool     isItemList()
 * @method bool     isLanguage()
 * @method bool     isLiveAgreement()
 * @method bool     isLiveCommerce()
 * @method bool     isLiveVerify()
 * @method bool     isMutualRelationAvatars()
 * @method bool     isNeedPoints()
 * @method bool     isNeedRecommend()
 * @method bool     isNickname()
 * @method bool     isPlatformSyncInfo()
 * @method bool     isPreventDownload()
 * @method bool     isReactSetting()
 * @method bool     isRegion()
 * @method bool     isRelativeUsers()
 * @method bool     isRoomId()
 * @method bool     isSearchHighlight()
 * @method bool     isSecUid()
 * @method bool     isSecret()
 * @method bool     isShieldCommentNotice()
 * @method bool     isShieldDiggNotice()
 * @method bool     isShieldFollowNotice()
 * @method bool     isShortId()
 * @method bool     isShowImageBubble()
 * @method bool     isSignature()
 * @method bool     isSpecialLock()
 * @method bool     isStatus()
 * @method bool     isStitchSetting()
 * @method bool     isTotalFavorited()
 * @method bool     isTwExpireTime()
 * @method bool     isTwitterId()
 * @method bool     isTwitterName()
 * @method bool     isTypeLabel()
 * @method bool     isUid()
 * @method bool     isUniqueId()
 * @method bool     isUniqueIdModifyTime()
 * @method bool     isUserCanceled()
 * @method bool     isUserMode()
 * @method bool     isUserPeriod()
 * @method bool     isUserRate()
 * @method bool     isUserTags()
 * @method bool     isVerificationType()
 * @method bool     isVerifyInfo()
 * @method bool     isVideoIcon()
 * @method bool     isWhiteCoverUrl()
 * @method bool     isWithCommerceEntry()
 * @method bool     isWithShopEntry()
 * @method bool     isYoutubeChannelId()
 * @method bool     isYoutubeChannelTitle()
 * @method bool     isYoutubeExpireTime()
 * @method $this    setAcceptPrivatePolicy(bool $value)
 * @method $this    setAccountRegion(string $value)
 * @method $this    setAdCoverUrl(mixed $value)
 * @method $this    setAdvanceFeatureItemOrder(mixed $value)
 * @method $this    setAppleAccount(int $value)
 * @method $this    setAuthorityStatus(int $value)
 * @method $this    setAvatar168x168(Media $value)
 * @method $this    setAvatar300x300(Media $value)
 * @method $this    setAvatarLarger(Media $value)
 * @method $this    setAvatarMedium(Media $value)
 * @method $this    setAvatarThumb(Media $value)
 * @method $this    setAvatarUri(string $value)
 * @method $this    setAwemeCount(int $value)
 * @method $this    setBindPhone(mixed $value)
 * @method $this    setBoldFields(mixed $value)
 * @method $this    setCanSetGeofencing(mixed $value)
 * @method $this    setChaList(mixed $value)
 * @method $this    setCommentFilterStatus(int $value)
 * @method $this    setCommentSetting(int $value)
 * @method $this    setCommerceUserLevel(int $value)
 * @method $this    setCoverUrl(Media $value)
 * @method $this    setCreateTime(int $value)
 * @method $this    setCustomVerify(string $value)
 * @method $this    setCvLevel(string $value)
 * @method $this    setDownloadPromptTs(int $value)
 * @method $this    setDownloadSetting(int $value)
 * @method $this    setDuetSetting(int $value)
 * @method $this    setEnterpriseVerifyReason(string $value)
 * @method $this    setEvents(mixed $value)
 * @method $this    setFavoritingCount(int $value)
 * @method $this    setFbExpireTime(int $value)
 * @method $this    setFollowStatus(int $value)
 * @method $this    setFollowerCount(int $value)
 * @method $this    setFollowerStatus(int $value)
 * @method $this    setFollowersDetail(mixed $value)
 * @method $this    setFollowingCount(int $value)
 * @method $this    setGeofencing(mixed $value)
 * @method $this    setGoogleAccount(string $value)
 * @method $this    setHasEmail(bool $value)
 * @method $this    setHasFacebookToken(bool $value)
 * @method $this    setHasInsights(bool $value)
 * @method $this    setHasOrders(bool $value)
 * @method $this    setHasTwitterToken(bool $value)
 * @method $this    setHasYoutubeToken(bool $value)
 * @method $this    setHideSearch(bool $value)
 * @method $this    setHomepageBottomToast(mixed $value)
 * @method $this    setInsId(string $value)
 * @method $this    setIsAdFake(bool $value)
 * @method $this    setIsBlock(bool $value)
 * @method $this    setIsDisciplineMember(bool $value)
 * @method $this    setIsPhoneBinded(bool $value)
 * @method $this    setIsStar(bool $value)
 * @method $this    setItemList(mixed $value)
 * @method $this    setLanguage(string $value)
 * @method $this    setLiveAgreement(int $value)
 * @method $this    setLiveCommerce(bool $value)
 * @method $this    setLiveVerify(int $value)
 * @method $this    setMutualRelationAvatars(mixed $value)
 * @method $this    setNeedPoints(mixed $value)
 * @method $this    setNeedRecommend(mixed $value)
 * @method $this    setNickname(string $value)
 * @method $this    setPlatformSyncInfo(mixed $value)
 * @method $this    setPreventDownload(bool $value)
 * @method $this    setReactSetting(int $value)
 * @method $this    setRegion(string $value)
 * @method $this    setRelativeUsers(mixed $value)
 * @method $this    setRoomId(int $value)
 * @method $this    setSearchHighlight(mixed $value)
 * @method $this    setSecUid(string $value)
 * @method $this    setSecret(int $value)
 * @method $this    setShieldCommentNotice(int $value)
 * @method $this    setsShieldDiggNotice(int $value)
 * @method $this    setShieldFollowNotice(int $value)
 * @method $this    setShortId(int $value)
 * @method $this    setShowImageBubble(bool $value)
 * @method $this    setSignature(string $value)
 * @method $this    setSpecialLock(int $value)
 * @method $this    setStatus(int $value)
 * @method $this    setStitchSetting(int $value)
 * @method $this    setTotalFavorited(int $value)
 * @method $this    setTwExpireTime(int $value)
 * @method $this    setTwitterId(string $value)
 * @method $this    setTwitterName(string $value)
 * @method $this    setTypeLabel(mixed $value)
 * @method $this    setUid(string $value)
 * @method $this    setUniqueId(string $value)
 * @method $this    setUniqueIdModifyTime(int $value)
 * @method $this    setUserCanceled(bool $value)
 * @method $this    setUserMode(int $value)
 * @method $this    setUserPeriod(int $value)
 * @method $this    setUserRate(int $value)
 * @method $this    setUserTags(mixed $value)
 * @method $this    setVerificationType(int $value)
 * @method $this    setVerifyInfo(string $value)
 * @method $this    setVideoIcon(Media $value)
 * @method $this    setWhiteCoverUrl(mixed $value)
 * @method $this    setWithCommerceEntry(bool $value)
 * @method $this    setWithShopEntry(bool $value)
 * @method $this    setYoutubeChannelId(string $value)
 * @method $this    setYoutubeChannelTitle(string $value)
 * @method $this    setYoutubeExpireTime(int $value)
 * @method $this    unsetAcceptPrivatePolicy()
 * @method $this    unsetAccountRegion()
 * @method $this    unsetAdCoverUrl()
 * @method $this    unsetAdvanceFeatureItemOrder()
 * @method $this    unsetAppleAccount()
 * @method $this    unsetAuthorityStatus()
 * @method $this    unsetAvatar168x168()
 * @method $this    unsetAvatar300x300()
 * @method $this    unsetAvatarLarger()
 * @method $this    unsetAvatarMedium()
 * @method $this    unsetAvatarThumb()
 * @method $this    unsetAvatarUri()
 * @method $this    unsetAwemeCount()
 * @method $this    unsetBindPhone()
 * @method $this    unsetBoldFields()
 * @method $this    unsetCanSetGeofencing()
 * @method $this    unsetChaList()
 * @method $this    unsetCommentFilterStatus()
 * @method $this    unsetCommentSetting()
 * @method $this    unsetCommerceUserLevel()
 * @method $this    unsetCoverUrl()
 * @method $this    unsetCreateTime()
 * @method $this    unsetCustomVerify()
 * @method $this    unsetCvLevel()
 * @method $this    unsetDownloadPromptTs()
 * @method $this    unsetDownloadSetting()
 * @method $this    unsetDuetSetting()
 * @method $this    unsetEnterpriseVerifyReason()
 * @method $this    unsetEvents()
 * @method $this    unsetFavoritingCount()
 * @method $this    unsetFbExpireTime()
 * @method $this    unsetFollowStatus()
 * @method $this    unsetFollowerCount()
 * @method $this    unsetFollowerStatus()
 * @method $this    unsetFollowersDetail()
 * @method $this    unsetFollowingCount()
 * @method $this    unsetGeofencing()
 * @method $this    unsetGoogleAccount()
 * @method $this    unsetHasEmail()
 * @method $this    unsetHasFacebookToken()
 * @method $this    unsetHasInsights()
 * @method $this    unsetHasOrders()
 * @method $this    unsetHasTwitterToken()
 * @method $this    unsetHasYoutubeToken()
 * @method $this    unsetHideSearch()
 * @method $this    unsetHomepageBottomToast()
 * @method $this    unsetInsId()
 * @method $this    unsetIsAdFake()
 * @method $this    unsetIsBlock()
 * @method $this    unsetIsDisciplineMember()
 * @method $this    unsetIsPhoneBinded()
 * @method $this    unsetIsStar()
 * @method $this    unsetItemList()
 * @method $this    unsetLanguage()
 * @method $this    unsetLiveAgreement()
 * @method $this    unsetLiveCommerce()
 * @method $this    unsetLiveVerify()
 * @method $this    unsetMutualRelationAvatars()
 * @method $this    unsetNeedPoints()
 * @method $this    unsetNeedRecommend()
 * @method $this    unsetNickname()
 * @method $this    unsetPlatformSyncInfo()
 * @method $this    unsetPreventDownload()
 * @method $this    unsetReactSetting()
 * @method $this    unsetRegion()
 * @method $this    unsetRelativeUsers()
 * @method $this    unsetRoomId()
 * @method $this    unsetSearchHighlight()
 * @method $this    unsetSecUid()
 * @method $this    unsetSecret()
 * @method $this    unsetShieldCommentNotice()
 * @method $this    unsetsShieldDiggNotice()
 * @method $this    unsetShieldFollowNotice()
 * @method $this    unsetShortId()
 * @method $this    unsetShowImageBubble()
 * @method $this    unsetSignature()
 * @method $this    unsetSpecialLock()
 * @method $this    unsetStatus()
 * @method $this    unsetStitchSetting()
 * @method $this    unsetTotalFavorited()
 * @method $this    unsetTwExpireTime()
 * @method $this    unsetTwitterId()
 * @method $this    unsetTwitterName()
 * @method $this    unsetTypeLabel()
 * @method $this    unsetUid()
 * @method $this    unsetUniqueId()
 * @method $this    unsetUniqueIdModifyTime()
 * @method $this    unsetUserCanceled()
 * @method $this    unsetUserMode()
 * @method $this    unsetUserPeriod()
 * @method $this    unsetUserRate()
 * @method $this    unsetUserTags()
 * @method $this    unsetVerificationType()
 * @method $this    unsetVerifyInfo()
 * @method $this    unsetVideoIcon()
 * @method $this    unsetWhiteCoverUrl()
 * @method $this    unsetWithCommerceEntry()
 * @method $this    unsetWithShopEntry()
 * @method $this    unsetYoutubeChannelId()
 * @method $this    unsetYoutubeChannelTitle()
 * @method $this    unsetYoutubeExpireTime()
 * 
 */
class User extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'accept_private_policy'         =>  'bool',
        'account_region'                =>  'string',
        'ad_cover_url'                  =>  '',
        'advance_feature_item_order'    =>  '',
        'apple_account'                 =>  'int',
        'authority_status'              =>  'int',
        'avatar_168x168'                =>  'Media',
        'avatar_300x300'                =>  'Media',
        'avatar_larger'                 =>  'Media',
        'avatar_medium'                 =>  'Media',
        'avatar_thumb'                  =>  'Media',
        'avatar_uri'                    =>  'string',
        'aweme_count'                   =>  'int',
        'bind_phone'                    =>  '',
        'bold_fields'                   =>  '',
        'can_set_geofencing'            =>  '',
        'cha_list'                      =>  '',
        'comment_filter_status'         =>  'int',
        'comment_setting'               =>  'int',
        'commerce_user_level'           =>  'int',
        'cover_url'                     =>  'Media',
        'create_time'                   =>  'int',
        'custom_verify'                 =>  'string',
        'cv_level'                      =>  'string',
        'download_prompt_ts'            =>  'int',
        'download_setting'              =>  'int',
        'duet_setting'                  =>  'int',
        'enterprise_verify_reason'      =>  'string',
        'events'                        =>  '',
        'favoriting_count'              =>  'int',
        'fb_expire_time'                =>  'int',
        'follow_status'                 =>  'int',
        'follower_count'                =>  'int',
        'follower_status'               =>  'int',
        'followers_detail'              =>  '',
        'following_count'               =>  'int',
        'geofencing'                    =>  '',
        'google_account'                =>  'string',
        'has_email'                     =>  'bool',
        'has_facebook_token'            =>  'bool',
        'has_insights'                  =>  'bool',
        'has_orders'                    =>  'bool',
        'has_twitter_token'             =>  'bool',
        'has_youtube_token'             =>  'bool',
        'hide_search'                   =>  'bool',
        'homepage_bottom_toast'         =>  '',
        'ins_id'                        =>  'string',
        'is_ad_fake'                    =>  'bool',
        'is_block'                      =>  'bool',
        'is_discipline_member'          =>  'bool',
        'is_phone_binded'               =>  'bool',
        'is_star'                       =>  'bool',
        'item_list'                     =>  '',
        'language'                      =>  'string',
        'live_agreement'                =>  'int',
        'live_commerce'                 =>  'bool',
        'live_verify'                   =>  'int',
        'mutual_relation_avatars'       =>  '',
        'need_points'                   =>  '',
        'need_recommend'                =>  'int',
        'nickname'                      =>  'string',
        'platform_sync_info'            =>  '',
        'prevent_download'              =>  'bool',
        'react_setting'                 =>  'int',
        'region'                        =>  'string',
        'relative_users'                =>  '',
        'room_id'                       =>  'int',
        'search_highlight'              =>  '',
        'sec_uid'                       =>  'string',
        'secret'                        =>  'int',
        'shield_comment_notice'         =>  'int',
        'shield_digg_notice'            =>  'int',
        'shield_follow_notice'          =>  'int',
        'short_id'                      =>  'int',
        'show_image_bubble'             =>  'bool',
        'signature'                     =>  'string',
        'special_lock'                  =>  'int',
        'status'                        =>  'int',
        'stitch_setting'                =>  'int',
        'total_favorited'               =>  'int',
        'tw_expire_time'                =>  'int',
        'twitter_id'                    =>  'string',
        'twitter_name'                  =>  'string',
        'type_label'                    =>  '',
        'uid'                           =>  'string',
        'unique_id'                     =>  'string',
        'unique_id_modify_time'         =>  'int',
        'user_canceled'                 =>  'bool',
        'user_mode'                     =>  'int',
        'user_period'                   =>  'int',
        'user_rate'                     =>  'int',
        'user_tags'                     =>  '',
        'verification_type'             =>  'int',
        'verify_info'                   =>  'string',
        'video_icon'                    =>  'Media',
        'white_cover_url'               =>  '',
        'with_commerce_entry'           =>  'bool',
        'with_shop_entry'               =>  'bool',
        'youtube_channel_id'            =>  'string',
        'youtube_channel_title'         =>  'string',
        'youtube_expire_time'           =>  'int'
    ];
}
