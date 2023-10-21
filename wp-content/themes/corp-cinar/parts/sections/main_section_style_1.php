<?
	$section = get_sub_field('main_section_style_1_group'); 
	$prefixClass = 'main_section_style_1';
?>
<main class="<?=$prefixClass?>" style="background-color:<?=$section['bg_color']?>">
	<div class="container">
	<div class="row">
	<div class="co-xs-12 col-md-7">
		<div class="<?=$prefixClass?>_left_in">
		<h1 class="<?=$prefixClass?>_title"><?=$section['title']?></h1>
		<div class="<?=$prefixClass?>_subtitle"><?=$section['subtitle']?></div>
		
			<div class="<?=$prefixClass?>_odds row">
			<? $i = 0; $itemsodds = $section['odds']; $i++; ?>
			<? if( $itemsodds ):	?>
				<? foreach( $itemsodds as $item ): ?>
					<div class="col-xs-12 <?=$item['col_size']?> <?=$prefixClass?>_odd_item">
						<div class="<?=$prefixClass?>_odd_item_in">
							<img data-no-lazy="1" src="<?=$item['icon']['url']?>" alt="<?=$odds?> <?=$i?>">
							<div class="<?=$prefixClass?>_odd_item_info">
								<div class="<?=$prefixClass?>_odd_item_title"><?=$item['title']?></div>
								<div class="<?=$prefixClass?>_odd_item_subtitle"><?=$item['subtitle']?></div>
							</div>
						</div>
					</div>
				<? endforeach; ?>
			<? endif; ?>
			</div>
		</div>
			
		<div class="<?=$prefixClass?>_phone"><?=$section['phone']?></div>
		<div class="<?=$prefixClass?>_text_on_button"><?=$section['text_on_button']?></div>
		<div class="<?=$prefixClass?>_form">
			<?=do_shortcode('[contact-form-7 id="af7f556" title="Форма быстрого заказа (номер телефон) - Главный экран (стиль 1)"]')?>
		</div>
	</div>
	<div class="co-xs-12 col-md-5">
		<div class="<?=$prefixClass?>_expert_photo_wrap">
			<div class="<?=$prefixClass?>_expert_photo">
				<? if(!empty($section['expert_photo']['url'])) { ?>
					<img data-no-lazy="1" src="<?=$section['expert_photo']['url']?>" alt="<?=$section['expert_name']?>">
				<? } else { ?>
					<img data-no-lazy="1" src="<?=get_template_directory_uri()?>/img/main_section_style_1/main_section_style_1_img.svg" alt="<?=$section['expert_name']?>">
				<? } ?>
			</div>
			<div class="<?=$prefixClass?>_expert_info">
				<div class="<?=$prefixClass?>_expert_name"><?=$section['expert_name']?></div>
				<div class="<?=$prefixClass?>_expert_description"><?=$section['expert_description']?></div>
			</div>
		</div>
	</div>
	</div>
	</div>
</main>
