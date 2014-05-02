/* -------------------------------------------------------
 *
 *   LiveStreet (v1.x)
 *   Plugin Brand (v.0.1)
 *   Copyright © 2012 Bishovec Nikolay
 *
 * --------------------------------------------------------
 *
 *   Plugin Page: http://netlanc.net
 *   Contact e-mail: netlanc@yandex.ru
 *
 ---------------------------------------------------------
 */
var ls = ls || {};

ls.brand = (function ($) {

    this.ClearBrand = function (type, id) {
        $('#brand_form_image_position').val('stretch');
        $('#brand_header_margin_top').val('');
        $('#brand_bg_color').val('').css('background-color', '#fff');
        if (!id) {
            return;
        }
        $('#brand_box_image').html('');
        ls.ajax(aRouter['ajax_brand'] + 'brand/clear/', {type:type, id:id}, function (data) {
            if (data.bStateError) {
                ls.msg.error(data.sMsgTitle, data.sMsg);
            } else {
                ls.msg.notice(data.sMsgTitle, data.sMsg);
            }
        });
        return false;
    };


    return this;

}).call(ls.brand || {}, jQuery);

