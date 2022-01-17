<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * CommerceInfo.
 * 
 * @method bool     getAuctionAdInvited()
 * @method bool     getWithCommentFilterWords()
 * @method bool     getAdvPromotable()
 * @method bool     isAuctionAdInvited()
 * @method bool     isWithCommentFilterWords()
 * @method bool     isAdvPromotable()
 * @method $this    setAuctionAdInvited(bool $value)
 * @method $this    setWithCommentFilterWords(bool $value)
 * @method $this    setAdvPromotable(bool $value)
 * @method $this    unsetAuctionAdInvited()
 * @method $this    unsetWithCommentFilterWords()
 * @method $this    unsetAdvPromotable()
 */
class CommerceInfo extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'auction_ad_invited'        =>  'bool',
        'with_comment_filter_words' =>  'bool',
        'adv_promotable'            =>  'bool'
    ];
}
