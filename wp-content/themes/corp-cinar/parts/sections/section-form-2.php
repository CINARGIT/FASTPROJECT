<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}
?>
<? 
$form = get_field('form_2', $id_page_field);
$formDefault = get_field('form_2', get_option('page_on_front'));
$form_id = $formDefault['form_2_select'];
$form_title = $formDefault['zagolovok_form_2'];
$form_des = $formDefault['podzagolovok_form_2'];
$form_bg = $formDefault['bgform_2']['url'];
if(!empty($form['bgform_2']['url'])) { 
	$form_bg = $form['bgform_2']['url'];
}
if(!empty($form['zagolovok_form_2'])) { 
	$form_title = $form['zagolovok_form_2'];
}
if(!empty($form['podzagolovok_form_2'])) { 
	$form_des = $form['podzagolovok_form_2'];
}
if(!empty($form['form_2_select'])) { 
	$form_id = $form['form_2_select'];
}
?>
<section class="section-common colored section-form" style="background-image:url(<?=$form_bg?>);">
	
	<div class="container">
		<div class="form-content">
			<div class="def_title">
				<?=$form_title?>
			</div> 
			<div class="def_title_des">
				<?=$form1_des?>
			</div>
			<div class="form-content-form-in">			
				<?=do_shortcode('[contact-form-7 id="'.$form_id.'"]')?>
			</div>
		</div>
	</div>
	
</section>