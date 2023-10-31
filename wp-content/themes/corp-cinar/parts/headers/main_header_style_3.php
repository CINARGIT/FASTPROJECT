<?php $prefixClass = 'main_header_style_3'; ?>

<style>

.<?=$prefixClass?>_menu ul li a{
	font-size:<?=get_sub_field('main_header_style_3_menu_font_size')?>px;
}


<? if(!empty(get_sub_field('main_header_style_3_button_color'))) { ?>
.order_button.<?=$prefixClass?>_order_button{
	background-color:<?=get_sub_field('main_header_style_3_button_color')?>;
}

.order_button.<?=$prefixClass?>_order_button:hover{
	background-color:<?=get_sub_field('main_header_style_3_button_color_hover')?>;
}

<? } ?>

.<?=$prefixClass?>_phone a{
	font-size:<?=get_sub_field('main_header_style_3_phone_font_size')?>px;
}

.<?=$prefixClass?>_mail a{
	font-size:<?=get_sub_field('main_header_style_3_mail_font_size')?>px;
}

.<?=$prefixClass?>_item_row{
	justify-content:flex-end;
	display:flex;
}


</style>

	<div class="<?=$prefixClass?> <?php echo ($is_preview) ? 'is-preview' : ''; ?>">
		<div class="container">
			<div class="row">
				
				<div class="col-xs-12 col-md-3 <?=$prefixClass?>_logo_wrap">
					<? if(!empty(get_sub_field('main_header_style_3_logo')['url'])) { ?>
					<div class="<?=$prefixClass?>_logo_in">
						<a href="/"><img data-no-lazy="1" src="<?=get_field('logo', 'option')['url']?>" alt="<?=get_bloginfo('name')?>"></a>
					</div>
					<? } else { ?>
						<?=get_bloginfo('name')?>
					<? } ?>
				</div>
				<div class="col-xs-12 col-md-9 <?=$prefixClass?>_item_row">
					<div class="<?=$prefixClass?>_menu <?=$prefixClass?>_item">
						<?php wp_nav_menu( array('menu' => get_sub_field('main_header_style_3_menu'), 'container_id'  => '','conatiner_class' => '','menu_class'  => 'topmenu','echo'  => true,'items_wrap'  => '<ul id="%1$s" class="%2$s">%3$s</ul>','depth'  => 10, 'walker' => new fluent_themes_custom_walker_nav_menu) ); ?>
					</div>
					<div class="<?=$prefixClass?>_item <?=$prefixClass?>_contact">
						<div class="<?=$prefixClass?>_phone">
							<a href="tel:<?=get_field('phone', 'option')?>"><?=get_field('phone', 'option')?></a>
						</div>
						<div class="<?=$prefixClass?>_mail">
							<a href="mailto:<?=get_field('mail', 'option')?>"><?=get_field('mail', 'option')?></a>
						</div>
					</div>
					<div class="<?=$prefixClass?>_item">
						<a class="datatextcopy order_button <?=$prefixClass?>_order_button" href="#fancy-modal-order-call" data-fancybox="" data-text="<?=get_sub_field('main_header_style_3_button_text')?>"><?=get_sub_field('main_header_style_3_button_text')?></a>
					</div>
				</div>
			</div>
		</div>
	</div>