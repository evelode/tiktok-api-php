<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * MatchedPgcSound.
 *
 * @method string   getMixedTitle()
 * @method string   getMixedAuthor()
 * @method string   getAuthor()
 * @method string   getTitle()
 * @method bool     isMixedTitle()
 * @method bool     isMixedAuthor()
 * @method bool     isAuthor()
 * @method bool     isTitle()
 * @method $this    setMixedTitle(string $value)
 * @method $this    setMixedAuthor(string $value)
 * @method $this    setAuthor(string $value)
 * @method $this    setTitle(string $value)
 * @method $this    unsetMixedTitle()
 * @method $this    unsetMixedAuthor()
 * @method $this    unsetAuthor()
 * @method $this    unsetTitle()
 */
class MatchedPgcSound extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'mixed_title'   => 'string',
        'mixed_author'  => 'string',
        'author'        => 'string',
        'title'         => 'string'
    ];
}
