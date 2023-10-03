<? 
$form1 = get_field('forma_1_set', get_option('page_on_front'));
$form1_id = $form1['forma_svyazi'];
$form1_title = $form1['zagolovok_formy-1'];
$form1_des = $form1['podzagolovok_formy-1'];
?>
<section class="section-common section-form <?=get_field('vyberite_stili_form', 'styleset')?>">
	<div class="container">
		<div class="form-content">
			<div class="def_title">
				<?=$form1_title?>
			</div> 
			<div class="def_title_des">
				<?=$form1_des?>
			</div> 
			<?=do_shortcode('[contact-form-7 id="'.$form1_id.'"]')?>
		</div>
	</div>
</section>