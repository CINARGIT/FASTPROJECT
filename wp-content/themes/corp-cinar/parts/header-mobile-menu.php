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
	
	
	<div class="bl_header_bottom_item bl_header_bottom_item_logo_wrap">
		<div class="bl_header_bottom_item_logo">
			<a href="/"><img src="<?=get_field('logo', 'option')['url']?>" alt="<?php bloginfo('name'); ?>"></a>
		</div>
	</div>

	<div class="m_tool_item">
		<div href="#" class="menu-toggle" id="menu-toggle"><span></span><div class="menu_mobile_text">Меню</div></div>
	</div>
</div>
</div>
<div class="mobile_tool_contact">
	<div class="container">
	<div class="row">
		<div class="mobile_tool_contact_item_left">
			<a class="mobile_tool_phone" href="tel:<?=get_field('phone', 'option')?>"><?=get_field('phone', 'option')?></a>
			<a class="mobile_tool_order datatextcopy" href="#fancy-modal-order-call" data-text="Перезвоним в течение 15 минут" data-fancybox="modal">Заказать звонок</a>
		</div>
		
		<div class="mobile_tool_contact_item_right">
			<a href="<?=get_field('telegram', 'option')?>" target="_blank">
			<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
				<g clip-path="url(#clip0_367_1545)">
				<path d="M16 32C24.8366 32 32 24.8366 32 16C32 7.16344 24.8366 0 16 0C7.16344 0 0 7.16344 0 16C0 24.8366 7.16344 32 16 32Z" fill="#039BE5"/>
				<path d="M7.32132 15.6536L22.748 9.70561C23.464 9.44694 24.0893 9.88028 23.8573 10.9629L23.8587 10.9616L21.232 23.3363C21.0373 24.2136 20.516 24.4269 19.7867 24.0136L15.7867 21.0656L13.8573 22.9243C13.644 23.1376 13.464 23.3176 13.0507 23.3176L13.3347 19.2469L20.748 12.5496C21.0707 12.2656 20.676 12.1056 20.2507 12.3883L11.0893 18.1563L7.13998 16.9243C6.28265 16.6523 6.26398 16.0669 7.32132 15.6536Z" fill="white"/>
				</g>
				<defs>
				<clipPath id="clip0_367_1545">
				<rect width="32" height="32" fill="white"/>
				</clipPath>
				</defs>
			</svg> 
			</a>
			
			<a href="<?=get_field('whatsapp', 'option')?>" target="_blank">
<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_367_1548)">
<path d="M16.004 0H15.996C7.174 0 0 7.176 0 16C0 19.5 1.128 22.744 3.046 25.378L1.052 31.322L7.202 29.356C9.732 31.032 12.75 32 16.004 32C24.826 32 32 24.822 32 16C32 7.178 24.826 0 16.004 0Z" fill="#4CAF50"/>
<path d="M25.314 22.5944C24.928 23.6844 23.396 24.5884 22.174 24.8524C21.338 25.0304 20.246 25.1724 16.57 23.6484C11.868 21.7004 8.83998 16.9224 8.60398 16.6124C8.37798 16.3024 6.70398 14.0824 6.70398 11.7864C6.70398 9.49036 7.86998 8.37236 8.33998 7.89236C8.72598 7.49836 9.36398 7.31836 9.97598 7.31836C10.174 7.31836 10.352 7.32836 10.512 7.33636C10.982 7.35636 11.218 7.38436 11.528 8.12636C11.914 9.05636 12.854 11.3524 12.966 11.5884C13.08 11.8244 13.194 12.1444 13.034 12.4544C12.884 12.7744 12.752 12.9164 12.516 13.1884C12.28 13.4604 12.056 13.6684 11.82 13.9604C11.604 14.2144 11.36 14.4864 11.632 14.9564C11.904 15.4164 12.844 16.9504 14.228 18.1824C16.014 19.7724 17.462 20.2804 17.98 20.4964C18.366 20.6564 18.826 20.6184 19.108 20.3184C19.466 19.9324 19.908 19.2924 20.358 18.6624C20.678 18.2104 21.082 18.1544 21.506 18.3144C21.938 18.4644 24.224 19.5944 24.694 19.8284C25.164 20.0644 25.474 20.1764 25.588 20.3744C25.7 20.5724 25.7 21.5024 25.314 22.5944Z" fill="white"/>
</g>
<defs>
<clipPath id="clip0_367_1548">
<rect width="32" height="32" fill="white"/>
</clipPath>
</defs>
</svg> 
			</a>
		</div>
	</div>
	</div>
</div>


