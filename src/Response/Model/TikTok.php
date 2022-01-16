<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * TikTok.
 *
 * @method string getId()
 * @method string getUrl()
 * @method bool   isId()
 * @method bool   isUrl()
 * @method $this  setId(string $value)
 * @method $this  setUrl(string $value)
 * @method $this  unsetId()
 * @method $this  unsetUrl()
 */
class TikTok extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'id'                    => 'string',
        'url'                   => 'string'
    ];
}
