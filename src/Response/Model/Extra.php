<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * Extra.
 * 
 * @method int      getEnd()
 * @method string   getHashtagId()
 * @method string   getHashtagName()
 * @method bool     getIsCommerce()
 * @method int      getStart()
 * @method int      getType()
 * @method bool     isEnd()
 * @method bool     isHashtagId()
 * @method bool     isHashtagName()
 * @method bool     isIsCommerce()
 * @method bool     isStart()
 * @method bool     isType()
 * @method $this    setEnd(int $value)
 * @method $this    setHashtagId(string $value)
 * @method $this    setHashtagName(string $value)
 * @method $this    setIsCommerce(bool $value)
 * @method $this    setStart(int $value)
 * @method $this    setType(int $value)
 * @method $this    unsetEnd()
 * @method $this    unsetHashtagId()
 * @method $this    unsetHashtagName()
 * @method $this    unsetIsCommerce()
 * @method $this    unsetStart()
 * @method $this    unsetType()
 */
class Extra extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'end'           =>  'int',
        'hashtag_id'    =>  'string',
        'hashtag_name'  =>  'string',
        'is_commerce'   =>  'bool',
        'start'         =>  'int',
        'type'          =>  'int'
    ];
}
