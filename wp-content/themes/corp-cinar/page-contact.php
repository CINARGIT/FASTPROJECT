<?php
/**
* Template Name: Контакты
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/
?>
<?php get_header();?>

<?
if(get_field('selectbreadcrumb', 'option')) { 
	get_template_part( 'parts/'.get_field('selectbreadcrumb', 'option').'/breadcrumbs', null, $params = ['h1' => get_the_title(), 'class' => 'senergo pbmin']);
} 
?>
<script src="//api-maps.yandex.ru/2.1/?apikey=952c9e34-ccc0-4d36-9989-a69d9267cdc1&lang=ru_RU" type="text/javascript"></script>
<script>ymaps.ready(init);
	function init() {
    var myMap = new ymaps.Map('map', {
        center: [55.753994, 37.622093],
        zoom: 10,
		controls:[]
    });
    ymaps.geocode('<?=get_field("address", "option")?>', {
    results: 2,
    }).then(function (res) {
            var firstGeoObject = res.geoObjects.get(0),
                coords = firstGeoObject.geometry.getCoordinates(),
                bounds = firstGeoObject.properties.get('boundedBy');
            myMap.setBounds(bounds, {
                checkZoomRange: true
            });

          
             var myPlacemark = new ymaps.Placemark(coords, {
             balloonContent: '<?=get_field("address", "option")?>'
             }, {
             preset: 'islands#violetStretchyIcon',
				iconLayout: 'default#image',
				iconImageHref: '<?=get_template_directory_uri()?>/img/maps-and-flags.svg',
				iconImageSize: [42, 42],
				iconImageOffset: [-22, -28]
            });
             myMap.geoObjects.add(myPlacemark);
        });
}</script>

<div class="senergo section-content section-contact">
	<div class="container">
		
		<div class="row">
			<div class="col-xs-12 col-md-7 sct-left">
				<div class="row">
					<div class="scm_item col-xs-12 col-md-7">
						<div class="scm_item_box_in">
							<div class="scm_item_label">Наш адрес</div>
							<div class="scm_item_val"><?=get_field('address', 'option')?></div>
						</div>
					</div>
					<div class="scm_item col-xs-12 col-md-5">
						<div class="scm_item_box_in">
							<div class="scm_item_label">Адрес<br> Электронной почты</div>
							<div class="scm_item_val scm_item_val_big"><a href="mailto:<?=get_field('mail', 'option')?>"><?=get_field('mail', 'option')?></a></div>
						</div>
					</div>
				</div>
			
			
				<div class="scm_item_box_in scm_item_box_blue">	
					<div class="scm_item_label">Наши телефоны</div>
					
<?php				
$scmPhoneList = get_field('phone_list', 'option'); 
if($scmPhoneList): ?>	
	<div class="scm_phone_list row">
    <?php $i = 0; foreach($scmPhoneList as $row): $i++; ?>
	<div class="scm_item_phone col-xs-12 col-md-4">
		<div class="scm_item_val_main">
			<a href="tel:<?=$row['phone']?>"><?=$row['phone']?></a>
		</div>
		<div class="scm_item_val"><?=$row['label']?></div>
	</div>
    <?php endforeach; ?>
    </div>		
<?php endif; ?>
					
				</div>
			
				<div class="row cp_social">
					<div class="col-xs-12 col-md-6 cp_social_item_wrap">
						<a href="<?=get_field('telegram', 'option')?>" class="cp_social_item tg_color">
							<span class="cp_social_img">
<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_434_3723)">
<path d="M20 40C31.0457 40 40 31.0457 40 20C40 8.9543 31.0457 0 20 0C8.9543 0 0 8.9543 0 20C0 31.0457 8.9543 40 20 40Z" fill="#00A1EC"/>
<path d="M9.15064 19.567L28.434 12.132C29.329 11.8087 30.1106 12.3503 29.8206 13.7037L29.8223 13.702L26.539 29.1703C26.2956 30.267 25.644 30.5337 24.7323 30.017L19.7323 26.332L17.3206 28.6553C17.054 28.922 16.829 29.147 16.3123 29.147L16.6673 24.0587L25.934 15.687C26.3373 15.332 25.844 15.132 25.3123 15.4853L13.8606 22.6953L8.92397 21.1553C7.85231 20.8153 7.82897 20.0837 9.15064 19.567Z" fill="white"/>
</g>
<defs>
<clipPath id="clip0_434_3723">
<rect width="40" height="40" fill="white"/>
</clipPath>
</defs>
</svg> 
							</span>
							<span class="cp_social_name">
								написать в Telegram
							</span>
						</a>
					</div>
					
					<div class="col-xs-12 col-md-6 cp_social_item_wrap">
						<a href="<?=get_field('whatsapp', 'option')?>" class="cp_social_item wh_color">
							<span class="cp_social_img">
<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_434_3719)">
<path d="M20.005 0H19.995C8.9675 0 0 8.97 0 20C0 24.375 1.41 28.43 3.8075 31.7225L1.315 39.1525L9.0025 36.695C12.165 38.79 15.9375 40 20.005 40C31.0325 40 40 31.0275 40 20C40 8.9725 31.0325 0 20.005 0Z" fill="#51C85D"/>
<path d="M31.6434 28.2422C31.1609 29.6047 29.2459 30.7347 27.7184 31.0647C26.6734 31.2872 25.3084 31.4647 20.7134 29.5597C14.8359 27.1247 11.0509 21.1522 10.7559 20.7647C10.4734 20.3772 8.38086 17.6022 8.38086 14.7322C8.38086 11.8622 9.83836 10.4647 10.4259 9.86472C10.9084 9.37222 11.7059 9.14722 12.4709 9.14722C12.7184 9.14722 12.9409 9.15972 13.1409 9.16972C13.7284 9.19472 14.0234 9.22972 14.4109 10.1572C14.8934 11.3197 16.0684 14.1897 16.2084 14.4847C16.3509 14.7797 16.4934 15.1797 16.2934 15.5672C16.1059 15.9672 15.9409 16.1447 15.6459 16.4847C15.3509 16.8247 15.0709 17.0847 14.7759 17.4497C14.5059 17.7672 14.2009 18.1072 14.5409 18.6947C14.8809 19.2697 16.0559 21.1872 17.7859 22.7272C20.0184 24.7147 21.8284 25.3497 22.4759 25.6197C22.9584 25.8197 23.5334 25.7722 23.8859 25.3972C24.3334 24.9147 24.8859 24.1147 25.4484 23.3272C25.8484 22.7622 26.3534 22.6922 26.8834 22.8922C27.4234 23.0797 30.2809 24.4922 30.8684 24.7847C31.4559 25.0797 31.8434 25.2197 31.9859 25.4672C32.1259 25.7147 32.1259 26.8772 31.6434 28.2422Z" fill="white"/>
</g>
<defs>
<clipPath id="clip0_434_3719">
<rect width="40" height="40" fill="white"/>
</clipPath>
</defs>
</svg> 		
							</span>
							<span class="cp_social_name">
								Написать в WhatsApp
							</span>
						</a>
					</div>
					
					
					<? if(get_field('vk', 'option')) { ?>
					<div class="col-xs-12 col-md-12">
						<a href="<?=get_field('vk', 'option')?>" class="cp_social_item cp_social_item_one_line vk_color">
							<span class="cp_social_img">
<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_434_3716)">
<path d="M20 40C31.0457 40 40 31.0457 40 20C40 8.95431 31.0457 0 20 0C8.95431 0 0 8.95431 0 20C0 31.0457 8.95431 40 20 40Z" fill="#436EAB"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M19.2447 28.7719H20.8145C20.8145 28.7719 21.2887 28.7198 21.5307 28.4588C21.7536 28.2193 21.7464 27.7693 21.7464 27.7693C21.7464 27.7693 21.7158 25.663 22.6934 25.3529C23.657 25.0473 24.8945 27.3886 26.2061 28.2888C27.198 28.9701 27.9517 28.8207 27.9517 28.8207L31.4587 28.7719C31.4587 28.7719 33.2934 28.6589 32.4235 27.2164C32.3522 27.0984 31.9169 26.1493 29.8159 24.1992C27.6169 22.1581 27.9114 22.4882 30.5603 18.9576C32.1736 16.8075 32.8185 15.4947 32.6171 14.9325C32.4249 14.397 31.2384 14.5386 31.2384 14.5386L27.2896 14.5632C27.2896 14.5632 26.9969 14.5232 26.7798 14.653C26.5676 14.7803 26.4311 15.0769 26.4311 15.0769C26.4311 15.0769 25.8061 16.7408 24.9726 18.1558C23.2142 21.1417 22.5112 21.2992 22.2238 21.1138C21.5553 20.6817 21.7222 19.378 21.7222 18.4517C21.7222 15.5582 22.1611 14.3517 20.8676 14.0394C20.4384 13.9357 20.1225 13.8672 19.0248 13.8562C17.6158 13.8416 16.4233 13.8605 15.748 14.1913C15.2988 14.4113 14.9523 14.9015 15.1633 14.9297C15.4243 14.9646 16.0154 15.089 16.3288 15.5158C16.7334 16.0662 16.7192 17.3027 16.7192 17.3027C16.7192 17.3027 16.9516 20.7088 16.1762 21.132C15.6439 21.4222 14.9138 20.8297 13.3461 18.1209C12.5429 16.7333 11.9365 15.1996 11.9365 15.1996C11.9365 15.1996 11.8195 14.9129 11.611 14.7596C11.3578 14.5739 11.0042 14.5147 11.0042 14.5147L7.25181 14.5393C7.25181 14.5393 6.68851 14.555 6.48173 14.7999C6.29776 15.0177 6.46711 15.4684 6.46711 15.4684C6.46711 15.4684 9.40483 22.3413 12.7311 25.8049C15.7812 28.9804 19.2447 28.7719 19.2447 28.7719Z" fill="white"/>
</g>
<defs>
<clipPath id="clip0_434_3716">
<rect width="40" height="40" fill="white"/>
</clipPath>
</defs>
</svg> 		
							</span>
							<span class="cp_social_name">
								Подписаться на страницу в VK
							</span>
						</a>
					</div>
					
					<? } ?>
				</div>
			</div>
		
			<div class="col-xs-12 col-md-5">
				<div id="map" class="map"></div>
			</div>
		</div>
	</div>
</div>


<? 
if(!empty(get_field('vyberite_stili_form_2', get_option('page_on_front')))) { 
	get_template_part( 'parts/'.get_field('vyberite_stili_form_2', get_option('page_on_front')).'/section-form-2'); 
}
?>


<?php get_footer();	?> 

	