
  <!-- Similarpopup plugin -->
  {if $aSimilarTopics}
    <div class="SP_ViewTopicEndPlaceToShowPopup"></div>
    
    <div class="SimilarTopicsContainer RoundedCorners5 BoxShadow">
      <div class="CloseBox RoundedCorners20 ion-close-round" title="{$aLang.plugin.similarpopup.Close}"></div>
      <h3>{$aLang.plugin.similarpopup.Title}</h3>
      
      {foreach from=$aSimilarTopics item=oTopic name=nTopicCycle}
        {assign var="oBlog" value=$oTopic->getBlog()}
        {assign var="oUser" value=$oTopic->getUser()}
        <div class="OneSimilarTopicCont {if $smarty.foreach.nTopicCycle.iteration % 2 == 0}even{/if}">
          <div class="LeftSide">
            <img src="{$oUser->getProfileAvatarPath(48)}" alt="avatar" class="avatar BoxShadow" />
          </div>
          <div class="RightSide">
            {if $oTopic->getType()=='link'}
              <a class="topic_title" href="{router page='link'}go/{$oTopic->getId()}/">{$oTopic->getTitle()|escape:'html'}</a>
            {else}
              <a class="topic_title" href="{$oTopic->getUrl()}">{$oTopic->getTitle()|escape:'html'}</a>
            {/if}
            <span class="CommentCount"><i class="ion-chatboxes"></i> {$oTopic->getCountComment()}</span>
            
            <br />
            <a href="{$oUser->getUserWebPath()}" class="author">{$oUser->getLogin()}</a>
            &rarr;
            <a href="{$oBlog->getUrlFull()}" class="blogtitle">{$oBlog->getTitle()|escape:'html'}</a>
          </div>
        </div>
      {/foreach}
      <a id="Similarpopup_DontShowThisToMe" href="#">{$aLang.plugin.similarpopup.DontShowThisToMe}</a>
    </div>
    
    <script>
      {literal}
      jQuery (document).ready (function ($) {
        var Similarpopup_DontShowThisToMe = 'Similarpopup_DontShowThisToMe';
        Similarpopup_DontShowThisToMe = $.cookie (Similarpopup_DontShowThisToMe);
        if (!Similarpopup_DontShowThisToMe) {
          $ ('.SP_ViewTopicEndPlaceToShowPopup').ShowMeSimilar ('.SimilarTopicsContainer');
        }
        
        //
        // never show button
        //
        $ ('#Similarpopup_DontShowThisToMe').bind ('click.sp', function () {
          $.cookie (Similarpopup_DontShowThisToMe, '1');
          $ ('.SimilarTopicsContainer').find ('.CloseBox').trigger ('click.sp');
          return false;
        });
      });
    {/literal}
    </script>
  {/if}
  <!-- /Similarpopup plugin -->
