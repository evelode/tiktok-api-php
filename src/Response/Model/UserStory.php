<?php
namespace TikTokRESTAPI\Response\Model;

/**
 * @method AwemeDetail[] getStories()
 * @method int getTotalCount()
 * @method string getMaxCursor()
 * @method string getMinCursor()
 * @method bool getHasMoreAfter()
 * @method bool getHasMoreBefore()
 */
class UserStory extends \TikTokRESTAPI\AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'stories' => 'AwemeDetail[]',
        'total_count' => 'int',
        'max_cursor' => 'string',
        'min_cursor' => 'string',
        'has_more_after' => 'bool',
        'has_more_before' => 'bool',
    ];
}
