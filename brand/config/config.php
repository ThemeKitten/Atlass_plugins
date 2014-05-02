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

$config = array();

$config['table']['brand'] = '___db.table.prefix___brand';

$config['allow'] = 'users'; // admin - только админам
                            // all - всем
                            // users - админу и пользователям из списка

$config['allow_users'] = array('user1', 'user2'); // список пользователей кому разрешено использовать брендирование, используется только совместно с $config['allow'] = 'users'

Config::Set('path.uploads.brand', '___path.uploads.root___/brand');

Config::Set('router.page.ajax_brand', 'PluginBrand_ActionAjax');


/******************** НЕ РЕДАКТИРОВАТЬ/NOT EDIT ********************/
$config['id_margin_top'] = array(
    'default' => 'brand',
    'synio' => 'wrapper',
    'developer' => 'nav',
    'new' => 'nav',
    'social' => 'header',
    'simple' => 'wrapper',
    'banana' => 'wrapper', // есть проблемы с совместимостью
    'lightblue' => 'nav',  // есть проблемы с совместимостью
);

return $config;
?>
