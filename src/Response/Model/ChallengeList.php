<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * ChallengeList.
 * 
 * @method ChallengeInfo        getChallengeInfo()
 * @method bool                 isChallengeInfo()
 * @method $this                setChallengeInfo(ChallengeInfo $value)
 * @method $this                unsetChallengeInfo()
 */
class ChallengeList extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'challenge_info' => 'ChallengeInfo',
    ];
}
