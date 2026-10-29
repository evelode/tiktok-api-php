<?php
namespace TikTokRESTAPI\Response\Model;

/**
 * @method string getId()
 * @method string getTitle()
 * @method int getStartTime()
 * @method int getDuration()
 * @method User getHost()
 * @method int getSubscriberCount()
 */
class LiveEvent extends \TikTokRESTAPI\AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'id' => 'string',
        'title' => 'string',
        'start_time' => 'int',
        'duration' => 'int',
        'host' => 'User',
        'subscriber_count' => 'int',
    ];
}
