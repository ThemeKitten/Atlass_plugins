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

class PluginBrand_ActionSettings extends PluginBrand_Inherit_ActionSettings
{
    /**
     * Инициализация экшена
     */
    public function Init()
    {
        parent::Init();
    }

    /**
     * Регистрируем евенты
     */
    protected function RegisterEvent()
    {
        parent::RegisterEvent();
        $this->AddEvent('brand','EventBrand');
    }

    public function EventBrand()
    {
        if (!$this->ACL_AllowBrand()){
            $this->Message_AddErrorSingle($this->Lang_Get('not_access'),$this->Lang_Get('error'));
            return Router::Action('error');
        }

        $this->Viewer_AddHtmlTitle($this->Lang_Get('plugin.brand.meta_title'));
        $this->sMenuSubItemSelect='brand';

        $_REQUEST['brand_active'] = 1;
        $_REQUEST['target_type'] = 'user';
        $_REQUEST['target_id'] = $this->oUserCurrent->getId();

        if ($aBrand = $this->PluginBrand_Brand_GetBrandsByTargetByArrayId('user', array($this->oUserCurrent->getId()))){
            $oBrand = array_shift($aBrand);
        }

        if (!empty($oBrand)){
            $_REQUEST['brand_form_image'] = $oBrand->getBgImage();
            $_REQUEST['brand_form_image_position'] = $oBrand->getPosition();
            $_REQUEST['brand_header_margin_top'] = $oBrand->getMarginTop();
            $_REQUEST['brand_bg_color'] = $oBrand->getBgColor();
        }

        if (isPost('submit_brand_save')){
            if ($this->PluginBrand_Brand_AddObjectBrand('user', $this->oUserCurrent->getId())){
                Router::Location(Router::GetPath('settings') . 'brand');
            }
        }

    }

}

?>
