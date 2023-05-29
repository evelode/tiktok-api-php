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
 * 
 * @method bool         isAwemeId()         
 * @method bool         isAuthor()
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
 * 
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
        'behind_the_song_video_music_ids'   =>  ''
    ];
}
