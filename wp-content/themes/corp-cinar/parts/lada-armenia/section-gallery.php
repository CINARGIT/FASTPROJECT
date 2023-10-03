<?php if(get_field('galleryset', get_option('page_on_front'))['galleryfront']): ?>
<section class="section-common colored section-gallery <?=get_field('gallery_style', get_option('page_on_front'))?>">
	<div class="container">
		<? if(get_field('galleryset', get_option('page_on_front'))['zagolovok_gallery']) { ?>
			<h2><?=get_field('galleryset', get_option('page_on_front'))['zagolovok_gallery']?></h2>
		<? } ?>
				
<?php 
$images = get_field('galleryset', get_option('page_on_front'))['galleryfront'];

$size = 'medium'; // (thumbnail, medium, large, full or custom size)
if( $images ): ?>
    	<div class="gallery_row">
			<?php foreach( $images as $image ): ?>
				<div class="sg_item_wrap">
					<div class="sg_item">
						<a href="<?php echo esc_url($image['sizes']['large']); ?>" data-fancybox="gallery">
							 <img src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						</a>
					</div>
				</div>
             <?php endforeach; ?>  
       </div>
<?php endif; ?>
		
	<div class="sp_all_btn_wrap">
		<a href="<?=get_field('galleryset', get_option('page_on_front'))['all_gallery_link']?>" class="sp_all_btn alter_style_btn"><?=get_field('galleryset', get_option('page_on_front'))['blok_show_more']?></a>
	</div>
	
	</div>
</section>
<?php endif; ?>