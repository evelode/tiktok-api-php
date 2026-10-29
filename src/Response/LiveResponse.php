<?php
namespace TikTokRESTAPI\Response;

/** Endpoint-specific envelope; unknown fields remain available on export. */
class LiveResponse extends APIResponse
{
    const JSON_PROPERTY_MAP = ['tiktok' => 'Model\\LivePayload'];
}
