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

class PluginBrand_ModuleUser extends PluginBrand_Inherit_ModuleUser
{

    protected $oUserCurrent = null;

    public function Init()
    {
        parent::Init();
        $this->oUserCurrent = $this->User_GetUserCurrent();
    }

    public function GetUsersAdditionalData($aUserId, $aAllowData = null)
    {
        $aUsers = parent::GetUsersAdditionalData($aUserId, $aAllowData = null);

        $aBrand = $this->PluginBrand_Brand_GetBrandsByTargetByArrayId('user', $aUserId);
        foreach ($aUsers as $oUser) {
            $oUser->setBrand(null);
            if (!empty($aBrand[$oUser->getId()])){
                $oUser->setBrand($aBrand[$oUser->getId()]);
            }
        }
        return $aUsers;
    }


}

?>