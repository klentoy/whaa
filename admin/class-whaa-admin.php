<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://junjunvergara-manpowwa.com
 * @since      1.0.0
 *
 * @package    Whaa
 * @subpackage Whaa/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Whaa
 * @subpackage Whaa/admin
 * @author     Wha Wha <wha@yopmail.com>
 */
class Whaa_Admin {

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
	 * The options name to be used in this plugin
	 *
	 * @since  	1.0.0
	 * @access 	private
	 * @var  	string 		$option_name 	Option name of this plugin
	 */
	private $option_name = 'whaa';

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
		 * defined in Whaa_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Whaa_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/whaa-admin.css', array(), $this->version, 'all' );

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
		 * defined in Whaa_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Whaa_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/whaa-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Add an options page under the Settings submenu
	 *
	 * @since  1.0.0
	 */
	public function add_options_page() {
	
		$this->plugin_screen_hook_suffix = add_options_page(
			__( 'Whaa Settings', 'whaa' ),
			__( 'Whaa', 'Whaa' ),
			'manage_options',
			$this->plugin_name,
			array( $this, 'display_options_page' )
		);
	}

	/**
	* Add settings action link to the plugins page.
	*
	* @since    1.0.0
	*/
	public function add_action_links( $links ) {
		$settings_link = array(
			'<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
		);
		return array_merge(  $settings_link, $links );
	}

	/**
	  * Render the options page for plugin
	  *
	  * @since  1.0.0
	  */
	public function display_options_page() {
		include_once 'partials/whaa-admin-display.php';
	}


	public function register_setting(){
		add_settings_section(
			$this->option_name . '_general',
			__( 'General', 'whaa' ),
			array( $this, $this->option_name . '_general_cb' ),
			$this->plugin_name
		);

		add_settings_field(
			$this->option_name . '_position',
			__( 'Text position', 'outdated-notice' ),
			array( $this, $this->option_name . '_position_cb' ),
			$this->plugin_name,
			$this->option_name . '_general',
			array( 'label_for' => $this->option_name . '_position' )
		);
	}

	public function whaa_general_cb(){
		echo '<p>' . __( 'Please change the settings accordingly.', 'whaa' ) . '</p>';
	}

	/**
	 * Render the radio input field for position option
	 *
	 * @since  1.0.0
	 */
	public function whaa_position_cb() {
		?>
			<fieldset>
				<label>
					<input type="radio" name="<?php echo $this->option_name . '_position' ?>" id="<?php echo $this->option_name . '_position' ?>" value="before">
					<?php _e( 'Before the content', 'outdated-notice' ); ?>
				</label>
				<br>
				<label>
					<input type="radio" name="<?php echo $this->option_name . '_position' ?>" value="after">
					<?php _e( 'After the content', 'outdated-notice' ); ?>
				</label>
			</fieldset>
		<?php
	}

	/**
	 * Validate
	 *
	 * @since  1.0.0
	 */
	public function validate($input) {
		// All checkboxes inputs        
		$valid = array();

		$valid['applicant_name'] = (isset($input['applicant_name']) && !empty($input['applicant_name'])) ? $input['applicant_name'] : "";
		$valid['recruiter_name'] = (isset($input['recruiter_name']) && !empty($input['recruiter_name'])) ? $input['recruiter_name']: "";
		$valid['date_applied'] = (isset($input['date_applied']) && !empty($input['date_applied'])) ? $input['date_applied'] : "";
		return $valid;
	}

	public function options_update() {
		register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
	}



}
