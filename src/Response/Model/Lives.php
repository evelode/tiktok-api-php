<?php

namespace TikTokRESTAPI\Response\Model;

use TikTokRESTAPI\AutoPropertyMapper;

/**
 * Lives.
 * 
 * @method string       getAwemeId()         
 * @method Author       getAuthor()
 * @method mixed        getChaList()
 * @method TextExtra    getTextExtra()
 * @method mixed        getVideoLabels()
 * @method int          getAwemeType()
 * @method mixed        getImageInfos()
 * @method mixed        getPosition()
 * @method mixed        getUniqidPosition()
 * @method mixed        getGeofencing()
 * @method mixed        getVideoText()
 * @method mixed        getLabelTopText()
 * @method string       getGroupId()
 * @method mixed        getNicknamePosition()
 * @method mixed        getChallengePosition()
 * @method mixed        getLongVideo()
 * @method mixed        getInteractionStickers()
 * @method mixed        getOriginCommentIds()
 * @method mixed        getCommerceConfigData()
 * @method Room         getRoom()
 * @method mixed        getAnchors()
 * @method mixed        getRawdata()
 * @method mixed        getHybridLabel()
 * @method mixed        getGeofencingRegions()
 * @method mixed        getSearchExtra()
 * @method mixed        getCoverLabels()
 * @method mixed        getMaskInfos()
 * @method mixed        getSearchHighlight()
 * @method mixed        getGreenScreenMaterials()
 * @method mixed        getQuestionList()
 * @method mixed        getContentDescExtra()
 * @method mixed        getProductsInfo()
 * @method mixed        getBrandedContentAccounts()
 * @method mixed        getTtsVoiceIds()
 * @method mixed        getReferenceTtsVoiceIds()
 * @method mixed        getVoiceFilterIds()
 * @method mixed        getReferenceVoiceFilterIds()
 * @method mixed        getMufCommentInfoV2()
 * @method mixed        getBehindTheSongMusicaIds()
 * @method mixed        getBehindTheSongVideoMusicIds()
 * @method mixed        getOperatorBoostInfo()
 * @method bool         isAwemeId()         
 * @method bool         isAuthor()
 * @method bool         isChaList()
 * @method bool         isTextExtra()
 * @method bool         isVideoLabels()
 * @method bool         isAwemeType()
 * @method bool         isImageInfos()
 * @method bool         isPosition()
 * @method bool         isUniqidPosition()
 * @method bool         isGeofencing()
 * @method bool         isVideoText()
 * @method bool         isLabelTopText()
 * @method bool         isGroupId()
 * @method bool         isNicknamePosition()
 * @method bool         isChallengePosition()
 * @method bool         isLongVideo()
 * @method bool         isInteractionStickers()
 * @method bool         isOriginCommentIds()
 * @method bool         isCommerceConfigData()
 * @method bool         isRoom()
 * @method bool         isAnchors()
 * @method bool         isRawdata()
 * @method bool         isHybridLabel()
 * @method bool         isGeofencingRegions()
 * @method bool         isSearchExtra()
 * @method bool         isCoverLabels()
 * @method bool         isMaskInfos()
 * @method bool         isSearchHighlight()
 * @method bool         isGreenScreenMaterials()
 * @method bool         isQuestionList()
 * @method bool         isContentDescExtra()
 * @method bool         isProductsInfo()
 * @method bool         isBrandedContentAccounts()
 * @method bool         isTtsVoiceIds()
 * @method bool         isReferenceTtsVoiceIds()
 * @method bool         isVoiceFilterIds()
 * @method bool         isReferenceVoiceFilterIds()
 * @method bool         isMufCommentInfoV2()
 * @method bool         isBehindTheSongMusicaIds()
 * @method bool         isBehindTheSongVideoMusicIds()
 * @method $this        setAwemeId(string $value)         
 * @method $this        setAuthor(Author $value)
 * @method $this        setChaList(mixed $value)
 * @method $this        setTextExtra(TextExtra $value)
 * @method $this        setVideoLabels(mixed $value)
 * @method $this        setAwemeType(int $value)
 * @method $this        setImageInfos(mixed $value)
 * @method $this        setPosition(mixed $value)
 * @method $this        setUniqidPosition(mixed $value)
 * @method $this        setGeofencing(mixed $value)
 * @method $this        setVideoText(mixed $value)
 * @method $this        setLabelTopText(mixed $value)
 * @method $this        setGroupId(string $value)
 * @method $this        setNicknamePosition(mixed $value)
 * @method $this        setChallengePosition(mixed $value)
 * @method $this        setLongVideo(mixed $value)
 * @method $this        setInteractionStickers(mixed $value)
 * @method $this        setOriginCommentIds(mixed $value)
 * @method $this        setCommerceConfigData(mixed $value)
 * @method $this        setRoom(Room $value)
 * @method $this        setAnchors(mixed $value)
 * @method $this        setRawdata(mixed $value)
 * @method $this        setHybridLabel(mixed $value)
 * @method $this        setGeofencingRegions(mixed $value)
 * @method $this        setSearchExtra(mixed $value)
 * @method $this        setCoverLabels(mixed $value)
 * @method $this        setMaskInfos(mixed $value)
 * @method $this        setSearchHighlight(mixed $value)
 * @method $this        setGreenScreenMaterials(mixed $value)
 * @method $this        setQuestionList(mixed $value)
 * @method $this        setContentDescExtra(mixed $value)
 * @method $this        setProductsInfo(mixed $value)
 * @method $this        setBrandedContentAccounts(mixed $value)
 * @method $this        setTtsVoiceIds(mixed $value)
 * @method $this        setReferenceTtsVoiceIds(mixed $value)
 * @method $this        setVoiceFilterIds(mixed $value)
 * @method $this        setReferenceVoiceFilterIds(mixed $value)
 * @method $this        setMufCommentInfoV2(mixed $value)
 * @method $this        setBehindTheSongMusicaIds(mixed $value)
 * @method $this        setBehindTheSongVideoMusicIds(mixed $value)
 * @method $this        unsetAwemeId()         
 * @method $this        unsetAuthor()
 * @method $this        unsetChaList()
 * @method $this        unsetTextExtra()
 * @method $this        unsetVideoLabels()
 * @method $this        unsetAwemeType()
 * @method $this        unsetImageInfos()
 * @method $this        unsetPosition()
 * @method $this        unsetUniqidPosition()
 * @method $this        unsetGeofencing()
 * @method $this        unsetVideoText()
 * @method $this        unsetLabelTopText()
 * @method $this        unsetGroupId()
 * @method $this        unsetNicknamePosition()
 * @method $this        unsetChallengePosition()
 * @method $this        unsetLongVideo()
 * @method $this        unsetInteractionStickers()
 * @method $this        unsetOriginCommentIds()
 * @method $this        unsetCommerceConfigData()
 * @method $this        unsetRoom()
 * @method $this        unsetAnchors()
 * @method $this        unsetRawdata()
 * @method $this        unsetHybridLabel()
 * @method $this        unsetGeofencingRegions()
 * @method $this        unsetSearchExtra()
 * @method $this        unsetCoverLabels()
 * @method $this        unsetMaskInfos()
 * @method $this        unsetSearchHighlight()
 * @method $this        unsetGreenScreenMaterials()
 * @method $this        unsetQuestionList()
 * @method $this        unsetContentDescExtra()
 * @method $this        unsetProductsInfo()
 * @method $this        unsetBrandedContentAccounts()
 * @method $this        unsetTtsVoiceIds()
 * @method $this        unsetReferenceTtsVoiceIds()
 * @method $this        unsetVoiceFilterIds()
 * @method $this        unsetReferenceVoiceFilterIds()
 * @method $this        unsetMufCommentInfoV2()
 * @method $this        unsetBehindTheSongMusicaIds()
 * @method $this        unsetBehindTheSongVideoMusicIds()
 */
class Lives extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'aweme_id'                          =>  'string',
        'author'                            =>  'Author',
        'cha_list'                          =>  '',
        'text_extra'                        =>  'TextExtra',
        'video_labels'                      =>  '',
        'aweme_type'                        =>  'int',
        'image_infos'                       =>  '',
        'position'                          =>  '',
        'uniqid_position'                   =>  '',
        'geofencing'                        =>  '',
        'video_text'                        =>  '',
        'label_top_text'                    =>  '',
        'group_id'                          =>  'string',
        'nickname_position'                 =>  '',
        'challenge_position'                =>  '',
        'long_video'                        =>  '',
        'interaction_stickers'              =>  '',
        'origin_comment_ids'                =>  '',
        'commerce_config_data'              =>  '',
        'room'                              =>  'Room',
        'anchors'                           =>  '',
        'rawdata'                           =>  '',
        'hybrid_label'                      =>  '',
        'geofencing_regions'                =>  '',
        'search_extra'                      =>  '',
        'cover_labels'                      =>  '',
        'mask_infos'                        =>  '', 
        'search_highlight'                  =>  '',
        'green_screen_materials'            =>  '',
        'question_list'                     =>  '',
        'content_desc_extra'                =>  '',
        'products_info'                     =>  '',
        'branded_content_accounts'          =>  '',
        'tts_voice_ids'                     =>  '',
        'reference_tts_voice_ids'           =>  '',
        'voice_filter_ids'                  =>  '',
        'reference_voice_filter_ids'        =>  '',
        'muf_comment_info_v2'               =>  '',
        'behind_the_song_music_ids'         =>  '',
        'behind_the_song_video_music_ids'   =>  '',
        'operator_boost_info'               =>  ''
    ];
}
