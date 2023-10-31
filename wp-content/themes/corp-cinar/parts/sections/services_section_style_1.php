<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
	$id_page = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
	$id_page = $maincategory->term_id;
}

$prefixClass = 'services_section_style_1';
$section = get_sub_field('services_section_style_1_group');

if(!empty($section['items'])) {
	$terms = get_terms( 'category', array( 'parent' => $section['items'], 'orderby' => 'menu_order', 'hide_empty' => false ) );
} elseif(is_archive()) { 
	$terms = get_terms( 'category', array( 'parent' => $id_page, 'orderby' => 'term_order', 'hide_empty' => false) );	
}

if(!empty($terms)) {
?>



<section class="section-common section_style_1_common <?=$prefixClass?>">
<style>
	.<?=$prefixClass?>_item_title{
		font-size:<?=$section['items_title_font_size']?>px;
	}
	
	.<?=$prefixClass?>_row:after{
		content:'';
		width:302px;
		height:248px;
		position:absolute;
		right: 65px;
		bottom: 120px;
		background-repeat:no-repeat;
		background-size:contain;
		background-image:url(<?=$section['placeholder']['url']?>);
	}
	
</style>
	<div class="container">
	
	<? if(!empty($section['title'])) { ?>
		<h2><?=highlightLastWord($section['title'])?></h2>
	<? } ?>

	
	<div class="row <?=$prefixClass?>_row">
	<?php
	$i = 0;
    foreach ( $terms as $term ) {
	$i++;
	?>
	<div class="col-xs-12 col-md-4 <?=$prefixClass?>_item">
		<div class="<?=$prefixClass?>_item_wrap">
			<div class="<?=$prefixClass?>_item_show_side">
				<a href="<?=get_term_link($term)?>" title="<?=$term->name?>" class="<?=$prefixClass?>_item_link">
						<span class="<?=$prefixClass?>_item_title">
							<?=$term->name?>
						</span>
				</a>
				
				<?php $term_child = get_terms( 'category', array( 'parent' => $term->term_id, 'orderby' => 'menu_order', 'hide_empty' => false ) ); ?>
				<?php if(!empty($term_child)) { ?>
				<ul>
				<?php
				$i = 0;
				foreach ( $term_child as $term_child_item) {
				$i++;
				?>
					<li><a href="<?=get_term_link($term_child_item)?>"><span><?=$term_child_item->name?></span></a></li>
				<? } ?>	
				</ul>
				<? } ?>	
				
			</div>		 
		</div>
     </div>
	<? } ?>	
    </div>
	</div>
</section>
<? } ?>	


