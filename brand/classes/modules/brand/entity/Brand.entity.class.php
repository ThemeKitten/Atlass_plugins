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

class PluginBrand_ModuleBrand_EntityBrand extends Entity
{
    protected $aExtra=null;
    /*
     * Гетеры
     */

    public function getId()
    {
        return $this->_aData['brand_id'];
    }

    public function getTargetType()
    {
        return $this->_aData['target_type'];
    }

    public function getTargetId()
    {
        return $this->_aData['target_id'];
    }

    public function getExtra()
    {
        return $this->_getDataOne('brand_extra') ? $this->_getDataOne('brand_extra') : serialize('');
    }

    /**
     * Расширения методов
     */
    protected function extractExtra() {
        if (is_null($this->aExtra)) {
            $this->aExtra=@unserialize($this->getExtra());
        }
    }
    protected function setExtraValue($sName,$data) {
        $this->extractExtra();
        $this->aExtra[$sName]=$data;
        $this->setExtra($this->aExtra);
    }
    protected function getExtraValue($sName) {
        $this->extractExtra();
        if (isset($this->aExtra[$sName])) {
            return $this->aExtra[$sName];
        }
        return null;
    }

    public function setPosition($data) {
        $this->setExtraValue('position',$data);
    }

    public function getPosition() {
        return $this->getExtraValue('position');
    }

    public function setMarginTop($data) {
        $this->setExtraValue('margin_top',$data);
    }

    public function getMarginTop() {
        return $this->getExtraValue('margin_top');
    }

    public function setBgColor($data) {
        $this->setExtraValue('bg_color',$data);
    }

    public function getBgColor() {
        return $this->getExtraValue('bg_color');
    }

    public function setBgImage($data) {
        $this->setExtraValue('brand_image',$data);
    }

    public function getBgImage() {
        return $this->getExtraValue('brand_image');
    }

    /*
    * Cетеры
    */

    public function setId($data)
    {
        $this->_aData['brand_id'] = $data;
    }

    public function setTargetType($data)
    {
        $this->_aData['target_type'] = $data;
    }

    public function setTargetId($data)
    {
        $this->_aData['target_id'] = $data;
    }

    public function setExtra($data)
    {
        $this->_aData['brand_extra']=serialize($data);
    }

}

?>
