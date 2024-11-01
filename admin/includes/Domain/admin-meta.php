<?php
class Tryst_Domain_Member_Admin_Meta{
	private static $meeting, $member;
	/**
	* Adds a metabox to the right side of the screen under the â€œPublishâ€ box
	*/
	public static function add_member_metaboxes() {
		global $post;
		try{
			//loads the meeting on editor page
			self::$meeting = new \Tryst\Meeting($post->ID);
			self::$member = self::$meeting->getMember();
		} catch(\Exception $e){
			echo '<script>console.log('.$e->getMessage().')</script>';
		}
	}
	public static function form_member_profile_fields( $user ) {
		global $tryst_plugin;
		if(empty($tryst_plugin) || (!empty($tryst_plugin) && !$tryst_plugin->isExtensionActive('member')))
		return null;
		if(!empty($tryst_plugin->getNamespace())){
			$domain_class = "Tryst\\Domain\\Member";	
			$member = new $domain_class($user);
		} else {
			$member = new \Tryst\Member($user);
		}
		?>
		<h3><?php _e("Member information", "tryst-member"); ?></h3>
		<table class="form-table">
			<tr>
				<th><label for="phone"><?php _e("Phone", 'tryst-member'); ?></label></th>
				<td>
					<input type="tel" name="phone" id="phone" value="<?php echo $member->getMeta('phone'); ?>" class="regular-text" /><br />
					<span class="description"><?php _e("Please enter your phone number.", 'tryst-member'); ?></span>
				</td>
			</tr>
		</table>
		<?php 
	}
	public function save_member_profile_fields( $user_id ) {
		if(empty($_POST['phone'])){
			throw new \Exception(__('Member phone number is missing', 'tryst-member'));
		}
		if ( !current_user_can( 'edit_user', $user_id ) ) { 
			return false; 
		}
		update_user_meta( $user_id, 'phone', sanitize_text_field($_POST['phone']));
	}		
	//domain
	public static function user_profile_fields( $user ) {
		global $tryst_plugin;

		$options = get_option( 'tryst_option' );


		if(!empty($tryst_plugin->getNamespace())){
			$domain_class = "Tryst\\Domain\\Member";	
			$member = new $domain_class($user);
		} else {
			$member = new \Tryst\Member($user);
		}
		?>
		<h3><?php _e("Domain Member information", "tryst-member"); ?></h3>


		<?php 
		
		get_user_profile_form($options['form_country']);
		
	}

		function get_user_profile_form($form_country = 'en_US'){
					include dirname(__FILE__).'/languages/'.$form_country.'/form-user-profile.php';
		}

		function save_user_profile_fields( $user_id ) {
			global $tryst_plugin;
			if ( !current_user_can( 'edit_user', $user_id ) ) { 
				return false; 
			}

			if(!is_array($_POST['member'])){
				throw new \Exception(__('Member data is missing', 'tryst-member'));
			}

			array_walk($_POST['member'], function($val) {
				return sanitize_text_field($val);
			});

			$member = is_array($_POST['member']) ? $_POST['member'] : null;
			if(!empty($tryst_plugin->getNamespace())){
				$domain_class = "Tryst\\Domain\\Member";	
				$member = new $domain_class($user_id, $member);
			} else {
				$member = new \Tryst\Member($user_id, $member);
			}
			$dependents = is_array($_POST['dependent']) ? $_POST['dependent'] : null;
			$member->setDependents($dependents);
			$member->save();
		}
	}