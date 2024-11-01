<?php
/**
* The public-facing functionality of the plugin.
*
* @link       https://matteus.dev
* @since      1.0.0
*
* @package    Tryst_Member
* @subpackage Tryst_Member/public
*/
/**
* The public-facing functionality of the plugin.
*
* Defines the plugin name, version, and two examples hooks for how to
* enqueue the public-facing stylesheet and JavaScript.
*
* @package    Tryst_Member
* @subpackage Tryst_Member/public
* @author     MATTEUS BARBOSA DOS SANTOS <contato@desenvolvedormatteus.com.br>
*/
class Tryst_Member_Public {
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
		* defined in Tryst_Member_Loader as all of the hooks are defined
		* in that particular class.
		*
		* The Tryst_Member_Loader will then create the relationship
		* between the defined hooks and the functions defined in this
		* class.
		*/
		wp_enqueue_style( 'login', ABSPATH . 'wp-admin/css/login.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tryst-member-public.css', array(), $this->version, 'all' );
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
		* defined in Tryst_Member_Loader as all of the hooks are defined
		* in that particular class.
		*
		* The Tryst_Member_Loader will then create the relationship
		* between the defined hooks and the functions defined in this
		* class.
		*/
		wp_enqueue_script( $this->plugin_name.'-js', plugin_dir_url( __FILE__ ) . 'js/tryst-member-public.js', ['tryst-jquery-mask']);
	}
	public function hook_head(){
		echo '<meta name="tryst_member_path" content="'.plugin_dir_url( __FILE__ ).'../'.'">';
	}
	public static function process_query($query){
		return Tryst_Public::shortcode_subscribe(['meeting_id' => intval($query['meeting_id'])]);
	}
	public static function shortcode_main($atts = null) {
		$query = shortcode_atts($_GET, $atts);
		return Tryst_Public::process_query($query);
	}
	public static function shortcode_dashboard($atts = null) {
		$query = shortcode_atts($_GET, $atts);
		if(isset($query['user_id']))
		$user_id = intval($query['user_id']);
		else
		$user_id = get_current_user_id();
		$member = Tryst\Member::find($user_id);
		$options = get_option('tryst_option');
		require plugin_dir_path( __FILE__ ).'templates/'.$options['form_country'].'/dashboard.php';
	}
	public static function shortcode_subscribe($atts = null) {
		ob_start();
		if(!empty($_POST)){
			self::member_post();
		} 
		else {
			if(!empty($_GET['tryst_member_key'])){
				$member = self::get_member(sanitize_text_field($_GET['tryst_member_key']));
			} else {
				$domain_class = "Tryst\\Domain\\Member"; 
				$options = get_option('tryst_option');
				if(class_exists($domain_class)){
					require plugin_dir_path( __FILE__ ).'templates/'.$options['form_country'].'/Domain/membership.php';
				} else {
					require plugin_dir_path( __FILE__ ).'templates/'.$options['form_country'].'/membership.php';
				}					
			}		
		}
		return ob_get_clean();
	}
	public static function get_member($key){
		global $tryst_plugin, $wpdb;
		$domain_class = "Tryst\\Domain\\Member"; 
		$options = get_option('tryst_option');
		if(class_exists($domain_class)){
			$member = $domain_class::findByFormKey($key);
			require plugin_dir_path( __FILE__ ).'templates/'.$options['form_country'].'/Domain/print.php';	
		} else {
			$member = Tryst\Member::findByFormKey($key);
			require plugin_dir_path( __FILE__ ).'templates/'.$options['form_country'].'/print.php';	
		}
	}
	public static function member_post(){
		global $tryst_plugin, $wpdb;
		
		if(!isset($_POST['member']) || !is_array($_POST['member']))
		return __('Please provide user from database or form');
		

		$member = $_POST['member'];

		array_walk($member, function($val) {
			if(!is_scalar($val))
			return $val;
			return sanitize_text_field($val);
		});

		if($_POST['security_code'] != $_POST['security_code_repeat'])
		return __('Invalid post. Please insert the security code as requested.');

		if(!empty($tryst_plugin->getNamespace())){
			$domain_class = "Tryst\\Domain\\Member";
			$data = [];
			if(class_exists($domain_class)){
				$member = new $domain_class(null, $member);
			} else {
				$member = new Tryst\Member(null, $member);
			}			
		}

		if(is_array($_POST['dependent'])){
			$dependents = $_POST['dependent'];

			array_walk($dependents, function($val) {
				if(!is_scalar($val))
				return $val;
				return sanitize_text_field($val);
			});
		}

		$member->setDependents($dependents);
		$member->save();
		$user = current($wpdb->get_results( "SELECT user_pass FROM {$wpdb->prefix}users WHERE ID = ".$member->getUser()->ID, OBJECT ));
		$mail = new Tryst_Email($member, 'confirm');
		$mail->addRecipient(get_option('admin_email'));
		$mail->addRecipient($member->getEmail());
		$mail->send();
		echo '<script>alert("'.__('Please print this page, sign the specified fields and send it to us scanned via e-mail.', 'tryst-member').'");location.href="'.get_page_link().'?tryst_member_key='.$user->user_pass.'";</script>';
	}
	public function shortcodes_load(){
		add_shortcode( 'tryst_member', ['Tryst_Member_Public', 'shortcode_main'] );
		add_shortcode( 'tryst_member_dashboard', ['Tryst_Member_Public', 'shortcode_dashboard'] );
		add_shortcode( 'tryst_member_subscribe', ['Tryst_Member_Public', 'shortcode_subscribe'] );
	}
	public static function tryst_member_register_query_vars( $vars ) {
		$vars[] = 'tryst_member_key';
		$vars[] = 'user_id';
		return $vars;
	}
}
add_filter( 'query_vars', ['Tryst_Member_Public', 'tryst_member_register_query_vars'] );