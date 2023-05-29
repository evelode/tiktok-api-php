<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
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
        'type'  => 'int',
        'lives' => 'Lives'
    ];
}
