<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * Anchor.
 * 
 * @method string       getDescription()
 * @method Thumbnail    getThumbnail()
 * @method Action[]     getActions()
 * @method string       getKeyword()
 * @method string       getId()
 * @method int          getType()
 * @method Icon         getIcon()
 * @method mixed        getLogExtra()
 * @method bool         isDescription()
 * @method bool         isThumbnail()
 * @method bool         isActions()
 * @method bool         isKeyword()
 * @method bool         isId()
 * @method bool         isType()
 * @method bool         isIcon()
 * @method bool         isLogExtra()
 * @method $this        setDescription(string $value)
 * @method $this        setThumbnail(Thumbnail $value)
 * @method $this        setActions(Action[] $value)
 * @method $this        setKeyword(string $value)
 * @method $this        setId(string $value)
 * @method $this        setType(int $value)
 * @method $this        setIcon(Icon $value)
 * @method $this        setLogExtra(mixed $value)
 * @method $this        unsetDescription()
 * @method $this        unsetThumbnail()
 * @method $this        unsetActions()
 * @method $this        unsetKeyword()
 * @method $this        unsetId()
 * @method $this        unsetType()
 * @method $this        unsetIcon()
 * @method $this        unsetLogExtra()
 */
class Anchor extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'description'   => 'string',
        'thumbnail'     => 'Thumbnail',
        'actions'       => 'Action[]',
        'keyword'       => 'string',
        'id'            => 'string',
        'type'          => 'int',
        'icon'          => 'Icon',
        'log_extra'     => ''
    ];
}
