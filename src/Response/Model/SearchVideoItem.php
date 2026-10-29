<?php
namespace TikTokRESTAPI\Response\Model;

/**
 * @method AwemeDetail getAwemeInfo()
 */
class SearchVideoItem extends \TikTokRESTAPI\AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'aweme_info' => 'AwemeDetail',
    ];
}
