<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://former-model.com
 * @since      1.0.0
 *
 * @package    Fm_Sticky_Header
 * @subpackage Fm_Sticky_Header/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Fm_Sticky_Header
 * @subpackage Fm_Sticky_Header/admin
 * @author     Geoff Cordner <geoffcordner@gmail.com>
 */
class Fm_Sticky_Header_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/fm-sticky-header-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/fm-sticky-header-admin.js', array( 'jquery' ), $this->version, false );

	}
	/**
	 * Add a menu item to the WordPress admin for the plugin settings page.
	 *
	 * @return void
	 */
	public function add_plugin_admin_menu() {
    add_theme_page(
        'Sticky Header Settings',
        'Sticky Header',
        'manage_options',
        $this->plugin_name,
        array($this, 'display_plugin_admin_page')
    );
}

/**
 * Display the plugin admin page.
 *
 * @since    1.0.0
 */
public function display_plugin_admin_page() {
    include_once 'partials/fm-sticky-header-admin-display.php';
}

/**
 * Register the settings for the plugin.
 *
 * @since    1.0.0
 */
public function register_settings() {
    // Register the setting
    register_setting(
        $this->plugin_name,
        $this->plugin_name,
        array($this, 'validate_settings')
    );

    // Add settings section
    add_settings_section(
        $this->plugin_name . '_general',
        'General Settings',
        array($this, 'settings_section_callback'),
        $this->plugin_name
    );

    // Add settings field
    add_settings_field(
        'sticky_enabled',
        'Enable Sticky Header',
        array($this, 'sticky_enabled_callback'),
        $this->plugin_name,
        $this->plugin_name . '_general'
    );
}

/**
 * Settings section callback.
 *
 * @since    1.0.0
 */
public function settings_section_callback() {
    echo '<p>Configure your sticky header settings below.</p>';
}

/**
 * Sticky enabled field callback.
 *
 * @since    1.0.0
 */
public function sticky_enabled_callback() {
    $options = get_option($this->plugin_name);
    $sticky_enabled = isset($options['sticky_enabled']) ? $options['sticky_enabled'] : 0;
    
    echo '<input type="checkbox" 
                 id="sticky_enabled" 
                 name="' . $this->plugin_name . '[sticky_enabled]" 
                 value="1" 
                 ' . checked($sticky_enabled, 1, false) . ' />
          <label for="sticky_enabled">Make the header stick to the top when scrolling</label>';
}

/**
 * Validate settings input.
 *
 * @since    1.0.0
 * @param    array    $input    The input array to validate.
 * @return   array             The validated input array.
 */
public function validate_settings($input) {
    $valid = array();
    
    $valid['sticky_enabled'] = (isset($input['sticky_enabled']) && $input['sticky_enabled'] == 1) ? 1 : 0;
    
    return $valid;
}

}
