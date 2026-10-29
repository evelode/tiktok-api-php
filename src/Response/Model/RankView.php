<?php
namespace TikTokRESTAPI\Response\Model;

/**
 * @method string getTitle()
 * @method int getRankType()
 * @method RankEntry[] getRanks()
 */
class RankView extends \TikTokRESTAPI\AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'title' => 'string',
        'rank_type' => 'int',
        'ranks' => 'RankEntry[]',
    ];
}
