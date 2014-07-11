<?php
/*
Plugin Name: Full Background Manager
Plugin URI: http://www.perceptionsystem.com/
Description: Set Background Image in Pages 
Version: 1.0
Author: Perception System
Author URI: http://www.perceptionsystem.com
Contributors: Perception System
*/
?>
<?php

function fbm_activation() {
}
register_activation_hook(__FILE__, 'fbm_activation');

function fbm_deactivation() {
}
register_deactivation_hook(__FILE__, 'fbm_deactivation');

add_action('wp_enqueue_scripts', 'fbm_scripts');
function fbm_scripts() {
	wp_enqueue_script('jquery');	
}

add_action( 'admin_enqueue_scripts', 'js_admin' );
function js_admin() {
	wp_register_script('fbmjs', plugins_url('js/fbm.js', __FILE__));
	wp_enqueue_script('fbmjs');
	
}

function fbm_add_custom_meta_box() {
    add_meta_box(
		'custom_meta_box',
		'Full Background Manager', 
		'fbm_show_custom_meta_box',
		'page',
		'normal',
		'high');
}
add_action('add_meta_boxes', 'fbm_add_custom_meta_box');

$prefix = 'custom_';
$custom_meta_fields = array(
	array(
		'label'	=> 'Set Background image',
		'id'	=> $prefix.'image',
		'type'	=> 'image'
	)
);


function fbm_show_custom_meta_box() {
	global $custom_meta_fields, $post;
	
	echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
	
	echo '<table class="form-table">';
	foreach ($custom_meta_fields as $field) {
		$meta = get_post_meta($post->ID, $field['id'], true);
		echo '<tr>
				<th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
				<td>';
				switch($field['type']) {
					case 'image':
						$image = plugins_url().'/images/image.png';	
						echo '<span class="custom_default_image" style="display:none">'.$image.'</span>';
						if ($meta) { $image = wp_get_attachment_image_src($meta, 'full'); }
						$image_upload = '<input name="'.$field['id'].'" type="hidden" class="custom_upload_image" value="'.$meta.'" />
							<img src="'.$image[0].'" class="custom_preview_image" alt="" width="300" height="185" /><br /><p class="img_dim">';
							 if($image[1] != 't' && $image[1] != ''){
							 	$image_upload .= 'Image Dimension : '.$image[1].' × '.$image[2];
							 }
							$image_upload .= '</p><input class="custom_upload_image_button button" type="button" value="Choose Image" style="float:left;" /><small class="removeImage">&nbsp;';
							if($image[1] == 't' || $image[1] == ''){
								$image_upload .= '<a href="#" class="custom_clear_image_button" style="display:none;">Remove Image</a>';
							}else{
								$image_upload .= '<a href="#" class="custom_clear_image_button" style="display:block; float:left; margin-left:15px; margin-top:2px;">Remove Image</a>';
							}
						$image_upload .= '</small><br clear="all" /><span class="description">'.$field['desc'].'</span>';
						echo $image_upload;
					break;
				}
			echo '</td></tr>';
	}
	echo '</table>';
}

function fbm_save_custom_meta($post_id) {
    global $custom_meta_fields;
	if(isset($_POST['custom_meta_box_nonce'])) {	
		if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__))) {
			return $post_id;
		}
	}
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return $post_id;
	if(isset($_POST['post_type'])) {
		if ('page' == $_POST['post_type'] && !current_user_can('edit_page', $post_id)) {
			return $post_id;
		} 
	}
	if (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
	foreach ($custom_meta_fields as $field) {
		
		$old = get_post_meta($post_id, $field['id'], true);
		if(isset($_POST[$field['id']])) {
			$new = $_POST[$field['id']];
			if ($new && $new != $old) {
				update_post_meta($post_id, $field['id'], $new);
			} elseif ('' == $new && $old) {
				delete_post_meta($post_id, $field['id'], $old);
			}
		}
	}
	
	$post = get_post($post_id);
}
add_action('save_post', 'fbm_save_custom_meta');

add_filter('body_class', 'fbm_multisite_body_classes');
function fbm_multisite_body_classes($classes) {
        $classes[] = 'body_background';
        return $classes;
}

add_action('wp_head', 'fbm_display_background_image',0);
function fbm_display_background_image() {
	global $post;
	$meta = get_post_meta($post->ID,"custom_image",true);
		
	$attachments = get_post( $meta );
	if ( $attachments ) {
		$src = $attachments->guid;
		$css = '<style type="text/css">';
		$css .= '.body_background{ 
					background:url("'.$src.'");
					background-size:contain;
				}';
		$css .= '</style>';
		echo $css;  
	}
}

?>
