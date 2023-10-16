<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}
$clientsSet = get_field('clients_set', get_option('page_on_front'));
?>
<? if(!empty($clientsSet['gallery'])) { ?>
<section class="section-common <?=get_field('clients_style', 'styleset')?> section-clients">
    <div class="container">
    <? if(!empty($clientsSet['title'])) { ?>
        <h2><?=highlightLastWord($clientsSet['title'])?></h2>
    <? } ?>
    <div class="clients_row_cur simple_dots">
<?php
$itemsPerRow = wp_is_mobile() ? 2 : 8;  // Если на мобильном устройстве, то каждые 2 элемента, иначе каждые 8

if ($clientsSet['gallery']) {
    $chunks = array_chunk($clientsSet['gallery'], $itemsPerRow);

    foreach ($chunks as $chunk) {
        echo '<div class="clients_row_wrap">';
        echo '<div class="clients_row">';

        foreach ($chunk as $image) {
            ?>
            <div class="client_item_wrap">
                <div class="client_item">
                    <img src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
            </div>
            <?php
        }

        echo '</div>';
        echo '</div>';
    }
}
?>
    </div>
    </div>
</section>
<? } ?>