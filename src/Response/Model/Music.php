<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * Music.
 * 
 * @method Media            getAvatarMedium()
 * @method mixed            getTagList()
 * @method int              getVideoDuration()
 * @method Media            getCoverLarge()
 * @method mixed            getPosition()
 * @method string           getSecUid()
 * @method Media            getStrongBeatUrl()
 * @method int              getId()
 * @method string           getOwnerNickname()
 * @method int              getBindedChallengeId()
 * @method int              getDuration()
 * @method int              getShootDuration()
 * @method bool             getMuteShare()
 * @method bool             getIsAuthorArtist()
 * @method MatchedSong      getMatchedSong()
 * @method string           getIdStr()
 * @method string           getAuthor()
 * @method string           getAlbum()
 * @method bool             getIsOriginal()
 * @method bool             getAuthorDeleted()
 * @method mixed            getAuthorPosition()
 * @method bool             getPreventDownload()
 * @method bool             getIsPgc()
 * @method Media            getCoverMedium()
 * @method Media            getPlayUrl()
 * @method int              getSourcePlatform()
 * @method string           getOwnerId()
 * @method Media            getAvatarThumb()
 * @method int              getPreviewStartTime()
 * @method int              getPreviewEndTime()
 * @method Media            getCoverThumb()
 * @method int              getUserCount()
 * @method int              getStatus()
 * @method string           getOwnerHandle()
 * @method int              getAuditionDuration()
 * @method string           getTitle()
 * @method int              getCollectStat()
 * @method string           getOfflineDesc()
 * @method bool             getIsCommerceMusic()
 * @method Artist[]         getArtists()
 * @method bool             getIsMatchedMetadata()
 * @method MatchedPgcSound  getMatchedPgcSound()
 * @method mixed            getExtra()
 * @method string           getMid()
 * @method ExternalSongInfo getExternalSongInfo()
 * @method bool             getIsAudioUrlWithCookie()
 * @method bool             getIsOriginalSound()
 * @method mixed            getLyricShortPosition()
 * @method bool             getDmvAutoShow()
 * @method bool             isAvatarMedium()
 * @method bool             isTagList()
 * @method bool             isVideoDuration()
 * @method bool             isCoverLarge()
 * @method bool             isPosition()
 * @method bool             isSecUid()
 * @method bool             isStrongBeatUrl()
 * @method bool             isId()
 * @method bool             isOwnerNickname()
 * @method bool             isBindedChallengeId()
 * @method bool             isDuration()
 * @method bool             isShootDuration()
 * @method bool             isMuteShare()
 * @method bool             isIsAuthorArtist()
 * @method bool             isMatchedSong()
 * @method bool             isIdStr()
 * @method bool             isAuthor()
 * @method bool             isAlbum()
 * @method bool             isIsOriginal()
 * @method bool             isAuthorDeleted()
 * @method bool             isAuthorPosition()
 * @method bool             isPreventDownload()
 * @method bool             isIsPgc()
 * @method bool             isCoverMedium()
 * @method bool             isPlayUrl()
 * @method bool             isSourcePlatform()
 * @method bool             isOwnerId()
 * @method bool             isAvatarThumb()
 * @method bool             isPreviewStartTime()
 * @method bool             isPreviewEndTime()
 * @method bool             isCoverThumb()
 * @method bool             isUserCount()
 * @method bool             isStatus()
 * @method bool             isOwnerHandle()
 * @method bool             isAuditionDuration()
 * @method bool             isTitle()
 * @method bool             isCollectStat()
 * @method bool             isOfflineDesc()
 * @method bool             isIsCommerceMusic()
 * @method bool             isArtists()
 * @method bool             isIsMatchedMetadata()
 * @method bool             isMatchedPgcSound()
 * @method bool             isExtra()
 * @method bool             isMid()
 * @method bool             isExternalSongInfo()
 * @method bool             isIsAudioUrlWithCookie()
 * @method bool             isIsOriginalSound()
 * @method bool             isLyricShortPosition()
 * @method bool             isDmvAutoShow()
 * @method $this            setAvatarMedium(Media $value)
 * @method $this            setTagList(mixed $value)
 * @method $this            setVideoDuration(int $value)
 * @method $this            setCoverLarge(Media $value)
 * @method $this            setPosition(mixed $value)
 * @method $this            setSecUid(string $value)
 * @method $this            setStrongBeatUrl(Media $value)
 * @method $this            setId(int $value)
 * @method $this            setOwnerNickname(string $value)
 * @method $this            setBindedChallengeId(int $value)
 * @method $this            setDuration(int $value)
 * @method $this            setShootDuration(int $value)
 * @method $this            setMuteShare(bool $value)
 * @method $this            setIsAuthorArtist(bool $value)
 * @method $this            setMatchedSong(MatchedSong $value)
 * @method $this            setIdStr(string $value)
 * @method $this            setAuthor(string $value)
 * @method $this            setAlbum(string $value)
 * @method $this            setIsOriginal(bool $value)
 * @method $this            setAuthorDeleted(bool $value)
 * @method $this            setAuthorPosition(mixed $value)
 * @method $this            setPreventDownload(bool $value)
 * @method $this            setIsPgc(bool $value)
 * @method $this            setCoverMedium(Media $value)
 * @method $this            setPlayUrl(Media $value)
 * @method $this            setSourcePlatform(int $value)
 * @method $this            setOwnerId(string $value)
 * @method $this            setAvatarThumb(Media $value)
 * @method $this            setPreviewStartTime(int $value)
 * @method $this            setPreviewEndTime(int $value)
 * @method $this            setCoverThumb(Media $value)
 * @method $this            setUserCount(int $value)
 * @method $this            setStatus(int $value)
 * @method $this            setOwnerHandle(string $value)
 * @method $this            setAuditionDuration(int $value)
 * @method $this            setTitle(string $value)
 * @method $this            setCollectStat(int $value)
 * @method $this            setOfflineDesc(string $value)
 * @method $this            setIsCommerceMusic(bool $value)
 * @method $this            setArtists(Artist[] $value)
 * @method $this            setIsMatchedMetadata(bool $value)
 * @method $this            setMatchedPgcSound(MatchedPgcSound $value)
 * @method $this            setExtra(mixed $value)
 * @method $this            setMid(string $value)
 * @method $this            setExternalSongInfo(ExternalSongInfo $value)
 * @method $this            setIsAudioUrlWithCookie(bool $value)
 * @method $this            setIsOriginalSound(bool $value)
 * @method $this            setLyricShortPosition(mixed $value)
 * @method $this            setDmvAutoShow(bool $value)
 * @method $this            unsetAvatarMedium()
 * @method $this            unsetTagList()
 * @method $this            unsetVideoDuration()
 * @method $this            unsetCoverLarge()
 * @method $this            unsetPosition()
 * @method $this            unsetSecUid()
 * @method $this            unsetStrongBeatUrl()
 * @method $this            unsetId()
 * @method $this            unsetOwnerNickname()
 * @method $this            unsetBindedChallengeId()
 * @method $this            unsetDuration()
 * @method $this            unsetShootDuration()
 * @method $this            unsetMuteShare()
 * @method $this            unsetIsAuthorArtist()
 * @method $this            unsetMatchedSong()
 * @method $this            unsetIdStr()
 * @method $this            unsetAuthor()
 * @method $this            unsetAlbum()
 * @method $this            unsetIsOriginal()
 * @method $this            unsetAuthorDeleted()
 * @method $this            unsetAuthorPosition()
 * @method $this            unsetPreventDownload()
 * @method $this            unsetIsPgc()
 * @method $this            unsetCoverMedium()
 * @method $this            unsetPlayUrl()
 * @method $this            unsetSourcePlatform()
 * @method $this            unsetOwnerId()
 * @method $this            unsetAvatarThumb()
 * @method $this            unsetPreviewStartTime()
 * @method $this            unsetPreviewEndTime()
 * @method $this            unsetCoverThumb()
 * @method $this            unsetUserCount()
 * @method $this            unsetStatus()
 * @method $this            unsetOwnerHandle()
 * @method $this            unsetAuditionDuration()
 * @method $this            unsetTitle()
 * @method $this            unsetCollectStat()
 * @method $this            unsetOfflineDesc()
 * @method $this            unsetIsCommerceMusic()
 * @method $this            unsetArtists()
 * @method $this            unsetIsMatchedMetadata()
 * @method $this            unsetMatchedPgcSound()
 * @method $this            unsetExtra()
 * @method $this            unsetMid()
 * @method $this            unsetExternalSongInfo()
 * @method $this            unsetIsAudioUrlWithCookie()
 * @method $this            unsetIsOriginalSound()
 * @method $this            unsetLyricShortPosition()
 * @method $this            unsetDmvAutoShow()
 */
class Music extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'avatar_medium'             => 'Media',
        'tag_list'                  => '',
        'video_duration'            => 'int',
        'cover_large'               => 'Media',
        'position'                  => '',
        'sec_uid'                   => 'string',
        'strong_beat_url'           => 'Media',
        'id'                        => 'int',
        'owner_nickname'            => 'string',
        'binded_challenge_id'       => 'int',
        'duration'                  => 'int',
        'shoot_duration'            => 'int',
        'mute_share'                => 'bool',
        'is_author_artist'          => 'bool',
        'matched_song'              => 'MatchedSong',
        'id_str'                    => 'string',
        'author'                    => 'string',
        'album'                     => 'string',
        'is_original'               => 'bool',
        'author_deleted'            => 'bool',
        'author_position'           => '',
        'prevent_download'          => 'bool',
        'is_pgc'                    => 'bool',
        'cover_medium'              => 'Media',
        'play_url'                  => 'Media',
        'source_platform'           => 'int',
        'owner_id'                  => 'string',
        'avatar_thumb'              => 'Media',
        'preview_start_time'        => 'int',
        'preview_end_time'          => 'int',
        'cover_thumb'               => 'Media',
        'user_count'                => 'int',
        'status'                    => 'int',
        'owner_handle'              => 'string',
        'audition_duration'         => 'int',
        'title'                     => 'string',
        'collect_stat'              => 'int',
        'offline_desc'              => 'string',
        'is_commerce_music'         => 'bool',
        'artists'                   => 'Artist[]',
        'is_matched_metadata'       => 'bool',
        'matched_pgc_sound'         => 'MatchedPgcSound',
        'extra'                     => '',
        'mid'                       => 'string',
        'external_song_info'        => 'ExternalSongInfo[]',
        'is_audio_url_with_cookie'  => 'bool',
        'is_original_sound'         => 'bool',
        'lyric_short_position'      => '',
        'dmv_auto_show'             => 'bool',
    ];
}
