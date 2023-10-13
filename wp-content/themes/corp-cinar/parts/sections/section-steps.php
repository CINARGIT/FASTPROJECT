<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}
?>
<?php 
	$section = get_field('steps', get_option('page_on_front'));
	if( $section ): 
	$sectionclass = 'steps';
?>
<section class="section-common section-<?=$sectionclass?> colored">
    <div class="container">
    <div class="row row_<?=$sectionclass?>">
        <h2><?=highlightLastWord($section['title'])?></h2>
        <?php
		$countitems = count($section['steps_list']);
		$i = 0;
        foreach( $section['steps_list'] as $item ):  $i++;
            $photo = $item['photo']['sizes']['medium'];
        ?>
        <div class="<?=$sectionclass?>_item col-xs-12 col-md-3 <? if($i == $countitems) echo 'last_item'; ?>">
            <div class="<?=$sectionclass?>_item_in">
                <div class="<?=$sectionclass?>_item_img">
                    <img src="<?=$photo?>" alt="<?=$item['name'] ?>">
                </div>
                <div class="<?=$sectionclass?>_item_wrap_text">
                     <?=$item['text'] ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    </div>
</section>
<?php endif; ?>