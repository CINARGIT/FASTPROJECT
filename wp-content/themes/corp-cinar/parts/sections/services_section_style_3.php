<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
	$id_page = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
	$id_page = $maincategory->term_id;
}

$prefixClass = 'services_section_style_3';
$section = get_sub_field('services_section_style_3_group');

if(!empty($section['items'])) {
	$terms = get_terms( 'category', array( 'include' => $section['items'], 'orderby' => 'menu_order', 'hide_empty' => false ) );
} elseif(is_archive()) { 
	$terms = get_terms( 'category', array( 'parent' => $id_page, 'orderby' => 'term_order', 'hide_empty' => false) );	
}

if(!empty($terms)) {
?>



<section class="section-common section_coso_style_3_common section-<?=$prefixClass?>">
<style>
	.<?=$prefixClass?>_item_title{
		font-size:<?=$section['items_title_font_size']?>px;
	}
</style>
	<div class="container">
	
	<? if(!empty($section['beforetitle'])) { ?>
		<p class="<?=$prefixClass?>_beforetitle"><?=$section['beforetitle']?></p>
	<? } ?>
	<? if(!empty($section['title'])) { ?>
		<h2><?=highlightLastWord($section['title'])?></h2>
	<? } ?>
	<? if(!empty($section['short_description'])) { ?>
		<div class="short_description"><?=$section['short_description']?></div>
	<? } ?>
	
	<div class="row su_row">
	<?php
	$i = 0;
    foreach ( $terms as $term ) {
	$i++;
	?>
	<div class="col-xs-12 col-md-3 <?=$prefixClass?>_item">
		<div class="<?=$prefixClass?>_item_wrap">
			<div class="<?=$prefixClass?>_item_show_side">
				<a href="<?=get_term_link($term)?>" title="<?=$term->name?>" class="<?=$prefixClass?>_item_link">
					<span class="<?=$prefixClass?>_item_img">
						<? if(!empty(get_field('thumbnail', $term)['url'])) { ?>
							<img src="<?=get_field('thumbnail', $term)['url']?>" alt="<?=$term->name?>">
						<? } else { ?>
							<img src="<?=get_template_directory_uri()?>/img/system/no-photo.png" alt="<?=$term->name?>">
						<? } ?>
					</span>
					<span class="<?=$prefixClass?>_item_info">
						<span class="<?=$prefixClass?>_item_title">
							<?=$term->name?>
						</span>
					</span>
					
					<span class="<?=$prefixClass?>_item_more_text">
						Узнать подробнее
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M2.76904 10.1538L19.3844 10.1538" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M12 2.76929L19.3846 10.1539L12 17.5385" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						</svg> 
					</span>
				</a>
			</div>		 
		</div>
     </div>
	<? } ?>	
    </div>
	</div>
</section>
<? } ?>	


