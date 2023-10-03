<?php
if ( !function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}
class cf7_drop_backend{
    function __construct(){
    	add_filter("wpcf7_editor_panels",array($this,"custom_form"));
        add_action("save_post", array($this,"save_data"));
    }
     
    function remove_key_number($key) {
        return preg_replace("#(-[0-9]*)$#","",$key);
    }
    function save_data($post_id){
        $data = @$_POST["contact-form-7-drop-files"];  
        $text1 = @$_POST["cf7_dropfiles_text1"];  
        $text2 = @$_POST["cf7_dropfiles_text2"];  
        $text3 = @$_POST["cf7_dropfiles_text3"];  
        add_post_meta($post_id, '_cf7_dropfiles', $data,true) or update_post_meta($post_id, '_cf7_dropfiles', $data);
        if( isset($text1)){
            update_option( "cf7_dropfiles_text1", $text1 );
            update_option( "cf7_dropfiles_text2", $text2 );
            update_option( "cf7_dropfiles_text3", $text3 );
        }
    }

    function custom_form($panels){
        $panels["form-panel-drop-setting"] = array(
				'title' => __( 'Drag and Drop Settings', 'contact-form-7' ),
				'callback' => array($this,"setting_form" ));
        return $panels;
    }
    function setting_form($post){
        $data = get_post_meta($post->id(),"_cf7_dropfiles",true);
        $text1 = get_option("cf7_dropfiles_text1","Drag & Drop Files Here");
        $text2 = get_option("cf7_dropfiles_text2","or");
    	$text3 = get_option("cf7_dropfiles_text3","Browse Files");
    	?>
    	 <table class="form-table">
	        <tr>
				<th scope="row">
					<label>
						<?php _e("Attachment","contact-form-7-drop-files") ?>
					</label>
				</th>
				<td>
					<select name="contact-form-7-drop-files">
						<option value="0"><?php _e("Only email (max size 25m)","contact-form-7-drop-files") ?></option>
						<option <?php selected($data,1) ?> value="1"><?php _e("Send url local and send attachment","contact-form-7-drop-files") ?></option>
						<option <?php selected($data,2) ?> value="2"><?php _e("Send url local ","contact-form-7-drop-files") ?></option>
					</select>
				</td>
			</tr>
            <tr>
                <th scope="row">
                    <label>
                        <?php _e("Text","contact-form-7-drop-files") ?>
                    </label>
                </th>
                <td>
                    <input name="cf7_dropfiles_text1" type="text"  value="<?php echo $text1 ?>" class="regular-text">
                    <input name="cf7_dropfiles_text2" type="text"  value="<?php echo $text2 ?>" class="regular-text">
                    <input name="cf7_dropfiles_text3" type="text"  value="<?php echo $text3 ?>" class="regular-text">
                </td>
            </tr>
		</table>
    	<?php
    }
}
new cf7_drop_backend;