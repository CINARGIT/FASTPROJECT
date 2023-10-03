<?php
$section = get_field('worker', get_option('page_on_front'));
$rows = $section['workerlist'];
$title = $section['zagolovok_worker'];
$sectionunset = 'sectionunset';
if($args['titleoff'] == 1)
	{ 
		$title = false;
		$sectionunset = 'sectionuntitle';
	}
if($rows): ?>
<section class="section-common section-worker <?=get_field('worker_style', get_option('page_on_front'))?> <?=$sectionunset?>">
	<div class="container">
		<? if($title) { ?>
			<h2><?=$title?></h2>
		<? } ?>
		<div class="cur_list_row_wrap">
		<div class="sw_row row">

            <? foreach( $rows as $row ) {
                $photo = $row['photo']['sizes']['medium'];
            ?>
            <div class="col-xs-12 col-md-6 sw_item_wrap">
                <div class="sw_item">
                    <div class="sw_item_img">
                      <img src="<?=$photo?>" alt="<?=$row['imya']?>">
                    </div>
                    <div class="sw_item_name">
                        <?=$row['imya']?>
                    </div>
                    <div class="sw_item_subname">
                       <?=$row['dolzhnost']?>
                     </div>
                    <div class="sw_item_text">
                        <?=$row['about_worker']?>
                    </div>
                </div>
             </div>
           <? } ?>
		</div>

	</div>
	</div>
</section>
<?php endif; ?>