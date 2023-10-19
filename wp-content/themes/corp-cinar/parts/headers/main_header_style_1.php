		<div class="main_header main_header_style_1 <?php echo ($is_preview) ? 'is-preview' : ''; ?>">
			<div class="container">
				<div class="main_header_header_row">
					<div class="main_header_item main_header_item_logo">
						<a href="/">
							<img src="<?=get_sub_field('logo')['url']?>" alt="<?=get_bloginfo('name')?>">
							<span class="logo_description">
								<span class="logo_description_text"><?=get_sub_field('logo_description')?></span> 
								<span class="logo_description_someinfo"><?=get_sub_field('oppening_hours')?></span> 
							</span>
						</a>
					</div>
					
					<div class="main_header_header_row main_header_item_group main_header_item">
						<div class="main_header_item main_header_item_right">
							<div class="main_header_item_phone"><a href="tel:<?=get_sub_field('phone')?>"><?=get_sub_field('phone')?></a></div>
							<div class="main_header_item_mailto"><a href="mailto:<?=get_sub_field('mail')?>"><?=get_sub_field('mail')?></a></div>
						</div>
						<div class="main_header_item main_header_item_group main_header_item_button_group"> 
						
							<style>
								.main_header_style_1 .order_button_style_1{
									background-color:<?=get_sub_field('button_color_1')?>;
								}
								
								.main_header_style_1 .order_button_style_1:hover{
									background-color:<?=get_sub_field('button_color_1_hover')?>;
								}
								
								.main_header_style_1 .order_button_style_2{
									background-color:<?=get_sub_field('button_color_2')?>;
								}
								
								.main_header_style_1 .order_button_style_2:hover{
									background-color:<?=get_sub_field('button_color_2_hover')?>;
								}
							</style>
						
							<div class="main_header_item">
								<a class="datatextcopy order_button order_button_style_1" href="#fancy-modal-order-call" data-fancybox="modal_1" data-text="<?=get_sub_field('button_text_1')?>"><?=get_sub_field('button_text_1')?></a>
							</div>
							<div class="main_header_item">
								<a class="datatextcopy order_button order_button_style_2" href="#fancy-modal-order-call" data-fancybox="modal_2" data-text="<?=get_sub_field('button_text_2')?>"><?=get_sub_field('button_text_2')?></a>
							</div>
						</div>	
					</div>
					
				</div>
			</div>
		</div>