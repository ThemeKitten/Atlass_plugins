<ul class="nav nav-menu mb-0">
	<li {if $sMenuItemSelect=='image'}class="active"{/if}>
		<a href="{router page='gallery'}photo/">{$aLang.plugin.lsgallery.lsgallery_photo}</a>
	</li>
	<li {if $sMenuItemSelect=='album'}class="active"{/if}>
		<a href="{router page='gallery'}albums/">{$aLang.plugin.lsgallery.lsgallery_albums}</a>
	</li>
</ul>