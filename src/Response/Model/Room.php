<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * @method string getId()
 * @method string getTitle()
 * @method int getUserCount()
 * Room.
 * 
 * @method bool     getHasCommerceGoods()
 * @method bool     getIsBattle()
 * @method bool     isHasCommerceGoods()
 * @method bool     isIsBattle()
 * @method $this    setHasCommerceGoods(bool $value)
 * @method $this    setIsBattle(bool $value)
 * @method $this    unsetHasCommerceGoods()
 * @method $this    unsetIsBattle()
 * 
 */
class Room extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'id' => 'string',
        'title' => 'string',
        'user_count' => 'int',

        'has_commerce_goods'  => 'bool',
        'is_battle'           => 'bool'
    ];
}
