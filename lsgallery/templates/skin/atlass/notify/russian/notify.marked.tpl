Пользователь <a href="{$oUser->getUserWebPath()}">{$oUser->getLogin()}</a> отметил Вас на фотографии{if $oImage->getDescription()} <b>«{$oImage->getDescription()|escape:'html'|truncate:60}»</b>{/if},
подтвердить или отклонить можно перейдя по <a href="{$oImage->getUrlFull()}">этой ссылке</a><br>
<br><br>
С уважением, администрация сайта <a href="{cfg name='path.root.web'}">{cfg name='view.name'}</a>