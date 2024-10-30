<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.fabbricaweb.com.br
 * @since      1.0.0
 *
 * @package    Cf7_notie
 * @subpackage Cf7_notie/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Cf7_notie
 * @subpackage Cf7_notie/public
 * @author     FabbricaWeb <atendimento@fabbricaweb.com.br>
 */
class Cf7_notie_Public {

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
		 * defined in Cf7_notie_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Cf7_notie_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/cf7_notie-public.css', array(), $this->version, 'all' );

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
		 * defined in Cf7_notie_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Cf7_notie_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/notie.js', array( 'jquery' ), $this->version, true );
        
        wp_localize_script( $this->plugin_name, 'cf7_notie_vars', array(
            'alert_color_success_background' => get_option( $this->plugin_name.'_success_bg' ),
			'alert_color_warning_background' => get_option( $this->plugin_name.'_warning_bg' ),
            'alert_color_error_background' => get_option( $this->plugin_name.'_error_bg' )
        )
	);

	}
  
    
    public function cf7notie_response(){
        $return = '<script type="text/javascript">
        jQuery(".wpcf7-submit").click(function() {
            var button = jQuery(this);
            jQuery( document ).ajaxComplete(function() {
                var notie_style = "";
                if ( button.parents(".wpcf7").find(".wpcf7-response-output").hasClass("wpcf7-validation-errors") ) {
                    notie_style = 2;
                } else if ( button.parents(".wpcf7").find(".wpcf7-response-output").hasClass("wpcf7-mail-sent-ng") ) {
                    notie_style = 3;
                } else {
                    notie_style = 1;
                }
                notie.alert(notie_style, button.parents(".wpcf7").find(".wpcf7-response-output").html(), 3);
                jQuery(".wpcf7-response-output").css( "display", "none" );
            });
        });
        </script>';
        echo $return;
    }    

}