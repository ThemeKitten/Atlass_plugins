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

class PluginBrand_ModuleBlog extends PluginBrand_Inherit_ModuleBlog
{

    protected $oUserCurrent = null;

    public function Init()
    {
        parent::Init();
        $this->oUserCurrent = $this->User_GetUserCurrent();
    }

    public function GetBlogsAdditionalData($aBlogId, $aAllowData = null)
    {
        $aBlogs = parent::GetBlogsAdditionalData($aBlogId, $aAllowData = null);

        $aBrand = $this->PluginBrand_Brand_GetBrandsByTargetByArrayId('blog', $aBlogId);
        foreach ($aBlogs as $oBlog) {
            $oBlog->setBrand(null);
            if (!empty($aBrand[$oBlog->getId()])){
                $oBlog->setBrand($aBrand[$oBlog->getId()]);
            }
        }
        return $aBlogs;
    }


}

?>