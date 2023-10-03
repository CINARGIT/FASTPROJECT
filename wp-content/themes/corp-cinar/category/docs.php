<?
if(get_field('selectbreadcrumb', 'option')) { 
	get_template_part( 'parts/'.get_field('selectbreadcrumb', 'option').'/breadcrumbs');
} 
$cat_name = $maincategory->name;
if(!empty(get_field('alternativnyj_zagolovok', $maincategory))){
	$cat_name = get_field('alternativnyj_zagolovok', $maincategory);
}
?>

<div class="content-container section-common section-docs section-blog senergo">
	<div class="section-content-in">
	<div class="container">
<h1><?=$cat_name?></h1>


<?
	
if(!empty($_GET['current'])){
$currentyear = $_GET['current'];
} else{
$currentyear = '';
}

	if( is_category() ){
		$maincategory = get_queried_object();
		$idofcat = $maincategory->term_id;
	} else {
		$categories = get_the_category();
		$idofcat = $categories[0]->cat_ID;
	}
	
	if(category_has_parent($idofcat)) {
		$idofcat = $maincategory->category_parent;
	} else {
		$idofcat = $idofcat;
	}
		
// если мы в категории
if( is_category() ){
	// получим ID текущей категории
	$current_cat_id = $idofcat;
	$current_cat_slug = get_queried_object()->slug;
	$category_link = get_category_link($idofcat);
	$category_name = get_cat_name($idofcat);
	$args = array(
		'child_of'     => $current_cat_id,
		'orderby'      => 'name',
		'order'        => 'ASC',
		'hide_empty'   => 0,
		'hierarchical' => 1,
		'number'       => 0, // сколько выводить?
		// полный список параметров смотрите в описании функции http://wp-kama.ru/function/get_terms
	);
	$categories = get_categories( $args );
	if( $categories ){
		$currentlinkall = 'current_link_none';
		if($currentCatID == $idofcat) $currentlinkall = 'active';
		
		echo '
		<div class="section-blog-cat-wrap">
		<ul class="section-blog-cat-row">';
			echo '<li><a href="'.$category_link.'" class="sp-category-btn unselectable '.$currentlinkall.'"><span>Все</span></a></li>';
		foreach( $categories as $cat ){	
		?>
			<li><a href="<?=get_category_link($cat->term_id)?>" class="sp-category-btn unselectable <? if($currentCatID == $cat->term_id) echo 'active' ?>"><span><?=$cat->name?></span></a></li>
		
		<?php
		}
		echo '</ul></div>';
	}
}
?>			
	
	

			
				<div class="row">
				<? 
				if($currentCatID  == $idofcat) {
				foreach( $categories as $cat ){	
				?>
				
				
			<? if(get_field('docs', $cat)['files']) {  ?> 
			<? foreach (get_field('docs', $cat)['files'] as $row) { ?>
				<div class="sdf_item col-xs-12 col-md-3">
					<div class="sdf_item_in">
						<div class="sdf_file_a">
						<div class="sdf_icon">
								<? if ( file_exists(get_template_directory().'/formaticon/'.wp_check_filetype($row['file']['url'])["ext"].'.svg')) { ?>
								<img src="<?=get_template_directory_uri()?>/formaticon/<?php echo wp_check_filetype($row['file']['url'])["ext"]; ?>.svg" alt="<?php echo wp_check_filetype('file')["ext"]; ?>">
							<? } else { ?>
								<img src="<?=get_template_directory_uri()?>/formaticon/file.svg" alt="<?php echo wp_check_filetype($row['file']['url'])["ext"].'.svg'; ?>">
							<? } ?>
						</div>
						<div class="sdf_title"><?=$row['title']?></div>
						</div>
						<a class="sdf_btn" href="<?=$row['file']['url']?>">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
							<path d="M7 10L12 15L17 10" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
							<path d="M12 15V3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
						</svg>
						<span>Скачать документ</span>
						</a>
						<div class="sdf_size">Размер: <?php echo size_format($row['file']['filesize']); ?></div>
						
					</div>
				</div>
			<?php } ?> 
			<?php } ?> 
				
			
				
				<?php }  ?>
		
				<?php } else { ?>


			<? if(get_field('docs', $maincategory)['files']) {  ?> 
			<? foreach (get_field('docs', $maincategory)['files'] as $row) { ?>
				<div class="sdf_item col-xs-12 col-md-3">
					<div class="sdf_item_in">
						<div class="sdf_file_a">
						<div class="sdf_icon">
								<? if ( file_exists(get_template_directory().'/formaticon/'.wp_check_filetype($row['file']['url'])["ext"].'.svg')) { ?>
								<img src="<?=get_template_directory_uri()?>/formaticon/<?php echo wp_check_filetype($row['file']['url'])["ext"]; ?>.svg" alt="<?php echo wp_check_filetype('file')["ext"]; ?>">
							<? } else { ?>
								<img src="<?=get_template_directory_uri()?>/formaticon/file.svg" alt="<?php echo wp_check_filetype($row['file']['url'])["ext"].'.svg'; ?>">
							<? } ?>
						</div>
						<div class="sdf_title"><?=$row['title']?></div>
						</div>
						<div class="sdf_file_f">
						<a class="sdf_btn" href="<?=$row['file']['url']?>">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
							<path d="M7 10L12 15L17 10" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
							<path d="M12 15V3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
						</svg>
						<span>Скачать документ</span>
						</a>
						<div class="sdf_size">Размер: <?php echo size_format($row['file']['filesize']); ?></div>
						</div>
					</div>
				</div>
			<?php } ?> 
			<?php } ?> 

				<? } ?>
				</div>
				</div>
		
	</div>
</div>