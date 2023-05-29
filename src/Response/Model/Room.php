<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
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
        'has_commerce_goods'  => 'bool',
        'is_battle'           => 'bool'
    ];
}
