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

class PluginBrand_ModuleBrand_MapperBrand extends Mapper
{
    public function DeleteBrand($sId)
    {
        $sql = " DELETE FROM " . Config::Get('plugin.brand.table.brand') . " WHERE brand_id = ?d";
        if ($this->oDb->query($sql, $sId)) {
            return true;
        }
        return false;
    }

    public function UpdateBrand(PluginBrand_ModuleBrand_EntityBrand $oBrand)
    {
        $sql = "UPDATE " . Config::Get('plugin.brand.table.brand') . "
                    SET
                        brand_extra = ?
                    WHERE
                        brand_id = ?d
                ";
        if ($this->oDb->query($sql, $oBrand->getExtra(), $oBrand->getId())) {
            return true;
        }
        return false;
    }

    public function AddBrand(PluginBrand_ModuleBrand_EntityBrand $oBrand)
    {
        $sql = "INSERT INTO " . Config::Get('plugin.brand.table.brand') . "
                    (
                        target_type,
                        target_id,
                        brand_extra
                    )
                    VALUES(?, ?d, ?)
                ";
        if ($iId = $this->oDb->query($sql, $oBrand->getTargetType(), $oBrand->getTargetId(), $oBrand->getExtra())) {
            $oBrand->setId($iId);
            return $iId;
        }
        return false;
    }

    public function GetBrandsByArrayId($sTargetType, $aArrayId)
    {
        if (!is_array($aArrayId) or count($aArrayId) == 0) {
            return array();
        }

        $sql = "SELECT
					b.*
				FROM
					" . Config::Get('plugin.brand.table.brand') . " as b
				WHERE
					b.target_type = ? AND b.target_id IN(?a)
				ORDER BY FIELD(b.target_id,?a)";
        $aBrands = array();
        if ($aRows = $this->oDb->select($sql, $sTargetType, $aArrayId, $aArrayId)) {

            foreach ($aRows as $aBrand) {
                $aBrands[$aBrand['target_id']] = Engine::GetEntity('PluginBrand_ModuleBrand_EntityBrand', $aBrand);
            }
        }

        return $aBrands;
    }
}

?>
