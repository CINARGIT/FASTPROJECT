<?php
/**
 * The template for displaying the footer
 */
?>

<? 
	get_template_part( 'parts/sections/footer'); 
?>

</div>



<div class="fancy-modal" id="fancy-modal-order-call">
 
    <div class="fancy-modal-modal-content">
		<div class="modal-title init_box main_section_title">Оставить заявку</div>
		<?=do_shortcode('[contact-form-7 id="7435" title="Оставить заявку (стандартная)"]')?>
	</div>
  
</div>


<?php wp_footer(); ?>

</body>
</html>
