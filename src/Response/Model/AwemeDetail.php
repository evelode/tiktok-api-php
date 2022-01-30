<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * AwemeDetail.
 * 
 * @method Statistics           getStatistics()
 * @method bool                 getIsVr()
 * @method string               getSortLabel()
 * @method bool                 getIsPgcshow()
 * @method mixed                getMiscInfo()
 * @method bool                 getNeedVsEntry()
 * @method Anchor[]             getAnchors()
 * @method string               getContentDesc()
 * @method int                  getRate()
 * @method bool                 getIsRelieve()
 * @method string               getGroupId()
 * @method bool                 getPreventDownload()
 * @method int                  getDistributeType()
 * @method bool                 getPlaylistBlocked()
 * @method bool                 getCmtSwt()
 * @method LabelTop             getLabelTop()
 * @method ShareInfo            getShareInfo()
 * @method string               getRegion()
 * @method string               getStickers()
 * @method int                  getItemCommentSettings()
 * @method StickerDetail        getStickerDetail()
 * @method CommerceInfo         getCommerceInfo()
 * @method string               getDesc()
 * @method int                  getItemStitch()
 * @method int                  getIsHashTag()
 * @method int                  getCollectStat()
 * @method int                  getItemDuet()
 * @method string               getDescLanguage()
 * @method VideoControl         getVideoControl()
 * @method bool                 getHasVsEntry()
 * @method AwemeAcl             getAwemeAcl()
 * @method RiskInfos            getRiskInfos()
 * @method string               getShareUrl()
 * @method Author               getAuthor()
 * @method Status               getStatus()
 * @method int                  getIsTop()
 * @method int                  getAwemeType()
 * @method int                  getAuthorUserId()
 * @method int                  getBodydanceScore()
 * @method int                  getCreateTime()
 * @method Music                getMusic()
 * @method Video                getVideo()
 * @method int                  getUserDigged()
 * @method string               getDistance()
 * @method bool                 getIsAds()
 * @method bool                 getWithoutWatermark()
 * @method int                  getFollowUpPublishFromId()
 * @method string               getAwemeId() 
 * @method bool                 isStatistics()
 * @method bool                 isIsVr()
 * @method bool                 isSortLabel()
 * @method bool                 isIsPgcshow()
 * @method bool                 isMiscInfo()
 * @method bool                 isNeedVsEntry()
 * @method bool                 isAnchors()
 * @method bool                 isContentDesc()
 * @method bool                 isRate()
 * @method bool                 isIsRelieve()
 * @method bool                 isGroupId()
 * @method bool                 isPreventDownload()
 * @method bool                 isDistributeType()
 * @method bool                 isPlaylistBlocked()
 * @method bool                 isCmtSwt()
 * @method bool                 isLabelTop()
 * @method bool                 isShareInfo()
 * @method bool                 isRegion()
 * @method bool                 isStickers()
 * @method bool                 isItemCommentSettings()
 * @method bool                 isStickerDetail()
 * @method bool                 isCommerceInfo()
 * @method bool                 isDesc()
 * @method bool                 isItemStitch()
 * @method bool                 isIsHashTag()
 * @method bool                 isCollectStat()
 * @method bool                 isItemDuet()
 * @method bool                 isDescLanguage()
 * @method bool                 isVideoControl()
 * @method bool                 isHasVsEntry()
 * @method bool                 isAwemeAcl()
 * @method bool                 isRiskInfos()
 * @method bool                 isShareUrl()
 * @method bool                 isAuthor()
 * @method bool                 isStatus()
 * @method bool                 isIsTop()
 * @method bool                 isAwemeType()
 * @method bool                 isAuthorUserId()
 * @method bool                 isBodydanceScore()
 * @method bool                 isCreateTime()
 * @method bool                 isMusic()
 * @method bool                 isVideo()
 * @method bool                 isUserDigged()
 * @method bool                 isDistance()
 * @method bool                 isIsAds()
 * @method bool                 isWithoutWatermark()
 * @method bool                 isFollowUpPublishFromId()
 * @method bool                 isAwemeId()
 * @method $this                setStatistics(Statistics $value)
 * @method $this                setIsVr(bool $value)
 * @method $this                setSortLabel(string $value)
 * @method $this                setIsPgcshow(bool $value)
 * @method $this                setMiscInfo(mixed $value)
 * @method $this                setNeedVsEntry(bool $value)
 * @method $this                setAnchors(Anchor[] $value)
 * @method $this                setContentDesc(string $value)
 * @method $this                setRate(int $value)
 * @method $this                setIsRelieve(bool $value)
 * @method $this                setGroupId(string $value)
 * @method $this                setPreventDownload(bool $value)
 * @method $this                setDistributeType(int $value)
 * @method $this                setPlaylistBlocked(bool $value)
 * @method $this                setCmtSwt(bool $value)
 * @method $this                setLabelTop(LabelTop $value)
 * @method $this                setShareInfo(ShareInfo $value)
 * @method $this                setRegion(string $value)
 * @method $this                setStickers(string $value)
 * @method $this                setItemCommentSettings(int $value)
 * @method $this                setStickerDetail(StickerDetail $value)
 * @method $this                setCommerceInfo(CommerceInfo $value)
 * @method $this                setDesc(string $value)
 * @method $this                setItemStitch(int $value)
 * @method $this                setIsHashTag(int $value)
 * @method $this                setCollectStat(int $value)
 * @method $this                setItemDuet(int $value)
 * @method $this                setDescLanguage(string $value)
 * @method $this                setVideoControl(VideoControl $value)
 * @method $this                setHasVsEntry(bool $value)
 * @method $this                setAwemeAcl(AwemeAcl $value)
 * @method $this                setRiskInfos(RiskInfos $value)
 * @method $this                setShareUrl(string $value)
 * @method $this                setAuthor(Author $value)
 * @method $this                setStatus(Status $value)
 * @method $this                setIsTop(int $value)
 * @method $this                setAwemeType(int $value)
 * @method $this                setAuthorUserId(int $value)
 * @method $this                setBodydanceScore(int $value)
 * @method $this                setCreateTime(int $value)
 * @method $this                setMusic(Music $value)
 * @method $this                setVideo(Video $value)
 * @method $this                setUserDigged(int $value)
 * @method $this                setDistance(string $value)
 * @method $this                setIsAds(bool $value)
 * @method $this                setWithoutWatermark(bool $value)
 * @method $this                setFollowUpPublishFromId(int $value)
 * @method $this                setAwemeId(string $value) 
 * @method $this                unsetStatistics()
 * @method $this                unsetIsVr()
 * @method $this                unsetSortLabel()
 * @method $this                unsetIsPgcshow()
 * @method $this                unsetMiscInfo()
 * @method $this                unsetNeedVsEntry()
 * @method $this                unsetAnchors()
 * @method $this                unsetContentDesc()
 * @method $this                unsetRate()
 * @method $this                unsetIsRelieve()
 * @method $this                unsetGroupId()
 * @method $this                unsetPreventDownload()
 * @method $this                unsetDistributeType()
 * @method $this                unsetPlaylistBlocked()
 * @method $this                unsetCmtSwt()
 * @method $this                unsetLabelTop()
 * @method $this                unsetShareInfo()
 * @method $this                unsetRegion()
 * @method $this                unsetStickers()
 * @method $this                unsetItemCommentSettings()
 * @method $this                unsetStickerDetail()
 * @method $this                unsetCommerceInfo()
 * @method $this                unsetDesc()
 * @method $this                unsetItemStitch()
 * @method $this                unsetIsHashTag()
 * @method $this                unsetCollectStat()
 * @method $this                unsetItemDuet()
 * @method $this                unsetDescLanguage()
 * @method $this                unsetVideoControl()
 * @method $this                unsetHasVsEntry()
 * @method $this                unsetAwemeAcl()
 * @method $this                unsetRiskInfos()
 * @method $this                unsetShareUrl()
 * @method $this                unsetAuthor()
 * @method $this                unsetStatus()
 * @method $this                unsetIsTop()
 * @method $this                unsetAwemeType()
 * @method $this                unsetAuthorUserId()
 * @method $this                unsetBodydanceScore()
 * @method $this                unsetCreateTime()
 * @method $this                unsetMusic()
 * @method $this                unsetVideo()
 * @method $this                unsetUserDigged()
 * @method $this                unsetDistance()
 * @method $this                unsetIsAds()
 * @method $this                unsetWithoutWatermark()
 * @method $this                unsetFollowUpPublishFromId()
 * @method $this                unsetAwemeId()
 */
class AwemeDetail extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'statistics'                =>  'Statistics',
        'is_vr'                     =>  'bool',
        'sort_label'                =>  'string',
        'is_pgcshow'                =>  'bool',
        'misc_info'                 =>  '',
        'need_vs_entry'             =>  'bool',
        'anchors'                   =>  'Anchor[]',
        'content_desc'              =>  'string',
        'rate'                      =>  'int',
        'is_relieve'                =>  'bool',
        'group_id'                  =>  'string',
        'prevent_download'          =>  'bool',
        'distribute_type'           =>  'int',
        'playlist_blocked'          =>  'bool',
        'cmt_swt'                   =>  'bool',
        'label_top'                 =>  'LabelTop',
        'share_info'                =>  'ShareInfo',
        'region'                    =>  'string',
        'stickers'                  =>  'string',
        'item_comment_settings'     =>  'int',
        'sticker_detail'            =>  'StickerDetail',
        'commerce_info'             =>  'CommerceInfo',
        'desc'                      =>  'string',
        'item_stitch'               =>  'int',
        'is_hash_tag'               =>  'int',
        'collect_stat'              =>  'int',
        'item_duet'                 =>  'int',
        'desc_language'             =>  'string',
        'video_control'             =>  'VideoControl',
        'has_vs_entry'              =>  'bool',
        'aweme_acl'                 =>  'AwemeAcl',
        'risk_infos'                =>  'RiskInfos',
        'share_url'                 =>  'string',
        'author'                    =>  'Author',
        'status'                    =>  'Status',
        'is_top'                    =>  'int',
        'aweme_type'                =>  'int',
        'author_user_id'            =>  'int',
        'bodydance_score'           =>  'int',
        'create_time'               =>  'int',
        'music'                     =>  'Music',
        'video'                     =>  'Video',
        'user_digged'               =>  'int',
        'distance'                  =>  'string',
        'is_ads'                    =>  'bool',
        'without_watermark'         =>  'bool',
        'follow_up_publish_from_id' =>  'int',
        'aweme_id'                  =>  'string'
    ];
}
