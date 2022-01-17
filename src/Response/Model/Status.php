<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * Status.
 *
 * @method string       getAwemeId()
 * @method bool         getAllowComment()
 * @method int          getPrivateStatus()
 * @method bool         getInReviewing()
 * @method int          getReviewed()
 * @method ReviewResult getReviewResult()
 * @method bool         getIsDelete()
 * @method bool         getAllowShare()
 * @method bool         getSelfSee()
 * @method bool         getIsProhibited()
 * @method int          getDownloadStatus()
 * @method bool         isAwemeId()
 * @method bool         isAllowComment()
 * @method bool         isPrivateStatus()
 * @method bool         isInReviewing()
 * @method bool         isReviewed()
 * @method bool         isReviewResult()
 * @method bool         isIsDelete()
 * @method bool         isAllowShare()
 * @method bool         isSelfSee()
 * @method bool         isIsProhibited()
 * @method bool         isDownloadStatus()
 * @method $this        setAwemeId(string $value)
 * @method $this        setAllowComment(bool $value)
 * @method $this        setPrivateStatus(int $value)
 * @method $this        setInReviewing(bool $value)
 * @method $this        setReviewed(int $value)
 * @method $this        setReviewResult(ReviewResult $value)
 * @method $this        setIsDelete(bool $value)
 * @method $this        setAllowShare(bool $value)
 * @method $this        setSelfSee(bool $value)
 * @method $this        setIsProhibited(bool $value)
 * @method $this        setDownloadStatus(int $value)
 * @method $this        unsetAwemeId()
 * @method $this        unsetAllowComment()
 * @method $this        unsetPrivateStatus()
 * @method $this        unsetInReviewing()
 * @method $this        unsetReviewed()
 * @method $this        unsetReviewResult()
 * @method $this        unsetIsDelete()
 * @method $this        unsetAllowShare()
 * @method $this        unsetSelfSee()
 * @method $this        unsetIsProhibited()
 * @method $this        unsetDownloadStatus()
 * 
 */
class Status extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'aweme_id'          => 'string',
        'allow_comment'     => 'bool',
        'private_status'    => 'int',
        'in_reviewing'      => 'bool',
        'reviewed'          => 'int',
        'review_result'     => 'ReviewResult',
        'is_delete'         => 'bool',
        'allow_share'       => 'bool',
        'self_see'          => 'bool',
        'is_prohibited'     => 'bool',
        'download_status'   => 'int'
    ];
}
