<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}

$factors = get_field('factors',  $id_page_field);
if($factors['factors_list']) { 
?>
<section class="section-common section-factors senergo">

	<div class="container">
		<? if($factors['title']) { ?>
			<h2><?=$factors['title']?></h2>
		<? } ?>
	<?php				
	$factorslist = $factors['factors_list']; 
	if($factorslist):
	?>	
	<div class="sf_list row">
    <?php $i = 0; foreach($factorslist as $row): $i++; ?>
		<div class="sf_box_item col-xs-12 col-md-6">
			<div class="sf_box_title"><?=$row['title']?></div>
			<?php				
			$factoritems = $row['factors'];	
			if($factoritems):
			?>	
			<?php $i = 0; foreach($factoritems as $factoritem): $i++; ?>
			<div class="sf_item_value">
				<div class="sf_item_value_img">
					<img src="<?=$factoritem['icon']['url']?>" alt="<?=$factoritem['title']?>">
				</div>
				<div class="sf_item_value_info">
					<div class="sf_item_value_title" style="color:<?=$factoritem['title_color']?>"><?=$factoritem['title']?></div>
					<div class="sf_item_value_text"><?=$factoritem['text']?></div>
				</div>
			</div>
			<?php endforeach; ?>
			<?php endif; ?>	
		</div>
     <?php endforeach; ?>
    </div>		
	<?php endif; ?>	
			
</section>

<?php } ?>	
