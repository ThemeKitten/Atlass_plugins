<div class="topic-brand" xmlns="http://www.w3.org/1999/html">

    <h2>
        {if $sAction=='settings'}
            {$aLang.plugin.brand.create_title}
        {else}
            <strong><a class="link-dotted" href="#" onclick="$('#topic-brand-content').toggle('snow');return false;">{$aLang.plugin.brand.create_title}</a></strong>
        {/if}
    </h2>

    <div id="topic-brand-content" class="topic-brand-content"{if !$_aRequest.brand_active} style="display: none;"{/if}>

        <p>
            <label for="brand_form_image">{$aLang.plugin.brand.create_image}:</label>
            <input type="file" name="brand_form_image" id="brand_form_image" class="input-text" />
            <div id="brand_box_image">
            {if $_aRequest.brand_form_image}
                <br/>
                <a href="{$_aRequest.brand_form_image}"rel="[photoset]" title="" class="photoset-image"><img src="{$_aRequest.brand_form_image}" alt="" style="width: 100px"/></a>
                <label><input type="checkbox" id="brand_image_delete" name="brand_image_delete" value="on" class="input-checkbox"> {$aLang.plugin.brand.create_image_delete}</label>
       
                    <script type="text/javascript" src="{cfg name="path.root.web"}/engine/lib/external/prettyPhoto/js/prettyPhoto.js"></script>
                    <link rel='stylesheet' type='text/css' href="{cfg name="path.root.web"}/engine/lib/external/prettyPhoto/css/prettyPhoto.css" />
                    {literal}
                    <script type="text/javascript">
                        jQuery(document).ready(function($) {
                            $('.photoset-image').prettyPhoto({
                                social_tools:'',
                                show_title: false,
                                slideshow:false,
                                deeplinking: false
                            });
                        });
                    </script>
                {/literal}
            {/if}
            </div>
        </p>

        <p>
            <label for="brand_form_image_position">{$aLang.plugin.brand.create_image_position}:</label>
            <select name="brand_form_image_position" id="brand_form_image_position">
                <option value="stretch"{if $_aRequest.brand_form_image_position=='stretch'}
                        selected{/if}>{$aLang.plugin.brand.create_image_position_stretch}</option>
                <option value="tile"{if $_aRequest.brand_form_image_position=='tile'}
                        selected{/if}>{$aLang.plugin.brand.create_image_position_tile}</option>
                <option value="top"{if $_aRequest.brand_form_image_position=='top'}
                        selected{/if}>{$aLang.plugin.brand.create_image_position_top}</option>
            </select>
        </p>

        <p>
            <label for="brand_header_margin_top">{$aLang.plugin.brand.create_margin_top}:</label>
            <input type="text" id="brand_header_margin_top" name="brand_header_margin_top"
                   value="{$_aRequest.brand_header_margin_top}" class="input-text input-300"/>
        </p>

        <script type="text/javascript" src="{cfg name='path.root.web'}/plugins/brand/js/iColorPicker.js"></script>

        <p>
            <label for="brand_bg_color">{$aLang.plugin.brand.create_bg_color}:</label>
            <input type="text" id="brand_bg_color" name="brand_bg_color" value="{$_aRequest.brand_bg_color}"
                   class="input-text input-300 iColorPicker"{if $_aRequest.brand_bg_color} style="background-color: {$_aRequest.brand_bg_color}" {/if}
                   readonly />
        </p>
        <input type="button" name="brand_clead" id="brand_clead" class="button" value="{$aLang.plugin.brand.create_clear}" onclick="ls.brand.ClearBrand('{$_aRequest.target_type}', '{$_aRequest.target_id}');" style="float: right;" />
</div>
</div>