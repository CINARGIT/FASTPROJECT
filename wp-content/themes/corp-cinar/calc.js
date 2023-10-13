$ = jQuery;
$(document).ready(function(){
	/// Сброс коэффициентов и значений
	$('.calc_form').find('input[type=text],input[type=hidden]:not(.infla)').val('');
	$('.calc_form').find('input[name=profac]').val('1');
	
	/// Сброс класса пустого поля
	$('input[type=text]').on('focus',function(){
		$(this).removeClass('eractive');
	});
	
	/// Проверка ввода чисел
	$('input[name=avtopod],input[name=otschur]').bind('change keyup input click', function(){
		if(this.value.match(/[^0-9]/g)){
			this.value = this.value.replace(/[^0-9]/g,'');
		}
	});
	
	/// Клик на псевдо-радиокнопку
	$('.pseudora').on('click',function(){
		$(this).parents('.calc_itemwrap').find('.pseudora').removeClass('eractive');
		if(!$(this).hasClass('active')){
			$(this).parents('.calc_itemwrap').find('.pseudora').removeClass('active');
			$(this).addClass('active');
			var thal = $(this).attr('data-val');
			$(this).parents('.calc_itemwrap').find('input').val(thal);
		}
	});
	
	/// Клик на подсказку
	$('.calc_itemzag.quesada').on('click',function(){
		$(this).parents('.step_wrap').find('.forquesada').toggleClass('active');
		$(this).toggleClass('active');
	});
	$('.calc_itemzag.quesara').on('click',function(){
		$(this).parents('.step_wrap').find('.forquesara').toggleClass('active');
		$(this).toggleClass('active');
	});
	
	/// Клик на псевдо-чекбокс
	$('.pseudoche').on('click',function(){
		if($(this).hasClass('txt')){ /// Для текстовых
			$(this).parents('.calc_itemwrap').find('.pseudoche').removeClass('eractive');
			$(this).parents('.step_wrap.step-2.active').find('.pseudoche').removeClass('eractive');
			var txal = $(this).attr('data-val');
			var stxal = $(this).parents('.calc_itemwrap').find('input').val();
			if($(this).hasClass('active')){
				$(this).removeClass('active');
				txal = txal + ',';
				stxal = stxal.replace(txal,'');
				$(this).parents('.calc_itemwrap').find('input').val(stxal);
			}else{
				$(this).addClass('active');
				stxal = stxal + txal + ',';
				$(this).parents('.calc_itemwrap').find('input').val(stxal);
			}
		}else if($(this).hasClass('jekyll')){ /// Для скрываемых
			if($(this).hasClass('active')){
				$(this).removeClass('active');
				$(this).next('input').hide();
				$(this).next('input').val('');
			}else{
				$(this).addClass('active');
				$(this).next('input').show();
			}
		}else{ /// Для коэффициентных
			var thal = $(this).attr('data-val');
			var sthal = $(this).parents('.calc_itemwrap').find('input').val();
			if($(this).hasClass('active')){
				$(this).removeClass('active');
				var thal = $(this).attr('data-val');
				var sthal = $(this).parents('.calc_itemwrap').find('input').val();
				sthal = sthal / thal;
				$(this).parents('.calc_itemwrap').find('input').val(sthal);
			}else{
				$(this).addClass('active');
				sthal = sthal * thal;
				$(this).parents('.calc_itemwrap').find('input').val(sthal);
			}
		}
	});
	
	$('.calc_next').on('click',function(){
		var calc_butt = $(this);
		var calc_ok = true;
		
		$(calc_butt).parents('.calc_form').find('.step_wrap.active input[type=text]').each(function(){
			if($(this).attr('name') != 'avtopod' &&
				$(this).attr('name') != 'otschur' &&
				$(this).attr('name') != 'infla' &&
				$(this).attr('name') != 'infla_' &&
				$(this).attr('name') != 'fio' &&
				$(this).attr('name') != 'email'){
				if($(this).val() == ''){
					$(this).addClass('eractive');
					calc_ok = false;
				}
			}
		});
		$(calc_butt).parents('.calc_form').find('.step_wrap.active input[type=hidden]').each(function(){
			///if($(this).attr('name') != 'uslofac' && $(this).attr('name') != 'profac' && $(this).attr('name') != 'vobmer' && $(this).attr('name') != 'summ'){
			if($(this).attr('name') != 'uslofac' && $(this).attr('name') != 'profac' && $(this).attr('name') != 'summ'){
				if($(this).val() == ''){
					/**if($(this).attr('name') == 'vobsle' && $('.step_wrap.active input[name=vinzh]').val() != ''){
						$(this).parents('.calc_form').find('.step_wrap.active .pseudoche').removeClass('eractive');
					}else if($(this).attr('name') == 'vinzh' && $('.step_wrap.active input[name=vobsle]').val() != ''){
						$(this).parents('.calc_form').find('.step_wrap.active .pseudoche').removeClass('eractive');*/
					if($(this).attr('name') == 'vobsle' && ($('.step_wrap.active input[name=vinzh]').val() != '' || $('.step_wrap.active input[name=vobmer]').val() != '')){
						$(this).parents('.calc_form').find('.step_wrap.active .pseudoche').removeClass('eractive');
					}else if($(this).attr('name') == 'vinzh' && ($('.step_wrap.active input[name=vobsle]').val() != '' || $('.step_wrap.active input[name=vobmer]').val() != '')){
						$(this).parents('.calc_form').find('.step_wrap.active .pseudoche').removeClass('eractive');
					}else if($(this).attr('name') == 'vobmer' && ($('.step_wrap.active input[name=vobsle]').val() != '' || $('.step_wrap.active input[name=vinzh]').val() != '')){
						$(this).parents('.calc_form').find('.step_wrap.active .pseudoche').removeClass('eractive');
					}else{
						$(this).parents('.calc_itemwrap').find('.pseudora').addClass('eractive');
						$(this).parents('.calc_itemwrap').find('.pseudoche').addClass('eractive');
						calc_ok = false;
					}
				}
			}
		});
		
		if(calc_ok){
			var datanext = $(this).attr('data-next');
			var datanextdo = Number($(this).attr('data-next'))+1;
			var dataprev = Number($(this).attr('data-next'))-1;
			if (datanext == 4){
				var send_form = $(calc_butt).parents('.calc_form').serialize();
				$.ajax({
					type:"POST", 
					url:"/calceng.php", 
					data:send_form,
					success:function(result){
						$(".calc_ott span").html(result);
						$("input[name=summ]").val(result);
					} 
				});
				$(this).parents('.calc_form').find('.calc_ott').addClass('visi');
				$(this).parents('.calc_form').find('.step-'+datanext).addClass('active');
				$(this).parents('.calc_form').find('.step-'+dataprev).removeClass('active');
				$(this).parents('.calc_resul').find('.calc_prev').attr('data-next', datanext);
				$(this).attr('data-next', datanextdo);
				$(this).text('Отправить');
			}else if (datanext == 5){
				var send_form = $(calc_butt).parents('.calc_form').serialize();
				$.ajax({
					type:"POST", 
					url:"/send.php", 
					data:send_form,
					success:function(){
						$(calc_butt).parents('.calc_form').find('.forhide').addClass('invisi');
						$(calc_butt).parents('.calc_form').find('.step-4.active .calc_subzag:last-child').removeClass('invisi');
						$(calc_butt).addClass('invisi');
					} 
				})
			}else{
				$(this).parents('.calc_form').find('.step-'+datanext).addClass('active');
				$(this).parents('.calc_form').find('.step-'+dataprev).removeClass('active');
				$(this).parents('.calc_resul').find('.calc_prev').attr('data-next', datanext);
				$(this).attr('data-next', datanextdo);
				if (datanext == 2){
					$(this).parents('.calc_resul').find('.calc_prev').addClass('visi');
					$(this).parents('.calc_form').find('.step-2 .pseudoche').removeClass('invisi');
					var carca = $(this).parents('.calc_form').find('input[name=carcage]').val();
					var etag = $(this).parents('.calc_form').find('input[name=etage]').val();
					if(carca == 2){
						$(this).parents('.calc_form').find('.step-2 .pseudoche[data-val=kostki]').removeClass('active');
						$(this).parents('.calc_form').find('.step-2 .pseudoche[data-val=kostki]').addClass('invisi');
						stxal = $(this).parents('.calc_form').find('input[name=vobsle]').val();
						stxal = stxal.replace('kostki,','');
						$(this).parents('.calc_form').find('input[name=vobsle]').val(stxal);
						
						$(this).parents('.calc_form').find('.step-2 .pseudoche[data-val=ofunda],.step-2 .pseudoche[data-val=okol],.step-2 .pseudoche[data-val=okolst],.step-2 .pseudoche[data-val=otorm]').removeClass('active');
						$(this).parents('.calc_form').find('.step-2 .pseudoche[data-val=ofunda],.step-2 .pseudoche[data-val=okol],.step-2 .pseudoche[data-val=okolst],.step-2 .pseudoche[data-val=otorm]').addClass('invisi');
						stxal = $(this).parents('.calc_form').find('input[name=vobmer]').val();
						stxal = stxal.replace('ofunda,','');
						stxal = stxal.replace('okol,','');
						stxal = stxal.replace('okolst,','');
						stxal = stxal.replace('otorm,','');
						$(this).parents('.calc_form').find('input[name=vobmer]').val(stxal);
					}else{
						$(this).parents('.calc_form').find('.step-2 .pseudoche[data-val=ofund],.step-2 .pseudoche[data-val=opodk]').removeClass('active');
						$(this).parents('.calc_form').find('.step-2 .pseudoche[data-val=ofund],.step-2 .pseudoche[data-val=opodk]').addClass('invisi');
						stxal = $(this).parents('.calc_form').find('input[name=vobmer]').val();
						stxal = stxal.replace('ofund,','');
						stxal = stxal.replace('opodk,','');
						$(this).parents('.calc_form').find('input[name=vobmer]').val(stxal);
					}
					if(etag == 1){
						$(this).parents('.calc_form').find('.step-2 .pseudoche[data-val=lest],.step-2 .pseudoche[data-val=perek],.step-2 .pseudoche[data-val=sovme]').removeClass('active');
						$(this).parents('.calc_form').find('.step-2 .pseudoche[data-val=lest],.step-2 .pseudoche[data-val=perek],.step-2 .pseudoche[data-val=sovme]').addClass('invisi');
						stxal = $(this).parents('.calc_form').find('input[name=vobsle]').val();
						stxal = stxal.replace('lest,','');
						stxal = stxal.replace('perek,','');
						stxal = stxal.replace('sovme,','');
						$(this).parents('.calc_form').find('input[name=vobsle]').val(stxal);
						
						$(this).parents('.calc_form').find('.step-2 .pseudoche[data-val=olest],.step-2 .pseudoche[data-val=operek],.step-2 .pseudoche[data-val=okrys]').removeClass('active');
						$(this).parents('.calc_form').find('.step-2 .pseudoche[data-val=olest],.step-2 .pseudoche[data-val=operek],.step-2 .pseudoche[data-val=okrys]').addClass('invisi');
						stxal = $(this).parents('.calc_form').find('input[name=vobmer]').val();
						stxal = stxal.replace('olest,','');
						stxal = stxal.replace('operek,','');
						stxal = stxal.replace('okrys,','');
						$(this).parents('.calc_form').find('input[name=vobmer]').val(stxal);
					}else{
						$(this).parents('.calc_form').find('.step-2 .pseudoche[data-val=torm],.step-2 .pseudoche[data-val=nesu],.step-2 .pseudoche[data-val=ogra]').removeClass('active');
						$(this).parents('.calc_form').find('.step-2 .pseudoche[data-val=torm],.step-2 .pseudoche[data-val=nesu],.step-2 .pseudoche[data-val=ogra]').addClass('invisi');
						stxal = $(this).parents('.calc_form').find('input[name=vobsle]').val();
						stxal = stxal.replace('torm,','');
						stxal = stxal.replace('nesu,','');
						stxal = stxal.replace('ogra,','');
						$(this).parents('.calc_form').find('input[name=vobsle]').val(stxal);
						
						$(this).parents('.calc_form').find('.step-2 .pseudoche[data-val=otorm],.step-2 .pseudoche[data-val=onesu],.step-2 .pseudoche[data-val=oogr],.step-2 .pseudoche[data-val=ostrop],.step-2 .pseudoche[data-val=opodk]').removeClass('active');
						$(this).parents('.calc_form').find('.step-2 .pseudoche[data-val=otorm],.step-2 .pseudoche[data-val=onesu],.step-2 .pseudoche[data-val=oogr],.step-2 .pseudoche[data-val=ostrop],.step-2 .pseudoche[data-val=opodk]').addClass('invisi');
						stxal = $(this).parents('.calc_form').find('input[name=vobmer]').val();
						stxal = stxal.replace('otorm,','');
						stxal = stxal.replace('onesu,','');
						stxal = stxal.replace('oogr,','');
						stxal = stxal.replace('ostrop,','');
						stxal = stxal.replace('opodk,','');
						$(this).parents('.calc_form').find('input[name=vobmer]').val(stxal);
					}
				}
				if (datanextdo == 4){
					$(this).text('Рассчитать');
				}
			}
			if (datanext != 5){
				if ($(window).width() < 990){
					$('html, body').stop().animate({
						scrollTop: $('#calc_wrap').offset().top
					}, 1000);
				}
			}
		}
	});
	
	$('.calc_prev').on('click',function(){
		var datanext = $(this).attr('data-next');
		var dataprev = Number($(this).attr('data-next'))-1;
		
		$(this).parents('.calc_form').find('.step-'+datanext).removeClass('active');
		$(this).parents('.calc_form').find('.step-'+dataprev).addClass('active');
		$(this).parents('.calc_resul').find('.calc_next').attr('data-next', datanext);
		$(this).attr('data-next', dataprev);
		if (dataprev == 1){
			$(this).removeClass('visi');
		}
		if (dataprev == 2){
			$(this).parents('.calc_resul').find('.calc_next').text('Вперёд');
		}
		if (dataprev == 3){
			$(this).parents('.calc_resul').find('.calc_next').removeClass('invisi').text('Рассчитать');
			$(this).parents('.calc_form').find('.forhide').removeClass('invisi');
			$(this).parents('.calc_form').find('.step-4 .calc_subzag:last-child').addClass('invisi');
			$(this).parents('.calc_form').find('.calc_ott').removeClass('visi');
		}
		if ($(window).width() < 990){
			$('html, body').stop().animate({
				scrollTop: $('#calc_wrap').offset().top
			}, 1000);
		}
	});
	
});
