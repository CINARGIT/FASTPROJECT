		<style>
			.top_header .menu_list ul li a{
				color:<?=get_sub_field('menu_color')?>;
			}
			
			.top_header .v_visually_btn {
				cursor:pointer;
				color:<?=get_sub_field('v_visually_impaired_group')['text_color']?>;
			}
		</style>
		<div class="top_header top_header_style_1 <?php echo ($is_preview) ? 'is-preview' : ''; ?>" style="background-color:<?=get_sub_field('bg_color')?>;">
			<div class="container">
				<div class="top_header_row">
					<div class="top_header_item menu_list">
						<?php wp_nav_menu( array('menu' => get_sub_field('menu_id'), 'container_id'  => '','conatiner_class' => '','menu_class'  => 'topmenu','echo'  => true,'items_wrap'  => '<ul id="%1$s" class="%2$s">%3$s</ul>','depth'  => 10, 'walker' => new fluent_themes_custom_walker_nav_menu) ); ?>
					</div>
					
					<? if(get_sub_field('v_visually_impaired_on')) { ?>
						<div class="top_header_item v_visually_impaired">
							<div class="v_visually_btn bvi-open" role="button"><img data-no-lazy="1" src="<?=get_sub_field('v_visually_impaired_group')['icon']['url']?>" alt="<?=get_sub_field('v_visually_impaired_group')['text']?>"><?=get_sub_field('v_visually_impaired_group')['text']?></div>
						</div>
					<? } ?>
				</div>
			</div>
		</div>