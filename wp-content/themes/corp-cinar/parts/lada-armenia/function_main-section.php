<?
function my_acf_prepare_field( $field ) {

    // Don't show this field once it contains a value.
  	if( is_front_page() ) {
        return false;
    } 
}

// Apply to fields named "example_field".
add_filter('acf/prepare_field/name=izobrazhenie', 'my_acf_prepare_field');
