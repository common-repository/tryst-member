<?php

/**
* The admin-specific functionality of the plugin.
*
* @link       https://matteus.dev
* @since      1.0.0
*
* @package    Tryst_Member
* @subpackage Tryst_Member/admin
*/

/**
* The admin-specific functionality of the plugin.
*
* Defines the plugin name, version, and two examples hooks for how to
* enqueue the admin-specific stylesheet and JavaScript.
*
* @package    Tryst_Member
* @subpackage Tryst_Member/admin
* @author     MATTEUS BARBOSA DOS SANTOS <contato@desenvolvedormatteus.com.br>
*/
class Tryst_Member_Admin {
	
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
		* defined in Tryst_Member_Loader as all of the hooks are defined
		* in that particular class.
		*
		* The Tryst_Member_Loader will then create the relationship
		* between the defined hooks and the functions defined in this
		* class.
		*/
		
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tryst-member-admin.css', array(), $this->version, 'all' );
		
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
		* defined in Tryst_Member_Loader as all of the hooks are defined
		* in that particular class.
		*
		* The Tryst_Member_Loader will then create the relationship
		* between the defined hooks and the functions defined in this
		* class.
		*/
		
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/tryst-member-admin.js', array( 'jquery' ), $this->version, false );
		
	}
	
	public function run(){

		$this->hook_member_meta();
	
	}


	
	public function hook_member_meta(){
		global $tryst_plugin;

		add_action( 'add_meta_boxes', ['Tryst_Member_Admin_Meta', 'add_member_metaboxes']);
			
		add_action( 'show_user_profile', ['Tryst_Member_Admin_Meta', 'form_member_profile_fields']);
		add_action( 'edit_user_profile', ['Tryst_Member_Admin_Meta', 'form_member_profile_fields']);
		add_action( 'personal_options_update', ['Tryst_Member_Admin_Meta', 'save_member_profile_fields']);
		add_action( 'edit_user_profile_update', ['Tryst_Member_Admin_Meta', 'save_member_profile_fields']);
		
		//add extra domain fields
		if($tryst_plugin != null && !empty($tryst_plugin->getNamespace())){
			$domain_class = "Tryst_Domain_Member_Admin_Meta";
			
			if(class_exists($domain_class)){
				
				add_action( 'show_user_profile', [$domain_class, 'user_profile_fields']);
				add_action( 'edit_user_profile', [$domain_class, 'user_profile_fields']);
				add_action( 'personal_options_update', [$domain_class, 'save_user_profile_fields']);
				add_action( 'edit_user_profile_update', [$domain_class, 'save_user_profile_fields']);
			}
		} 
	}


}
