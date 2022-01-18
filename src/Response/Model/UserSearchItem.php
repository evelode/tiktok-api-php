<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * UserSearchItem.
 * 
 * @method mixed    getChallenges()
 * @method mixed    getEffects()
 * @method mixed    getItems()
 * @method mixed    getMixList()
 * @method mixed    getMusics()
 * @method mixed    getPosition()
 * @method mixed    getUniqidPosition()
 * @method User     getUserInfo()
 * @method bool     isChallenges()
 * @method bool     isEffects()
 * @method bool     isItems()
 * @method bool     isMixList()
 * @method bool     isMusics()
 * @method bool     isPosition()
 * @method bool     isUniqidPosition()
 * @method bool     isUserInfo()
 * @method $this    setChallenges(mixed $value)
 * @method $this    setEffects(mixed $value)
 * @method $this    setItems(mixed $value)
 * @method $this    setMixList(mixed $value)
 * @method $this    setMusics(mixed $value)
 * @method $this    setPosition(mixed $value)
 * @method $this    setUniqidPosition(mixed $value)
 * @method $this    setUserInfo(User $value)
 * @method $this    unsetChallenges()
 * @method $this    unsetEffects()
 * @method $this    unsetItems()
 * @method $this    unsetMixList()
 * @method $this    unsetMusics()
 * @method $this    unsetPosition()
 * @method $this    unsetUniqidPosition()
 * @method $this    unsetUserInfo()
 */
class UserSearchItem extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'challenges'        => '',
        'effects'           => '',
        'items'             => '',
        'mix_list'          => '',
        'musics'            => '',
        'position'          => '',
        'uniqid_position'   => '',
        'user_info'         => 'User'
    ];
}
