<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * AwemeAcl.
 * 
 * @method DownloadGeneral      getDownloadGeneral()
 * @method DownloadMaskPanel    getDownloadMaskPanel()
 * @method int                  getShareListStatus()
 * @method ShareGeneral         getShareGeneral()
 * @method mixed                getPlatformList()
 * @method bool                 isDownloadGeneral()
 * @method bool                 isDownloadMaskPanel()
 * @method bool                 isShareListStatus()
 * @method bool                 isShareGeneral()
 * @method bool                 isPlatformList()
 * @method $this                setDownloadGeneral(DownloadGeneral $value)
 * @method $this                setDownloadMaskPanel(DownloadMaskPanel $value)
 * @method $this                setShareListStatus(int $value)
 * @method $this                setShareGeneral(ShareGeneral $value)
 * @method $this                setPlatformList(mixed $value)
 * @method $this                unsetDownloadGeneral()
 * @method $this                unsetDownloadMaskPanel()
 * @method $this                unsetShareListStatus()
 * @method $this                unsetShareGeneral()
 * @method $this                unsetPlatformList()
 */
class AwemeAcl extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'download_general'      => 'DownloadGeneral',
        'download_mask_panel'   => 'DownloadMaskPanel',
        'share_list_status'     => 'int',
        'share_general'         => 'ShareGeneral',
        'platform_list'         => ''
    ];
}
