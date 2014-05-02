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

class PluginBrand_ActionAjax extends ActionPlugin
{

	protected $oUserCurrent = null;

	public function Init()
	{
		$this->oUserCurrent = $this->User_GetUserCurrent();
		if (!$this->oUserCurrent) {
			$this->Message_AddErrorSingle($this->Lang_Get('not_access'), $this->Lang_Get('error'));
			return;
		}
		$this->Viewer_SetResponseAjax('json');
	}

	protected function RegisterEvent()
	{
        $this->AddEventPreg('/^brand$/', '/^clear$/', 'BrandClear');
    }

    protected function BrandClear()
    {
        $this->Viewer_SetResponseAjax('json');

        $iId = getRequest('id');
        $sType = getRequest('type');


        if (in_array($sType,array('stretch', 'tile', 'top'))) {
            $this->Message_AddErrorSingle($this->Lang_Get('plugin.brand.not_type_position'), $this->Lang_Get('error'));
            return;
        }

        if (!($oTopic = $this->Topic_GetTopicById($iId))){
            return;
        }

        if (!$aBrand = $this->PluginBrand_Brand_GetBrandsByTargetByArrayId($sType, array($iId))){
            return;
        }

        $oBrand = array_shift($aBrand);

        $this->PluginBrand_Brand_DeleteBrand($oBrand);

        return;

    }

}