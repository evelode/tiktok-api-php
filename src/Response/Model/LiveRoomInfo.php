<?php
namespace TikTokRESTAPI\Response\Model;

/**
 * @method string getIdStr()
 * @method string getTitle()
 * @method int getUserCount()
 * @method LiveOwner getOwner()
 * @method int getStatus()
 */
class LiveRoomInfo extends \TikTokRESTAPI\AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'id_str' => 'string',
        'title' => 'string',
        'user_count' => 'int',
        'owner' => 'LiveOwner',
        'status' => 'int',
    ];
}
