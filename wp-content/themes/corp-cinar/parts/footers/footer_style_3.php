<?
$section = get_sub_field('footer_style_3_group');
$prefixClass = 'footer_style_3';
?>


<footer class="<?=$prefixClass?> <? if(!empty($section['gradiend_theme_color'])) { ?><?=$prefixClass?>_classic<? } ?>">

<style>
<? if(empty($section['gradiend_theme_color'])) { ?>
	.<?=$prefixClass?>{
		background-color:<?=$section['bg_color']?>;
	}
<? } ?>

	.<?=$prefixClass?> .<?=$prefixClass?>_menu div>ul>li>a{
		font-size:<?=$section['menu_item_font_size']?>px;		
	}
	
	.<?=$prefixClass?>,
	.<?=$prefixClass?> .<?=$prefixClass?>_menu div>ul>li>a,
	.<?=$prefixClass?> a{
		color:<?=$section['text_color']?>;
	}
	
</style>
	<div class="container">
	<div class="<?=$prefixClass?>_footer_floor_1">
		<div class="row">
			<div class="col-xs-12 col-md-3 <?=$prefixClass?>_logo">
				<a href="/"><img src="<?=get_field('logo_in_footer', 'option')['url']?>" alt="<?=get_bloginfo('name')?>"></a>
			</div>
			
			<div class="col-xs-12 col-md-9 <?=$prefixClass?>_menu">
				<?php wp_nav_menu( array('menu' => $section['menu_select'], 'container_id'  => '','conatiner_class' => '','menu_class'  => 'topmenu','echo'  => true,'items_wrap'  => '<ul id="%1$s" class="%2$s">%3$s</ul>','depth'  => 10, 'walker' => new fluent_themes_custom_walker_nav_menu) ); ?>
			</div>
		</div>
	</div>
	<div class="<?=$prefixClass?>_footer_floor_2">
		<div class="<?=$prefixClass?>_floor_2_item">
		<? the_privacy_policy_link(); ?>
		</div>
		<div class="<?=$prefixClass?>_floor_2_item">
		© <?=get_field('org_name', 'option')?> <?=get_field('opening_year', 'option')?> - <?=date('Y')?>
		</div>
	</div>
	</div>
</footer>