<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * ExtraAttr.
 * 
 * @method string   getIsLive()
 * @method bool     isIsLive()
 * @method $this    setIsLive(bool $value)
 * @method $this    unsetIsLive()
 */
class ExtraAttr extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'is_live' => 'bool'
    ];
}
