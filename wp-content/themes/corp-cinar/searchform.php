<div class="search_show" role="button">
	<div class="search_show_button">
	<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M15 23.0001C19.4183 23.0001 23.0001 19.4183 23.0001 15C23.0001 10.5817 19.4183 7 15 7C10.5817 7 7 10.5817 7 15C7 19.4183 10.5817 23.0001 15 23.0001Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
		<path d="M25.0001 25.0004L20.6501 20.6504" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
	</svg> 
	<span>Поиск</span>
	</div>
</div>
<form action="/" method="get" class="searchform closed">
	<div class="searchform_in">
	<div class="close_search" role="button">
	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M18 6L6 18" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
		<path d="M6 6L18 18" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
	</svg> 
	</div>
	<input type="text" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="Поиск по сайту"/>
	<button type="submit" class="button_system_icon search_btn">
	<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M15 23.0001C19.4183 23.0001 23.0001 19.4183 23.0001 15C23.0001 10.5817 19.4183 7 15 7C10.5817 7 7 10.5817 7 15C7 19.4183 10.5817 23.0001 15 23.0001Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
		<path d="M25.0001 25.0004L20.6501 20.6504" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
	</svg> 
	<span>Поиск</span>
	</button>
	</div>
</form>