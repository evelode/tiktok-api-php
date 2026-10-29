<?php
namespace TikTokRESTAPI\Response\Model;

/**
 * @method int getCategoryType()
 * @method string getDesc()
 * @method ChallengeInfo getChallengeInfo()
 * @method AwemeDetail[] getAwemeList()
 */
class TrendingCategory extends \TikTokRESTAPI\AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'category_type' => 'int',
        'desc' => 'string',
        'challenge_info' => 'ChallengeInfo',
        'aweme_list' => 'AwemeDetail[]',
    ];
}
