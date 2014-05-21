{assign var="sidebarPosition" value='left'}
{include file='header.tpl'}

{include file='actions/ActionProfile/profile_top.tpl'}
{include file='menu.profile_favourite.tpl'}

{include file="`$sTemplatePathLsgallery`photo_list.tpl"}
{include file='paging.tpl' aPaging="$aPaging"}
{include file='footer.tpl'}