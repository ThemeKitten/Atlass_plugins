	{if $aBT_Topics}
		<!-- Blogtopics plugin -->
		<section class="block block-type-stream">

			<header class="block-header sep">
				<h3><a href="{$oBT_Blog->getUrlFull()}">{$oBT_Blog->getTitle()|truncate:300:'...'}</a></h3>
			</header>

			<div class="block-content">
			<ul class="latest-list">
				{foreach from=$aBT_Topics item=oBlogTopic name=aBT_Topics_Name}
					<li class="js-title-topic" title="{$oBlogTopic->getText()|strip_tags|trim|truncate:150:'...'|escape:'html'}">
						{assign var="oUser" value=$oBlogTopic->getUser()}

						<a class="circle" href="{$oUser->getUserWebPath()}"><img src="{$oUser->getProfileAvatarPath(48)}" alt="avatar" class="avatar" /></a>

						<p>
							<a href="{$oUser->getUserWebPath()}" class="author">{$oUser->getLogin()}</a>
							<br>
							<time datetime="{date_format date=$oBlogTopic->getDateAdd() format='c'}"
											  title="{date_format date=$oBlogTopic->getDateAdd() format='j F Y, H:i'}" class="small">
											{date_format date=$oBlogTopic->getDateAdd() hours_back="12" minutes_back="60" now="60" day="day H:i" format="j F Y, H:i"}
										</time>
							<span class="block-item-comments"><i class="icon-synio-comments-small"></i>{$oBlogTopic->getCountComment()}</span>
						</p>

						<a href="{$oBlogTopic->getUrl()}" class="stream-topic">{$oBlogTopic->getTitle()|escape:'html'}</a>
					</li>
				{/foreach}
			</ul>
			</div>

		</section>
		<!-- /Blogtopics plugin -->
	{/if}
