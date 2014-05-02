var ls = ls || {};

function submitmainform() {
  $('#item_add_form').append('<input type=\"hidden\" name=\"submit_item_publish\" value=\"1\" />');
  $('#item_add_form').submit();
}

$(function() {
	/*$(".dao-video-crop").each(function(i, e) {
		var crop_height = $(e).height();
		var img         = $(e).find('img');
		var img_height  = img.height();
		//if(img_height<crop_height){
			img.css('top', -( img_height - crop_height ) / 2 );
		//}
	});*/
	if(jQuery().jqm){
		$('#insert_to_blog').jqm({trigger: '#insert_to_blog_link'});
	}
	$(".dao-filter-toggle").click(function(){
		$(this).toggleClass("opened").next("div").toggle();
		return false;
	});

	if(jQuery().poshytip){
		$('.js-title-dao').poshytip({
			className: 'infobox-yellow',
			alignTo: 'target',
			alignX: 'right',
			alignY: 'center',
			offsetX: 10,
			liveEvents: true,
			showTimeout: 1000
		});
	}

	$('#mark-video-user').click(function(){
		$('#mark-video-user').css({'display':'none'});
		$('.mark-name').css({'display':'block'});
		return false;
	});
	$('.vid-cancel-selected-friend').click(function(){
		$('#mark-video-user').css({'display':'inline'});
		$('.mark-name').css({'display':'none'});
		return false;
	});
	/*$('#video_autocomplete_user').keydown(function (event) {
		if (event.which == 13) {
			ls.videomark.add({/literal}{$oItem->getItemId()}{literal});
		}
	});*/
	$('#catalog_relation').click(function(){
		$('#catalog_relation_data').slideToggle();
	});
	$('body').on('click', '.dao-popup-trigger', function(e){
		e.preventDefault();
		ls.daomodal.load($(this).attr('ajax-url'),$(this).attr('data-id'));
	});
	$('body').on('click', '#dao-shedule-remove', function(e){
		$(this).parent().remove();
		return false;
	});
	$('body').on('click', '#dao-add-time', function(e){
		ls.dao.addTime($(this));
		return false;
	});
	$('body').on('change', '#shedule-select', function(e){
		ls.dao.changeAttr($(this));
		return false;
	});
	//appendDatepicker();

});

function appendDatepicker() {
	$('.date-picker').each(function(){
		$(this).datepicker({
			dateFormat: 'dd.mm.yy',
			dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
			monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
			firstDay: 1
		});
	});
};

function showpaysumm() {
	if($("#catalog_pay_summ_area").css('display')=='none') {
		$("#catalog_pay_summ_area").css({display:'block'});
	} else {
		$("#catalog_pay_summ_area").css({display:'none'});
	}
}
function checkusercontent() {
	if($("#catalog_usercontent").is(':checked')){
		$("#catalog_pay").removeAttr("disabled");
	}else{
		$("#catalog_pay").attr("disabled", true);
		$("#catalog_pay").removeAttr("checked");
		$("#catalog_pay_summ_area").css({display:'none'});
	}
}

function extendedgo(){
	$("#extfilter").val('1');
	$("#filter_form").submit();
	return false;
}

function setTopBlock(type){
	if(type=='pay'){
		$('#block_dao_pay_content').css({display: "block"});
		$('#block_dao_free_content').css({display: "none"});
		$('#block_dao_pay_top').attr('class','active');
		$('#block_dao_free_top').removeAttr("class");
	}else{
		$('#block_dao_pay_content').css({display: "none"});
		$('#block_dao_free_content').css({display: "block"});
		$('#block_dao_free_top').attr('class','active');
		$('#block_dao_pay_top').removeAttr('class');
	}
	return false;
}

function setTopBlockUsers(type){
	if(type=='pay'){
		$('#block_dao_pay_user_content').css({display: "block"});
		$('#block_dao_free_user_content').css({display: "none"});
		$('#block_dao_pay_user_top').attr('class','active');
		$('#block_dao_free_user_top').removeAttr("class");
	}else{
		$('#block_dao_pay_user_content').css({display: "none"});
		$('#block_dao_free_user_content').css({display: "block"});
		$('#block_dao_free_user_top').attr('class','active');
		$('#block_dao_pay_user_top').removeAttr('class');
	}
	return false;
}

function switchTabs(type){
	$(".js-dao-tabs-content .js-dao-tab-content").hide();
	$("#tab_info_"+type).show();
	$(".js-dao-tabs li").removeClass('active');
	$("#tab_"+type).addClass('active');
	return false;
}

function toggleEdit(n, item) {
	$("#catalog_edit").children('div').each(function() {$(this).css({display:'none'});});
	$('#itemEdit'+n).css({display:'block'});
	$("#item_edit_menu").children('li').each(function() {$(this).removeClass('active');});
	$('#item_edit_menu_'+n).addClass('active');
}

function moneyCount(obj) {
	if(obj.val().charAt( obj.val().length - 4) == ".") {
		obj.val() = Math.floor(obj.val() * 100) / 100;
	}
	if(obj.val() == ".") {
		obj.val("");
	}
}

function removeItems() {
	if ($('.form_items_checkbox:checked').length == 0) {
		return false;
	}
	$('#form_items_list_submit_del').val(1);
	$('#form_items_list').submit();
	return false;
}

function checkInput(checkObj, e,obj) {
	var ie = (document.all) ? true : false;
	if (!ie) {
		if (((e.keyCode >= 33) && (e.keyCode <= 40)) || (e.keyCode == 45) || (e.keyCode == 46) || (e.keyCode == 8) || (e.keyCode == 9) || (e.keyCode == 13) || (e.keyCode == 27)) {
			return true;
		}
		if (((e.which < 48) || (e.which > 57)) && (e.which != 46)) {
			return false;
		}
		if ((e.which == 46) && (checkObj.value.indexOf('.') >= 0)) {
			return false;
		}
		if ((e.which == 46) && (checkObj.value == "")) { return false; }
	} else {
		if (((e.keyCode < 48) || (e.keyCode > 57)) && (e.keyCode != 46)) {
			return false;
		}
		if ((e.keyCode == 46) && (checkObj.value.indexOf('.') >= 0)) {
			return false;
		}
		if ((e.keyCode == 46) && (checkObj.value == "")) { return false; }
	}
	return true;
}

function checkSourceValueField(obj) {
	var field = obj.val();
	var regExp = /[^0-9\.]/g ; ///[\W^a-zA-Z_]/;
	var str = field.replace(/(^\s+)|(\s+$)/g, ""); //	trim(field);
	if (str == "" || str.match(regExp))
	obj.val('');
}

function setPrice(val){
   if(val=='pay'){
		$('#price').css({display:'block'});
		$('#require_check_p').css({display:'block'});
		$('#item_price').val('');
	} else {
		if(val=='free'){
			$('#price').css({display:'none'});
			$('#require_check_p').css({display:'none'});
			$('#item_price').val('0');
		}
	}
}


var ls = ls || {};

ls.daoeditors =( function ($) {
	this.isBusy = false;

	this.editoradd = function (itemId,iId) {
	   ls.ajax(DAO_URL+'ajaxeditors/editoradd/', {'itemId':itemId,'id':iId}, function(data) {
				if (!data.bStateError) {
					ls.msg.notice(data.sMsgTitle,data.sMsg);
				}
			});
	}
	this.editordelete = function (itemId,iId) {
		 ls.ajax(DAO_URL+'ajaxeditors/editordelete/', {'itemId':itemId,'id':iId}, function(data) {
				if (!data.bStateError) {
					ls.msg.notice(data.sMsgTitle,data.sMsg);
				}
			});
	}
	this.appendUser = function(itemId) {
		var sLogin = $('#daoeditors_user_complete').val();
		if (!sLogin) return;
		 ls.ajax(DAO_URL+'ajaxeditors/login/', {'itemId':itemId,'login':sLogin}, function(data) {
				if (data.bStateError) {
					ls.msg.error(data.sMsgTitle,data.sMsg);
				} else {
					$('#daoeditors_no_subscribed_users').remove();
					var checkbox = $('#usf_u_'+data.uid);
					if (checkbox.length) {
						if (checkbox.attr('checked')) {
							ls.msg.error(data.sMsgTitle,data.sMsg);
						} else {
							checkbox.attr('checked', 'on');
							ls.msg.notice(data.sMsgTitle,data.sMsg);
						}
					} else {
						var liElement='<li><input type="checkbox" class="userfeedUserCheckbox input-checkbox" id="usf_u_'+data.uid+'" checked="checked" onClick="if ($(this).get(\'checked\')) {ls.daoeditors.editoradd('+itemId+','+data.uid+')} else {ls.daoeditors.editordelete('+itemId+','+data.uid+')}" /><a href="'+data.user_web_path+'" title="'+data.user_login+'"><img src="'+data.user_avatar+'" alt="avatar" class="avatar" /></a><a href="'+data.user_web_path+'">'+data.user_login+'</a></li>';
						$('#daoeditors_block_users_list').append(liElement);
						ls.msg.notice(data.sMsgTitle,data.sMsg);
					}
				}
			});
	}

	return this;
}).call(ls.daoeditors || {},jQuery);

var ls = ls || {};

ls.videomark =( function ($) {
	this.isBusy = false;

	this.add = function (itemId) {
		var sLogin = $('#video_autocomplete_user').val();
		if (!sLogin) return;

		ls.ajax(DAO_URL+'ajaxonvideo/add/', {'itemId':itemId,'login':sLogin}, function(data) {
		if (!data.bStateError) {

			ls.msg.notice(data.sMsgTitle,data.sMsg);
			sTpl='<span id="ls-video-mark-'+sLogin+'"> <a class="ls-user" href="'+aRouter['profile']+sLogin+'">'+sLogin+'</a><a href="#" onclick="ls.videomark.del(\''+itemId+'\',\''+sLogin+'\');return false;">[x]</a></span>';

			$('#videomarks').append(sTpl);

			$('#mark-video-user').css({'display':'inline'});
			$('.mark-name').css({'display':'none'});
			$('#video_autocomplete_user').val('');
		} else {
		   ls.msg.error(data.sMsgTitle,data.sMsg);
		}
		});
	}

	this.del = function (itemId,login) {
		 ls.ajax(DAO_URL+'ajaxonvideo/delete/', {'itemId':itemId,'login':login}, function(data) {
				if (!data.bStateError) {
					ls.msg.notice(data.sMsgTitle,data.sMsg);
					$('#ls-video-mark-'+login).remove();
				}
			});
	}
	return this;
}).call(ls.videomark || {},jQuery);

var ls = ls || {};

ls.daomodal =( function ($) {

	this.isBusy = false;
	
	this.options = {
		loader: DIR_STATIC_SKIN + '/images/loader.gif'
	};

	this.load = function (url,itemId) {
		if (!url) return;
		if (!itemId) return;

		$('#item-ajax-modal').modal().open();
		$('#item-ajax-modal').css({'background': '#fbfcfc url(' + this.options.loader + ') no-repeat center center', 'min-height': 70});
		ls.ajax(aRouter[url]+'ajaxitem/', {'itemId':itemId}, function(data) {
			if (!data.bStateError) {
				$('#item-ajax-modal').append(data.sTextResult);
			} else {
			   ls.msg.error(data.sMsgTitle,data.sMsg);
			   $.modal().close();
			}
		});
	}

	return this;
}).call(ls.daomodal || {},jQuery);


var ls = ls || {};

ls.dao =( function ($) {

	this.addShedule = function() {
		var newItem = $('#dao-shedule-list').html();
		var addTime = '<a href="#" id="dao-add-time" class="link-dotted">'+ls.lang.get('plugin.dao.dao_add_shedule')+'</a>';
		$('.dao-shedule > tbody:last').append('<tr><td>'+newItem+'</td><td>'+addTime+'</td></tr>')
	};

	this.addTime = function(elem) {
		var id = elem.parent().parent().find('option:selected').val();
		var n = elem.parent().children('div').length + 1;
		var r = Math.floor(Math.random()*100000).toString()+Math.floor(Math.random()*100000).toString();
		if(elem.parent().children('div').last().find('input.date-picker').val() === undefined){
			var newDate = $.datepicker.formatDate('dd.mm.yy', new Date());
		}else{
			var newDate = elem.parent().children('div').last().find('input.date-picker').val();
		}
		
		var newShedule= '<div>'+
				'<input type="text" name="shedule['+id+']['+n+'][date]" data-id="date" id="datepick-'+r+'" class="input-text input-width-100 date-picker" value="'+newDate+'"/> '+
				'<input type="text" name="shedule['+id+']['+n+'][hour]" data-id="hour" class="input-text input-width-50" value="10"/>: '+
				'<input type="text" name="shedule['+id+']['+n+'][min]" data-id="min" class="input-text input-width-50" value="00"/> '+
				'<a class="icon-synio-remove" id="dao-shedule-remove" href="#" title="'+ls.lang.get('delete')+'"></a>'+
				'</div>';
		elem.before(newShedule);
		appendDatepicker();
		return false;
	};

	this.changeAttr = function(elem){
		var id=elem.val();
		var aDivs= elem.parent().parent().children('td').last().find('div');
		var i=0;
		aDivs.each(function(){
			i=i+1;
			$(this).find('input').each(function(){
				$(this).attr('name', 'shedule['+id+']['+i+']['+$(this).attr('data-id')+']');
			});
		});
	}

	this.toggleShedule = function(){
		$('.shedule-container').slideToggle();
		$('#dates').slideToggle();


		if($("#selplace").length){
			$('#selplace').remove();
		} else {
			var newItem = $('#dao-shedule-list').html();
			$('#dates').append('<p id="selplace">'+newItem+'</p>');
		}
		return false;
	}

	/*this.togglePercent = function() {
		if($('#catalog_usercontent option:selected').val()=='1'){
			$('#catalog_percent_container').slideToggle();
		}
	}*/

	this.addCompare = function(url,itemId) {
		if (!url) return;
		ls.ajax(aRouter[url]+'ajaxaddcompare/', {'itemId':itemId}, function(data) {
			if (!data.bStateError) {
				
				$('#item_compare_'+itemId)
					.html(data.sTextResult)
					.attr('href',aRouter[url]+'compare/')
					.attr('onclick','')
					.removeClass('link-dotted');

			} else {
			   ls.msg.error(data.sMsgTitle,data.sMsg);
			}
		});
	}

	this.showCompare = function(type) {
		if (!type) return;
		$('.compare-table-body').find('tr').not('.neq').each(function(index) {
			if(type=='all'){
				$(this).removeAttr('style');
				$('#prop_head_'+$(this).attr('data-id')).removeAttr('style');
			}
			if(type=='diff'){
				$(this).css('display', 'none');
				$('#prop_head_'+$(this).attr('data-id')).css('display', 'none');
			}
		});
		$('.compare_selector').find('li').removeClass('active');
		$('#compare_'+type+'_link').addClass('active');
		return false;
	}

	return this;
}).call(ls.dao || {},jQuery);