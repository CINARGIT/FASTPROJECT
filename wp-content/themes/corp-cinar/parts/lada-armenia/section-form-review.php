
<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}

?>

<? 
$forma = get_field('catrevset', $id_page_field)['forma_otzyvov'];
$form_title = get_field('catrevset', $id_page_field)['zagolovok_formy'];

?>
<section class="section-common section-form section-form-review <?=get_field('vyberite_stili_form', get_option('page_on_front'))?>">
	<div class="container">
		<div class="form-content">
			<div class="def_title">
				<?=$form_title?>
			</div> 
			<?=do_shortcode('[contact-form-7 id="'.$forma.'"]')?>
		</div>
	</div>
</section>