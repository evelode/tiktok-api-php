<?php
namespace TikTokRESTAPI\Response\Model;

/**
 * @method string getQueryIdStr()
 * @method string getQueryText()
 * @method int getPopularity()
 * @method int getVideoNum()
 */
class Inspiration extends \TikTokRESTAPI\AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'query_id_str' => 'string',
        'query_text' => 'string',
        'popularity' => 'int',
        'video_num' => 'int',
    ];
}
