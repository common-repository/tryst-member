<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://matteus.dev
 * @since      1.0.0
 *
 * @package    Tryst_Member
 * @subpackage Tryst_Member/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Tryst_Member
 * @subpackage Tryst_Member/includes
 * @author     MATTEUS BARBOSA DOS SANTOS <contato@desenvolvedormatteus.com.br>
 */
class Tryst_Member_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */

	public function __construct($form_country){
		$this->form_country = $form_country;
	}

	function force_locale_filter()
	{
		return $this->form_country;
	}

	
	public function load_plugin_textdomain() {
		

		load_plugin_textdomain(
			'tryst-member',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
