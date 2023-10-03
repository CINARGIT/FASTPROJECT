<?php
/**
* Template Name: Продукт/услуга
* Template Post Type: post, page
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/
?>
<?php get_header(); ?>
<?
if(get_field('vyberite_stili_glavnogo_ekrana', get_option('page_on_front'))) { 
	get_template_part( 'parts/'.get_field('vyberite_stili_glavnogo_ekrana', get_option('page_on_front')).'/main-section');
} 
?>

<?
if(get_field('selectbreadcrumb', 'option')) { 
	get_template_part( 'parts/'.get_field('selectbreadcrumb', 'option').'/breadcrumbs');
} 
?>

<section class="section-common lada-armenia section-sinlge-detail-row">
<div class="container">
<h2><?=get_field('zagolovok_key')?></h2>
<div class="row">
	<div class="col-xs-12 col-md-7">
		<? get_template_part( 'parts/lada-armenia/section-single-gallery'); ?>
	</div>
	<div class="col-xs-12 col-md-5">
		<? get_template_part( 'parts/lada-armenia/section-single-detail'); ?>
	</div>
</div>
</div>
</section>

<section class="section-common lada-armenia section-sinlge-programm">
<div class="container">
<div class="ssp_inside">
<div class="mini_title"><?=get_field('zagolovok_programm')?></div>

			<?php if( have_rows('programma') ): ?>
				<div class="row">
						<?php
						while( have_rows('programma') ): the_row(); 
						?>
						<div class="col-xs-12 col-md-4 ssp_col">
							<div class="ssp_item">
								<span>
								<?=get_sub_field('znachenie')?>
								</span>
							</div>
						</div>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>

</div>
</div>
</section>



<section class="section-common lada-armenia section-tabs">
<div class="container">

<div id="tabs" class="tabs-wrap">
	<!-- Кнопки -->
	<div class="tabs-nav-wrap">
	<ul class="tabs-nav tabs-nav-btn">
		<li><a href="#tab-1">Обзор</a></li>
		<li><a href="#tab-2">Маршрут</a></li>
		<li><a href="#tab-3">Что включено</a></li>
		<li><a href="#tab-4">Цены</a></li>
		<li><a href="#tab-5">Отзывы</a></li>
	</ul>
	</div>
	
	<!-- Контент -->
	<div class="tabs-items">
		<div class="tabs-mobile-nav-btn tabs-nav-btn"><a href="#tab-1">Обзор</a></div>
		<div class="tabs-item" id="tab-1">
			<div class="tabs-item-content">
				<?=get_field('obzor')?>
			</div>
		</div>
		<div class="tabs-mobile-nav-btn tabs-nav-btn"><a href="#tab-2">Маршрут</a></div>
		<div class="tabs-item" id="tab-2">
			<?php
				$marshrutcount = count(get_field('marshrut'));
				if( have_rows('marshrut') ): 
			?>
			<div class="tabs-item-content">
				<div class="mi_wrap">
					<ul class="row_level first_level">
					<?php
					
						$i = 0;
						$counter = 1;
						$level = 1;
						$levelcount = ceil($marshrutcount / 5);
						while( have_rows('marshrut') ): the_row(); $i++; 

					?>
						<li class="mi_col <? if($marshrutcount == $i or $i == 1) echo 'full_mi'; ?>  <? if($i % 6 == 0) { echo 'special_mi'; }?>">
							<div class="mi_num"><?=$i?></div>
							<div class="mi_item">
								<span>
								<?=get_sub_field('znachenie')?>
								</span>
							</div>
						</li>
					<?php
						if($counter % 5 == 0 && $counter < $marshrutcount) {
						$level++;
					?>
						</ul><ul class="row_level <? if($level % 2 == 0) { echo 'other_level'; }?> <? if($level == $levelcount) { echo 'last_level'; }?>">
					<?php
						}
						$counter++;
					endwhile; 
					?>
					</ul>
				</div>
			</div>
			<?php endif; ?>
		</div>
		<div class="tabs-mobile-nav-btn tabs-nav-btn"><a href="#tab-3">Что включено</a></div>
		<div class="tabs-item" id="tab-3">
			<div class="tabs-item-content">
				<?=get_field('chto_vklyucheno')?>
			</div>		
		</div>		
		<div class="tabs-mobile-nav-btn tabs-nav-btn"><a href="#tab-4">Цены</a></div>
		<div class="tabs-item" id="tab-4">
			<div class="tabs-item-content">
				<?=get_field('czeny')?>
			</div>	
		</div>	
		<div class="tabs-mobile-nav-btn tabs-nav-btn"><a href="#tab-5">Отзывы</a></div>
		<div class="tabs-item" id="tab-5">
			<div class="tabs-item-content">
			<div class="rs_wrap">
			<?php while( have_rows('otzyv') ): the_row(); 

			$raiting_full = 5;
			$raiting_item = get_sub_field('oczenka');
			$raiting = (($raiting_full - $raiting_item) * 100) / $raiting_full;
			$raiting = 100 - $raiting;
			
			?>
				<div class="rs_item">
					<div class="rs_item_сontent">
						<div class="rs_item_img"><img src="<?=get_sub_field('photo')['sizes']['medium']?>" alt="<?=get_sub_field('imya')?>"></div>
						<div class="rs_item_info">
							<div class="rs_item_name"><?=get_sub_field('imya')?></div>
							<div class="rs_item_info_part_1">
								<div class="rating_stars">
									<div class="rating_full" style="width: <?=$raiting?>%"></div>
								</div>
								<div class="rs_item_date"><?=get_sub_field('date')?></div>
							</div>
							<div class="rs_item_rew"><?=get_sub_field('review')?></div>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
			</div>
		</div>
	</div>
</div>  
	

</div>
</div>
</section>

<? get_template_part( 'parts/lada-armenia/section-form', null, $params = ['product' => true]); ?>

<? get_template_part( 'parts/lada-armenia/section-product', null, $params = ['id_cat' => get_the_category(get_the_ID()), 'cat_title' => 'Вам может <span>быть интересно</span>']); ?>

<? 
if(!empty(get_field('vyberite_stili_form_2', get_option('page_on_front')))) { 
	get_template_part( 'parts/'.get_field('vyberite_stili_form_2', get_option('page_on_front')).'/section-form-2'); 
}
?>

<?php get_footer();