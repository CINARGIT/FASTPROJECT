<?php
$section = get_field('form_2', get_option('page_on_front'));
?>
<section style="background-image:url(<?=$section['bgform_2']['url']?>)" class="section-common section-form-2 <?=get_field('vyberite_stili_form_2', 'styleset')?>">

	<div class="container">
	<div class="container-inside">
		<div class="form-content">
		<? if($section['zagolovok_form_2']) { ?>
			<div class="def_title">
				<?=$section['zagolovok_form_2']?>
			</div> 
		<? } ?>
			<div class="def_title_des">
				<?=$section['podzagolovok_form_2']?>
			</div> 
			<?=do_shortcode('[contact-form-7 id="'.$section['form_2_select'].'"]')?>
		</div>
	</div>
	</div>
</section>