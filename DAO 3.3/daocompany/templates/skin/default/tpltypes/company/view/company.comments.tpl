{include file='header.tpl' menu='catalog' menu_content='dao'}

{literal}
<script language="JavaScript" type="text/javascript">
$(function() {
	ls.favourite.options.type.{/literal}{$oCatalog->getCatalogUrl()}{literal} = {
		url: aRouter['{/literal}{$oCatalog->getCatalogUrl()}{literal}']+'ajaxaddfavourite/',
		targetName: 'idItem'
	};

	ls.vote.options.type.{/literal}{$oCatalog->getCatalogUrl()}{literal} = {
		url: aRouter['{/literal}{$oCatalog->getCatalogUrl()}{literal}']+'ajaxvoteitem/',
		targetName: 'idItem'
	};
});
</script>
{/literal}

<div class="dao-item company">
	{include file="$sTemplateDaocompanyIncludePath/tpltypes/company/view/company.item.header.tpl"}

    {include file="`$aTemplatePathPlugin.dao`/actions/ActionDao/comments_list.tpl"}
</div>

{include file='footer.tpl'}