<?php
namespace TikTokRESTAPI\Response\Model;

/**
 * @method int getRank()
 * @method string getScore()
 * @method LiveOwner getUser()
 * @method string getRoomIdStr()
 */
class RankEntry extends \TikTokRESTAPI\AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'rank' => 'int',
        'score' => 'string',
        'user' => 'LiveOwner',
        'room_id_str' => 'string',
    ];
}
