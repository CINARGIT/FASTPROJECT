<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}
$clientsSet = get_field('clients_set', get_option('page_on_front'));
?>
<? if(!empty($clientsSet['gallery'])) { ?>
<section class="section-common <?=get_field('clients_style', 'styleset')?> section-clients">
	<div class="container">
	<div class="container-in">
	<? if(!empty($clientsSet['title'])) { ?>
		<h2><?=$clientsSet['title']?></h2>
	<? } ?>

<?php 
if( $clientsSet['gallery'] ): 
?>
		<div class="row">
			<?php foreach( $clientsSet['gallery'] as $image ): ?>
				<div class="client_item_wrap col-xs-12 col-md-2">
					<div class="client_item">
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