<? 
$footerGroup = get_field('footer_content', get_option('page_on_front')); 
?>
<footer class="lada-armenia">
<div class="foot_first_wrap">
	<div class="container">
		<div class="row_footer">
			<div class="footer_first_col">
			<div class="footer-lefter_wrap">
			<div class="footer-lefter">
				<div class="logo_footer">
				<a href="/"><img src="<?=get_field('logo', 'option')['url']?>" alt="<?php bloginfo('name'); ?>"></a>
				</div>

				<a href="tel:<?=get_field('phone', 'option')?>" class="footer_phone"><?=get_field('phone', 'option')?></a>
				
				<a href="mailto:<?=get_field('mail', 'option')?>" class="footer_mail"><?=get_field('mail', 'option')?></a>
				<div class="footer_adress">
					<?=get_field('adres_v_podvale_sajta', 'option')?>
				</div>

                <div class="footer_worktime">
					<?=get_field('rezhim_raboty_polnoe_napisanie', 'option')?>
				</div>

            <div class="footer_social">
            <?php
            $footerSoc = $footerGroup['social']; 
            ?>           
            <? foreach( $footerSoc as $row ) {   ?>
                <a href="<?=$row['link']?>" target="_blank"><img src="<?=$row['Icon']['url']?>" alt="<?=$row['name']?>"></a>
            <? } ?> 
			</div>
			</div>
			</div>
			</div>

            <div class="footer_second_col">
<?php
$footerMenu = $footerGroup['menu']; 
?>
		<div class="extra_row">
            <? foreach( $footerMenu as $row ) {  ?>
               <div class="footer_menu extra-col extra-col-<?=$footerGroup['menu_col']?>">
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
<div class="row row_footer">
	<div class="col-xs-12 col-md-4 foot_privacy">
		<a class="privacy-policy-link" href="/politika-konfidentsialnosti/" rel="privacy-policy">Политика конфиденциальности</a>
    </div>
	    <div class="col-xs-12 col-md-4 foot_des">
            <?=$footerGroup['deskriptor_v_podvale']?>
	    </div>
	<div class="col-xs-12 col-md-4 cinar_col">
		<a href="https://cinar" target="_blank" class="cinar">
			<img src="<?=get_template_directory_uri()?>/img/cinar.svg" alt="cinar">
			<span>Создание и<br> продвижение сайта</span>
		</a>
	</div>
	</div>
</div>		
</div>		
</div>
</footer>
