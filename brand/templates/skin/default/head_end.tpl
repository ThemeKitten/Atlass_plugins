{if $oBrand}
    <style type="text/css">
        #brand {
            {if $oBrand->getBgColor()}
                background-color: {$oBrand->getBgColor()};
            {/if}
            {if $oBrand->getBgImage()}
                background-image: url({$oConfig->get('path.root.web')}/{$oBrand->getBgImage()});
                {if $oBrand->getPosition()=='stretch'}
                    background-position: top left;
                    background-repeat: no-repeat;
                    background-attachment:fixed;
                    background-size: 100% 100%;
                    {else if $oBrand->getPosition()=='top'}
                    background-position: top center;
                    background-repeat: no-repeat;
                {/if}
            {/if}
        }
        {if $oBrand->getMarginTop()}
        #{$sTemplate} {literal}{{/literal}
            margin-top: {$oBrand->getMarginTop()}px;
            {literal}}{/literal}
        {/if}
    </style>
{/if}