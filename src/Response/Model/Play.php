<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * Play.
 * 
 * @method string   getUri()
 * @method string[] getUrlList()
 * @method int      getWidth()
 * @method int      getHeight()
 * @method string   getUrlKey()
 * @method int      getDataSize()
 * @method string   getFileHash()
 * @method string   getFileCs()
 * @method bool     isUri()
 * @method bool     isUrlList()
 * @method bool     isWidth()
 * @method bool     isHeight()
 * @method bool     isUrlKey()
 * @method bool     isDataSize()
 * @method bool     isFileHash()
 * @method bool     isFileCs()
 * @method $this    setUri(string $value)
 * @method $this    setUrlList(string[] $value)
 * @method $this    setWidth(int $value)
 * @method $this    setHeight(int $value)
 * @method $this    setUrlKey(string $value)
 * @method $this    setDataSize(int $value)
 * @method $this    setFileHash(string $value)
 * @method $this    setFileCs(string $value)
 * @method $this    unsetUri()
 * @method $this    unsetUrlList()
 * @method $this    unsetWidth()
 * @method $this    unsetHeight()
 * @method $this    unsetUrlKey()
 * @method $this    unsetDataSize()
 * @method $this    unsetFileHash()
 * @method $this    unsetFileCs()
 */
class Play extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'uri'       => 'string',
        'url_list'  => 'string[]',
        'width'     => 'int',
        'height'    => 'int',
        'url_key'   => 'string',
        'data_size' => 'int',
        'file_hash' => 'string',
        'file_cs'   => 'string'
    ];
}
