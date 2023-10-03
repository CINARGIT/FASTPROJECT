<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}
$textSet = get_field('text_set', $id_page_field);

if(!empty($args['field'])) {
	$textSet = get_field($args['field'], $id_page_field);
}

?>

<?php $offerСartGroup = get_field('offer_cart_group', $id_page_field); if($offerСartGroup): ?>

    <?php foreach($offerСartGroup as $row): 
        $name = $row['name']; 
        $offerCartList = $row['offer_cart_list'];
        $cartСolor = $row['cart_color'];
        $btnСolor = $row['btn_color'];
        $textСolor = $row['text_color'];
        $priceСolor = $row['price_color'];
    ?>
<section class="section-common stroys section-offercart">
	<div class="container">
	<h2><?=$name?></h2>
	
	
	<?php if($offerCartList): ?>
	<div class="row">
	<?php foreach($offerCartList as $row2): 
        $name = $row2['name']; 
        $price = $row2['price']; 
        $ssylka = $row2['ssylka']; 
        $tekstSsylki = $row2['tekst_ssylki']; 
    ?>	
	
	<div class="col-xs-12 col-md-3 offercart_item">
		<div class="offercart_item_box" style="background-color:<?=$cartСolor?>; color:<?=$textСolor?>">
			<div class="offercart_item_inf">
				<div class="offercart_item_name"><?=$name?></div>
				<div class="offercart_item_price" style="color:<?=$priceСolor?>"><?=$price?></div>
			</div>
			<a href="<?=$ssylka?>" class="offercart_item_more order_button" style="background-color:<?=$btnСolor?>"><?=$tekstSsylki?></a>
		</div>
	</div>
	
	<?php endforeach; ?>
	</div>
	<?php endif; ?>
    </div>
</section>		
     <?php endforeach; ?>

<?php endif; ?>