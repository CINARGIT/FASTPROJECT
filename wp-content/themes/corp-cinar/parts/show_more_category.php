<?
// Добавляем конечную точку WP REST API для запроса постов
add_action('rest_api_init', function () {
    register_rest_route('loadmore/v1', 'posts', array(
        'methods' => 'GET',
        'callback' => 'loadmore_posts',
    ));
});

// Функция для запроса постов
function loadmore_posts($data) {
    $paged = $data['page'] ?? 1;

    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 12,
        'paged' => $paged,
    );

    $query = new WP_Query($args);

    $posts = array();

    while ($query->have_posts()) {
        $query->the_post();

        ob_start(); // начинаем буферизацию
		$post_content = get_post_field('post_content', get_the_ID());
		get_template_part('category/item/project-item');
		get_template_part('parts/sections/section-projects-modal-item', null, $params = ['post_content' => $post_content]); 
        $posts[] = ob_get_clean(); // заканчиваем буферизацию и записываем вывод в массив
    }

    wp_reset_postdata();

    return $posts;
}