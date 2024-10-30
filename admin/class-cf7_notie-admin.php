<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.fabbricaweb.com.br
 * @since      1.0
 *
 * @package    Cf7_notie
 * @subpackage Cf7_notie/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Cf7_notie
 * @subpackage Cf7_notie/admin
 * @author     FabbricaWeb <atendimento@fabbricaweb.com.br>
 */
class Cf7_notie_Admin {
    
	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;
    
    /**
	 * The options name to be used in this plugin
	 *
	 * @since  	1.0
	 * @access 	private
	 * @var  	string 		$option_name 	Option name of this plugin
	 */
	private $option_name = 'cf7_notie';        

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0
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
	 * @since    1.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Cf7_notie_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Cf7_notie_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
        
        wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/cf7_notie-admin.css', array(), $this->version, 'all' );
        
        

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Cf7_notie_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Cf7_notie_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/cf7_notie-admin.js', array( 'jquery', 'wp-color-picker' ), $this->version, false );
        
	}
    
    /**
	 * Add an options page under the Settings submenu
	 *
	 * @since  1.0
	 */
	public function add_options_page() {
	
		$this->plugin_screen_hook_suffix = add_options_page(
			__( 'Contact Form 7 Notie Settings', 'cf7_notie' ),
			__( 'Contact Form 7 Notie', 'cf7_notie' ),
			'manage_options',
			$this->plugin_name,
			array( $this, 'display_options_page' )
		);
	
	}
    
    /**
	 * Render the options page for plugin
	 *
	 * @since  1.0
	 */
	public function display_options_page() {
		include_once 'partials/cf7_notie-admin-display.php';
	}  
    
    
    /**
	 * Render the options page for plugin
	 *
	 * @since  1.0
	 */
	public function register_setting() {
        // Add a General section
        add_settings_section(
            $this->option_name . '_general',
            __( 'Colors', 'cf7_notie' ),
            array( $this, $this->option_name . '_general_cb' ),
            $this->plugin_name
        );
                
        add_settings_field(
		$this->option_name . '_success_bg',
		__( 'Success background color: ', 'cf7_notie' ),
		array( $this, $this->option_name . '_success_bg_cb' ),
		$this->plugin_name,
		$this->option_name . '_general',
		array( 'label_for' => $this->option_name . '_success_bg' )
	   );
        
        add_settings_field(
		$this->option_name . '_warning_bg',
		__( 'Warning background color: ', 'cf7_notie' ),
		array( $this, $this->option_name . '_warning_bg_cb' ),
		$this->plugin_name,
		$this->option_name . '_general',
		array( 'label_for' => $this->option_name . '_warning_bg' )
	   );
        
        add_settings_field(
		$this->option_name . '_error_bg',
		__( 'Error background color: ', 'cf7_notie' ),
		array( $this, $this->option_name . '_error_bg_cb' ),
		$this->plugin_name,
		$this->option_name . '_general',
		array( 'label_for' => $this->option_name . '_error_bg' )
	   );        
        
	   register_setting( $this->plugin_name, $this->option_name . '_success_bg', array( $this, $this->plugin_name . '_check_color' ) ); 
       register_setting( $this->plugin_name, $this->option_name . '_warning_bg', array( $this, $this->plugin_name . '_check_color' ) ); 
       register_setting( $this->plugin_name, $this->option_name . '_error_bg', array( $this, $this->plugin_name . '_check_color' ) ); 
        
	} 
    
    /**
	 * Function that will check if value is a valid HEX color.	 *
	 * @since  1.0
	 */    
    public function cf7_notie_check_color( $value ) { 

        if ( preg_match( '/^#[a-f0-9]{6}$/i', $value ) ) { // if user insert a HEX color with #     
            return $value;
        }

        add_settings_error( $this->plugin_name, $this->plugin_name.'-error', 'Insert a valid color for Background', 'error' ); // $setting, $code, $message, $type
        return false;
    }  
    
    /**
	 * Render the text for the general section
	 *
	 * @since  1.0
	 */
	public function cf7_notie_general_cb() {
        settings_errors();
		echo '<p>' . __( 'Please change the settings accordingly.', 'cf7_notie' ) . '</p>';
	}  
    
    /**
	 * Render the treshold day input for this plugin
	 *
	 * @since  1.0
	 */
    public function cf7_notie_success_bg_cb() {
        $success_bg = get_option( $this->option_name . '_success_bg' );
		echo '<input type="text" name="' . $this->option_name . '_success_bg' . '" id="' . $this->option_name . '_success_bg' . '" value="' . $success_bg . '" class="color-picker">';
	} 
    
    /**
	 * Render the treshold day input for this plugin
	 *
	 * @since  1.0
	 */
    public function cf7_notie_warning_bg_cb() {
        $warning_bg = get_option( $this->option_name . '_warning_bg' );
		echo '<input type="text" name="' . $this->option_name . '_warning_bg' . '" id="' . $this->option_name . '_warning_bg' . '" value="' . $warning_bg . '" class="color-picker">';
	} 
    
    /**
	 * Render the treshold day input for this plugin
	 *
	 * @since  1.0
	 */
    public function cf7_notie_error_bg_cb() {
        $error_bg = get_option( $this->option_name . '_error_bg' );
		echo '<input type="text" name="' . $this->option_name . '_error_bg' . '" id="' . $this->option_name . '_error_bg' . '" value="' . $error_bg . '" class="color-picker">';
	}     
    

}
