<?php
namespace TikTokRESTAPI\Response\Model;

/**
 * @method string getMixId()
 * @method string getName()
 * @method string getCreatorName()
 * @method PlaylistStatistics getStatistic()
 * @method User getAuthor()
 */
class Playlist extends \TikTokRESTAPI\AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'mix_id' => 'string',
        'name' => 'string',
        'creator_name' => 'string',
        'statistic' => 'PlaylistStatistics',
        'author' => 'User',
    ];
}
