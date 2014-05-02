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

class PluginBrand_ModuleACL extends PluginBrand_Inherit_ModuleACL
{

    public function Init()
    {
        parent::Init();
    }

    public function AllowBrand()
    {

        if (!$oUserCurrent=$this->User_GetUserCurrent()){
            return false;
        }
        if ($oUserCurrent->isAdministrator()) {
            return true;
        }

        $sAllow = Config::Get('plugin.brand.allow');
        if ($sAllow == 'all') {
            return true;
        }
        if ($sAllow == 'users') {
            $aAllowUserLogin = Config::Get('plugin.brand.allow_users');
            if (in_array($oUserCurrent->getLogin(),$aAllowUserLogin)){
                return true;
            }
        }
        return false;
    }

}

?>
