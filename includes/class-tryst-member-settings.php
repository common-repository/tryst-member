<?php

namespace Tryst;

class MemberSettingsPage
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {
   // Set class property
   $this->options = get_option( 'tryst_option' );
        
        register_setting(
            'tryst_member_group', // Option group
            'tryst_option', // Option name
            ['sanitize_callback' => array( $this, 'sanitize' ) ]
        );

        add_settings_section(
            'tryst_member_section', // ID
            __('Member', 'tryst_member'), // Title
            array( $this, 'print_section_info' ), // Callback
            'tryst-setting-admin' // Page
        );  


        add_settings_field(
            'member_index', // ID
            __('URL for Members Dashboard', 'tryst-member'), // Title 
            array( $this, 'member_index_callback' ), // Callback
            'tryst-setting-admin', // Page
            'tryst_member_section' // Section           
        );


      
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        global $tryst_plugin;
        $new_input = $input;
 
        if( isset( $input['member_index'] ) )
        $new_input['member_index'] = sanitize_text_field( $input['member_index'] );


        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
        printf(__('Specify details about the Membership extension', 'tryst-member'));
    }


        /* Get the settings option array and print one of its values
    */
   public function member_index_callback()
   {
       printf(
           '<input type="text" id="member_index" name="tryst_option[member_index]" value="%s" />',
           isset( $this->options['member_index'] ) ? esc_attr( $this->options['member_index']) : ''
       );
   }



}

if( is_admin() )
    $tryst_member_settings_page = new MemberSettingsPage();