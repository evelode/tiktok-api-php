<?php
namespace TikTokRESTAPI\Response\Model;

/**
 * @method int getTotal()
 * @method int getTotalPlayCount()
 */
class PlaylistStatistics extends \TikTokRESTAPI\AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'total' => 'int',
        'total_play_count' => 'int',
    ];
}
