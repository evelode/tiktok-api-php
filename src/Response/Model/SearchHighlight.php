<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * SearchHighlight.
 * 
 * @method string       getField()
 * @method Position[]   getPosition()
 * @method bool         isField()
 * @method bool         isPosition()
 * @method $this        setField(string $value)
 * @method $this        setPosition(Position[] $value)
 * @method $this        unsetField()
 * @method $this        unsetPosition()
 */
class SearchHighlight extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'field'     =>  'string',
        'positions' =>  'Position[]'         
    ];
}
