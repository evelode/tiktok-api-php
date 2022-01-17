<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * VideoControl.
 * 
 * @method int      getShareType()
 * @method int      getDraftProgressBar()
 * @method int      getTimerStatus()
 * @method bool     getAllowStitch()
 * @method bool     getAllowDownload()
 * @method int      getShowProgressBar()
 * @method bool     getAllowDuet()
 * @method bool     getAllowReact()
 * @method int      getPreventDownloadType()
 * @method bool     getAllowDynamicWallpaper()
 * @method bool     getAllowMusic()
 * @method bool     isShareType()
 * @method bool     isDraftProgressBar()
 * @method bool     isTimerStatus()
 * @method bool     isAllowStitch()
 * @method bool     isAllowDownload()
 * @method bool     isShowProgressBar()
 * @method bool     isAllowDuet()
 * @method bool     isAllowReact()
 * @method bool     isPreventDownloadType()
 * @method bool     isAllowDynamicWallpaper()
 * @method bool     isAllowMusic()
 * @method $this    setShareType(int $value)
 * @method $this    setDraftProgressBar(int $value)
 * @method $this    setTimerStatus(int $value)
 * @method $this    setAllowStitch(bool $value)
 * @method $this    setAllowDownload(bool $value)
 * @method $this    setShowProgressBar(int $value)
 * @method $this    setAllowDuet(bool $value)
 * @method $this    setAllowReact(bool $value)
 * @method $this    setPreventDownloadType(int $value)
 * @method $this    setAllowDynamicWallpaper(bool $value)
 * @method $this    setAllowMusic(bool $value)
 * @method $this    unsetShareType()
 * @method $this    unsetDraftProgressBar()
 * @method $this    unsetTimerStatus()
 * @method $this    unsetAllowStitch()
 * @method $this    unsetAllowDownload()
 * @method $this    unsetShowProgressBar()
 * @method $this    unsetAllowDuet()
 * @method $this    unsetAllowReact()
 * @method $this    unsetPreventDownloadType()
 * @method $this    unsetAllowDynamicWallpaper()
 * @method $this    unsetAllowMusic()
 */
class VideoControl extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'share_type'                =>  'int',
        'draft_progress_bar'        =>  'int',
        'timer_status'              =>  'int',
        'allow_stitch'              =>  'bool',
        'allow_download'            =>  'bool',
        'show_progress_bar'         =>  'int',
        'allow_duet'                =>  'bool',
        'allow_react'               =>  'bool',
        'prevent_download_type'     =>  'int',
        'allow_dynamic_wallpaper'   =>  'bool',
        'allow_music'               =>  'bool'
    ];
}
