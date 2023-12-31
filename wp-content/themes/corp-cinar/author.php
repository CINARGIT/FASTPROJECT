<?php
get_header(); 
$author_name = get_the_author();
$author_id = get_queried_object_id(); // Получить ID текущего автора на странице author.php
$author_nickname = get_the_author_meta('nickname', $author_id);
?>

<?
if(get_field('selectbreadcrumb', 'option')) { 
	get_template_part( 'parts/'.get_field('selectbreadcrumb', 'option').'/breadcrumbs', null, $params = ['h1' => $author_nickname, 'class' => 'senergo pbmin']);
} 
?>

<div class="container senergo section-docs section-blog">
<?php
$author_id = get_queried_object_id(); 
$years = get_field('years', 'user_' . $author_id);
$current_user_id = get_current_user_id();

if($current_user_id == $author_id) { 

if(!empty($years)) { 
?>

<div class="tabs-container">
	<div class="tabs-title-name">Выберите год:</div>
    <ul class="years-list section-blog-cat-row">
        <?php foreach ($years as $index => $year): ?>
            <li data-year-index="<?php echo $index; ?>">
               <a href="#" class="sp-category-btn unselectable"> <span><?php echo esc_html($year['year']); ?></span> </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <?php foreach ($years as $year_index => $year): ?>
        <div class="months-container" data-year-index="<?php echo $year_index; ?>">
			<div class="tabs-title-name">Выберите месяц:</div>
            <ul class="months-list section-blog-cat-row">
                <?php foreach ($year['months'] as $month_index => $month): ?>
                    <li data-month-index="<?php echo $month_index; ?>">
                        <a href="#" class="sp-category-btn unselectable"><span><?php echo esc_html($month['month']); ?></span></a>
                    </li>
                <?php endforeach; ?>
            </ul>
            
            <?php foreach ($year['months'] as $month_index => $month): ?>
                <div class="docs-container" data-month-index="<?php echo $month_index; ?>">
				<div class="tabs-title-name">Документы:</div>
				<div class="row">
                    <?php foreach ($month['docs'] as $row): ?>
				<div class="sdf_item col-xs-12 col-md-3">
					<div class="sdf_item_in">
						<div class="sdf_file_a">
						<div class="sdf_icon">
								<? if ( file_exists(get_template_directory().'/formaticon/'.wp_check_filetype($row['file']['url'])["ext"].'.svg')) { ?>
								<img src="<?=get_template_directory_uri()?>/formaticon/<?php echo wp_check_filetype($row['file']['url'])["ext"]; ?>.svg" alt="<?php echo wp_check_filetype('file')["ext"]; ?>">
							<? } else { ?>
								<img src="<?=get_template_directory_uri()?>/formaticon/file.svg" alt="<?php echo wp_check_filetype($row['file']['url'])["ext"].'.svg'; ?>">
							<? } ?>
						</div>
						<div class="sdf_title"><?=$row['title']?></div>
						</div>
						<a class="sdf_btn" href="<?=$row['file']['url']?>">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
							<path d="M7 10L12 15L17 10" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
							<path d="M12 15V3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
						</svg>
						<span>Скачать документ</span>
						</a>
						<div class="sdf_size">Размер: <?php echo size_format($row['file']['filesize']); ?></div>
						
					</div>
				</div>			
						
                    <?php endforeach; ?>
                </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>

<? } else { ?>

<div class="tabs-title-name">Данных нет</div>

<? } ?>
<? } else {  ?>

<div class="tabs-title-name">Данные данного пользователя для Вас недоступны</div>

<? } ?>
</div>

<script>
let yearItems = document.querySelectorAll('.years-list li');
let monthItems = document.querySelectorAll('.months-list li');
let monthContainers = document.querySelectorAll('.months-container');
let docContainers = document.querySelectorAll('.docs-container');

// Сначала скроем все контейнеры с месяцами и документами
monthContainers.forEach(function(container) {
    container.style.display = 'none';
});
docContainers.forEach(function(container) {
    container.style.display = 'none';
});

// При клике на год
yearItems.forEach(function(item) {
    item.addEventListener('click', function() {
        let yearIndex = this.getAttribute('data-year-index');

        // Удаляем класс active у всех элементов годов
        yearItems.forEach(function(yearItem) {
            yearItem.classList.remove('active');
        });

        // Добавляем класс active текущему элементу
        this.classList.add('active');

        // Скрываем все контейнеры с месяцами
        monthContainers.forEach(function(container) {
            container.style.display = 'none';
        });

        // Показываем только тот, который соответствует выбранному году
        document.querySelector(`.months-container[data-year-index="${yearIndex}"]`).style.display = 'block';
    });
});

// При клике на месяц
monthItems.forEach(function(item) {
    item.addEventListener('click', function() {
        let monthIndex = this.getAttribute('data-month-index');
        let parentContainer = this.closest('.months-container');

        // Удаляем класс active у всех элементов месяцев внутри родительского контейнера
        parentContainer.querySelectorAll('.months-list li').forEach(function(monthItem) {
            monthItem.classList.remove('active');
        });

        // Добавляем класс active текущему элементу
        this.classList.add('active');

        // Скрываем все контейнеры с документами внутри родительского контейнера месяцев
        let innerDocContainers = parentContainer.querySelectorAll('.docs-container');
        innerDocContainers.forEach(function(container) {
            container.style.display = 'none';
        });

        // Показываем только тот, который соответствует выбранному месяцу
        parentContainer.querySelector(`.docs-container[data-month-index="${monthIndex}"]`).style.display = 'block';
    });
});

</script>
<?php get_footer(); ?>