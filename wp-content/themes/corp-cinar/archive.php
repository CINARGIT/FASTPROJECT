<?php
/**
 * Category Template: Список объектов
 */
$maincategory = get_queried_object();
$idofcat = $maincategory->term_id;
$currentCatID = $maincategory->term_id;



?>
<?php get_header(); ?>

<?php if(empty(get_field('template', $maincategory))) { 
		include(get_template_directory().'/category/standart.php'); 
	} else {
		include(get_template_directory().'/category/'.get_field('template', $maincategory).'.php'); 
	} 
?>

<?php get_footer();	?> 