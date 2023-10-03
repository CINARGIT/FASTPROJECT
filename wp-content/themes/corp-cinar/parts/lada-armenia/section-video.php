<?php if( have_rows('videolist', get_option('page_on_front')) ): ?>
<section class="section-common section-video <?=get_field('video_style', get_option('page_on_front'))?>">
	<div class="container">
		<? if(get_field('zagolovok_video', get_option('page_on_front'))) { ?>
			<h2><?=get_field('zagolovok_video', get_option('page_on_front'))?></h2>
		<? } ?>
		<div class="cur_list_row_wrap">
		<div class="video_row">
						<?php
						while( have_rows('videolist', get_option('page_on_front')) ): the_row(); 
						$image = get_sub_field('oblozhka')['sizes']['medium'];
						?>
					
						<div class="sv_item_wrap">
							<div class="sv_item">
								<a href="<?=get_sub_field('videolink')?>" data-fancybox="video">
									<span class="sv_item_overlay">
									<span class="sv_item_play">
									<svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M39.9999 0C17.9086 0 0 17.9086 0 39.9999C0 62.0913 17.9086 79.9998 39.9999 79.9998C62.0913 79.9998 79.9998 62.0913 79.9998 39.9999C79.9764 17.9185 62.0815 0.0236049 39.9999 0ZM56.8454 41.2744C56.5686 41.83 56.1183 42.2802 55.5627 42.5571V42.5713L32.7057 54C31.2941 54.7053 29.5781 54.1329 28.8726 52.7213C28.6721 52.32 28.5688 51.8771 28.5713 51.4285V28.5715C28.5706 26.9935 29.8491 25.7138 31.4272 25.7129C31.8709 25.7127 32.3087 25.8159 32.7057 26.0143L55.5627 37.4429C56.975 38.1467 57.5494 39.8621 56.8454 41.2744Z" />
									</svg>
									</span>
									</span>
									<img src="<?=$image?>" alt="<?=get_sub_field('nazvanie_video')?>">
									
								</a>
							</div>
						</div>
						<?php endwhile; ?>
		</div>
	<div class="sp_all_btn_wrap">
		<a href="<?=get_field('all_video_link', get_option('page_on_front'))?>" class="sp_all_btn alter_style_btn"><?=get_field('blok_show_more_video', get_option('page_on_front'))?></a>
	</div>
	
	</div>
	</div>
</section>
<?php endif; ?>