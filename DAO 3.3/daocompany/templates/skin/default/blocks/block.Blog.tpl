{if $oItem->getLastTopics(Config::Get('module.topic.per_page'))}
<section class="block block-type-stream" id="block_company_social">
	<header class="block-header sep">
		<h3>{$aLang.plugin.daocompany.blog} &darr;</h3>
	</header>

	<div class="block-content" id="block_dao_pay_user_content">
		<div class="js-block-daousers-content">
            <ul class="latest-list">
				{foreach from=$oItem->getLastTopics(Config::Get('module.topic.per_page')) item=oTopic}

		<li>
	
			<p>

				<time datetime="{date_format date=$oTopic->getDateAdd() format="j F Y, H:i"}">
					{date_format date=$oTopic->getDateAdd() format="j F Y, H:i"}
				</time>

				<span class="block-item-comments">
					<i class="icon-synio-comments-small"></i>{$oTopic->getCountComment()}
				</span>
			</p>

			<a class="stream-topic" href="{$oTopic->getUrl()}">{$oTopic->getTitle()|escape:'html'}</a>

		</li>
				{/foreach}
            </ul>
		</div>
	</div>

    <footer>
        <a href="{$oCatalog->getCatalogUrlFull()}item/{$oItem->getItemLatin()}/blog/">{$aLang.plugin.dao.all_block}</a>
    </footer>
</section>
{/if}