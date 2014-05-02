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

class PluginBrand_HookBrand extends Hook
{
    public function RegisterHook()
    {
        $this->AddHook('template_html_head_end', 'HeadEnd');

        $this->AddHook('template_menu_settings_settings_item', 'MenuSettings');

        $this->AddHook('template_form_add_topic_topic_end', 'FormBrand');
        $this->AddHook('template_form_add_topic_question_end', 'FormBrand');
        $this->AddHook('template_form_add_topic_photoset_end', 'FormBrand');
        $this->AddHook('template_form_add_topic_link_end', 'FormBrand');
        $this->AddHook('template_form_add_blog_end', 'FormBrand');

        $this->AddHook('topic_add_after', 'AddBrandTopic');
        $this->AddHook('topic_edit_after', 'AddBrandTopic');

        $this->AddHook('blog_add_after', 'AddBrandBlog');
        $this->AddHook('blog_edit_after', 'AddBrandBlog');

        $this->AddHook('topic_edit_show', 'EditShow');
        $this->AddHook('blog_edit_show', 'EditShow');

        $this->AddHook('topic_add_show', 'AddShow');
        $this->AddHook('blog_add_show', 'AddShow');

        $this->AddHook('template_copyright', 'Copyright', __CLASS__);

    }

    public function MenuSettings()
    {
        if (!$this->ACL_AllowBrand()){
            return;
        }
        return $this->Viewer_Fetch(Plugin::GetTemplatePath('brand') . 'menu.settings_item.tpl');
    }

    public function HeadEnd()
    {
        $oSmartyObject = $this->Viewer_GetSmartyObject();
        $oSmartyTopic = $oSmartyObject->tpl_vars['oTopic']->value;
        $oSmartyBlog = $oSmartyObject->tpl_vars['oBlog']->value;
        $oSmartyUserProfile = $oSmartyObject->tpl_vars['oUserProfile']->value;

        $oBrand = null;
        if (!empty($oSmartyTopic) and $oSmartyTopic->getBrand()){
            $oBrand = $oSmartyTopic->getBrand();
        }
        if (!empty($oSmartyBlog) and $oSmartyBlog->getBrand()){
            $oBrand = $oSmartyBlog->getBrand();
        }
        if (!empty($oSmartyUserProfile) and $oSmartyUserProfile->getBrand()){
            $oBrand = $oSmartyUserProfile->getBrand();
        }
        if($oBrand){
            $this->Viewer_Assign('oBrand', $oBrand);
            $sTemplateKey = Config::Get('view.skin');
            $aTemplate = Config::Get('plugin.brand.id_margin_top');
            if (empty($aTemplate[$sTemplateKey])){
                $sTemplate = $aTemplate['default'];
            } else {
                $sTemplate = $aTemplate[$sTemplateKey];
            }
            $this->Viewer_Assign('sTemplate', $sTemplate);
            return $this->Viewer_Fetch(Plugin::GetTemplatePath(__CLASS__) . 'head_end.tpl');
        }
    }

    public function EditShow()
    {
        if (!$this->ACL_AllowBrand()){
            return;
        }
        $sAction = Router::GetAction();
        $sActionEvent = Router::GetActionEvent();
        $iId = (int)Router::GetParam(0);
        $oViewer = $this->Viewer_GetLocalViewer();
        if ($sActionEvent == 'edit' && $iId) {
            $oBrand = null;
            if ($sAction == 'topic' and $oTopic = $this->Topic_GetTopicById($iId) and $oTopic->getBrand()) {
                $oBrand=$oTopic->getBrand();
            }
            if ($sAction == 'blog' and $oBlog = $this->Blog_GetBlogById($iId) and $oBlog->getBrand()) {
                $oBrand=$oBlog->getBrand();
            }

            if (!empty($oBrand)){
                $_REQUEST['target_type'] = $oBrand->getTargetType();
                $_REQUEST['target_id'] = $oBrand->getTargetId();
                $_REQUEST['brand_active'] = 1;
                $_REQUEST['brand_form_image'] = $oBrand->getBgImage();
                $_REQUEST['brand_form_image_position'] = $oBrand->getPosition();
                $_REQUEST['brand_header_margin_top'] = $oBrand->getMarginTop();
                $_REQUEST['brand_bg_color'] = $oBrand->getBgColor();
            }
        }
    }

    public function AddShow()
    {
        if (!$this->ACL_AllowBrand()){
            return;
        }
        $sAction = Router::GetAction();
        $_REQUEST['target_type'] = $sAction;
    }

    public function FormBrand()
    {
        if (!$this->ACL_AllowBrand()){
            return;
        }
        return $this->Viewer_Fetch(Plugin::GetTemplatePath('brand') . 'brand.form_end.tpl');
    }

    public function AddBrandTopic($aVars)
    {

        $oTopic = $aVars['oTopic'];
        $this->PluginBrand_Brand_AddObjectBrand('topic', $oTopic->getId());
    }

    public function AddBrandBlog($aVars)
    {
        $oBlog = $aVars['oBlog'];
        $this->PluginBrand_Brand_AddObjectBrand('blog', $oBlog->getId());
    }

    public function Copyright()
    {
        $oSmartyObject = $this->Viewer_GetSmartyObject();
        $oBlog = $oSmartyObject->tpl_vars['oBlog']->value;
        if (empty($oBlog)) {
            return;
        }
        return '<a href="http://catalog.netlanc.net" target="_blank">Спонсор плагина Brand - catalog.netlanc.net</a><br />';
    }
}

?>
