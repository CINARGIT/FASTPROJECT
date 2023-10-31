<?php
/**
 * The template for displaying the footer
 */
?>

<?php
 if( have_rows('footer_flex', 'option') ) {  ?>
	<?php while ( have_rows('footer_flex', 'option') ) { the_row();  ?>
		<? get_template_part( 'parts/footers/'.get_row_layout()); ?>
	<?php } ?>
<?php } ?>

</div>



<div class="fancy-modal" id="fancy-modal-order-call">
 
    <div class="fancy-modal-modal-content">
		<div class="modal-title init_box">Оставить заявку</div>
		<div class="modal-des">Заполните форму ниже и наши менеджеры свяжутся с Вами, чтобы помочь Вам выбрать необходимое оборудование.</div>
		<?=do_shortcode('[contact-form-7 id="7435" title="Оставить заявку (стандартная)"]')?>
	</div>
  
</div>


<?php wp_footer(); ?>

</body>
</html>
