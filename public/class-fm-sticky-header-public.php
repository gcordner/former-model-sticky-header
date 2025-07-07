<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://former-model.com
 * @since      1.0.0
 *
 * @package    Fm_Sticky_Header
 * @subpackage Fm_Sticky_Header/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Fm_Sticky_Header
 * @subpackage Fm_Sticky_Header/public
 * @author     Geoff Cordner <geoffcordner@gmail.com>
 */
class Fm_Sticky_Header_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Fm_Sticky_Header_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Fm_Sticky_Header_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/fm-sticky-header-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Fm_Sticky_Header_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Fm_Sticky_Header_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/fm-sticky-header-public.js', array( 'jquery' ), $this->version, false );

	}
	/**
 * Add custom CSS for the sticky header if enabled.
 *
 * @return void
 */
public function add_sticky_header_css() {
    $options = get_option($this->plugin_name);
    if (isset($options['sticky_enabled']) && $options['sticky_enabled']) {
        echo '<style>
        .site-header.wp-block-template-part {
            position: sticky;
            top: 0;
            z-index: 999;
            background: var(--wp--preset--color--white, #fff);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        /* Override the WordPress core gap rule for header */
        :where(.wp-site-blocks) > .site-header.wp-block-template-part {
            margin-block-start: 0 !important;
        }
        
        /* And for the content after header */
        :where(.wp-site-blocks) > .site-header.wp-block-template-part + * {
            margin-block-start: 0 !important;
        }
        </style>';
    }
}

}
