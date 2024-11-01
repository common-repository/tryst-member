<?php

/**
 * Fired during plugin activation
 *
 * @link       https://matteus.dev
 * @since      1.0.0
 *
 * @package    Tryst_Member
 * @subpackage Tryst_Member/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Tryst_Member
 * @subpackage Tryst_Member/includes
 * @author     MATTEUS BARBOSA DOS SANTOS <contato@desenvolvedormatteus.com.br>
 */
class Tryst_Member_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {		

		$options = get_option('tryst_option');

		$options['member_index'] = '/area-do-associado';
		
		update_option('tryst_option', $options);
	}

}
