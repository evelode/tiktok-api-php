<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * Position.
 * 
 * @method int      getBegin()
 * @method int      getEnd()
 * @method bool     isBegin()
 * @method bool     isEnd()
 * @method $this    setBegin(int $value)
 * @method $this    setEnd(int $value)
 * @method $this    unsetBegin()
 * @method $this    unsetEnd()
 */
class Position extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'begin' =>  'int',
        'end'   =>  'int'
    ];
}
