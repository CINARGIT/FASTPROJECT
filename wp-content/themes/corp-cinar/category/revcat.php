<?
$title = $maincategory->name;
$words = explode(" ", $title ); 

	$wcount = -2;
	if(!empty($words)){
		$wordscount = count($words);
		if($wordscount <= 2) {
			$wcount = -1;
		}
	} 
	
$last_two_word = implode(' ',array_splice($words, $wcount )); 
$except_last_two = implode(' ', $words);
$title = '<h1 class="main-h1">'.$except_last_two.' <span>'.$last_two_word.'</span></h1>';
?>

<?
if(get_field('selectbreadcrumb', 'option')) { 
	get_template_part( 'parts/'.get_field('selectbreadcrumb', 'option').'/breadcrumbs');
} 
?>

<section class="section-common lada-armenia section-content">
	<div class="container">
	<div class="section-content-in">
	<?=$title?>
	</div>
	
	
	<div class="rs_item_сontent_box_wrap">
					<?php if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp ?>
                    <?
                                $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'your_thumb_handle' );
                                $thumbnail = $thumbnail['0'];
			$raiting_full = 5;
			$raiting_item = get_field('oczenka', $post->ID);
			$raiting = (($raiting_full - $raiting_item) * 100) / $raiting_full;
			$raiting = 100 - $raiting;
                              ?>
                                  
<div class="rs_item_сontent_box">
<div class="rs_item_сontent">
						<div class="rs_item_img"><img src="<?=$thumbnail?>" alt="<?php the_title();?>"></div>
						<div class="rs_item_info">
							<div class="rs_item_name"><?php the_title();?></div>
							<div class="rs_item_info_part_1">
								<div class="rating_stars">
									<div class="rating_full" style="width: <?=$raiting?>%"></div>
								</div>
								<div class="rs_item_date"><?php echo get_the_date('d F Y', $post->ID); ?></div>
							</div>
							<div class="rs_item_rew"><?php the_content('');?></div>
						</div>
					</div>
					</div>

					
                    <?php endwhile; // конец цикла
                    else: echo '<h2>Нет записей.</h2>'; endif; // если записей нет, напишим "простите" ?>
                </div>
				
					<?php wp_corenavi(); ?>
				
                </div>
            
            
</section>


<?
if(get_field('selectbreadcrumb', 'option')) { 
	get_template_part( 'parts/lada-armenia/section-form-review');
} 
?>

<? 
if(!empty(get_field('vyberite_stili_form_2', get_option('page_on_front')))) { 
	get_template_part( 'parts/'.get_field('vyberite_stili_form_2', get_option('page_on_front')).'/section-form-2'); 
}
?>
