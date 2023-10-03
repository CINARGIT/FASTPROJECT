<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}
$partnersSet = get_field('partners_set', get_option('page_on_front'));
?>
<? if(!empty($partnersSet['gallery'])) { ?>
<section class="section-common <?=get_field('partners_style', 'styleset')?> section-partners">
	<div class="container">
	<div class="container-in">
	<? if(!empty($partnersSet['title'])) { ?>
		<h2><?=$partnersSet['title']?></h2>
	<? } ?>

<?php 
if( $partnersSet['gallery'] ): 
?>
		<div class="row">
			<?php foreach( $partnersSet['gallery'] as $image ): ?>
				<div class="partner_item_wrap col-xs-12 col-md-2">
					<div class="partner_item">
						<img src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					</div>
				</div>
             <?php endforeach; ?> 
		</div>
<?php endif; ?>

	
	</div>
	</div>
</section>
<? } ?>