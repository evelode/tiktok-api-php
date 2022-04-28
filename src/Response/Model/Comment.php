<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * Comment.
 * 
 * @method string       getAwemeId()
 * @method string       getCid()
 * @method int          getCreateTime()
 * @method int          getDiggCount()
 * @method bool         getIsAuthorDigged()
 * @method mixed        getLabelList()
 * @method mixed        getReplyComment()
 * @method string       getReplyId()
 * @method string       getReplyToReplyId()
 * @method int          getStatus()
 * @method int          getStickPosition()
 * @method string       getText()
 * @method TextExtra    getTextExtra()
 * @method User         getUser()
 * @method bool         getUserBuried()
 * @method int          getUserDigged() 
 * @method bool         isAwemeId()
 * @method bool         isCid()
 * @method bool         isCreateTime()
 * @method bool         isDiggCount()
 * @method bool         isIsAuthorDigged()
 * @method bool         isLabelList()
 * @method bool         isReplyComment()
 * @method bool         isReplyId()
 * @method bool         isReplyToReplyId()
 * @method bool         isStatus()
 * @method bool         isStickPosition()
 * @method bool         isText()
 * @method bool         isTextExtra()
 * @method bool         isUser()
 * @method bool         isUserBuried()
 * @method bool         isUserDigged()
 * @method $this        setAwemeId(string $value)
 * @method $this        setCid(string $value)
 * @method $this        setCreateTime(int $value)
 * @method $this        setDiggCount(int $value)
 * @method $this        setIsAuthorDigged(bool $value)
 * @method $this        setLabelList(mixed $value)
 * @method $this        setReplyComment(mixed $value)
 * @method $this        setReplyId(string $value)
 * @method $this        setReplyToReplyId(string $value)
 * @method $this        setStatus(int $value)
 * @method $this        setStickPosition(int $value)
 * @method $this        setText(string $value)
 * @method $this        setTextExtra(TextExtra $value)
 * @method $this        setUser(User $value)
 * @method $this        setUserBuried(bool $value)
 * @method $this        setUserDigged(int $value)
 * @method $this        unsetAwemeId()
 * @method $this        unsetCid()
 * @method $this        unsetCreateTime()
 * @method $this        unsetDiggCount()
 * @method $this        unsetIsAuthorDigged()
 * @method $this        unsetLabelList()
 * @method $this        unsetReplyComment()
 * @method $this        unsetReplyId()
 * @method $this        unsetReplyToReplyId()
 * @method $this        unsetStatus()
 * @method $this        unsetStickPosition()
 * @method $this        unsetText()
 * @method $this        unsetTextExtra()
 * @method $this        unsetUser()
 * @method $this        unsetUserBuried()
 * @method $this        unsetUserDigged()
 */
class Comment extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'aweme_id'          =>  'string',
        'cid'               =>  'string',
        'create_time'       =>  'int',
        'digg_count'        =>  'int',
        'is_author_digged'  =>  'bool',
        'label_list'        =>  '',
        'reply_comment'     =>  '',
        'reply_id'          =>  'string',
        'reply_to_reply_id' =>  'string',
        'status'            =>  'int',
        'stick_position'    =>  'int',
        'text'              =>  'string',
        'text_extra'        =>  'TextExtra',
        'user'              =>  'User',
        'user_buried'       =>  'bool',
        'user_digged'       =>  'int'
    ];
}
