<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * MusicSearchItem.
 * 
 * @method int              getId()
 * @method string           getIdStr()
 * @method string           getTitle()
 * @method string           getAuthor()
 * @method string           getAlbum()
 * @method Media            getCoverLarge()
 * @method Media            getCoverMedium()
 * @method Media            getCoverThumb()
 * @method Media            getPlayUrl()
 * @method int              getSourcePlatform()
 * @method int              getDuration()
 * @method mixed            getExtra()
 * @method int              getUserCount()
 * @method mixed            getPosition()
 * @method int              getCollectStat()
 * @method int              getStatus()
 * @method string           getOfflineDesc()
 * @method string           getOwnerNickname()
 * @method bool             isId()
 * @method bool             isIdStr()
 * @method bool             isTitle()
 * @method bool             isAuthor()
 * @method bool             isAlbum()
 * @method bool             isCoverLarge()
 * @method bool             isCoverMedium()
 * @method bool             isCoverThumb()
 * @method bool             isPlayUrl()
 * @method bool             isSourcePlatform()
 * @method bool             isDuration()
 * @method bool             isExtra()
 * @method bool             isUserCount()
 * @method bool             isPosition()
 * @method bool             isCollectStat()
 * @method bool             isStatus()
 * @method bool             isOfflineDesc()
 * @method bool             isOwnerNickname()
 * @method $this            setId(int $value)
 * @method $this            setIdStr(string $value)
 * @method $this            setTitle(string $value)
 * @method $this            setAuthor(string $value)
 * @method $this            setAlbum(string $value)
 * @method $this            setCoverLarge(Media $value)
 * @method $this            setCoverMedium(Media $value)
 * @method $this            setCoverThumb(Media $value)
 * @method $this            setPlayUrl(Media $value)
 * @method $this            setSourcePlatform(int $value)
 * @method $this            setDuration(int $value)
 * @method $this            setExtra(mixed $value)
 * @method $this            setUserCount(int $value)
 * @method $this            setPosition(mixed $value)
 * @method $this            setCollectStat(int $value)
 * @method $this            setStatus(int $value)
 * @method $this            setOfflineDesc(string $value)
 * @method $this            setOwnerNickname(string $value)
 * @method $this            unsetId()
 * @method $this            unsetIdStr()
 * @method $this            unsetTitle()
 * @method $this            unsetAuthor()
 * @method $this            unsetAlbum()
 * @method $this            unsetCoverLarge()
 * @method $this            unsetCoverMedium()
 * @method $this            unsetCoverThumb()
 * @method $this            unsetPlayUrl()
 * @method $this            unsetSourcePlatform()
 * @method $this            unsetDuration()
 * @method $this            unsetExtra()
 * @method $this            unsetUserCount()
 * @method $this            unsetPosition()
 * @method $this            unsetCollectStat()
 * @method $this            unsetStatus()
 * @method $this            unsetOfflineDesc()
 * @method $this            unsetOwnerNickname()
 */
class MusicSearchItem extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'id'                => 'int',
        'id_str'            => 'string',
        'title'             => 'string',
        'author'            => 'string',
        'album'             => 'string',
        'cover_large'       => 'Media',
        'cover_medium'      => 'Media',
        'cover_thumb'       => 'Media',
        'play_url'          => 'Media',
        'source_platform'   => 'int',
        'duration'          => 'int',
        'extra'             => '',
        'user_count'        => 'int',
        'position'          => '',
        'collect_stat'      => 'int',
        'status'            => 'int',
        'offline_desc'      => 'string',
        'owner_nickname'    => 'string',
    ];
}
