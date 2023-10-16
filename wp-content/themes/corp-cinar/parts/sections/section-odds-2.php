<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}
?>
<?php 
	$section = get_field('odds_2', get_option('page_on_front'));
	if( $section ): 
	$sectionclass = 'odds_2';
?>
<section class="section-common colored section-<?=$sectionclass?>">
    <div class="section-common-wrap">
    <div class="container">
        <h2><?=highlightLastWord($section['title'])?></h2>
<div class="row row_<?=$sectionclass?> <? if ( wp_is_mobile() ) echo 'mobile_cur_style_1 row_'.$sectionclass.'_cur simple_dots';  ?>">
    <?php
    $countitems = count($section['items']);
    $i = 0;
    foreach( $section['items'] as $item ):  $i++;
        $photo = $item['photo']['url'];

        // Если это 1-й, 5-й, 9-й элемент (и так далее) и пользователь на мобильном устройстве, открываем новый див
        if ($i % 4 == 1 && wp_is_mobile()) {
            echo '<div class="row-odds-special">';
        }
    ?>
    <div class="<?=$sectionclass?>_item col-xs-12 col-md-3 <? if($i == $countitems) echo 'last_item'; ?>">
        <div class="<?=$sectionclass?>_item_show_side">
            <div class="<?=$sectionclass?>_item_in">
                <div class="<?=$sectionclass?>_item_img">
                    <img src="<?=$photo?>" alt="<?=$sectionclass?> <?=$i?>">
                </div>
                <div class="<?=$sectionclass?>_item_title">
                    <?=$item['title'] ?>
                </div>
                <? if(!empty($item['text'])) { ?>
                <div class="<?=$sectionclass?>_item_wrap_text">
                    <?=$item['text'] ?>
                </div>
                <? } ?>
            </div>
        </div>
    </div>

    <?php
        // Если это 4-й, 8-й, 12-й элемент (и так далее) и пользователь на мобильном устройстве, закрываем див
        if ($i % 4 == 0 && wp_is_mobile()) {
            echo '</div>';
        }

    endforeach;

    // Если количество элементов делится не нацело на 4 и пользователь на мобильном устройстве, нам нужно закрыть открывшийся див
    if ($i % 4 != 0 && wp_is_mobile()) {
        echo '</div>';
    }
    ?>
</div>
    </div>
    </div>
</section>
<?php endif; ?>