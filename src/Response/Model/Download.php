<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * Download.
 * 
 * @method string   getUri()
 * @method string[] getUrlList()
 * @method int      getWidth()
 * @method int      getHeight()
 * @method int      getDataSize()
 * @method bool     isUri()
 * @method bool     isUrlList()
 * @method bool     isWidth()
 * @method bool     isHeight()
 * @method bool     isDataSize()
 * @method $this    setUri(string $value)
 * @method $this    setUrlList(string[] $value)
 * @method $this    setWidth(int $value)
 * @method $this    setHeight(int $value)
 * @method $this    setDataSize(int $value)
 * @method $this    unsetUri()
 * @method $this    unsetUrlList()
 * @method $this    unsetWidth()
 * @method $this    unsetHeight()
 * @method $this    unsetDataSize()
 */
class Download extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'uri'       => 'string',
        'url_list'  => 'string[]',
        'width'     => 'int',
        'height'    => 'int',
        'data_size' => 'int',
    ];
}
