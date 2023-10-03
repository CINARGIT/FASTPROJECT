<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}
?>
<? 
if(!$args['field_group']) {
	$about_set = get_field('text_set',  $id_page_field);
} else {
	$about_set = get_field($args['field_group'],  $id_page_field);
}
?>

<? if($about_set['text']) {  ?>
<section class="section-common section-about <?=get_field('vyberite_stil_bloka_o_kompanii', 'styleset')?>">
	<div class="about_box_wrap">
		<div class="container">
			<? if(empty($args['title'])) { ?>
				<h2><?=$about_set['title']?></h2>
			<? } ?>
			<div class="about_box">
				<? if(empty($args['text'])) { ?>
					<?=$about_set['text']?>
				<? } ?>
				
<?php				
$numberOdds = $about_set['links']; 
if($numberOdds): ?>	
			
	<div class="numOddsbtns_row">
    <?php $i = 0; foreach($numberOdds as $row): $i++;
        $name = $row['name']; 
        $link = $row['link']; 
		$class = ($i % 2 == 0) ? 'numOdd_btn_alter' : '';
    ?>
		<div class="numOdd_btn_item <? echo $class;  ?>">
			<a href="<?php echo esc_html($link); ?>" class="numOdd_btn"><?php echo esc_html($name); ?></a>
		</div>
     <?php endforeach; ?>
    </div>		
<?php endif; ?>	
			<div class="clearfix"></div>	
		</div>
	</div>
</section>
<?php } ?>	