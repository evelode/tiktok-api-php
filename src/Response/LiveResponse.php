<?php
namespace TikTokRESTAPI\Response;

/**
 * Endpoint-specific payload mapped lazily.
 * @method Model\LivePayload getTiktok()
 */
class LiveResponse extends APIResponse
{
    const JSON_PROPERTY_MAP = ['tiktok' => 'Model\\LivePayload'];
}
