<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * TikTok.
 *
 * @method string               getId()
 * @method string               getUrl()
 * @method int                  getStatusCode()
 * @method AwemeDetail          getAwemeDetail()
 * @method Comments[]           getComments()
 * @method int                  getCursor()
 * @method int                  getHasMore()
 * @method int                  getTotal()
 * @method string               getInputKeyword()
 * @method UserSearchItem[]     getUserList()
 * @method AwemeListItem[]      getAwemeList()
 * @method MusicSearchItem[]    getMusic()
 * @method bool                 isId()
 * @method bool                 isUrl()
 * @method bool                 isStatusCode()
 * @method bool                 isAwemeDetail()
 * @method bool                 isComments()
 * @method bool                 isCursor()
 * @method bool                 isHasMore()
 * @method bool                 isTotal()
 * @method bool                 isInputKeyword()
 * @method bool                 isUserList()
 * @method bool                 isAwemeList()
 * @method bool                 isMusic()
 * @method $this                setId(string $value)
 * @method $this                setUrl(string $value)
 * @method $this                setStatusCode(int $value)
 * @method $this                setAwemeDetail(AwemeDetail $value)
 * @method $this                setComments(Comments $value)
 * @method $this                setCursor(int $value)
 * @method $this                setHasMoreint $value)
 * @method $this                setTotal(int $value)
 * @method $this                setInputKeyword(string $value)
 * @method $this                setUserList(UserSearchItem[] $value)
 * @method $this                setAwemeList(AwemeListItem[] $value)
 * @method $this                setMusic(MusicSearchItem[] $value)
 * @method $this                unsetId()
 * @method $this                unsetUrl()
 * @method $this                unsetStatusCode()
 * @method $this                unsetAwemeDetail()
 * @method $this                unsetComments()
 * @method $this                unsetCursor()
 * @method $this                unsetHasMore()
 * @method $this                unsetTotal()
 * @method $this                unsetInputKeyword()
 * @method $this                unsetUserList()
 * @method $this                unsetAwemeList()
 * @method $this                unsetMusic()
 */
class TikTok extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'id'                    => 'string',
        'url'                   => 'string',
        'status_code'           => 'int',
        'aweme_detail'          => 'AwemeDetail',
        'comments'              => 'Comment[]',
        'cursor'                => 'int',
        'has_more'              => 'int',
        'total'                 => 'int',
        'input_keyword'         => 'string',
        'user_list'             => 'UserSearchItem[]',
        'aweme_list'            => 'AwemeListItem[]',
        'music'                 => 'MusicSearchItem[]'
    ];
}
