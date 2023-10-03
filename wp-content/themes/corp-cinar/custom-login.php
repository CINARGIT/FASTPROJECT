<?php

 if ( is_user_logged_in() ) {
    wp_redirect( redirect_to_profile_page() ); 
    exit;
}
/* Template Name: Custom Login Page */
get_header();



?>


<div class="senergo">
<div class="container">
<div class="login-form">
<div class="login-form-overlay">
<div class="login-form-in">
<div class="login-form-title">Авторизация</div>

<?php


$login_args = array(
    'echo'           => true,
    'remember'       => true,
    'redirect'       => redirect_to_profile_page(), 
    'form_id'        => 'loginform',
    'id_username'    => 'user_login',
    'id_password'    => 'user_pass',
    'id_remember'    => 'rememberme',
    'id_submit'      => 'wp-submit',
    'label_username' => __( 'Username' ),
    'label_password' => __( 'Password' ),
    'label_remember' => __( 'Remember Me' ),
    'label_log_in'   => __( 'Log In' ),
    'value_username' => '',
    'value_remember' => false
);

wp_login_form( $login_args );
?>

</div>
</div>
</div>
</div>
</div>

<?php get_footer(); ?>