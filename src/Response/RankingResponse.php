<?php
namespace TikTokRESTAPI\Response;

/**
 * Endpoint-specific payload mapped lazily.
 * @method Model\RankingPayload getTiktok()
 */
class RankingResponse extends APIResponse
{
    const JSON_PROPERTY_MAP = ['tiktok' => 'Model\\RankingPayload'];
}
