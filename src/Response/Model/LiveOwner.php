<?php
namespace TikTokRESTAPI\Response\Model;

/**
 * @method string getIdStr()
 * @method string getNickname()
 * @method string getDisplayId()
 */
class LiveOwner extends \TikTokRESTAPI\AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'id_str' => 'string',
        'nickname' => 'string',
        'display_id' => 'string',
    ];
}
