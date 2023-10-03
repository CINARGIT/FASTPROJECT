<?php
class cf7_dropfiles_frontend {
	function __construct(){
		add_action("wp_enqueue_scripts",array($this,"add_lib"));
        add_filter('wpcf7_form_response_output', array($this,'add_settings'),999999,4);
        add_filter('wpcf7_mail_tag_replaced_dropfiles', array($this, 'wpcf7_mail_tag_replaced'), 100, 3);
	}
    function wpcf7_mail_tag_replaced($text, $submitted, $html ){
        $upload_dir   = wp_upload_dir();
        $datas = explode("|",$text);
        $url = $upload_dir["baseurl"]."/cf7-uploads-save/";
        $text_custom = array();

        foreach ($datas as $value) {
            $text_custom[] = $url.$value;
        }
        if($html){
            return implode(" <br>", $text_custom);
        }else{
            return implode(" | ", $text_custom);
        }
         
        
        
    }
    function add_settings($output, $class, $content,$data){
        $output1 = '<input type="hidden" value="'.get_post_meta($data->id(),"_cf7_dropfiles",true).'" class="cf7-droptype" >';
        return $output.$output1;
    }
	 function add_lib(){
            wp_enqueue_style( 'cf7-dropfiles', CT7_DROPFILES_PLUGIN_URL."frontend/css/cf7-dropfiles.css" );
            wp_enqueue_script( 'cf7-dropfiles', CT7_DROPFILES_PLUGIN_URL."frontend/js/dropfiles-cf7.js",array("jquery"),time() );
            wp_localize_script('cf7-dropfiles','cf7_dropfiles',array("url_plugin"=>CT7_DROPFILES_PLUGIN_URL,'ajax_url' => admin_url( 'admin-ajax.php' ),
            														"text_content_limit" => __("Error: POST Content-Length limit","contact-form-7-drop-files"),
            														"text_remove" => __("Remove","contact-form-7-drop-files"),
            														"text_abort" => __("Abort","contact-form-7-drop-files"),
            														"text_maximum" => __("You can only upload a maximum of","contact-form-7-drop-files"),
        ));
    }
}
new cf7_dropfiles_frontend;