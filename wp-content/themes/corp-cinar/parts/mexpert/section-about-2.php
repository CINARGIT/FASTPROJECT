<? 
$about_set = get_field('about_set',  get_option('page_on_front'));
?>
<section class="section-common section-about <?=get_field('vyberite_stil_bloka_o_kompanii', 'styleset')?>">
	<div class="about_box_wrap">
		<div class="container">
		
	
				<h2><?=get_field('name_about')?></h2>
			
			
		<?php				
$numberOdds = $about_set['number_odds']; 
if($numberOdds): ?>
	<div class="row numOdds_row">
    <?php foreach($numberOdds as $row): 
        $name = $row['name']; 
        $text = $row['text']; 
    ?>
		<div class="col-xs-12 col-md-2 numOdd_item">
			<div class="numOdd_name"><?php echo esc_html($name); ?></div>
			<div class="numOdd_text"><?php echo esc_html($text); ?></div>
		</div>
     <?php endforeach; ?>
    </div>
<?php endif; ?>
		
		
		
			<div class="about_box">
				<?=get_field('text_about')?>
			</div>
		</div>
	</div>
</section>
