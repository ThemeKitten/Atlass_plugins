<?php

/* -------------------------------------------------------
 *
 *   LiveStreet (v1.x)
 *   Plugin Brand (v.0.1)
 *   Copyright © 2012 Bishovec Nikolay
 *
 * --------------------------------------------------------
 *
 *   Plugin Page: http://netlanc.net
 *   Contact e-mail: netlanc@yandex.ru
 *
  ---------------------------------------------------------
 */

class PluginBrand_ModuleTopic extends PluginBrand_Inherit_ModuleTopic
{

    protected $oUserCurrent = null;

    public function Init()
    {
        parent::Init();
        $this->oUserCurrent = $this->User_GetUserCurrent();
    }

    public function GetTopicsAdditionalData($aTopicId, $aAllowData = null)
    {
        $aTopics = parent::GetTopicsAdditionalData($aTopicId, $aAllowData = null);

        $aBrand = $this->PluginBrand_Brand_GetBrandsByTargetByArrayId('topic', $aTopicId);
        foreach ($aTopics as $oTopic) {
            $oTopic->setBrand(null);
            if (!empty($aBrand[$oTopic->getId()])){
                $oTopic->setBrand($aBrand[$oTopic->getId()]);
            }
        }
        return $aTopics;
    }


}

?>