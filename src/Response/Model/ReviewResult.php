<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * ReviewResult.
 *
 * @method int      getReviewStatus()
 * @method bool     isReviewStatus()
 * @method $this    setReviewStatus(int $value)
 * @method $this    unsetReviewStatus()
 */
class ReviewResult extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'review_status' => 'int'
    ];
}
