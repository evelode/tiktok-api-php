<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * RiskInfos.
 * 
 * @method bool     getVote()
 * @method bool     getWarn()
 * @method bool     getRiskSink()
 * @method int      getType()
 * @method string   getContent()
 * @method bool     isVote()
 * @method bool     isWarn()
 * @method bool     isRiskSink()
 * @method bool     isType()
 * @method bool     isContent()
 * @method $this    setVote(bool $value)
 * @method $this    setWarn(bool $value)
 * @method $this    setRiskSink(bool $value)
 * @method $this    setType(int $value)
 * @method $this    setContent(string $value)
 * @method $this    unsetVote()
 * @method $this    unsetWarn()
 * @method $this    unsetRiskSink()
 * @method $this    unsetType()
 * @method $this    unsetContent()
 */
class RiskInfos extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'vote'      =>  'bool',
        'war'       =>  'bool',
        'risk_sink' =>  'bool',
        'type'      =>  'int',
        'content'   =>  'string'
    ];
}
