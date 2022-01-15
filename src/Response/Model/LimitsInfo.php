<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * LimitsInfo.
 *
 * @method string getUsageInProcents()
 * @method int    getRequestsCount()
 * @method int    getRequestsLimit()
 * @method bool   isUsageInProcents()
 * @method bool   isRequestsCount()
 * @method bool   isRequestsLimit()
 * @method $this  setUsageInProcents(string $value)
 * @method $this  setRequestsCount(int $value)
 * @method $this  setRequestsLimit(int $value)
 * @method $this  unsetUsageInProcents()
 * @method $this  unsetRequestsCount()
 * @method $this  unsetRequestsLimit()
 */
class LimitsInfo extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'usage_in_procents'     => 'string',
        'requests_count'        => 'int',
        'requests_limit'        => 'int',
    ];
}
