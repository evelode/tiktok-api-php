<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * DownloadMaskPanel.
 * 
 * @method int      getCode()
 * @method int      getShowType()
 * @method int      getTranscode()
 * @method bool     getMute()
 * @method string   getExtra()
 * @method bool     isCode()
 * @method bool     isShowType()
 * @method bool     isTranscode()
 * @method bool     isMute()
 * @method bool     isExtra()
 * @method $this    setCode(int $value)
 * @method $this    setShowType(int $value)
 * @method $this    setTranscode(int $value)
 * @method $this    setMute(bool $value)
 * @method $this    setExtra(string $value)
 * @method $this    unsetCode()
 * @method $this    unsetShowType()
 * @method $this    unsetTranscode()
 * @method $this    unsetMute()
 * @method $this    unsetExtra()
 */
class DownloadMaskPanel extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'code'      => 'int',
        'show_type' => 'int',
        'transcode' => 'int',
        'mute'      => 'bool',
        'extra'     => 'string'
    ];
}
