<?php

/*-------------------------------------------------------
*
*	Template "Atlass Social Network"
*	Copyright © AngelsmediaThemes
*	Contact - angelsmedia@yandex.ru
*
*--------------------------------------------------------
*
*	Адаптации плагинов:
*	http://yadi.sk/d/86g5u8-pMXKr5
*	Документация по шаблону:
*	http://angelsmedia.org/preview/atlass/doc-rus.htm
*
---------------------------------------------------------
*/

$config = array();

/* -------------------------------------------------------------------
	Генератор тем

	// - GREENSEA
-------------------------------------------------------------------
	$config['view']['theme'] 					= 'greensea';
	$config['theme']['color']['main']    		= '007F85';
	$config['theme']['color']['sidebar'] 		= '1A1A25';
	$config['theme']['color']['content'] 		= 'E7EBF2';
	$config['theme']['color']['button'] 		= '0E8AC9';
	$config['theme']['color']['button_primary'] = '7D3BA2';

	// - VIOLET
-------------------------------------------------------------------
	$config['view']['theme'] 					= 'violet';
	$config['theme']['color']['main']    		= '6964A7';
	$config['theme']['color']['sidebar'] 		= '251F2C';
	$config['theme']['color']['content'] 		= 'EEEEEE';
	$config['theme']['color']['button'] 		= 'A764A2';
	$config['theme']['color']['button_primary'] = '305AA5';

	// - RED
-------------------------------------------------------------------
	$config['view']['theme']                    = 'red';
	$config['theme']['color']['main']    		= 'D64541';
	$config['theme']['color']['sidebar'] 		= '252328';
	$config['theme']['color']['content'] 		= 'EEEEEE';
	$config['theme']['color']['button'] 		= '8C73A5';
	$config['theme']['color']['button_primary'] = '46629E';

	// - GREEN
-------------------------------------------------------------------
	$config['view']['theme'] 					= 'green';
	$config['theme']['color']['main']    		= '22A86D';
	$config['theme']['color']['sidebar'] 		= '2E2F31';
	$config['theme']['color']['content'] 		= 'EFF1F5';
	$config['theme']['color']['button'] 		= 'EC7148';
	$config['theme']['color']['button_primary'] = '566FBF';

	// - CHAMBRAY
-------------------------------------------------------------------
	$config['view']['theme'] 					= 'chambray';
	$config['theme']['color']['main']    		= '3A539B';
	$config['theme']['color']['sidebar'] 		= '101420';
	$config['theme']['color']['content'] 		= 'E7EBF2';
	$config['theme']['color']['button'] 		= '3A9B78';
	$config['theme']['color']['button_primary'] = '3A8B9B';

	нужный конфиг темы скопировать ниже или создайте свою (см.инструкцию)
------------------------------------------------------------------- */
	$config['view']['theme'] 					= 'violet';
	$config['theme']['color']['main']    		= '6964A7';
	$config['theme']['color']['sidebar'] 		= '251F2C';
	$config['theme']['color']['content'] 		= 'EEEEEE';
	$config['theme']['color']['button'] 		= 'A764A2';
	$config['theme']['color']['button_primary'] = '305AA5';

/* -------------------------------------------------------------------
	Настройки сайдбара 									- (yes) (no)
------------------------------------------------------------------- */
	// - на странице блогов
	$config['theme']['sidebar']['blogs'] = 'no';

	// - на странице "люди"
	$config['theme']['sidebar']['people'] = 'no';

/* -------------------------------------------------------------------
	Использовать лого-изображение в шапке 				- (yes) (no)
------------------------------------------------------------------- */
	$config['theme']['logo']['mode'] = 'yes';

/* -------------------------------------------------------------------
	Иконки соц.сетей
------------------------------------------------------------------- */
	$config['social']['icon1']['link']  = 'mailto:mail@mysite.com';
	$config['social']['icon1']['class'] = 'icon-mail-alt';
	$config['social']['icon1']['text']  = 'Написать нам';

	$config['social']['icon2']['link']  = '#';
	$config['social']['icon2']['class'] = 'icon-twitter';
	$config['social']['icon2']['text']  = 'Twitter сайта';

	$config['social']['icon3']['link']  = '#';
	$config['social']['icon3']['class'] = 'icon-vkontakte';
	$config['social']['icon3']['text']  = 'Мы Вконтакте';

	$config['social']['icon4']['link']  = '#';
	$config['social']['icon4']['class'] = 'icon-facebook';
	$config['social']['icon4']['text']  = 'Дружим на Facebook';

/* -------------------------------------------------------------------
	Отключить копирайты со-авторов шаблона в подвале 	- (yes) (no)
------------------------------------------------------------------- */
	$config['theme']['copyright']['footer'] = 'yes';

/* -------------------------------------------------------------------
	Запретить правый клик мыши на сайте 				- (yes) (no)
------------------------------------------------------------------- */
	$config['theme']['right']['click'] = 'no';

/* -------------------------------------------------------------------
	Показывать в подвале панель "Stat Performance"		- (yes) (no)
------------------------------------------------------------------- */
	$config['theme']['stat-performance']['show'] = 'yes';

/* -------------------------------------------------------------------
	Стиль страницы входа: изображения или анимация	  - (video) (images)
------------------------------------------------------------------- */
	$config['theme']['login']['style'] = 'video';

// id video youtube (из ссылки сайта youtube.com)
	$config['theme']['login']['videoid'] = 'lnmZkj3p8vM';

/* -------------------------------------------------------------------
	Настройки - перенастраивает основной \config\config.php LS
------------------------------------------------------------------- */

// сколько записей выводить в блоке "Прямой эфир" 5 10 15
	$config['block']['stream']['row'] = 5;

// Число топиков на одну страницу
	$config['module']['topic']['per_page']   = 8;

// сколько тегов выводить в блоке "теги"
	$config['block']['tags']['tags_count'] = 56;

// Ограничение на максимальное количество символов в одном сообщении на стене
	$config['module']['wall']['text_max'] = 2000;

// до какого размера в пикселях ужимать картинку по щирине при загрузки её в топики и комменты
	$config['view']['img_resize_width'] = 700;

// Число блогов на страницу
	$config['module']['blog']['per_page']        = 16;

// Число юзеров на страницу на странице статистики и в профиле пользователя
	$config['module']['user']['per_page']    = 25;  
      
// сколько записей выводить в блоке "Блоги"
	$config['block']['blogs']['row']  = 10;

// число фоток для одновременной загрузки
	$config['module']['topic']['photoset']['per_page'] = 30;

// Максимальная вложенность комментов при отображении
	$config['module']['comment']['max_tree'] = 5;

// Ограничение на вывод числа друзей пользователя на странице его профиля
	$config['module']['user']['friend_on_profile']    = 18;

// ширина квадрата фотографии в профиле, px
	$config['module']['user']['profile_photo_width'] = 1000;

// Список размеров аватаров у блога. 0 - исходный размер
	$config['module']['blog']['avatar_size'] = array(300,270,100,64,48,24,0);

// конец настроек, дальше не трогать

	$config['head']['default']['js'] = Config::Get('head.default.js');
	$config['head']['default']['js'][] = '___path.static.skin___/js/template.js';
	$config['head']['default']['js'][] = '___path.static.skin___/js/masonry.js';
	$config['head']['default']['js'][] = '___path.static.skin___/js/share.js';
	$config['head']['default']['js'][] = '___path.static.skin___/js/forms.js';
	$config['head']['default']['js'][] = '___path.static.skin___/js/sidebar.js';
	$config['head']['default']['js'][] = '___path.static.skin___/js/nanobar.min.js';
	$config['head']['default']['js'][] = '___path.static.skin___/js/responsive-nav.min.js';

	$config['head']['default']['css'] = array(
	"___path.static.skin___/css/reset.css",
	"___path.static.skin___/css/base.css",
	"___path.static.skin___/css/theme-font.css",
	"___path.static.skin___/css/theme-sidebars.css",
	"___path.static.skin___/css/theme-footer.css",
	"___path.root.engine_lib___/external/jquery/markitup/skins/synio/style.css",
	"___path.root.engine_lib___/external/jquery/markitup/sets/synio/style.css",
	"___path.root.engine_lib___/external/jquery/jcrop/jquery.Jcrop.css",
	"___path.root.engine_lib___/external/prettify/prettify.css",
	"___path.static.skin___/css/text.css",
	"___path.static.skin___/css/theme-forms.css",
	"___path.static.skin___/css/buttons.css",
	"___path.static.skin___/css/navs.css",
	"___path.static.skin___/css/fontello/css/fontello.css",
	"___path.static.skin___/css/ionicons/css/ionicons.min.css",
	"___path.static.skin___/css/tables.css",
	"___path.static.skin___/css/topic.css",
	"___path.static.skin___/css/icons.css",
	"___path.static.skin___/css/comments.css",
	"___path.static.skin___/css/blocks.css",
	"___path.static.skin___/css/modals.css",
	"___path.static.skin___/css/profiles.css",
	"___path.static.skin___/css/wall.css",
	"___path.static.skin___/css/infobox.css",
	"___path.static.skin___/css/jquery.notifier.css",
	"___path.static.skin___/css/smoothness/jquery-ui.css",
	"___path.static.skin___/css/print.css",
	"___path.static.skin___/css/theme-main.css",
	"___path.static.skin___/css/theme-topics.css",
	"___path.static.skin___/css/theme-responsive.css",
);

/* Размеры превью для топиков */
	// - 300/250		- metro nosidebar
	// - 400/250		- metro sidebar
	// - 599/500		- metro bigpicture
	// - 800/500		- metro bigpicture sidebar
	// - 600/250		- metro question

	$config['plugin']['mainpreview']['size_images_preview']=array(

	array(
		'w' => 300,
		'h' => 250,
		'crop' => true,
	),
	array(
		'w' => 400,
		'h' => 250,
		'crop' => true,
	),
	array(
		'w' => 599,
		'h' => 500,
		'crop' => true,
	),
	array(
		'w' => 800,
		'h' => 500,
		'crop' => true,
	),
	array(
		'w' => 600,
		'h' => 250,
		'crop' => true,
	),

);

/* Блоки для страницы активности */
$config['block']['rule_list_of_blog'] = array(
	'action'  => array('stream' => array('all') ),
	'blocks'  => array('right' => array('stream','blogs') ),
);

/* -------------------------------------------------------------------
	Выбираем тип топика (скоро) 
------------------------------------------------------------------- */
	// - timeline
	// - timeline_dual
	// - metro
	// - bigpicture
	// - masonry
	$config['theme']['topic']['type'] = 'timeline';

	// - на страницах топиков
	$config['theme']['sidebar']['topics'] = 'yes';

/* -------------------------------------------------------------------
	Фиксировать шапку сайта (скоро) 					- (yes) (no)
------------------------------------------------------------------- */
	$config['theme']['header']['fixed'] = 'no';

/* -------------------------------------------------------------------
	Публикации в прямом эфире (скоро)					- (yes) (no)
------------------------------------------------------------------- */
	$config['theme']['mode']['news'] = 'no';

/* -------------------------------------------------------------------
	Показывать силу в профиле (скоро)					- (yes) (no)
------------------------------------------------------------------- */
	$config['theme']['profile']['strength'] = 'no';

return $config;
?>