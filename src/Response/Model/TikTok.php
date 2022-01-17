<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * TikTok.
 *
 * @method string               getId()
 * @method string               getUrl()
 * @method int                  getStatusCode()
 * @method AwemeDetail          getAwemeDetail()
 * @method bool                 isId()
 * @method bool                 isUrl()
 * @method bool                 isStatusCode()
 * @method bool                 isAwemeDetail()
 * @method $this                setId(string $value)
 * @method $this                setUrl(string $value)
 * @method $this                setStatusCode(int $value)
 * @method $this                setAwemeDetail(AwemeDetail $value)
 * @method $this                unsetId()
 * @method $this                unsetUrl()
 * @method $this                unsetStatusCode()
 * @method $this                unsetAwemeDetail()
 */
class TikTok extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'id'                    => 'string',
        'url'                   => 'string',
        'status_code'           => 'int',
        'aweme_detail'          => 'AwemeDetail',
    ];
}
