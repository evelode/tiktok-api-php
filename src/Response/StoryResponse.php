<?php
namespace TikTokRESTAPI\Response;

/**
 * Endpoint-specific payload mapped lazily.
 * @method Model\StoryPayload getTiktok()
 */
class StoryResponse extends APIResponse
{
    const JSON_PROPERTY_MAP = ['tiktok' => 'Model\StoryPayload'];
}
