<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}
?>
<?php 
	$section = get_field('links', $id_page_field);	
	if( $section ): 
	$sectionclass = 'links';
?>
<section class="section-common section-<?=$sectionclass?>">
    <div class="container">
    <div class="row row_<?=$sectionclass?>">
        <?php
		$countitems = count($section);
		$i = 0;
        foreach( $section as $item ):  $i++;
        ?>
        <div class="<?=$sectionclass?>_item col-xs-12 col-md-3 <? if($i == $countitems) echo 'last_item'; ?>">
            <a href="<?=$item['link'] ?>" class="<?=$sectionclass?>_item_in">
				<?=$item['title'] ?>
			</a>		
         </div>
        <?php endforeach; ?>
    </div>
    </div>
</section>
<?php endif; ?>