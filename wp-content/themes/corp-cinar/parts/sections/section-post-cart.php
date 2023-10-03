<div class="col-xs-12 col-md-4 sumi-item">
	<a href="<?php the_permalink(); ?>">
		<span class="sumi-img">
			<img src="<?=get_the_post_thumbnail_url(get_the_ID(), 'medium')?>" alt="<?php the_title(); ?>">
			<span class="sumi-img-overlay"></span>
		</span>
		<span class="sumi-content">
		<span class="sumi-title"><?php the_title(); ?></span>
		<span class="sumi-more">
			Узнать подробнее 
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M5 12H19" stroke="#FEC601" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M12 5L19 12L12 19" stroke="#FEC601" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</span>
		</span>
	</a>
</div>