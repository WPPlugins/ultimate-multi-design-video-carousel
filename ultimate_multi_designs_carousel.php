<?php
/*
Plugin Name: Ultimate Multi Design Video Carousel
Plugin URI: 
Description: This is a unique slider plugin which provides facility to include youtube videos in the slider with post.
Version: 1.1
Author: GBS Team
Author URI: http://globalbizsol.com/
License: 
License URI: 
*/
/*
Copyright 2012  GBS  (email : webcrushing@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
define('UMDC_GBS_VERSION', '1.1');
define('UMDC_GBS_FILE', basename(__FILE__));
define('UMDC_GBS_NAME', str_replace('.php', '', UMDC_GBS_FILE));
define('UMDC_GBS_PATH', plugin_dir_path(__FILE__));
define('UMDC_GBS_URL', plugin_dir_url(__FILE__));
 
function umdc_gbs_activate() {
   $gbs_option =  array(
                        'umdc_pause'           => '2000',
                        'umdc_auto_start'      => 'true',
                        'umdc_enable_loop'     => 'true',
                        'umdc_pause_on_hover'  => 'false',
                        'umdc_enable_keypress' => 'false',
                        'umdc_next_previous_controls' => 'true',
                        'umdc_navigation'      => 'true',
                        'umdc_enable_touch'    => 'true',
                        'umdc_enable_drag'     => 'true'
                     );

   add_option( 'gbs_setting_option', $gbs_option );
}
register_activation_hook( __FILE__, 'umdc_gbs_activate' );


// Add style and script
add_action('init', 'gbs_styles');
add_action('init', 'gbs_scripts');
/* Calling Style */
function gbs_styles() {
	wp_enqueue_style('gbs_css_style', UMDC_GBS_URL . 'css/umdc-style.css', null, UMDC_GBS_VERSION);
}// END public function mdps_styles()

/* Calling Script*/
function gbs_scripts() {
	wp_enqueue_script('gbs_plugin_js1', UMDC_GBS_URL . 'js/slider_min.js', null, UMDC_GBS_VERSION, array( 'jquery' ), UMDC_GBS_VERSION, true);
    wp_enqueue_script('gbs_plugin_js', UMDC_GBS_URL . 'js/jquery.gbs_slider.js', null, UMDC_GBS_VERSION, array( 'jquery' ), UMDC_GBS_VERSION, true);
    wp_enqueue_script('gbs_plugin_js', UMDC_GBS_URL . 'js/froogaloop2.min.js', null, UMDC_GBS_VERSION, array( 'jquery' ), UMDC_GBS_VERSION, true);  
}// END public function ps_scripts()


add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'ultimate_multi_design_plugin_action_links' );

function ultimate_multi_design_plugin_action_links( $links ) {
if(is_admin()){
   $links[] = '<a href="'. esc_url( get_admin_url(null, 'options-general.php?page=ultimate-multi-design') ) .'" target="_blank">Settings</a>';
   $links[] = '<a href="https://profiles.wordpress.org/gbsdeveloper#content-plugins" target="_blank">More plugins by GBS Team</a>';
   }
   return $links;
}


/* Add Menu */     
include(sprintf("%s/umdc-settings.php", dirname(__FILE__))); 

// 
function gbs_get_template_html( $template_name, $attributes){
  if ( empty( $attributes ) ){
      $attributes = array(
            'type' => 'post',
            'cat_id' => '1',
            'slide_id' => '',
          );
  }
  ob_start();
  require( 'templates/' . $template_name . '.php');         
  $html = ob_get_contents();
  ob_end_clean();
  return $html;
}  


// Add Shortcode
add_shortcode( 'gbs-slider', 'gbs_slider_shortcode' );
function gbs_slider_shortcode( $atts ) {

  // Attributes
  $atts = shortcode_atts(
    array(
      'type' => 'post',
      'cat_id' => '1',
      'post_ids' => '',
      'layout' => 'full-width',
    ),
    $atts
  );
  switch ($atts['layout']) {
    case 'full-width':
      return gbs_get_template_html( 'full-width-template', $atts );
      break;

    case 'three-slides':
      return gbs_get_template_html( 'three-slides-template', $atts );
      break;

    case 'five-slides':
      return gbs_get_template_html( 'five-slides-template', $atts );
      break; 
    
    default:
      return gbs_get_template_html( 'full-width-template', $atts );
      break;
  }
}



// Register Custom Post Type
add_action( 'init', 'umdc_gbs_create_slider_post_type', 0 );
function umdc_gbs_create_slider_post_type() {

	$labels = array(
		'name'                  => 'Sliders',
		'singular_name'         => 'Slider',
		'menu_name'             => 'UMDC Slider',
		'name_admin_bar'        => 'Slider',
		'archives'              => 'Item Archives',
		'parent_item_colon'     => 'Parent Item:',
		'all_items'             => 'All Items',
		'add_new_item'          => 'Add New Item',
		'add_new'               => 'Add New',
		'new_item'              => 'New Item',
		'edit_item'             => 'Edit Item',
		'update_item'           => 'Update Item',
		'view_item'             => 'View Item',
		'search_items'          => 'Search Item',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into item',
		'uploaded_to_this_item' => 'Uploaded to this item',
		'items_list'            => 'Items list',
		'items_list_navigation' => 'Items list navigation',
		'filter_items_list'     => 'Filter items list',
	);
	$args = array(
		'label'                 => 'Slider',
		'description'           => 'Used for slider',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-admin-post',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'umdc_slider', $args );
}
/**
 * Generated by the WordPress Meta Box Generator at http://goo.gl/8nwllb
 */
class umdc_Rational_Meta_Box {
	private $screens = array(
		'umdc_slider',
	);
	private $fields = array(
		array(
			'id' => 'title',
			'label' => 'Video Title',
			'type' => 'text',
		),
		array(
			'id' => 'url',
			'label' => 'Video Url Id',
			'type' => 'text',
		),
	);

	/**
	 * Class construct method. Adds actions to their respective WordPress hooks.
	 */
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_post' ) );
	}

	/**
	 * Hooks into WordPress' add_meta_boxes function.
	 * Goes through screens (post types) and adds the meta box.
	 */
	public function add_meta_boxes() {
		foreach ( $this->screens as $screen ) {
			add_meta_box(
				'slider',
				__( 'UMDC Slider', 'slider metabox' ),
				array( $this, 'add_meta_box_callback' ),
				$screen,
				'advanced',
				'default'
			);
		}
	}

	/**
	 * Generates the HTML for the meta box
	 * 
	 * @param object $post WordPress post object
	 */
	public function add_meta_box_callback( $post ) {
		wp_nonce_field( 'slider_data', 'slider_nonce' );
		echo '<h2 style="padding-left:0px"><b><i>Enter Youtube Video Title and ID here</i></b></h2>';
		$this->generate_fields( $post );
	}

	/**
	 * Generates the field's HTML for the meta box.
	 */
	public function generate_fields( $post ) {
		$output = '';
		foreach ( $this->fields as $field ) {
			$label = '<label for="' . $field['id'] . '">' . $field['label'] . '</label>';
			$db_value = get_post_meta( $post->ID, 'slider_' . $field['id'], true );
			switch ( $field['type'] ) {
				default:
					$input = sprintf(
						'<input %s id="%s" name="%s" type="%s" value="%s">',
						$field['type'] !== 'color' ? 'class="regular-text"' : '',
						$field['id'],
						$field['id'],
						$field['type'],
						$db_value
					);
			}
			$output .= $this->row_format( $label, $input );
		}
		echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
	}

	/**
	 * Generates the HTML for table rows.
	 */
	public function row_format( $label, $input ) {
		return sprintf(
			'<tr><th scope="row">%s</th><td>%s</td></tr>',
			$label,
			$input
		);
	}
	/**
	 * Hooks into WordPress' save_post function
	 */
	public function save_post( $post_id ) {
		if ( ! isset( $_POST['slider_nonce'] ) )
			return $post_id;

		$nonce = $_POST['slider_nonce'];
		if ( !wp_verify_nonce( $nonce, 'slider_data' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;

		foreach ( $this->fields as $field ) {
			if ( isset( $_POST[ $field['id'] ] ) ) {
				switch ( $field['type'] ) {
					case 'email':
						$_POST[ $field['id'] ] = sanitize_email( $_POST[ $field['id'] ] );
						break;
					case 'text':
						$_POST[ $field['id'] ] = sanitize_text_field( $_POST[ $field['id'] ] );
						break;
				}
				update_post_meta( $post_id, 'slider_' . $field['id'], $_POST[ $field['id'] ] );
			} else if ( $field['type'] === 'checkbox' ) {
				update_post_meta( $post_id, 'slider_' . $field['id'], '0' );
			}
		}
	}
}
new umdc_Rational_Meta_Box;


function load_person_template($template) {
    global $post;

    // Is this a "my-custom-post-type" post?
    if ($post->post_type == "umdc_slider"){

        //Your plugin path 
        $plugin_path = plugin_dir_path( __FILE__ );

        // The name of custom post type single template
        $template_name = 'single-umdc_slider.php';

        // A specific single template for my custom post type exists in theme folder? Or it also doesn't exist in my plugin?
        if($template === get_stylesheet_directory() . '/' . $template_name
            || !file_exists($plugin_path . $template_name)) {

            //Then return "single.php" or "single-my-custom-post-type.php" from theme directory.
            return $template;
        }

        // If not, return my plugin custom post type template.
        return $plugin_path . $template_name;
    }

    //This is not my custom post type, do nothing with $template
    return $template;
}
add_filter('single_template', 'load_person_template');