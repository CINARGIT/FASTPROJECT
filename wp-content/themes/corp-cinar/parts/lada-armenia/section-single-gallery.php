<?php 
$images = get_field('galereya', get_the_id());
$size = 'medium';
if( $images ):
	$countimage = count($images);
?>
    	<div class="single-gallery-wrap">
				<div class="single-gallery-item-big">
					<a href="<?php echo esc_url($images [0]['sizes']['large']); ?>" data-fancybox="gallery">
						<img src="<?php echo esc_url($images [0]['sizes']['medium']); ?>" alt="<?php echo get_the_title(); ?>" />
					</a>
				</div>
			<div class="single-gallery-row <? if($countimage > 4) echo 'single-gallery-slick';?>">
			<?php foreach( $images as $image ): ?>
				<div class="single-gallery-item">
					<a href="<?php echo esc_url($image['sizes']['large']); ?>" data-fancybox="gallery">
						<img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo get_the_title(); ?>" />
					</a>
				</div>
             <?php endforeach; ?>  
			</div>
       </div>
<?php endif; ?>