<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}
$properties = get_field('properties', $id_page_field);
if(!empty($properties['lines'])) { 
?>
<section class="section-common section-properties senergo">
		<div class="container">
			<div class="container-bg">
			<? if($properties['title']) { ?>
				<h2><?=$properties['title']?></h2>
			<? } ?>
<?php  $lines = $properties['lines']; $counline = count($lines); if($lines): ?>	
	<div class="lines_box">
	
    <?php
		$i = 0; foreach($lines as $line): $i++;
		$rightline = $line['right_column'];
		$leftline = $line['left_column'];
	?>
	<div class="line_row <? if($counline == $i) echo 'lastline_count'; ?>">
		<div class="row line_row_wrap">
			<div class="col-xs-12 col-md-5 line_box_row_right">
			<? if($rightline['box_title']) { ?>
				<div class="line_box line_box_blend"><?=$rightline['box_title']?></div>
			<? } ?>
			<? if($rightline['value_title']) { ?>
				<div class="line_right_title"><?=$rightline['value_title']?></div>
			<? } ?>
			<? if($rightline['values_lists']) { ?>
				<div class="line_right_lists"><?=$rightline['values_lists']?></div>
			<? } ?>
			</div>
			<div class="col-xs-12 col-md-7 line_box_row_left">
			<div class="line_box_row row">
				<?php if($leftline['boxes']) { foreach($leftline['boxes'] as $box): ?>
					<div class="line_box_item col-xs-12 col-md-6"><div class="line_box"><?=$box['title']?></div></div>
				<?php endforeach;  } ?>
			</div>
			<div class="line_left_value_title"><?=$leftline['value_title']?></div>
			<div class="line_left_aftertitle_value"><?=$leftline['aftertitle_value']?></div>
			<div class="line_left_values row">
			<?php if($leftline['values']) { foreach($leftline['values'] as $value): ?>
				<div class="line_left_value_item col-xs-12 col-md-6">
					<div class="line_left_value_item_img">
						<img src="<?=$value['icon']['url']?>" alt="иконка">
					</div>
					<div class="line_left_value <? if($value['red_text']) echo 'red_text';?>"><?=$value['title']?></div>
				</div>
			<?php endforeach; } ?>
			</div>
			</div>
		</div>
	</div>
     <?php endforeach; ?>
    </div>		
<?php endif; ?>	
			</div>
		</div>

</section>
<?php } ?>	