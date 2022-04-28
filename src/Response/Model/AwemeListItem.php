<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * AwemeListItem.
 * 
 * @method bool             getAllowGift()
 * @method Anchor[]         getAnchors()
 * @method string           getAnchorsExtras()
 * @method User             getAuthor()
 * @method int              getAuthorUserId()
 * @method AwemeAcl         getAwemeAcl()
 * @method string           getAwemeId()
 * @method int              getAwemeType()
 * @method int              getBodydanceScore()
 * @method ChaListItem[]    getChaList()
 * @method mixed            getChallengePosition()
 * @method bool             getCmtSwt()
 * @method int              getCollectStat()
 * @method mixed            getCommerceConfigData()
 * @method CommerceInfo     getCommerceInfo()
 * @method string           getContentDesc()
 * @method mixed            getContentDescExtra()
 * @method mixed            getCoverLabels()
 * @method int              getCreateTime()
 * @method string           getDesc()
 * @method string           getDescLanguage()
 * @method bool             getDisableSearchTrendingBar()
 * @method string           getDistance()
 * @method int              getDistributeType()
 * @method int              getFollowUpPublishFromId()
 * @method mixed            getGeofencing()
 * @method mixed            getGeofencingRegions()
 * @method mixed            getGreenScreenMaterials()
 * @method string           getGroupId()
 * @method GroupIdList      getGroupIdList()
 * @method bool             getHasVsEntry()
 * @method bool             getHaveDashboard()
 * @method mixed            getHybridLabel()
 * @method mixed            getImageInfos()
 * @method mixed            getInteractionStickers()
 * @method int              getIsHashTag()
 * @method bool             getIsPgcshow()
 * @method int              getIsPreview()
 * @method bool             getIsRelieve()
 * @method int              getIsTop()
 * @method bool             getIsVr()
 * @method int              getItemCommentSettings()
 * @method int              getItemDuet()
 * @method int              getItemReact()
 * @method int              getItemStitch()
 * @method LabelTop         getLabelTop()
 * @method mixed            getLabelTopText()
 * @method mixed            getLongVideo()
 * @method mixed            getMaskInfos()
 * @method mixed            getMiscInfo()
 * @method Music            getMusic()
 * @method int              getMusicBeginTimeInMs()
 * @method bool             getNeedTrimStep()
 * @method bool             getNeedVsEntry()
 * @method mixed            getNicknamePosition()
 * @method mixed            getOriginCommentIds()
 * @method bool             getPlaylistBlocked()
 * @method mixed            getPosition()
 * @method bool             getPreventDownload()
 * @method mixed            getProductsInfo()
 * @method mixed            getQuestionList()
 * @method int              getRate()
 * @method string           getRegion()
 * @method RiskInfos        getRiskInfos()
 * @method string           getSearchDesc()
 * @method mixed            getSearchHighlight()
 * @method ShareInfo        getShareInfo()
 * @method string           getShareUrl()
 * @method string           getSortLabel()
 * @method Statistics       getStatistics()
 * @method Status           getStatus()
 * @method TextExtra        getTextExtra()
 * @method mixed            getUniqidPosition()
 * @method int              getUserDigged()
 * @method Video            getVideo()
 * @method VideoControl     getVideoControl()
 * @method mixed[]          getVideoLabels()
 * @method mixed[]          getVideoText()
 * @method bool             getWithPromotionalMusic()
 * @method bool             getWithoutWatermark()
 * @method bool             isAllowGift()
 * @method bool             isAnchors()
 * @method bool             isAnchorsExtras()
 * @method bool             isAuthor()
 * @method bool             isAuthorUserId()
 * @method bool             isAwemeAcl()
 * @method bool             isAwemeId()
 * @method bool             isAwemeType()
 * @method bool             isBodydanceScore()
 * @method bool             isChaList()
 * @method bool             isChallengePosition()
 * @method bool             isCmtSwt()
 * @method bool             isCollectStat()
 * @method bool             isCommerceConfigData()
 * @method bool             isCommerceInfo()
 * @method bool             isContentDesc()
 * @method bool             isContentDescExtra()
 * @method bool             isCoverLabels()
 * @method bool             isCreateTime()
 * @method bool             isDesc()
 * @method bool             isDescLanguage()
 * @method bool             isDisableSearchTrendingBar()
 * @method bool             isDistance()
 * @method bool             isDistributeType()
 * @method bool             isFollowUpPublishFromId()
 * @method bool             isGeofencing()
 * @method bool             isGeofencingRegions()
 * @method bool             isGreenScreenMaterials()
 * @method bool             isGroupId()
 * @method bool             isGroupIdList()
 * @method bool             isHasVsEntry()
 * @method bool             isHaveDashboard()
 * @method bool             isHybridLabel()
 * @method bool             isImageInfos()
 * @method bool             isInteractionStickers()
 * @method bool             isIsHashTag()
 * @method bool             isIsPgcshow()
 * @method bool             isIsPreview()
 * @method bool             isIsRelieve()
 * @method bool             isIsTop()
 * @method bool             isIsVr()
 * @method bool             isItemCommentSettings()
 * @method bool             isItemDuet()
 * @method bool             isItemReact()
 * @method bool             isItemStitch()
 * @method bool             isLabelTop()
 * @method bool             isLabelTopText()
 * @method bool             isLongVideo()
 * @method bool             isMaskInfos()
 * @method bool             isMiscInfo()
 * @method bool             isMusic()
 * @method bool             isMusicBeginTimeInMs()
 * @method bool             isNeedTrimStep()
 * @method bool             isNeedVsEntry()
 * @method bool             isNicknamePosition()
 * @method bool             isOriginCommentIds()
 * @method bool             isPlaylistBlocked()
 * @method bool             isPosition()
 * @method bool             isPreventDownload()
 * @method bool             isProductsInfo()
 * @method bool             isQuestionList()
 * @method bool             isRate()
 * @method bool             isRegion()
 * @method bool             isRiskInfos()
 * @method bool             isSearchDesc()
 * @method bool             isSearchHighlight()
 * @method bool             isShareInfo()
 * @method bool             isShareUrl()
 * @method bool             isSortLabel()
 * @method bool             isStatistics()
 * @method bool             isStatus()
 * @method bool             isTextExtra()
 * @method bool             isUniqidPosition()
 * @method bool             isUserDigged()
 * @method bool             isVideo()
 * @method bool             isVideoControl()
 * @method bool             isVideoLabels()
 * @method bool             isVideoText()
 * @method bool             isWithPromotionalMusic()
 * @method bool             isWithoutWatermark()
 * @method $this            setAllowGift(bool $value)
 * @method $this            setAnchors(Anchor[] $value)
 * @method $this            setAnchorsExtras(string $value)
 * @method $this            setAuthor(User $value)
 * @method $this            setAuthorUserId(int $value)
 * @method $this            setAwemeAcl(AwemeAcl $value)
 * @method $this            setAwemeId(string $value)
 * @method $this            setAwemeType(int $value)
 * @method $this            setBodydanceScore(int $value)
 * @method $this            setChaList(ChaListItem[] $value)
 * @method $this            setChallengePosition(mixed $value)
 * @method $this            setCmtSwt(bool $value)
 * @method $this            setCollectStat(int $value)
 * @method $this            setCommerceConfigData(mixed $value)
 * @method $this            setCommerceInfo(CommerceInfo $value)
 * @method $this            setContentDesc(string $value)
 * @method $this            setContentDescExtra(mixed $value)
 * @method $this            setCoverLabels(mixed $value)
 * @method $this            setCreateTime(int $value)
 * @method $this            setDesc(string $value)
 * @method $this            setDescLanguage(string $value)
 * @method $this            setDisableSearchTrendingBar(bool $value)
 * @method $this            setDistance(string $value)
 * @method $this            setDistributeType(int $value)
 * @method $this            setFollowUpPublishFromId(int $value)
 * @method $this            setGeofencing(mixed $value)
 * @method $this            setGeofencingRegions(mixed $value)
 * @method $this            setGreenScreenMaterials(mixed $value)
 * @method $this            setGroupId(string $value)
 * @method $this            setGroupIdList(GroupIdList $value)
 * @method $this            setHasVsEntry(bool $value)
 * @method $this            setHaveDashboard(bool $value)
 * @method $this            setHybridLabel(mixed $value)
 * @method $this            setImageInfos(mixed $value)
 * @method $this            setInteractionStickers(mixed $value)
 * @method $this            setIsHashTag(int $value)
 * @method $this            setIsPgcshow(bool $value)
 * @method $this            setIsPreview(int $value)
 * @method $this            setIsRelieve(bool $value)
 * @method $this            setIsTop(int $value)
 * @method $this            setIsVr(bool $value)
 * @method $this            setItemCommentSettings(int $value)
 * @method $this            setItemDuet(int $value)
 * @method $this            setItemReact(int $value)
 * @method $this            setItemStitch(int $value)
 * @method $this            setLabelTop(LabelTop $value)
 * @method $this            setLabelTopText(mixed $value)
 * @method $this            setLongVideo(mixed $value)
 * @method $this            setMaskInfos(mixed $value)
 * @method $this            setMiscInfo(mixed $value)
 * @method $this            setMusic(Music $value)
 * @method $this            setMusicBeginTimeInMs(int $value)
 * @method $this            setNeedTrimStep(bool $value)
 * @method $this            setNeedVsEntry(bool $value)
 * @method $this            setNicknamePosition(mixed $value)
 * @method $this            setOriginCommentIds(mixed $value)
 * @method $this            setPlaylistBlocked(bool $value)
 * @method $this            setPosition(mixed $value)
 * @method $this            setPreventDownload(bool $value)
 * @method $this            setProductsInfo(mixed $value)
 * @method $this            setQuestionList(mixed $value)
 * @method $this            setRate(int $value)
 * @method $this            setRegion(string $value)
 * @method $this            setRiskInfos(RiskInfos $value)
 * @method $this            setSearchDesc(string $value)
 * @method $this            setSearchHighlight(mixed $value)
 * @method $this            setShareInfo(ShareInfo $value)
 * @method $this            setShareUrl(string $value)
 * @method $this            setSortLabel(string $value)
 * @method $this            setStatistics(Statistics $value)
 * @method $this            setStatus(Status $value)
 * @method $this            setTextExtra(TextExtra $value)
 * @method $this            setUniqidPosition(mixed $value)
 * @method $this            setUserDigged(int $value)
 * @method $this            setVideo(Video $value)
 * @method $this            setVideoControl(VideoControl $value)
 * @method $this            setVideoLabels(mixed[] $value)
 * @method $this            setVideoText(mixed[] $value)
 * @method $this            setWithPromotionalMusic(bool $value)
 * @method $this            setWithoutWatermark(bool $value)
 * @method $this            unsetAllowGift()
 * @method $this            unsetAnchors()
 * @method $this            unsetAnchorsExtras()
 * @method $this            unsetAuthor()
 * @method $this            unsetAuthorUserId()
 * @method $this            unsetAwemeAcl()
 * @method $this            unsetAwemeId()
 * @method $this            unsetAwemeType()
 * @method $this            unsetBodydanceScore()
 * @method $this            unsetChaList()
 * @method $this            unsetChallengePosition()
 * @method $this            unsetCmtSwt()
 * @method $this            unsetCollectStat()
 * @method $this            unsetCommerceConfigData()
 * @method $this            unsetCommerceInfo()
 * @method $this            unsetContentDesc()
 * @method $this            unsetContentDescExtra()
 * @method $this            unsetCoverLabels()
 * @method $this            unsetCreateTime()
 * @method $this            unsetDesc()
 * @method $this            unsetDescLanguage()
 * @method $this            unsetDisableSearchTrendingBar()
 * @method $this            unsetDistance()
 * @method $this            unsetDistributeType()
 * @method $this            unsetFollowUpPublishFromId()
 * @method $this            unsetGeofencing()
 * @method $this            unsetGeofencingRegions()
 * @method $this            unsetGreenScreenMaterials()
 * @method $this            unsetGroupId()
 * @method $this            unsetGroupIdList()
 * @method $this            unsetHasVsEntry()
 * @method $this            unsetHaveDashboard()
 * @method $this            unsetHybridLabel()
 * @method $this            unsetImageInfos()
 * @method $this            unsetInteractionStickers()
 * @method $this            unsetIsHashTag()
 * @method $this            unsetIsPgcshow()
 * @method $this            unsetIsPreview()
 * @method $this            unsetIsRelieve()
 * @method $this            unsetIsTop()
 * @method $this            unsetIsVr()
 * @method $this            unsetItemCommentSettings()
 * @method $this            unsetItemDuet()
 * @method $this            unsetItemReact()
 * @method $this            unsetItemStitch()
 * @method $this            unsetLabelTop()
 * @method $this            unsetLabelTopText()
 * @method $this            unsetLongVideo()
 * @method $this            unsetMaskInfos()
 * @method $this            unsetMiscInfo()
 * @method $this            unsetMusic()
 * @method $this            unsetMusicBeginTimeInMs()
 * @method $this            unsetNeedTrimStep()
 * @method $this            unsetNeedVsEntry()
 * @method $this            unsetNicknamePosition()
 * @method $this            unsetOriginCommentIds()
 * @method $this            unsetPlaylistBlocked()
 * @method $this            unsetPosition()
 * @method $this            unsetPreventDownload()
 * @method $this            unsetProductsInfo()
 * @method $this            unsetQuestionList()
 * @method $this            unsetRate()
 * @method $this            unsetRegion()
 * @method $this            unsetRiskInfos()
 * @method $this            unsetSearchDesc()
 * @method $this            unsetSearchHighlight()
 * @method $this            unsetShareInfo()
 * @method $this            unsetShareUrl()
 * @method $this            unsetSortLabel()
 * @method $this            unsetStatistics()
 * @method $this            unsetStatus()
 * @method $this            unsetTextExtra()
 * @method $this            unsetUniqidPosition()
 * @method $this            unsetUserDigged()
 * @method $this            unsetVideo()
 * @method $this            unsetVideoControl()
 * @method $this            unsetVideoLabels()
 * @method $this            unsetVideoText()
 * @method $this            unsetWithPromotionalMusic()
 * @method $this            unsetWithoutWatermark()
 */
class AwemeListItem extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'allow_gift'                    =>  'bool',
        'anchors'                       =>  'Anchor[]',
        'anchors_extras'                =>  'string',
        'author'                        =>  'User',
        'author_user_id'                =>  'int',
        'aweme_acl'                     =>  'AwemeAcl',
        'aweme_id'                      =>  'string',
        'aweme_type'                    =>  'int',
        'bodydance_score'               =>  'int',
        'cha_list'                      =>  'ChaListItem[]',
        'challenge_position'            =>  '',
        'cmt_swt'                       =>  'bool',
        'collect_stat'                  =>  'int',
        'commerce_config_data'          =>  '',
        'commerce_info'                 =>  'CommerceInfo',
        'content_desc'                  =>  'string',
        'content_desc_extra'            =>  '',
        'cover_labels'                  =>  '',
        'create_time'                   =>  'int',
        'desc'                          =>  'string',
        'desc_language'                 =>  'string',
        'disable_search_trending_bar'   =>  'bool',
        'distance'                      =>  'string',
        'distribute_type'               =>  'int',
        'follow_up_publish_from_id'     =>  'int',
        'geofencing'                    =>  '',
        'geofencing_regions'            =>  '',
        'green_screen_materials'        =>  '',
        'group_id'                      =>  'string',
        'group_id_list'                 =>  'GroupIdList',
        'has_vs_entry'                  =>  'bool',
        'have_dashboard'                =>  'bool',
        'hybrid_label'                  =>  '',
        'image_infos'                   =>  '',
        'interaction_stickers'          =>  '',
        'is_hash_tag'                   =>  'int',
        'is_pgcshow'                    =>  'bool',
        'is_preview'                    =>  'int',
        'is_relieve'                    =>  'bool',
        'is_top'                        =>  'int',
        'is_vr'                         =>  'bool',
        'item_comment_settings'         =>  'int',
        'item_duet'                     =>  'int',
        'item_react'                    =>  'int',
        'item_stitch'                   =>  'int',
        'label_top'                     =>  'LabelTop',
        'label_top_text'                =>  '',
        'long_video'                    =>  '',
        'mask_infos'                    =>  '',
        'misc_info'                     =>  '',
        'music'                         =>  'Music',
        'music_begin_time_in_ms'        =>  'int',
        'need_trim_step'                =>  'bool',
        'need_vs_entry'                 =>  'bool',
        'nickname_position'             =>  '',
        'origin_comment_ids'            =>  '',
        'playlist_blocked'              =>  'bool',
        'position'                      =>  '',
        'prevent_download'              =>  'bool',
        'products_info'                 =>  '',
        'question_list'                 =>  '',
        'rate'                          =>  'int',
        'region'                        =>  'string',
        'risk_infos'                    =>  'RiskInfos',
        'search_desc'                   =>  'string',
        'search_highlight'              =>  '',
        'share_info'                    =>  'ShareInfo',
        'share_url'                     =>  'string',
        'sort_label'                    =>  'string',
        'statistics'                    =>  'Statistics',
        'status'                        =>  'Status',
        'text_extra'                    =>  'TextExtra',
        'uniqid_position'               =>  '',
        'user_digged'                   =>  'int',
        'video'                         =>  'Video',
        'video_control'                 =>  'VideoControl',
        'video_labels'                  =>  '',
        'video_text'                    =>  '',
        'with_promotional_music'        =>  'bool',
        'without_watermark'             =>  'bool'
    ];
}
