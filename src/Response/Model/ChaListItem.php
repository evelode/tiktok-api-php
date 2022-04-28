<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * ChaListItem.
 * 
 * @method string       getAuthor()
 * @method mixed        getBannerList()
 * @method mixed        getChaAttrs()
 * @method string       getChaName()
 * @method string       getCid()
 * @method int          getCollectStat()
 * @method mixed        getConnectMusic()
 * @method string       getDesc()
 * @method ExtraAttr    getExtraAttr()
 * @method string       getHashtagProfile()
 * @method int          getIsChallenge()
 * @method bool         getIsCommerce()
 * @method bool         getIsPgcshow()
 * @method string       getSchema()
 * @method mixed        getSearchHighlight()
 * @method ShareInfo    getShareInfo()
 * @method mixed        getShowItems()
 * @method int          getSubType()
 * @method int          getType()
 * @method int          getUserCount()
 * @method int          getViewCount()
 * @method bool         isAuthor()
 * @method bool         isBannerList()
 * @method bool         isChaAttrs()
 * @method bool         isChaName()
 * @method bool         isCid()
 * @method bool         isCollectStat()
 * @method bool         isConnectMusic()
 * @method bool         isDesc()
 * @method bool         isExtraAttr()
 * @method bool         isHashtagProfile()
 * @method bool         isIsChallenge()
 * @method bool         isIsCommerce()
 * @method bool         isIsPgcshow()
 * @method bool         isSchema()
 * @method bool         isSearchHighlight()
 * @method bool         isShareInfo()
 * @method bool         isShowItems()
 * @method bool         isSubType()
 * @method bool         isType()
 * @method bool         isUserCount()
 * @method bool         isViewCount()
 * @method $this        setAuthor(User $value)
 * @method $this        setBannerList(mixed $value)
 * @method $this        setChaAttrs(mixed $value)
 * @method $this        setChaName(string $value)
 * @method $this        setCid(string $value)
 * @method $this        setCollectStat(int $value)
 * @method $this        setConnectMusic(mixed $value)
 * @method $this        setDesc(string $value)
 * @method $this        setExtraAttr(ExtraAttr $value)
 * @method $this        setHashtagProfile(string $value)
 * @method $this        setIsChallenge(int $value)
 * @method $this        setIsCommerce(bool $value)
 * @method $this        setIsPgcshow(bool $value)
 * @method $this        setSchema(string $value)
 * @method $this        setSearchHighlight(mixed $value)
 * @method $this        setShareInfo(ShareInfo $value)
 * @method $this        setShowItems(mixed $value)
 * @method $this        setSubType(int $value)
 * @method $this        setType(int $value)
 * @method $this        setUserCount(int $value)
 * @method $this        setViewCount(int $value)
 * @method $this        unsetAuthor()
 * @method $this        unsetBannerList()
 * @method $this        unsetChaAttrs()
 * @method $this        unsetChaName()
 * @method $this        unsetCid()
 * @method $this        unsetCollectStat()
 * @method $this        unsetConnectMusic()
 * @method $this        unsetDesc()
 * @method $this        unsetExtraAttr()
 * @method $this        unsetHashtagProfile()
 * @method $this        unsetIsChallenge()
 * @method $this        unsetIsCommerce()
 * @method $this        unsetIsPgcshow()
 * @method $this        unsetSchema()
 * @method $this        unsetSearchHighlight()
 * @method $this        unsetShareInfo()
 * @method $this        unsetShowItems()
 * @method $this        unsetSubType()
 * @method $this        unsetType()
 * @method $this        unsetUserCount()
 * @method $this        unsetViewCount()
 */
class ChaListItem extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'author'            =>  'User',
        'banner_list'       =>  '',
        'cha_attrs'         =>  '',
        'cha_name'          =>  'string',
        'cid'               =>  'string',
        'collect_stat'      =>  'int',
        'connect_music'     =>  '',
        'desc'              =>  'string',
        'extra_attr'        =>  'ExtraAttr',
        'hashtag_profile'   =>  'string',
        'is_challenge'      =>  'int',
        'is_commerce'       =>  'bool',
        'is_pgcshow'        =>  'bool',
        'schema'            =>  'string',
        'search_highlight'  =>  '',
        'share_info'        =>  'ShareInfo',
        'show_items'        =>  '',
        'sub_type'          =>  'int',
        'type'              =>  'int',
        'user_count'        =>  'int',
        'view_count'        =>  'int'
    ];
}
