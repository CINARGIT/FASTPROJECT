<? 
$footerGroup = get_field('footer_content', 'option'); 
?>
<footer>
<div class="foot_first_wrap" style="background-color:<?=$footerGroup['footer_color']?>; color:<?=$footerGroup['czvet_teksta']?>;">
	<div class="container">
		<div class="row row_footer">
			<div class="footer_first_col col-xs-12 col-md-3">
			<div class="footer-lefter_wrap">
			<div class="footer-lefter">
			<div class="footer_logo_wrap">
				<div class="footer_logo">
					<a href="/"><img src="<?=get_field('logo', 'option')['url']?>" alt="<?php bloginfo('name'); ?>"></a>
				</div>
				<div class="footer_description">
					<?=$footerGroup['logo_des']?>
				</div>
			</div>
			<a href="tel:<?=get_field('phone', 'option')?>" class="footer_phone"><?=get_field('phone', 'option')?></a>
			<a href="tel:<?=get_field('phone2', 'option')?>" class="footer_phone"><?=get_field('phone2', 'option')?></a>
			<a href="mailto:<?=get_field('mail', 'option')?>" class="footer_mail"><?=get_field('mail', 'option')?></a>
			<div class="footer_adress">
				<?=get_field('adres_v_podvale_sajta', 'option')?>
			</div>
			<div class="footer_opening_hours">
				<?=get_field('opening_hours', 'option')?>
			</div>
			</div>
			<div class="social">
            <?php
            $footerSoc = $footerGroup['social']; 
            ?>           
            <? foreach( $footerSoc as $row ) {   ?>
				<div class="social_item">
					<a href="<?=$row['link']?>" target="_blank" style="background-color:<?=$row['color']?>">
						<img src="<?=$row['Icon']['url']?>" alt="<?=$row['name']?>">
						<span class="social_item_name"><?=$row['name']?></span>
					</a>
				</div>
			<? } ?> 
			</div>	
			
			</div>
			</div>
            <div class="footer_second_col col-xs-12 col-md-9">
			<?php
				$footerMenu = $footerGroup['menu']; 
			?>
			<div class="extra_row row">
            <? foreach( $footerMenu as $row ) {  ?>
               <div class="footer_menu extra-col col-xs-12 col-md-<?=12/$footerGroup['menu_col']?>">
                    <div class="footer_name">
                       <?=$row['menu_head']?>
                    </div>
                <?php
				    wp_nav_menu( array('menu' => $row['menuid'], 'container_id'  => '','conatiner_class' => '','menu_class'  => 'topmenu','echo'  => true,'items_wrap'  => '<ul id="%1$s" class="%2$s">%3$s</ul>','depth'  => 10, 'walker' => new fluent_themes_custom_walker_nav_menu) );
				 ?>
             </div>
            <? } ?> 
			</div>
			</div>

	

</div>
</div>
</div>
<div class="foot_last_wrap">	
<div class="container">	
<div class="row_footer_wrap">
<div class="row_footer">
<div class="foot_des_center">
    <?=$footerGroup['deskriptor_v_podvale']?><?=date('Y')?>
</div>
	
<div class="foot_des_left">
	<a class="privacy-policy-link" href="/politika-konfidentsialnosti/" rel="privacy-policy">Политика конфиденциальности</a>
</div>
</div>
</div>		
</div>		
</div>
</footer>
