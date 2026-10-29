<?php
namespace TikTokRESTAPI\Response\Model;

/**
 * @method RankView getRankView()
 */
class RankingData extends \TikTokRESTAPI\AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'rank_view' => 'RankView',
    ];
}
