var validation_ini = {};

$(document).ready(function(){
	
	$('#element-reviews .review_row').each(function() {
		var gravatar_id = $(this).attr('rel');
		var img_url = 'https://gravatar.com/avatar/'+gravatar_id+'?s=90';
		$.ajax({
			url:img_url,
			type:"HEAD",
			crossDomain:true,
			success:function(){
				$('#g_'+gravatar_id).attr("src", img_url);
			}
		});
	});
	
	$(document).on("click", function(e){
		$(".main-cats .dropdown-submenu .dropdown-menu").hide();
		$(".main-cats .dropdown-submenu .dropdown-menu").removeClass('isOpen');
	});
	$('.main-cats a').on("click", function(e){
		var catLevel = $(this).data('level');
		
		if($(this).hasClass('subcat-toggle')){
			
			var stat = $(this).next('ul').hasClass('isOpen');
			
			$(".main-cats .dropdown-submenu .dropdown-menu").each(function() {
				if($(this).data('level') >= catLevel){	
					$(this).fadeOut(300);
					$(this).removeClass('isOpen');
				}
			});
			
			if($(this).next('ul').hasClass('isOpen')){
				$(this).next('ul').fadeOut(300);
				$(this).next('ul').removeClass('isOpen');			
			}else{
				if(!stat){
					$(this).next('ul').fadeIn(300);
					$(this).next('ul').addClass('isOpen ');
				}
			}
			
			e.stopPropagation();
			e.preventDefault();
		
		}else{
			$(".main-cats .dropdown-submenu .dropdown-menu").each(function() {
				if($(this).data('level') >= catLevel){	
					$(this).fadeOut(200);
					$(this).removeClass('isOpen');
				}
			});
			
		}
		
	});
	
	if($("#scrollContent").length>0) {
        var scrolling = false;
        var scrollArea = document.querySelector('#scrollContent');
        if(scrollArea.offsetHeight < scrollArea.scrollHeight){
            $(".scroller").show();
        }

        $("#scrollUp").bind("mouseover", function(event) {
            scrolling = true;
            scrollContent("up");
        }).bind("mouseout", function(event) {
            scrolling = false;
        });

        $("#scrollDown").bind("mouseover", function(event) {
            scrolling = true;
            $("#scrollUp .icon").show();
            scrollContent("down");
        }).bind("mouseout", function(event) {
            scrolling = false;
        });

        function scrollContent(direction) {
            var amount = (direction === "up" ? "-=1px" : "+=1px");
            $("#scrollContent").animate({
                scrollTop: amount
            }, 1, function() {
                if (scrolling) {
                    scrollContent(direction);
                }
            });
        }
    }

    var window_loc_hash = window.location.hash;
	
	if($('.gateway_wrapper .colorbox').length) {
		
		$('.gateway_wrapper').after("<div class=\"modal fade\" id=\"gw_colorbox_modal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"colorbox_modalLabel\"><div class=\"modal-dialog modal-sm\" role=\"document\"><div class=\"modal-content\"><div class=\"modal-header\"><button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><i class=\"fas fa-times\"></i></button><h4 class=\"modal-title\"></h4></div><div class=\"modal-body clearfix\"></div></div></div></div>")
		
        $(".gateway_wrapper .colorbox").click(function(e) {
			
			var href = $(this).attr('href');
			var title = $(this).attr('title');
			
			$('#gw_colorbox_modal .modal-title').html(title);
			$('#gw_colorbox_modal .modal-body').html("<img src=\""+href+"\">");
			
            $('#gw_colorbox_modal').modal('show');
			
			e.stopPropagation();
			e.preventDefault();
			
        });
    }
	
	$(".autosubmit select, .autosubmit input[type=radio]").not('.nosubmit').change(function() {
        $(this).parents(".autosubmit").submit();
    });
	
    $('.icon-submit').each(function() {
        $(this).parents('form').submit();
    });
	
	$(".product_discounts_show_tab").click(function(e) {
		$('#product_tabs a[href="#product_discounts"]').tab('show')
		$('html, body').animate({
			scrollTop: parseInt($("#product_tabs").offset().top)
		}, 2000);
		e.preventDefault()
		
	  return false;
    });
	$(".product_discounts_show_panel").click(function(e) {
		$('#collapseDiscounts').collapse('show')
		
		$('html, body').animate({
			scrollTop: parseInt($(".product_tabs_panel_group").offset().top)
		}, 2000);
		e.preventDefault()
		
		
		return false;
    });
	
	
	$(".review-score-sum a").click(function(e) {
		$('html, body').animate({
			scrollTop: parseInt($("#element-reviews").offset().top)
		}, 2000);
		e.preventDefault();
	});
	
	$("#scrollToDesc").click(function(e) {
		$('html, body').animate({
			scrollTop: parseInt($(".product_info_sec").offset().top)
		}, 2000);
		e.preventDefault();
	});
	
	
	
	
	$(".hide_skin_selector").click(function(e) {
        e.preventDefault();
        $('.skin_selector').fadeOut();
        return;
    });
    $(".swipebox-img").hover(function() {
        var src = $(this).attr("data-image-swap");
        $('#img-preview').attr("src", src);
    });
	
	
	
    $('.open-clearing').on('click', function(e) {
        e.preventDefault();
        $('[data-clearing] li img').eq($(this).data('thumb-index')).trigger('click');
      });
    $('input[type=radio].rating').rating({
        required: true
    });
    $('body').on('click', '#basket-summary', function() {
        mini_basket_action();
    });
    
	$('a.quan').click(function() {
        var rel = $(this).attr('rel');
        var sign;
        if ($(this).hasClass('add')) {
            sign = '+';
        } else if ($(this).hasClass('subtract')) {
            sign = '-';
        } else {
            alert('No \'add\' or \'subtract\' class defined.');
        }
        return update_quantity(rel, sign);
    });
    
	$('#checkout_proceed').click(function() {
        $('<input>').attr({
            type: 'hidden',
            name: 'proceed',
            value: '1'
        }).appendTo('form#checkout_form');
    });
	
	
	
	
	
	
	/* Initial setup of country/state menu */
    $('select#country-list, select.country-list').each(function() {
        if (typeof(county_list) == 'object') {
            var counties = county_list[$(this).val()];
            var target = ($(this).attr('rel') && $(this).attr('id') != 'country-list') ? '#' + $(this).attr('rel') : '#state-list';
            var zone_status = $('option:selected', this).attr('data-status');
            var form_id = $(this).closest("form").attr('id');

            validation_ini[target] = stateRequirements(zone_status, form_id, target, false);

            if (typeof(counties) == 'object') {
                var setting = $(target).val();
                var select = document.createElement('select');
                $(target).replaceWith($(select).attr({
                    'name': $(target).attr('name'),
                    'id': $(target).attr('id'),
                    'class': $(target).attr('class')
                }));
                if ($(this).attr('title')) {
                    var option = document.createElement('option');
                    $('select' + target).append($(option).text($(this).attr('title')));
                }
                for (i in counties) {
                    var option = document.createElement('option');
                    if (setting.toLowerCase() == counties[i].name.toLowerCase() || setting == counties[i].id) {
                        $('select' + target).append($(option).val(counties[i].id).text(counties[i].name).attr('selected', 'selected'));
                    } else {
                        if(counties[i].id>0) {
                            $('select' + target).append($(option).val(counties[i].id).text(counties[i].name));
                        } else {
                            $('select' + target).append($(option).val('').text(counties[i].name));
                        }
                    }
                }
            } else {
                if ($(this).hasClass('no-custom-zone')) $(target).attr({
                    'disabled': 'disabled'
                }).val($(this).attr('title'));
            }
        }
    }).change(function() {
        if (typeof(county_list) == 'object') {
            var list = county_list[$(this).val()];
            var target = ($(this).attr('rel') && $(this).attr('id') != 'country-list') ? '#' + $(this).attr('rel') : '#state-list';
            var zone_status = $('option:selected', this).attr('data-status');
            var form_id = $(this).closest("form").attr('id');

            validation_ini[target] = stateRequirements(zone_status, form_id, target, true);

            if (typeof(list) == 'object' && typeof(county_list[$(this).val()]) != 'undefined' && county_list[$(this).val()].length >= 1) {
                var setting = $(target).val();
                var select = document.createElement('select');
                $(target).replaceWith($(select).attr({
                    'name': $(target).attr('name'),
                    'id': $(target).attr('id'),
                    'class': $(target).attr('class')
                }));
                if ($(this).attr('title')) {
                    var option = document.createElement('option');
                    $('select' + target).append($(option).text($(this).attr('title')));
                }
                for (var i = 0; i < list.length; i++) {
                    var option = document.createElement('option');
                    if(list[i].id > 0) {
                        $('select' + target).append($(option).val(list[i].id).text(list[i].name));
                    } else {
                        $('select' + target).append($(option).val('').text(list[i].name));
                    }
                }
                if(setting>0) {
                    $('select' + target + ' > option[value=' + setting + ']').attr('selected', 'selected');
                }
            } else {
                var input = document.createElement('input');
                var placeholder = $('label[for="' + $(this).attr('rel') + '"]').text() + ' ' + $('#validate_required').text();
                var replacement = $(input).attr({
                    'type': 'text',
                    'placeholder': placeholder,
                    'id': $(target).attr('id'),
                    'name': $(target).attr('name'),
                    'class': $(target).attr('class'),
                    'required': $(target).attr('required')
                });
                if ($(this).hasClass('no-custom-zone')) $(replacement).attr('disabled', 'disabled').val($(this).attr('title'));
                $(target).replaceWith($(replacement));
            }
        }
    });

	
	
	
	
	
	$('.show_address_form').click(function() {
        show_address_form();
    });

    if($('div.alert.alert-danger').length) {
        show_address_form(); 
    }

    if($('#delivery_is_billing:checkbox').length) {
        if($('#delivery_is_billing:checkbox').prop('checked') == true) {
            $('#address_delivery').addClass('hidden');
        } else {
            $('#address_delivery').removeClass('hidden');
        }
    }
    $('#delivery_is_billing:checkbox').change(function() {
        if ($(this).is(':checked')) {
            $('#address_delivery').addClass('hidden');
        } else {
            $('#address_delivery').removeClass('hidden');
        }
    });
    if ($('input#show-reg:checkbox').is(':checked') == false) $('#account-reg').addClass('hidden');
    $('input#show-reg:checkbox').change(function() {
        if ($(this).is(':checked')) {
            $('#account-reg').removeClass('hidden');
            $('input#reg_password').addClass('required');
            $('input#reg_passconf').addClass('required');
        } else {
            $('#account-reg').addClass('hidden');
            $('input#reg_password').removeClass('required');
            $('input#reg_passconf').removeClass('required');
        }
    });

    $('.grid_view_tog').click(function(event) {
        grid_view(200, event);
    });
    $('.list_view_tog').click(function(event) {
        list_view(200, event);
    });

    set_product_view(0);

    $('.url_select').bind('change', function() {
        var url = $(this).val(); // get selected value
        if (url) { // require a URL
            window.location = url; // redirect
        }
        return false;
    });
    
	var selector = '.search_input';

    $(selector).each(function() {
        var sayt = $(this);
        sayt.click(function(event) {
            $.removeCookie('ccScroll', null);
        });
        var keyDelay = sayt.hasClass("es") ? 0 : 500;
        sayt.keyup(input_delay(function (e) {
            saytGo(sayt);
        }, keyDelay));
    });

    function input_delay(callback, ms) {
        var timer = 0;
        return function() {
            var context = this, args = arguments;
            clearTimeout(timer);
            timer = setTimeout(function () {
                callback.apply(context, args);
            }, ms || 0);
        };
    }

    function matchCase(text, pattern) {
        var result = '';
        for(var i = 0; i < text.length; i++) {
            var c = text.charAt(i);
            var p = pattern.charCodeAt(i);
            if(p >= 65 && p < 65 + 26) {
                result += c.toUpperCase();
            } else {
                result += c.toLowerCase();
            }
        }
        return result;
    }
    function toBold(text){
        var bold = /\*(.*?)\*/gm;
        var html = text.replace(bold, '<strong>$1</strong>');          
        return html;
    }
    
    function saytGo(sayt) {
        if(!sayt.hasClass("es")) {
            return false;
        }
        var search_term = sayt.val();
        // Ensure the results list sits next to the currently active input
        if(sayt.next('#sayt_results').length === 0) {
            $('#sayt_results').remove();
            $('<ul id="sayt_results">').insertAfter(sayt);
        }
        $(document).keyup(function(e) {
            if (e.key === "Escape") {
                sayt.val('');
                $('#sayt_results li').remove();
            }
        });
        if(search_term.length==0) {
            $('#sayt_results li').remove();
        } else {
            var amount = sayt.attr("data-amount");
            var url = '?_e=es&q='+search_term+'&a='+amount;
            $.ajax({
                async: true,
                url: url,
                cache: true,
                complete: function(response) {
                    $('#sayt_results li').remove();
                    var products = $.parseJSON(response.responseText);
                    if(Array.isArray(products)) {
                        search_term.replace('*','');
                        const splitted = search_term.split(' ');
                        for(var k in products) {
                            var product_name = products[k]['name'];
                            splitted.forEach(
                                function(split) {
                                    if(split == '' || split == '*') {
                                        return;
                                    }
                                    var regexp = new RegExp('('+split+')', 'ig');
                                    product_name = product_name.replace(regexp, function(match) { return '*'+matchCase(split, match)+'*'})  
                                }
                            );
                            var image = (sayt.attr("data-image")=='true' && products[k]['thumbnail']!=='') ? "<span><img src=\""+products[k]['thumbnail']+"\" title=\""+products[k]['name']+"\"></span>" : "<span>&nbsp;</span>";
                            $("#sayt_results").append("<li><a href='?_a=product&product_id="+products[k]['product_id']+"'>"+image+toBold(product_name)+"</a></li>");
                        }
                    } else {
                        $('#sayt_results').append('<li class="status">No results found</li>');
                    }
                }
            });
        }
    }
    $("#ccScroll").on( "click", ".ccScroll-next", function(event) {
		event.preventDefault();
        $(this).addClass('hidden');
        $("#loading").removeClass('hidden');
        window.location.hash = $(this).attr("data-next-page");

        var loc = $(window).scrollTop();
        var cat = parseInt($(this).attr("data-cat"));
        var page = parseInt($(this).attr("data-next-page"));
        var product_list = $('.product_list');
        var next_link = $('a.ccScroll-next');

        // Keep history to load on back button
        if ($.cookie('ccScroll')){
            var ccScrollHistory = $.parseJSON($.cookie("ccScroll"));
            ccScrollHistory[cat] = page;
        } else {
            ccScrollHistory = {};
            ccScrollHistory[cat] = page;
        }

        if(loc>0) {
            ccScrollHistory['loc'] = loc;
        }
        // Set cookie for 10 mins
        var date = new Date();
        date.setTime(date.getTime() + (10 * 60 * 1000));
        $.cookie("ccScroll", JSON.stringify(ccScrollHistory), {expires: date});

        $.ajax({
            async: false,
            url: $(this).attr('href'),
            cache: true,
            complete: function(returned) {
                var page = returned.responseText;
                var list = $('.product_list li', page);
                var next = $('a.ccScroll-next', page);
				$('.product_list li').removeClass("newTop");
				$(list[0]).addClass('newTop');
                setTimeout(function(){
                    product_list.append(list);
                    //set_product_view(0)
                    $(next_link).replaceWith(next);
                    init_add_to_basket();
                    $("#loading").addClass('hidden');
					$('html, body').animate({
						scrollTop: $("li.newTop").offset().top
					}, 500);
                }, 1500);
            }
        });
    });

    if($('#ccScrollCat').length > 0) {
        var cat_pages = parseInt($('#ccScrollCat').text());
        if ($.cookie('ccScroll')) {
            var ccScrollHistory = $.parseJSON($.cookie("ccScroll"));
            if(cat_pages in ccScrollHistory) {
                for (i = 1; i < ccScrollHistory[cat_pages]; i++) {
                    $('.ccScroll-next:last').trigger("click");
                }
                $('html, body').animate({ scrollTop: ccScrollHistory['loc'] }, 'slow');
            }
        }
    }

    var duration = 500;
    $(window).scroll(function() {
        if ($(this).scrollTop() > 400) {
            $('.back-to-top').fadeIn(duration);
        } else {
            $('.back-to-top').fadeOut(duration);
        }
    });

    $('.back-to-top').click(function(event) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, duration);
        return false;
    });
	
	
	
	
	
	if ($("#checkout_form")[0]) {
        if (window_loc_hash == '#login') {
            checkout_form_toggle(false);
        } else if (window_loc_hash == '#register') {
            checkout_form_toggle(true);
        }

        $('#checkout_login').click(function() {
            checkout_form_toggle(false);
        });
        $('#checkout_register').click(function() {
            checkout_form_toggle(true);
        });
    }

    if($('#ptp').length > 0 && $('[name^=productOptions]').length > 0) {
        price_inc_options();
        $("[name^=productOptions]").change(function() {
            price_inc_options();
        });
    }

    $("#newsletter_email").focus(function() {
        $("#newsletter_recaptcha").slideDown();
    });
	
	

	
	
	
});

function showDescription(id,action) {
	if(action == 'show'){
		$('#infoblock'+id).removeClass('hidden');
		$('.prd_toggle_wrap'+id).html('<a href="javascript:" class="prd_toggle" onclick="showDescription(\''+id+'\',\'hide\');"><i class="fas fa-times"></i></a>');
	}else{
		$('#infoblock'+id).addClass('hidden');
		$('.prd_toggle_wrap'+id).html('<a href="javascript:" class="prd_toggle" onclick="showDescription(\''+id+'\',\'show\');"><i class="fas fa-info-circle"></i></a>');

	}
}

function init_add_to_basket() {
    $("form.add_to_basket").each(function(index, el)  {
        $(el).validate({
            submitHandler: function(form) {
                add_to_basket(form);
            }
        });
    });
}

function price_inc_options() {
    var action = $('form.add_to_basket').attr('action');
    var absolute = false;
    var total = 0;
    var ptp = parseFloat($('#ptp').attr("data-price"));
    var fbp = parseFloat($('#fbp').attr("data-price"));
    var parts = action.split("?");
    
    if (parts.length > 1) {
        action += "&";
    } else {
        action += "?";
    }
    action += '_g=ajax_price_format&price[0]=';

    $("[name^=productOptions]").each(function () {
        if($(this).is('input:radio') && $(this).is(':checked')) {
            if($(this).hasClass('absolute')) {
                total -= ptp;
            }
            total += parseFloat($(this).attr("data-price"));
            } else if ($(this).is('select') && $(this).val()) {
                if($("option:selected", this).hasClass('absolute')) { 
                    total -= ptp;
                }
                total += parseFloat($(this).find("option:selected").attr("data-price"));
            } else if (($(this).is('textarea') || $(this).is('input:text')) && $(this).val() !== '') {
                if($(this).hasClass('absolute')) {
                    total -= ptp;
                }
                total += parseFloat($(this).attr("data-price"));
            }
        }
    );
    ptp = ptp + total;

    if($('#fbp').length > 0) {
        fbp = fbp + total;
        $.ajax({
            url: action + ptp + '&price[1]='+ fbp,
            cache: true,
            complete: function(returned) {
                var prices = $.parseJSON(returned.responseText);
                $('#ptp').html(prices[0]);
                $('#fbp').html(prices[1]);
                if (absolute && prices[0] <= prices[1]) {
                    $('#fbp').hide();
                    $('#ptp').removeClass('sale_price');
                } else {
                    $('#fbp').show();
                    $('#ptp').addClass('sale_price');
                }
            }
        });
    } else {
        $.ajax({
            url: action + ptp,
            cache: true,
            complete: function(returned) {
                var prices = $.parseJSON(returned.responseText);
                $('#ptp').html(prices[0]);
            }
        });
    }
}

function add_to_basket(form) {
    var add = $(form).serialize();
    var action = $(form).attr('action').replace(/\?.*/, '');
    var on_canvas_basket_content = '';
    var parts = action.split("?");
    if (parts.length > 1) {
        action += "&";
    } else {
        action += "?";
    }
    $.ajax({
		url: action + '_g=ajaxadd&t=' + new Date().getTime(),
        type: 'POST',
        cache: false,
        data: add,
        complete: function(returned) {
            if (returned.responseText.match("Redir:")) {
                var redir = returned.responseText.split('Redir:');
                window.location = redir[1];
            } else {
				
                $('.header-basket').html(returned.responseText);
                mini_basket_action();
            }
        }
    });
    return false;
}

function checkout_form_toggle(register) {
    if (register) {
        $("#checkout_login_form").addClass('hidden');
        $("#checkout_register_form").removeClass('hidden');
        $("#reg_password").prop('disabled', false);
        $("#login-username").prop('disabled', true);
        $("#login-password").prop('disabled', true);
		$("#checkout_login_btn").prop('disabled', true);
        $('#checkout_form').removeAttr("action").attr("action", '#register');
    } else {
        $("#checkout_login_form").removeClass('hidden');
        $("#checkout_register_form").addClass('hidden');
        $("#reg_password").prop('disabled', true);
        $("#login-username").prop('disabled', false);
        $("#login-password").prop('disabled', false);
		$("#checkout_login_btn").prop('disabled', false);
        $('#checkout_form').removeAttr("action").attr("action", '#login');
    }
}

function show_address_form() {
    $('#register_false_address').addClass('hidden');
    $('#checkout_register_form').removeClass('hidden'); 
}

function mini_basket_action() {
	
	$('#myBasket').modal('show');
	
	setTimeout(function(){
		$('#myBasket').modal('hide');
	}, 4000);

}

function set_product_view(delay) {
    if ($.cookie('product_view') == 'list') {
        list_view(delay, null);
    }else{
		grid_view(delay, null);
	}
}

function grid_view(duration, event) {
    if (event != null) {
        event.preventDefault();
    }
	
	$('.product_list').fadeOut(duration, function() {

		$('.grid_view_tog').addClass('active');
        $('.list_view_tog').removeClass('active');
        
		$('.product_list').addClass('grid_view');
        
		$('.product_list').fadeIn(duration, function() {
            $.cookie('product_view', 'grid', {expires: 730});
        });
    });
	
    return false;
}

function list_view(duration, event) {
    if (event != null) {
        event.preventDefault();
    }
	$('.product_list').fadeOut(duration, function() {

        $('.list_view_tog').addClass('active');
        $('.grid_view_tog').removeClass('active');

        $('.product_list').removeClass('grid_view');
		
        $('.product_list').fadeIn(duration, function() {
            $.cookie('product_view', 'list', {expires: 730});
        });
    });
    return false;
}

function update_quantity(rel, sign) {
    var target = $('input[name="quan[' + rel + ']"]');
    var quick_update = $('#quick_update_' + rel);
    var original_val = $('#original_val_' + rel).text();
    var old_val = $(target).val();
    var new_val = 0;

    if (sign == '+') {
        if (old_val < 9999) {
            var new_val = +old_val + +1;
        } else {
            return false;
        }
    } else if (sign == '-') {
        if (old_val < 1) {
            return false;
        }
        var new_val = (old_val - 1);
    }
    $(target).val(new_val);
    $('span.disp_quan_' + rel).text(new_val);
    if (original_val == new_val) {
        quick_update.addClass('hidden');
		$('#ci_pdisplay_' + rel).removeClass('hidden');
		
    } else {
		$('#ci_pdisplay_' + rel).addClass('hidden');
        quick_update.removeClass('hidden');
		
    }

    if (!$("#checkout_login_form")[0]) { // disable jump for basket page
        $('#checkout_form').removeAttr("action").attr("action", '#basket_item_' + rel);
    }
    return false;
}

var stateRequirements = function(zone_status, form_id, target, change) {
    var val = false;
    var disabled = false;
    switch(zone_status) {
        case '1': // Required
            val = true;
            $(target+"_wrapper").show();
        break;
        case '2': // Optional
            $(target+"_wrapper").show();
        break;
        case '3': // Hidden
            disabled = true;
            $(target+"_wrapper").hide();
        break;
    }
    $(target).prop('disabled', disabled);
    if(change) {
        $(target).rules("add",  {required:val});
        $(form_id).validate();
    }
    return val;
};