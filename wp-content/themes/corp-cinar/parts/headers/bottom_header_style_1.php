		<style>
			.bottom_header_style_1{
				background-color:<?=get_sub_field('bottom_header_menu_bg_color')?>;
			}
		
			.bottom_header_style_1 .bottom_header_menu div>ul>li>a{
				color:<?=get_sub_field('bottom_header_menu_items_color')?>;
			}
			
			.bottom_header_style_1 .bottom_submenu_color div>ul>li>ul{
				background-color:<?=get_sub_field('bottom_submenu_color')?>;
			}
			
			.bottom_header_style_1 .bottom_submenu_color div>ul>li>ul>li a{
				color:<?=get_sub_field('bottom_header_submenu_items_color')?>;
			}
		</style>
		<div class="bottom_header bottom_header_style_1 <?php echo ($is_preview) ? 'is-preview' : ''; ?>">
			<div class="container">
				<div class="bottom_header_menu">
					<?php wp_nav_menu( array('menu' => get_sub_field('bottom_header_menu'), 'container_id'  => '','conatiner_class' => '','menu_class'  => 'topmenu','echo'  => true,'items_wrap'  => '<ul id="%1$s" class="%2$s">%3$s</ul>','depth'  => 10, 'walker' => new fluent_themes_custom_walker_nav_menu) ); ?>
				</div>
			</div>
		</div>