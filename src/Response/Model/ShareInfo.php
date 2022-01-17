<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * ShareInfo.
 *
 * @method string               getShareTitleMyself()
 * @method string               getShareSignatureUrl()
 * @method string               getShareQuote()
 * @method string               getShareDescInfo()
 * @method string               getShareUrl()
 * @method int                  getBoolPersist()
 * @method string               getShareTitleOther()
 * @method string               getShareLinkDesc()
 * @method string               getShareSignatureDesc()
 * @method string               getWhatsappDesc()
 * @method string               getShareDesc()
 * @method string               getShareTitle()
 * @method bool                 isShareTitleMyself()
 * @method bool                 isShareSignatureUrl()
 * @method bool                 isShareQuote()
 * @method bool                 isShareDescInfo()
 * @method bool                 isShareUrl()
 * @method bool                 isBoolPersist()
 * @method bool                 isShareTitleOther()
 * @method bool                 isShareLinkDesc()
 * @method bool                 isShareSignatureDesc()
 * @method bool                 isWhatsappDesc()
 * @method bool                 isShareDesc()
 * @method bool                 isShareTitle()
 * @method $this                setShareTitleMyself(string $value)
 * @method $this                setShareSignatureUrl(string $value)
 * @method $this                setShareQuote(string $value)
 * @method $this                setShareDescInfo(string $value)
 * @method $this                setShareUrl(string $value)
 * @method $this                setBoolPersist(int $value)
 * @method $this                setShareTitleOther(string $value)
 * @method $this                setShareLinkDesc(string $value)
 * @method $this                setShareSignatureDesc(string $value)
 * @method $this                setWhatsappDesc(string $value)
 * @method $this                setShareDesc(string $value)
 * @method $this                setShareTitle(string $value)
 * @method $this                unsetShareTitleMyself()
 * @method $this                unsetShareSignatureUrl()
 * @method $this                unsetShareQuote()
 * @method $this                unsetShareDescInfo()
 * @method $this                unsetShareUrl()
 * @method $this                unsetBoolPersist()
 * @method $this                unsetShareTitleOther()
 * @method $this                unsetShareLinkDesc()
 * @method $this                unsetShareSignatureDesc()
 * @method $this                unsetWhatsappDesc()
 * @method $this                unsetShareDesc()
 * @method $this                unsetShareTitle()
 */
class ShareInfo extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'share_title_myself'    =>  'string',
        'share_signature_url'   =>  'string',
        'share_quote'           =>  'string',
        'share_desc_info'       =>  'string',
        'share_url'             =>  'string',
        'bool_persist'          =>  'int',
        'share_title_other'     =>  'string',
        'share_link_desc'       =>  'string',
        'share_signature_desc'  =>  'string',
        'whatsapp_desc'         =>  'string',
        'share_desc'            =>  'string',
        'share_title'           =>  'string'
    ];
}
