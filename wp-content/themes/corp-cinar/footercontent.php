<footer>
<div class="foot_first_wrap">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-25 text-center first_col">
			<div class="footer-lefter_wrap">
			<div class="footer-lefter">
				<div class="logo_footer">
					<a href="/"><img src="<?=get_field('logo', 'option')['url']?>" alt="<?php bloginfo('name'); ?>"></a>
				</div>

				<a href="tel:<?=get_field('phone', 'option')?>" class="bl_header_bottom_item_phone"><?=get_field('phone', 'option')?></a>
				
				<div class="footer_order_link datatextcopy" data-bs-toggle="modal" data-bs-target="#modal_common" data-text="Обратный звонок"><span>Обратный звонок</span></div>
				
				<a href="mailto:<?=get_field('mail', 'option')?>" class="bl_header_bottom_item_mail"><?=get_field('mail', 'option')?></a>
				<div class="footer_adress">
					<?=get_field('adres_v_podvale_sajta', 'option')?>
				</div>
			</div>
			</div>
			</div>
			<div class="col-xs-12 col-md-15 nav_menu_list ">
				<div class="f-title"><?=wp_get_nav_menu_object('1335')->name;?></div>
				<?php wp_nav_menu( [ 'menu_class'  => 'topmenu',  'menu' => '1335', ] ); ?>
			</div>
			<div class="col-xs-12 col-md-25 nav_menu_list">
				<div class="f-title"><?=wp_get_nav_menu_object('1337')->name;?></div>
				<?php wp_nav_menu( [ 'menu_class'  => 'topmenu',  'menu' => '1337', ] ); ?>
			</div>
				<div class="col-md-25 nav_menu_list">
				<?/*div class="f-title"><?=wp_get_nav_menu_object('1338')->name;?></div>
				<?php wp_nav_menu( [ 'menu_class'  => 'topmenu',  'menu' => '1338', ] ); */?>
			</div>
			<div class="col-md-3 text-center last_col">
				<div class="f-part-1">
				<div class="f-title">Остались вопросы?</div>
				<div class="f-des">Свяжитесь с нами:</div>
				<div class="f-soc">
					<a href="<?=get_field('telegram', 'option')?>" target="_blank" class="tgcolor"><img src="<?=get_template_directory_uri()?>/img/tgf.svg" alt="Telegram">Написать в Telegram</a>
					<a href="<?=get_field('whatsapp', 'option')?>" target="_blank" class="whcolor"><img src="<?=get_template_directory_uri()?>/img/whf.svg" alt="WhatsApp">Написать в WhatsApp</a>
					<a href="<?=get_field('vk', 'option')?>" target="_blank" class="vkcolor"><img src="<?=get_template_directory_uri()?>/img/vk.svg" alt="vk">Подписаться в VK</a>
				</div>
				</div>
			</div>
		</div>



		</div>
</div>
		
<div class="foot_last_wrap">	
<div class="container">	
<div class="def_flex_row flex_row foot_last">
	<div class="def_4 foot_privacy">
		<?=get_the_privacy_policy_link()?>
	</div>
	<div class="def_2 foot_des">
		<?=get_field('opisanie_sajta_v_podvale', 'option')?>
	</div>
	<div class="def_4 cinar_col">
		<a href="https://cinar" target="_blank" class="cinar">
			<img src="<?=get_template_directory_uri()?>/img/cinar.svg" alt="cinar">
			<span>Создание и<br> продвижение сайта</span>
		</a>
	</div>
</div>		
</div>		
</div>		
		
</footer>
