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

class PluginBrand_ModuleBrand extends Module
{

    protected $oMapper;

    public function Init()
    {
        $this->oMapper = Engine::GetMapper(__CLASS__);
    }

    public function AddObjectBrand($sType, $sId)
    {
        if (!$this->ACL_AllowBrand()){
            return;
        }
        if (!$aBrand = $this->PluginBrand_Brand_GetBrandsByTargetByArrayId($sType, array($sId))){
            $oBrand = Engine::GetEntity('PluginBrand_Brand');
            $oBrand->setTargetId($sId);
            $oBrand->setTargetType($sType);
            $sMethod = 'AddBrand';
        } else {
            $oBrand = array_shift($aBrand);
            $sMethod = 'UpdateBrand';
        }
        $oBrand->setPosition('top');
        if (in_array(getRequest('brand_form_image_position', null, 'post'),array('stretch', 'tile', 'top'))) {
            $oBrand->setPosition(getRequest('brand_form_image_position', null, 'post'));
        }
        $oBrand->setMarginTop(0);
        if (func_check(getRequest('brand_header_margin_top', null, 'post'),'id')) {
            $oBrand->setMarginTop(getRequest('brand_header_margin_top', null, 'post'));
        }
        $oBrand->setBgColor('transparent');
        if (func_check(getRequest('brand_bg_color', null, 'post'),'text', '4', '7')) {
            $oBrand->setBgColor(getRequest('brand_bg_color', null, 'post'));
        }

        if (getRequest('brand_image_delete', null, 'post')) {
            $this->Image_RemoveFile(Config::Get('path.root.server') . $oBrand->getBgImage());
            $oBrand->setBgImage(null);
        } else {
            if (Router::GetActionEvent() == 'add'){
                $oBrand->setBgImage(null);
            }
        }

        if (isset($_FILES['brand_form_image']) and is_uploaded_file($_FILES['brand_form_image']['tmp_name'])) {
            if ($sPath=$this->UploadBrand($_FILES['brand_form_image'])) {
                $oBrand->setBgImage($sPath);
            }
        }

        if ($this->$sMethod($oBrand)){
            return  true;
        }
        return false;
    }

    public function AddBrand(PluginBrand_ModuleBrand_EntityBrand $oBrand) {
        if ($sId=$this->oMapper->AddBrand($oBrand)) {
            $oBrand->setId($sId);
            //чистим зависимые кеши
            $this->Cache_Clean(Zend_Cache::CLEANING_MODE_MATCHING_TAG,array("brand_{$oBrand->getTargetType()}","brand_{$oBrand->getTargetType()}_update","brand_{$oBrand->getTargetType()}_update_{$oBrand->getTargetId()}"));
            return $oBrand;
        }
        return false;
    }

    public function UpdateBrand(PluginBrand_ModuleBrand_EntityBrand $oBrand) {
        if ($this->oMapper->UpdateBrand($oBrand)) {
            //чистим зависимые кеши
            $this->Cache_Clean(Zend_Cache::CLEANING_MODE_MATCHING_TAG,array("brand_{$oBrand->getTargetType()}","brand_{$oBrand->getTargetType()}_update","brand_{$oBrand->getTargetType()}_update_{$oBrand->getTargetId()}"));
            $this->Cache_Delete("brand_{$oBrand->getTargetType()}_id_{$oBrand->getTargetId()}");
            return true;
        }
        return false;
    }

    public function DeleteBrand($oBrand) {
        /**
         * Чистим зависимые кеши
         */
        $this->Cache_Clean(Zend_Cache::CLEANING_MODE_MATCHING_TAG,array("brand_{$oBrand->getTargetType()}_update"));
        $this->Cache_Delete("brand_{$oBrand->getTargetType()}_{$oBrand->getTargetId()}");
        /**
         * Если топик успешно удален, удаляем связанные данные
         */
        if($this->oMapper->DeleteBrand($oBrand->getId())){
            return true;
        }
        return false;
    }

    public function GetBrandsByTargetByArrayId($sTargetType, $aTargetId) {
        if (!$aTargetId) {
            return array();
        }
        if (Config::Get('sys.cache.solid')) {
            return $this->GetBrandsByArrayIdSolid($sTargetType, $aTargetId);
        }

        if (!is_array($aTargetId)) {
            $aTargetId=array($aTargetId);
        }
        $aTargetId=array_unique($aTargetId);
        $aBrands=array();
        $aBrandIdNotNeedQuery=array();
        /**
         * Делаем мульти-запрос к кешу
         */
        $aCacheKeys=func_build_cache_keys($aTargetId,"brand_{$sTargetType}_");
        if (false !== ($data = $this->Cache_Get($aCacheKeys))) {
            /**
             * проверяем что досталось из кеша
             */
            foreach ($aCacheKeys as $sValue => $sKey ) {
                if (array_key_exists($sKey,$data)) {
                    if ($data[$sKey]) {
                        $aBrands[$data[$sKey]->getId()]=$data[$sKey];
                    } else {
                        $aBrandIdNotNeedQuery[]=$sValue;
                    }
                }
            }
        }
        /**
         * Смотрим каких топиков не было в кеше и делаем запрос в БД
         */
        $aBrandIdNeedQuery=array_diff($aTargetId,array_keys($aBrands));
        $aBrandIdNeedQuery=array_diff($aBrandIdNeedQuery,$aBrandIdNotNeedQuery);
        $aBrandIdNeedStore=$aBrandIdNeedQuery;
        if ($data = $this->oMapper->GetBrandsByArrayId($sTargetType, $aBrandIdNeedQuery)) {
            foreach ($data as $oBrand) {
                /**
                 * Добавляем к результату и сохраняем в кеш
                 */
                $aBrands[$oBrand->getTargetId()]=$oBrand;
                $this->Cache_Set($oBrand, "brand_{$sTargetType}_{$oBrand->getTargetId()}", array(), 60*60*24*4);
                $aBrandIdNeedStore=array_diff($aBrandIdNeedStore,array($oBrand->getTargetId()));
            }
        }
        /**
         * Сохраняем в кеш запросы не вернувшие результата
         */
        foreach ($aBrandIdNeedStore as $sId) {
            $this->Cache_Set(null, "brand_{$sTargetType}_{$sId}", array(), 60*60*24*4);
        }
        /**
         * Сортируем результат согласно входящему массиву
         */
        $aBrands=func_array_sort_by_keys($aBrands,$aTargetId);
        return $aBrands;
    }
    /**
     * Получить список топиков по списку айдишников, но используя единый кеш
     *
     * @param array $aBrandId	Список ID топиков
     * @return array
     */
    public function GetBrandsByArrayIdSolid($sTargetType, $aTargetId) {
        if (!is_array($aTargetId)) {
            $aTargetId=array($aTargetId);
        }
        $aTargetId=array_unique($aTargetId);
        $aBrands=array();
        $s=join(',',$aTargetId);
        if (false === ($data = $this->Cache_Get("brand_{$sTargetType}_id_{$s}"))) {
            $data = $this->oMapper->GetBrandsByArrayId($sTargetType, $aTargetId);
            foreach ($data as $oBrand) {
                $aBrands[$oBrand->getTargetId()]=$oBrand;
            }
            $this->Cache_Set($aBrands, "brand_{$sTargetType}_id_{$s}", array("brand_{$sTargetType}_update"), 60*60*24*1);
            return $aBrands;
        }
        return $data;
    }

    public function UploadBrand($aFile)
    {
        if (!is_array($aFile) || !isset($aFile['tmp_name'])) {
            return false;
        }

        $sFileTmp = Config::Get('sys.cache.dir') . func_generator();

        $sFileTmpName = func_generator();
        $sFileTmpPath = Config::Get('path.uploads.brand') . '/';

        if (!move_uploaded_file($aFile['tmp_name'], $sFileTmp)) {
            return false;
        }

        $oImage = $this->Image_CreateImageObject($sFileTmp);
        $sFile = $this->Image_SaveFile($sFileTmp, $sFileTmpPath, func_generator(6) . '.' . $oImage->get_image_params('format'));
        $this->Image_RemoveFile($sFileTmp);
        return str_replace(Config::Get('path.root.server'), '', $sFile);

    }
}

?>
