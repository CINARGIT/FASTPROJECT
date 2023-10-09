<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}
?>
<?php 
$employees = get_field('employees', get_option('page_on_front'));

if( $employees ): ?>
<section class="section-common section-employees">
    <div class="container">
    <div class="row row_emp">
        <h2><?=highlightLastWord($employees['title_employees'])?></h2>
        <?php
        foreach( $employees['employees_list'] as $employee ): 
            $photo = $employee['photo']['url'];
        ?>
        <div class="emp_item col-xs-12 col-md-4">
            <div class="emp_item_in">
                <div class="emp_item_img">
                    <img src="<?=$photo?>" alt="<?=$employee['name'] ?>">
                </div>
                <div class="emp_item_wrap_text">
                    <div class="emp_item_name">
                        <?= $employee['name'] ?>
                    </div>
                    <div class="emp_item_text">
                        <div class="emp_item_job_title"><?=$employee['job_title']?></div>
						<div class="emp_item_about"><?=$employee['about_employee']?></div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    </div>
</section>
<?php endif; ?>