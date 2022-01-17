<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * BitRate.
 * 
 * @method string   getGearName()
 * @method int      getQualityType()
 * @method int      getBitRate()
 * @method Play     getPlayAddr()
 * @method int      getIsBytevc1()
 * @method mixed    getDubInfos()
 * @method bool     isGearName()
 * @method bool     isQualityType()
 * @method bool     isBitRate()
 * @method bool     isPlayAddr()
 * @method bool     isIsBytevc1()
 * @method bool     isDubInfos()
 * @method $this    setGearName(string $value)
 * @method $this    setQualityType(int $value)
 * @method $this    setBitRate(int $value)
 * @method $this    setPlayAddr(Play $value)
 * @method $this    setIsBytevc1(int $value)
 * @method $this    setDubInfos(mixed $value)
 * @method $this    unsetGearName()
 * @method $this    unsetQualityType()
 * @method $this    unsetBitRate()
 * @method $this    unsetPlayAddr()
 * @method $this    unsetIsBytevc1()
 * @method $this    unsetDubInfos()
 */
class BitRate extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'gear_name'     =>  'string',
        'quality_type'  =>  'int',
        'bit_rate'      =>  'int',
        'play_addr'     =>  'Play',
        'is_bytevc1'    =>  'int',
        'dub_infos'     =>  ''
    ];
}
