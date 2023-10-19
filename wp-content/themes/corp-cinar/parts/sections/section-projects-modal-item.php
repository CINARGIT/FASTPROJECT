
			<div class="project_modal" id="project_modal_<?=get_the_ID()?>">
					<div class="project_modal_content">
						<div class="row">
						
						
						<? if(!empty(get_field('gallery', get_the_ID()))) { ?>
						<div class="col-xs-12 col-md-5">
						
						<div class="project_modal_cur">
							<?php foreach( get_field('gallery', get_the_ID()) as $item ): ?>
							<div class="project_modal_cur_item">
								<a href="<?=$item['sizes']['large']?>" data-fancybox="projectimg">
									<img src="<?=$item['sizes']['medium']?>" alt="project <?=$args['num']?>">
								</a>
							</div>
							<?php endforeach; ?>
						</div>
						
						<div class="project_modal_cur_list_wrap">
						<div class="project_modal_cur_list">
							<?php foreach( get_field('gallery', get_the_ID()) as $item ): ?>
								<div class="project_modal_cur_list_item">
									<div class="project_modal_cur_list_item_in">
										<img src="<?=$item['sizes']['medium']?>" alt="project <?=$args['num']?>">
									</div>
								</div>
							<?php endforeach; ?>
						</div>
						</div>
						</div>
						<? } ?>
						<div class="col-xs-12 col-md-7">
							<div class="projects_item_modal_title"><?=get_the_title(get_the_ID())?></div>
							<div class="projects_item_modal_text"><?=apply_filters('the_content', $args['post_content'])?></div>
						</div>
						</div>
					</div>
					
					<div class="project_modal_form">
						<?=do_shortcode('[contact-form-7 id="a612fab" title="Хотите получить 100% результат? Оставьте заявку и мы вам перезвоним"]')?>
					</div>
					
				</div>