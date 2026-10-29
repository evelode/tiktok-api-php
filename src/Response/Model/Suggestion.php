<?php
namespace TikTokRESTAPI\Response\Model;

/**
 * @method string getContent()
 */
class Suggestion extends \TikTokRESTAPI\AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'content' => 'string',
    ];
}
