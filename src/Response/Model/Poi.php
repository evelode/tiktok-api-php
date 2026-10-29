<?php
namespace TikTokRESTAPI\Response\Model;

/**
 * @method string getPoiIdStr()
 * @method string getPoiName()
 * @method int getVideoCount()
 * @method string getLat()
 * @method string getLng()
 */
class Poi extends \TikTokRESTAPI\AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'poi_id_str' => 'string',
        'poi_name' => 'string',
        'video_count' => 'int',
        'lat' => 'string',
        'lng' => 'string',
    ];
}
