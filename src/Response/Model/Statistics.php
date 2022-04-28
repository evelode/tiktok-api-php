<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * Statistics.
 * 
 * @method int      getLoseCount()
 * @method int      getLoseCommentCount()
 * @method string   getAwemeId()
 * @method int      getCommentCount()
 * @method int      getPlayCount()
 * @method int      getShareCount()
 * @method int      getForwardCount()
 * @method int      getWhatsappShareCount()
 * @method int      getDiggCount()
 * @method int      getDownloadCount()
 * @method int      getCollectCount()
 * @method bool     isLoseCount()
 * @method bool     isLoseCommentCount()
 * @method bool     isAwemeId()
 * @method bool     isCommentCount()
 * @method bool     isPlayCount()
 * @method bool     isShareCount()
 * @method bool     isForwardCount()
 * @method bool     isWhatsappShareCount()
 * @method bool     isDiggCount()
 * @method bool     isDownloadCount()
 * @method bool     isCollectCount()
 * @method $this    setLoseCount(int $value)
 * @method $this    setLoseCommentCount(int $value)
 * @method $this    setAwemeId(string $value)
 * @method $this    setCommentCount(int $value)
 * @method $this    setPlayCount(int $value)
 * @method $this    setShareCount(int $value)
 * @method $this    setForwardCount(int $value)
 * @method $this    setWhatsappShareCount(int $value)
 * @method $this    setDiggCount(int $value)
 * @method $this    setDownloadCount(int $value)
 * @method $this    setCollectCount(int $value)
 * @method $this    unsetLoseCount()
 * @method $this    unsetLoseCommentCount()
 * @method $this    unsetAwemeId()
 * @method $this    unsetCommentCount()
 * @method $this    unsetPlayCount()
 * @method $this    unsetShareCount()
 * @method $this    unsetForwardCount()
 * @method $this    unsetWhatsappShareCount()
 * @method $this    unsetDiggCount()
 * @method $this    unsetDownloadCount()
 * @method $this    unsetCollectCount()
 */
class Statistics extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'lose_count'            => 'int',
        'lose_comment_count'    => 'int',
        'aweme_id'              => 'string',
        'comment_count'         => 'int',
        'play_count'            => 'int',
        'share_count'           => 'int',
        'forward_count'         => 'int',
        'whatsapp_share_count'  => 'int',
        'digg_count'            => 'int',
        'download_count'        => 'int',
        'collect_count'         => 'int'
    ];
}
