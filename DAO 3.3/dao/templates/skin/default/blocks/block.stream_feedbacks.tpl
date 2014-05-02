<ul class="latest-list">
	{foreach from=$aCommentsCatalog item=oComment name="cmt"}
		{assign var="oUser" value=$oComment->getUser()}

		<li class="js-title-comment" title="{$oComment->getText()|strip_tags|trim|truncate:100:'...'}">

			<a class="circle" href="{$oUser->getUserWebPath()}"><img src="{$oUser->getProfileAvatarPath(48)}" alt="avatar" class="avatar" /></a>

			<p>
				<a href="{$oUser->getUserWebPath()}" class="author">{$oUser->getLogin()}</a>

				<time datetime="{date_format date=$oComment->getDate() format='c'}" title="{date_format date=$oComment->getDate() format="j F Y, H:i"}">
					{date_format date=$oComment->getDate() hours_back="12" minutes_back="60" now="60" day="day H:i" format="j F Y, H:i"}
				</time>

			<span class="block-item-comments"><i class="icon-synio-comments-small"></i>{$oComment->getItemCountComment()}</span>
			
			</p>

			<a href="{$oComment->getItemUrl()}#comment{$oComment->getId()}" class="stream-topic">{$oComment->getItemTitle()|escape:'html'}</a>

		</li>
	{/foreach}
</ul>