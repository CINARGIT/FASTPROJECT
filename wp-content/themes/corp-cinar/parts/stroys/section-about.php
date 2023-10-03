<? 
$about_set = get_field('about_set',  get_option('page_on_front'));
?>
<section class="section-common section-about <?=get_field('vyberite_stil_bloka_o_kompanii', 'styleset')?>">
	<div class="about_box_wrap">
		<div class="container">
			<? if(empty($args['title'])) { ?>
				<h2><?=$about_set['about_head']?></h2>
			<? } else { ?>
				<?=$args['title'];?>
			<? } ?>
			<div class="about_box">
			<div class="row">
				<div class="col-xs-12 col-md-6">
				<? if(empty($args['content'])) { ?>
					<?=$about_set['about_text']?>
				<? } else { ?>
					<?=apply_filters('the_content', $args['content']);?>
				<? } ?>
				<div class="clearfix"></div>
				</div>
				<div class="col-xs-12 col-md-6">
<?php				
$numberOdds = $about_set['number_odds']; 
if($numberOdds): ?>
	<div class="row numOdds_row">
    <?php foreach($numberOdds as $row): 
        $name = $row['name']; 
        $text = $row['text']; 
    ?>
		<div class="col-xs-12 col-md-4 numOdd_item">
			<div class="numOdd_name"><?php echo esc_html($name); ?></div>
			<div class="numOdd_text"><?php echo esc_html($text); ?></div>
		</div>
     <?php endforeach; ?>
    </div>
<?php endif; ?>
				
				
					
				</div>
			</div>
		</div>
	</div>
</section>
