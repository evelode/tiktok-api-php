<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * StickerDetail.
 *
 * @method string               getId()
 * @method string               getName()
 * @method mixed                getChildren()
 * @method string               getOwnerId()
 * @method mixed                getTags()
 * @method string               getSecUid()
 * @method mixed                getLinkedAnchors()
 * @method bool                 isId()
 * @method bool                 isName()
 * @method bool                 isChildren()
 * @method bool                 isOwnerId()
 * @method bool                 isTags()
 * @method bool                 isSecUid()
 * @method bool                 isLinkedAnchors()
 * @method $this                setId(string $value)
 * @method $this                setName(string $value)
 * @method $this                setChildren(mixed $value)
 * @method $this                setOwnerId(string $value)
 * @method $this                setTags(mixed $value)
 * @method $this                setSecUid(string $value)
 * @method $this                setLinkedAnchors(mixed $value)
 * @method $this                unsetId()
 * @method $this                unsetName()
 * @method $this                unsetChildren()
 * @method $this                unsetOwnerId()
 * @method $this                unsetTags()
 * @method $this                unsetSecUid()
 * @method $this                unsetLinkedAnchors()
 */
class StickerDetail extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'id'                =>  'string',
        'name'              =>  'string',
        'children'          =>  '',
        'owner_id'          =>  'string',
        'tags'              =>  'string',
        'sec_uid'           =>  'string',
        'linked_anchors'    =>  ''
    ];
}
