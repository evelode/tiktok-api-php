<?php
namespace TikTokRESTAPI\Response\Model;

/**
 * @method Poi[] getPoiInfo()
 */
class PoiResults extends \TikTokRESTAPI\AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'poi_info' => 'Poi[]',
    ];
}
