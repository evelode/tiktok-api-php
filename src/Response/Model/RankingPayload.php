<?php
namespace TikTokRESTAPI\Response\Model;

/**
 * @method RankingData getData()
 */
class RankingPayload extends TikTok
{
    const JSON_PROPERTY_MAP = [
        'data' => 'RankingData',
    ];
}
