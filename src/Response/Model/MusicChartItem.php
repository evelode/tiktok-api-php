<?php
namespace TikTokRESTAPI\Response\Model;

/**
 * @method string getId()
 * @method Music getMusicInfo()
 * @method int getTrend()
 */
class MusicChartItem extends \TikTokRESTAPI\AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'id' => 'string',
        'music_info' => 'Music',
        'trend' => 'int',
    ];
}
