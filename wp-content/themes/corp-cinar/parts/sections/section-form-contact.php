<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}
?>
<? 
$form1 = get_field('forma_1_set', $id_page_field);
$form1Default = get_field('forma_1_set', get_option('page_on_front'));
$form1_id = $form1Default['forma_svyazi'];
$form1_title = $form1Default['zagolovok_formy-1'];
$form1_des = $form1Default['podzagolovok_formy-1'];
$form1_bg = $form1Default['formbg-1']['url'];
if(!empty($form1['formbg-1']['url'])) { 
	$form1_bg = $form1['formbg-1']['url'];
}
if(!empty($form1['zagolovok_formy-1'])) { 
	$form1_title = $form1['zagolovok_formy-1'];
}
if(!empty($form1['podzagolovok_formy-1'])) { 
	$form1_des = $form1['podzagolovok_formy-1'];
}
if(!empty($form1['forma_svyazi'])) { 
	$form1_id = $form1['forma_svyazi'];
}
?>
<section class="section-common colored section-form section-form-review">
	
	<div class="container">
		<div class="form-content">
			<?=do_shortcode('[contact-form-7 id="b7d8c46" title="Свяжитесь с нами"]')?>
		</div>
	</div>
	
</section>