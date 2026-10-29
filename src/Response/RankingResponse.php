<?php
namespace TikTokRESTAPI\Response;

/** Endpoint-specific envelope; unknown fields remain available on export. */
class RankingResponse extends APIResponse
{
    const JSON_PROPERTY_MAP = ['tiktok' => 'Model\\RankingPayload'];
}
