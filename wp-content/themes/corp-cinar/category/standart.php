<? global $maincategory; ?>
<? stylePart('vyberite_stili_glavnogo_ekrana', 'main-section', $params = [ 'category' => 1, 'inside' => 1]); ?>
<? stylePart('vyberite_stil_bloka_o_kompanii', 'section-text'); ?>
<? get_template_part( 'parts/senergo/section-properties'); ?>
<? get_template_part( 'parts/senergo/section-factors'); ?>
<? get_template_part( 'parts/senergo/section-docs');  ?>
<? stylePart('vyberite_stili_uslug', 'section-uslugi-mini', $params = [ 'depth' => 2]); ?>
<? if(empty(get_field('news_off', $maincategory))) {  stylePart('blog_select', 'section-blog', $params = ['blog_type' => 'news']); } ?>
<? stylePart('vyberite_stili_form', 'section-form'); ?>
<? stylePart('blog_select', 'section-blog'); ?>
<? stylePart('vyberite_stil_bloka_o_kompanii', 'section-text', $params = [ 'field_group' => 'text_set_2']); ?>
<? stylePart('section-vopros-otvet', 'section-vopros-otvet', $params = ['sclass' => 'excludem colored']); ?>
<? stylePart('vyberite_stili_form_2', 'section-form-2'); ?>
