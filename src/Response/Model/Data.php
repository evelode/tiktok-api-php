<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * @method AwemeDetail getAwemeInfo()
 * @method mixed getData()
 * Data.
 * 
 * @method int      getType()
 * @method Lives    getLives()
 * @method bool     isType()
 * @method bool     isLives()
 * @method $this    setType(int $value)
 * @method $this    setLives(Lives $value)
 * @method $this    unsetType()
 * @method $this    unsetLives()
 */
class Data extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'aweme_info' => 'AwemeDetail',
        'data' => '',

        'type'  => 'int',
        'lives' => 'Lives'
    ];
}
