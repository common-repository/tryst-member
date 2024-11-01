<?php

class Tryst_Member_Admin_Meta{
	
	private static $meeting, $member;
	
	/**
	* Adds a metabox to the right side of the screen under the â€œPublishâ€ box
	*/
	public static function add_member_metaboxes() {
		
		global $post;
		
		try{
			//loads the meeting on editor page
			self::$meeting = new Tryst\Meeting($post->ID);
			self::$member = self::$meeting->getMember();

		} catch(\Exception $e){
			echo '<script>console.log('.$e->getMessage().')</script>';
		}
		
		
		//name
		add_meta_box(
			'member_form_name',
			__('Employee Name', 'tryst-member'),
			['Tryst_Member_Admin_Meta', 'member_form_name'],
			'user',
			'normal',
			'default'
		);

		//name
		add_meta_box(
			'meeting_form_name',
			__('Member', 'tryst-member'),
			['Tryst_Member_Admin_Meta', 'meeting_form_name'],
			'meeting',
			'normal',
			'default'
		);
		
	}

	public static function getMeeting(){
		return self::$meeting;
	}
    

		/*
	* Output the HTML for the metabox.
	*/
	public static function meeting_form_name() {
		global $post;
		// Nonce field to validate form request came from current site
		wp_nonce_field( basename( __FILE__ ), 'member_fields' );
		
		$user = self::$member->getUser();

		//var_dump($user);

		
		// Output the field
		echo '<a href="'.site_url('wp-admin/user-edit.php?user_id='.$user->data->ID).'">'.$user->data->display_name.'</a>';
	}
	
	/*
	* Output the HTML for the metabox.
	*/
	public static function member_form_name() {
		// Nonce field to validate form request came from current site
		wp_nonce_field( basename( __FILE__ ), 'member_fields' );
		
		
		$name = self::getMeeting()->getMember()->getMeta('name');


		// Output the field
		echo '<input type="text" name="member[name]" value="' . $name  . '" class="widefat">';
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
		<th><label for="phone"><?php _e("Phone"); ?></label></th>
		<td>
		<input type="tel" name="member[phone]" id="phone" value="<?php echo $member->getMeta('phone'); ?>" class="regular-text" /><br />
		<span class="description"><?php _e("Please enter your phone number."); ?></span>
		</td>
		</tr>
		</table>
		<?php 
		}
		
		public function save_member_profile_fields( $user_id ) {
			if ( !current_user_can( 'edit_user', $user_id ) ) { 
				return false; 
			}
			update_user_meta( $user_id, 'phone', sanitize_text_field($_POST['phone']) );
		}		
		
		//domain
		
	
			
		}