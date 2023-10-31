<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
	$id_page = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
	$id_page = $maincategory->term_id;
}

$prefixClass = 'contact_section_style_3';
$section = get_sub_field('contact_section_style_3_group');


?>



<section class="section-common section_coso_style_3_common section-<?=$prefixClass?>">

<script src="//api-maps.yandex.ru/2.1/?apikey=952c9e34-ccc0-4d36-9989-a69d9267cdc1&lang=ru_RU" type="text/javascript"></script>
<script>ymaps.ready(init);
	function init() {
    var myMap = new ymaps.Map('map', {
        center: [55.753994, 37.622093],
        zoom: 10,
		controls:[]
    });
    ymaps.geocode('129090, Москва, улица Троицкая, д.9, к.1, пом.137', {
    results: 2,
    }).then(function (res) {
            var firstGeoObject = res.geoObjects.get(0),
                coords = firstGeoObject.geometry.getCoordinates(),
                bounds = firstGeoObject.properties.get('boundedBy');
            myMap.setBounds(bounds, {
                checkZoomRange: true
            });

          
             var myPlacemark = new ymaps.Placemark(coords, {
             balloonContent: '129090, Москва, улица Троицкая, д.9, к.1, пом.137'
             }, {
             preset: 'islands#violetStretchyIcon',
				iconLayout: 'default#image',
				iconImageHref: '<?=get_stylesheet_directory_uri()?>/img/maps-and-flags.svg',
				iconImageSize: [42, 42],
				iconImageOffset: [-22, -28]
            });
             myMap.geoObjects.add(myPlacemark);
        });
}</script>


	<div class="container">
	
	<? if(!empty($section['title'])) { ?>
		<h2 data-text="<?=$section['title']?>"><?=highlightLastWord($section['title'])?></h2>
	<? } ?>
	
    <div class="row">
    <div class="<?=$prefixClass?>_form_wrap col-xs-12 col-md-6">
		<div class="<?=$prefixClass?>_form_box">
			<div class="<?=$prefixClass?>_form_title"><?=$section['form_title']?></div>
			<div class="<?=$prefixClass?>_form_subtitle"><?=$section['form_subtitle']?></div>
			<div class="<?=$prefixClass?>_form_in">
				<?=do_shortcode('[contact-form-7 id="c4884c4" title="Форма консультации (почта, телефон, имя) - Контакты (стиль 3)"]')?>
			</div>
		</div>
    </div>
	<div class="<?=$prefixClass?>_contact_box_wrap col-xs-12 col-md-6">
		<div class="<?=$prefixClass?>_contact_map" id="map"></div>
		<div class="<?=$prefixClass?>_contact_box_wrap">
		<div class="<?=$prefixClass?>_contact_box_title"><?=$section['title']?></div>
		<div class="<?=$prefixClass?>_contact_box_in">
			<div class="row">
				<div class="col-xs-12 col-md-6 <?=$prefixClass?>_item">
					<div class="<?=$prefixClass?>_item_label">Номер телефона</div>
					<div class="<?=$prefixClass?>_item_value"><?=get_field('phone', 'option')?></div>
				</div>
				<div class="col-xs-12 col-md-6 <?=$prefixClass?>_item">
					<div class="<?=$prefixClass?>_item_label">Электронная почта</div>
					<div class="<?=$prefixClass?>_item_value"><?=get_field('mail', 'option')?></div>
				</div>
			</div>
			<div class="<?=$prefixClass?>_item">
				<div class="<?=$prefixClass?>_item_label">Адрес офиса</div>
				<div class="<?=$prefixClass?>_item_value"><?=get_field('address', 'option')?></div>
			</div>
			<div class="<?=$prefixClass?>_item">
				<div class="<?=$prefixClass?>_item_label">Режим работы</div>
				<div class="<?=$prefixClass?>_item_value"><?=get_field('oppening_hours', 'option')?></div>
			</div>
		</div>
		</div>
	</div>
    </div>
	
	
	</div>
</section>
