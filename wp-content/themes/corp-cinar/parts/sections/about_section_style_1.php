<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
	$id_page = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
	$id_page = $maincategory->term_id;
}

$prefixClass = 'about_section_style_1';
$section = get_sub_field('about_section_style_1_group');
?>



<section class="section-common colored section_style_1_common <?=$prefixClass?>" >
	<div class="container">
			<div class="row <?=$prefixClass?>_row">
			<div class="col-xs-12 col-md-6">
			<? if(!empty($section['title'])) { ?>
				<h2><?=$section['title']?></h2>
			<? } ?>
				<div class="<?=$prefixClass?>_text"><?=$section['text']?></div>
			<div class="<?=$prefixClass?>_button_group">
				<a class="datatextcopy order_button" role="button" href="#fancy-modal-order-call" data-fancybox="" data-text="<?=$section['button_text']?>"><?=$section['button_text']?></a>
				<a href="<?=$section['more_button_link']?>" class="order_button order_button_style_3"><?=$section['more_button_text']?></a>
			</div>
			</div>
			
<div class="col-xs-12 col-md-6">	
	<div class="<?=$prefixClass?>_gallery">	
<?php
// Get the array of images from the ACF gallery field
$images = $section['images'];

if ($images):
    foreach ($images as $image):
        // Thumbnail size image URL
        $thumb = $image['sizes']['medium'];
        
        // Full size image URL
        $full = $image['url'];
        
        // Image alt text
        $alt = $image['alt'];
        ?>
        <a href="<?php echo esc_url($full); ?>" title="<?php echo esc_attr($alt); ?>" data-fancybox="about_images">
            <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>"/>
        </a>
        <?php
    endforeach;
endif;
?>
	</div>
</div>
			
			
		</div>
		</div>
</section>


