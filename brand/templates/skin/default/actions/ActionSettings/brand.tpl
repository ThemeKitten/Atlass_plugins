{assign var="noSidebar" value=true}
{include file='header.tpl'}


{include file='actions/ActionProfile/profile_top.tpl'}
{include file='menu.settings.tpl'}


<form method="post" enctype="multipart/form-data" class="form-profile">
	{hook run='form_settings_profile_begin'}

	<input type="hidden" name="security_ls_key" value="{$LIVESTREET_SECURITY_KEY}">

    {include file="$sTPBrand/brand.form_end.tpl"}
	<button type="submit" name="submit_brand_save" class="button button-primary" />{$aLang.plugin.brand.create_submit_brand_save}</button>
</form>


{include file='footer.tpl'}