<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * Video.
 * 
 * @method bool         getHasWatermark()
 * @method Play         getPlayAddrH264()
 * @method bool         getNeedSetToken()
 * @method mixed        getTags()
 * @method Play         getPlayAddrBytevc1()
 * @method string       getRatio()
 * @method Download     getDownloadAddr()
 * @method BitRate[]    getBitRate()
 * @method int          getDuration()
 * @method int          getCdnUrlExpired()
 * @method mixed        getMiscDownloadAddrs()
 * @method mixed        getMeta()
 * @method Media        getCover()
 * @method string       getHeight()
 * @method Media        getAnimatedCover()
 * @method bool         getIsCallback()
 * @method mixed        getBigThumbs()
 * @method Media        getAiDynamicCover()
 * @method Media        getAiDynamicCoverBak()
 * @method Play         getPlayAddr()
 * @method int          getWidth()
 * @method Media        getDynamicCover()
 * @method Media        getOriginCover()
 * @method int          getIsBytevc1()
 * @method mixed        getCoverTsp()
 * @method bool         isHasWatermark()
 * @method bool         isPlayAddrH264()
 * @method bool         isNeedSetToken()
 * @method bool         isTags()
 * @method bool         isPlayAddrBytevc1()
 * @method bool         isRatio()
 * @method bool         isDownloadAddr()
 * @method bool         isBitRate()
 * @method bool         isDuration()
 * @method bool         isCdnUrlExpired()
 * @method bool         isMiscDownloadAddrs()
 * @method bool         isMeta()
 * @method bool         isCover()
 * @method bool         isHeight()
 * @method bool         isAnimatedCover()
 * @method bool         isIsCallback()
 * @method bool         isBigThumbs()
 * @method bool         isAiDynamicCover()
 * @method bool         isAiDynamicCoverBak()
 * @method bool         isPlayAddr()
 * @method bool         isWidth()
 * @method bool         isDynamicCover()
 * @method bool         isOriginCover()
 * @method bool         isIsBytevc1()
 * @method bool         isCoverTsp()
 * @method $this        setHasWatermark(bool $value)
 * @method $this        setPlayAddrH264(Play $value)
 * @method $this        setNeedSetToken(bool $value)
 * @method $this        setTags(mixed $value)
 * @method $this        setPlayAddrBytevc1(Play $value)
 * @method $this        setRatio(string $value)
 * @method $this        setDownloadAddr(Download $value)
 * @method $this        setBitRate(BitRate[] $value)
 * @method $this        setDuration(int $value)
 * @method $this        setCdnUrlExpired(int $value)
 * @method $this        setMiscDownloadAddrs(mixed $value)
 * @method $this        setMeta(mixed $value)
 * @method $this        setCover(Media $value)
 * @method $this        setHeight(string $value)
 * @method $this        setAnimatedCover(Media $value)
 * @method $this        setIsCallback(bool $value)
 * @method $this        setBigThumbs(mixed $value)
 * @method $this        setAiDynamicCover(Media $value)
 * @method $this        setAiDynamicCoverBak(Media $value)
 * @method $this        setPlayAddr(Play $value)
 * @method $this        setWidth(int $value)
 * @method $this        setDynamicCover(Media $value)
 * @method $this        setOriginCover(Media $value)
 * @method $this        setIsBytevc1(int $value)
 * @method $this        setCoverTsp(mixed $value)
 * @method $this        unsetHasWatermark()
 * @method $this        unsetPlayAddrH264()
 * @method $this        unsetNeedSetToken()
 * @method $this        unsetTags()
 * @method $this        unsetPlayAddrBytevc1()
 * @method $this        unsetRatio()
 * @method $this        unsetDownloadAddr()
 * @method $this        unsetBitRate()
 * @method $this        unsetDuration()
 * @method $this        unsetCdnUrlExpired()
 * @method $this        unsetMiscDownloadAddrs()
 * @method $this        unsetMeta()
 * @method $this        unsetCover()
 * @method $this        unsetHeight()
 * @method $this        unsetAnimatedCover()
 * @method $this        unsetIsCallback()
 * @method $this        unsetBigThumbs()
 * @method $this        unsetAiDynamicCover()
 * @method $this        unsetAiDynamicCoverBak()
 * @method $this        unsetPlayAddr()
 * @method $this        unsetWidth()
 * @method $this        unsetDynamicCover()
 * @method $this        unsetOriginCover()
 * @method $this        unsetIsBytevc1()
 * @method $this        unsetCoverTsp()
 */
class Video extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'has_watermark'         =>  'bool',
        'play_addr_h264'        =>  'Play',
        'need_set_token'        =>  'bool',
        'tags'                  =>  '',
        'play_addr_bytevc1'     =>  'Play',
        'ratio'                 =>  'string',
        'download_addr'         =>  'Download',
        'bit_rate'              =>  'BitRate[]',
        'duration'              =>  'int',
        'cdn_url_expired'       =>  'int',
        'misc_download_addrs'   =>  '',
        'meta'                  =>  '',
        'cover'                 =>  'Media',
        'height'                =>  'string',
        'animated_cover'        =>  'Media',
        'is_callback'           =>  'bool',
        'big_thumbs'            =>  '',
        'ai_dynamic_cover'      =>  'Media',
        'ai_dynamic_cover_bak'  =>  'Media',
        'play_addr'             =>  'Play',
        'width'                 =>  'int',
        'dynamic_cover'         =>  'Media',
        'origin_cover'          =>  'Media',
        'is_bytevc1'            =>  'int',
        'CoverTsp'              =>  ''
    ];
}
