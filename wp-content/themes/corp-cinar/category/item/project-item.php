 <? if ( has_post_thumbnail() ) {  $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium'); } else { $thumbnail_url = ''; } ?>
			<div class="col-xs-12 col-md-6 projects_item">
			<div class="projects_show_side">
				<a href="#project_modal_<?=get_the_ID()?>" title="" class="projects_item_link" data-fancybox="projects">
					<span class="projects_item_img">
						<img src="<?=$thumbnail_url?>" alt="<?=get_the_title($post)?>">
					</span>
					<span class="projects_item_info">
						<span class="projects_item_title">
							<?=get_the_title($post)?>
						</span>
						<span class="projects_item_text">
							<?=get_field('des_short' , get_the_ID())?>
						</span>
					
					</span>
				</a>
			</div>	
			</div>