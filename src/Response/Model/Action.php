<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * Action.
 * 
 * @method Icon     getIcon()
 * @method string   getSchema()
 * @method int      getActionType()
 * @method bool     isIcon()
 * @method bool     isSchema()
 * @method bool     isActionType()
 * @method $this    setIcon(Icon $value)
 * @method $this    setSchema(string $value)
 * @method $this    setActionType(int $value)
 * @method $this    unsetIcon()
 * @method $this    unsetSchema()
 * @method $this    unsetActionType()
 * 
 */
class Action extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'icon'          =>  'Icon',
        'schema'        =>  'string',
        'action_type'   =>  'int'
    ];
}
