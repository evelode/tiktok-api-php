<?php

namespace TikTokRESTAPI\Response;

use TikTokRESTAPI\Response;

/**
 * APIResponse.
 *
 * @method string           getStatus()
 * @method string           getMessage()
 * @method Model\LimitsInfo getLimitsInfo()
 * @method bool             getRateLimitReached()
 * @method Model\TikTok     getTiktok()
 * @method string           getTimestamp()
 * @method bool             isStatus()
 * @method bool             isMessage()
 * @method bool             isLimitsInfo()
 * @method bool             isRateLimitReached()
 * @method bool             isTiktok()
 * @method bool             isTimestamp()
 * @method $this            setStatus(string $value)
 * @method $this            setMessage(string $value)
 * @method $this            setLimitsInfo(Model\LimitsInfo $value)
 * @method $this            setRateLimitReached(bool $value)
 * @method $this            setTiktok(Model\TikTok  $value)
 * @method $this            setTimestamp(string $value)
 * @method $this            unsetStatus()
 * @method $this            unsetMessage()
 * @method $this            unsetLimitsInfo()
 * @method $this            unsetRateLimitReached()
 * @method $this            unsetTiktok()
 * @method $this            unsetTimestamp()
 */
class APIResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'status'                        => 'string',
        'message'                       => 'string',
        'limits_info'                   => 'Model\LimitsInfo',
        'rate_limit_reached'            => 'bool',
        'tiktok'                        => 'Model\TikTok',
        'timestamp'                     => 'string'
    ];
}
