<?php
namespace TikTokRESTAPI\Response\Model;

/**
 * @method RankingEntrance[] getEntrances()
 * @method RankingTab[] getTabs()
 */
class RankingGroup extends \TikTokRESTAPI\AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'entrances' => 'RankingEntrance[]',
        'tabs' => 'RankingTab[]',
    ];
}
