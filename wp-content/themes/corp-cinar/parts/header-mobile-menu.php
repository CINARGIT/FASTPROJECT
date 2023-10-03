<div class="mobile_menu">
<div class="mobile_menu_in">

	<div class="mobile_menu_in_all">
	<?php 
wp_nav_menu(
    array (
        'theme_location' => 'your-theme-location-EDIT-THIS',
        'walker'         => new SubMenu_Walker,
		'menu_class'  => 'topmenu',
		'menu' => '1139',
    )
);
?>
		
			
	</div>
</div>
</div>
<div class="mobile_menu_overlay"></div>
<div class="mobile_tool">
<div class="mobile_tool_container">
	<div class="m_tool_item">
		<div href="#" class="menu-toggle" id="menu-toggle"><span></span></div>
	</div>
	
	<div class="bl_header_bottom_item bl_header_bottom_item_logo_wrap">
		<div class="bl_header_bottom_item_logo">
			<a href="/"><img src="<?=get_field('logo', 'option')['url']?>" alt="<?php bloginfo('name'); ?>"></a>
		</div>
		<div class="bl_header_bottom_item_logo_description">
			<?=get_field('logo_description', 'option')?>
		</div>
	</div>

<? if(0) { ?>
	<div class="mt_item_wrap">	
	
					<div class="mt_item">	
					
						<div class="mt_item_value">
						
							<a href="<?=get_field('telegram', 'option')?>">
<svg width="30" height="30" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_434_3723)">
<path d="M20 40C31.0457 40 40 31.0457 40 20C40 8.9543 31.0457 0 20 0C8.9543 0 0 8.9543 0 20C0 31.0457 8.9543 40 20 40Z" fill="#00A1EC"></path>
<path d="M9.15064 19.567L28.434 12.132C29.329 11.8087 30.1106 12.3503 29.8206 13.7037L29.8223 13.702L26.539 29.1703C26.2956 30.267 25.644 30.5337 24.7323 30.017L19.7323 26.332L17.3206 28.6553C17.054 28.922 16.829 29.147 16.3123 29.147L16.6673 24.0587L25.934 15.687C26.3373 15.332 25.844 15.132 25.3123 15.4853L13.8606 22.6953L8.92397 21.1553C7.85231 20.8153 7.82897 20.0837 9.15064 19.567Z" fill="white"></path>
</g>
<defs>
<clipPath id="clip0_434_3723">
<rect width="40" height="40" fill="white"></rect>
</clipPath>
</defs>
</svg>
							</a>
							
					
						</div>
						</div>
							<div class="mt_item">	
			<div class="mt_item_value">				

										<a href="<?=get_field('whatsapp', 'option')?>">
<svg width="30" height="30" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_434_3719)">
<path d="M20.005 0H19.995C8.9675 0 0 8.97 0 20C0 24.375 1.41 28.43 3.8075 31.7225L1.315 39.1525L9.0025 36.695C12.165 38.79 15.9375 40 20.005 40C31.0325 40 40 31.0275 40 20C40 8.9725 31.0325 0 20.005 0Z" fill="#51C85D"></path>
<path d="M31.6434 28.2422C31.1609 29.6047 29.2459 30.7347 27.7184 31.0647C26.6734 31.2872 25.3084 31.4647 20.7134 29.5597C14.8359 27.1247 11.0509 21.1522 10.7559 20.7647C10.4734 20.3772 8.38086 17.6022 8.38086 14.7322C8.38086 11.8622 9.83836 10.4647 10.4259 9.86472C10.9084 9.37222 11.7059 9.14722 12.4709 9.14722C12.7184 9.14722 12.9409 9.15972 13.1409 9.16972C13.7284 9.19472 14.0234 9.22972 14.4109 10.1572C14.8934 11.3197 16.0684 14.1897 16.2084 14.4847C16.3509 14.7797 16.4934 15.1797 16.2934 15.5672C16.1059 15.9672 15.9409 16.1447 15.6459 16.4847C15.3509 16.8247 15.0709 17.0847 14.7759 17.4497C14.5059 17.7672 14.2009 18.1072 14.5409 18.6947C14.8809 19.2697 16.0559 21.1872 17.7859 22.7272C20.0184 24.7147 21.8284 25.3497 22.4759 25.6197C22.9584 25.8197 23.5334 25.7722 23.8859 25.3972C24.3334 24.9147 24.8859 24.1147 25.4484 23.3272C25.8484 22.7622 26.3534 22.6922 26.8834 22.8922C27.4234 23.0797 30.2809 24.4922 30.8684 24.7847C31.4559 25.0797 31.8434 25.2197 31.9859 25.4672C32.1259 25.7147 32.1259 26.8772 31.6434 28.2422Z" fill="white"></path>
</g>
<defs>
<clipPath id="clip0_434_3719">
<rect width="40" height="40" fill="white"></rect>
</clipPath>
</defs>
</svg>
							</a>	
							</div>
					</div>
				
	
		</div>
<? } ?>	
		
		
	<a href="#fancy-modal-order-call" class="bl_header_bottom_item_order order_button datatextcopy" data-text="Заказать звонок" data-fancybox="modal-mobile"><span>Заказать звонок</span></a>
	<? if(get_field('lang-swithcer', 'option')) { echo '<div class="gtranslate_template gtranslate_template_mobile">' . do_shortcode('[gtranslate]') . '</div>';  }?>
</div>
</div>

