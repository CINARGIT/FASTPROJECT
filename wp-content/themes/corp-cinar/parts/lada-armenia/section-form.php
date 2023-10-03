<? if($args['product']){ 
$forma = get_field('forma_svyazi', 'option'); 
} else { 
$forma = get_field('forma_svyazi', get_option('page_on_front'));
}

$form_title = get_field('zagolovok_formy-1', get_option('page_on_front'));

if(!empty(get_field('zagolovok_osnovnoj_formy'))){
	$form_title = get_field('zagolovok_osnovnoj_formy');
}

?>
<section class="section-common section-form <?=get_field('vyberite_stili_form', get_option('page_on_front'))?>">
	<div class="container">
		<div class="form-content">
			<div class="def_title">
				<?=$form_title?>
			</div> 
			<div class="def_title_des">
				<?=get_field('podzagolovok_formy-1', get_option('page_on_front'))?>
			</div> 
			<?=do_shortcode('[contact-form-7 id="'.$forma.'"]')?>
		</div>
	</div>
</section>