<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * MatchedSong.
 * 
 * @method string   getId()
 * @method string   getAuthor()
 * @method string   getTitle()
 * @method string   getH5Url()
 * @method Media    getCoverMedium()
 * @method mixed    getPerformers()
 * @method $this    isId()
 * @method $this    isAuthor()
 * @method $this    isTitle()
 * @method $this    isH5Url()
 * @method $this    isCoverMedium()
 * @method $this    isPerformers()
 * @method $this    setId(string $value)
 * @method $this    setAuthor(string $value)
 * @method $this    setTitle(string $value)
 * @method $this    setH5Url(string $value)
 * @method $this    setCoverMedium(Media $value)
 * @method $this    setPerformers(mixed $value)
 * @method $this    unsetId()
 * @method $this    unsetAuthor()
 * @method $this    unsetTitle()
 * @method $this    unsetH5Url()
 * @method $this    unsetCoverMedium()
 * @method $this    unsetPerformers()
 */
class MatchedSong extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'id'            => 'string',
        'author'        => 'string',
        'title'         => 'string',
        'h5_url'        => 'string',
        'cover_medium'  => 'Media',
        'performers'    => ''
    ];
}
