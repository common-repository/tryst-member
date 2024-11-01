<?php
/*
* main Member class to manage the client data ant its interactions with
*/
namespace Tryst;
use Tryst\Contracts\Mail;
class Member implements Mail{
    protected $user, $meta, $email, $phone, $name, $domain;
    public function __construct($user = null, $meta = null){
        $this->user = is_numeric($user) ? get_user_by('ID', $user) : $user;
        if($user != null)
        $this->meta = $this->load_meta();
        //must save to avoid filter
        $this->name = isset($meta['name']) ? sanitize_text_field($meta['name']) : $this->getName();
        $this->email = isset($meta['email']) ? sanitize_email($meta['email']) : $this->getEmail();
        if($meta != null)
        $this->meta = self::getFilteredMeta($meta);
    }
    public static function find($user_id){
        global $tryst_plugin;
        if(isset($user_id))
        $user = get_userdata($user_id);
        else
        $user = wp_get_current_user();
        //member from Member extension
        if(!empty($tryst_plugin) && $tryst_plugin->isExtensionActive('member')){
            if(!empty($tryst_plugin->getNamespace())){
                if(file_exists($tryst_plugin->getExtensionPath('member').'/includes/Tryst/Domain/Member.php')){
                    $domain_class = "Tryst\\Domain\\Member";						
                }
            }
            if(isset($domain_class) && class_exists($domain_class)){
                $member = new $domain_class($user);
            } else {					
                $member = new Tryst\Member($user);
            }

            return $member;
        }
    }
    public function load_posts(){
        $args = array(
            'offset'           => 0,
            'orderby'          => 'date',
            'order'            => 'DESC',
            'include'          => '',
            'exclude'          => '',
            'meta_key'         => '',
            'meta_value'       => '',
            'post_type'        => 'meeting',
            'post_mime_type'   => '',
            'post_parent'      => '',
            'author'	   => '',
            'author_name'	   => '',
            'post_status'      => 'publish',
            'suppress_filters' => true,
            'fields'           => '',
            'meta_key'   => 'user_id',
            'meta_value' => $this->getUser()->ID,
        );
        return get_posts( $args );
    }
    public function getMeetings($date = null){
        $posts = $this->load_posts();
        $meetings = [];
        foreach($posts as $k => $p){    
            $meeting = new Meeting($p->ID, null, $this);    
            $meeting_date = $meeting->getMeta('date');
            $meeting_time = $meeting->getMeta('time');
            $meetings[$meeting_date][$meeting_time] = $meeting;
        }
        if($date != null && isset($meetings[$date]))
        return $meetings[$date];
        else
        return $meetings;
    }
    public static function findByFormKey($key){
        global $wpdb;
        $user = current($wpdb->get_results( "SELECT * FROM {$wpdb->prefix}users WHERE user_pass = '$key'", OBJECT ));
        $member = self::getInstance($user);
        return $member;
    }
    public static function getInstance($user = null, $meta = null) {
        return new static($user, $meta);
    }
    public function getFormKey(){
        global $wpdb;
        $user_id = $this->getUser()->ID;
        $user = current($wpdb->get_results( "SELECT user_pass FROM {$wpdb->prefix}users WHERE ID = $user_id", OBJECT ));
        return $user->user_pass;
    }
    public function load_meta(){
        if(isset($this->user) && !empty($this->user))
        return get_user_meta($this->user->ID);
    }
    /**
    * Get the value of email
    */ 
    public function getEmail()
    {
        if(isset($this->user) && isset($this->user->user_login))
        return $this->user->user_login;
        if(isset($this->email))
        return $this->email;
    }
    /**
    * Get the value of phone
    */ 
    public function getPhone()
    {
        return $this->getMeta('phone');
    }
    /**
    * Set the value of phone
    *
    * @return  self
    */ 
    public function setPhone($phone)
    {
        $this->meta['phone'] = $phone;
        return $this;
    }
    /**
    * Get the value of name
    */ 
    public function getName()
    {
        if(isset($this->user))
        return $this->user->display_name;
        if(isset($this->name))
        return $this->name;
    }
    /**
    * Set the value of name
    *
    * @return  self
    */ 
    public function setName($name)
    {
        $this->meta['name'] = $name;
        return $this;
    }
    /**
    * Set the value of user
    *
    * @return  self
    */ 
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }
    /**
    * Get the value of user
    */ 
    public function getUser()
    {
        return $this->user;
    }
    public function getMeta($key = null)
    {
        if($key != null){            
            if(isset($this->meta[$key])){
                if(is_array($this->meta[$key])){
                    return current($this->meta[$key]);
                } else {
                    return $this->meta[$key];
                }
            } else {
                return null;
            }
        }
        return $this->meta;
    }
    /* 
    * called on construct
    * return allowed keys and values
    */
    public function getFilteredMeta($meta){
        $allowed = ['phone' => true];
        $filtered = array_intersect_key($meta, $allowed);
        return $filtered;
    }
    /* */
    public function getLogin(){
        return $this->login;
    }    
    /* */
    public function getPassword(){
        return $this->password;
    }    
    /**
    * save
    */ 
    public function save()
    {
        global $tryst_plugin;
        $user_get = get_user_by('login', $this->getEmail());
        if(!empty($user_get)){
            $this->user = $user_get;
        } else {
            $userdata = array(
                'first_name' =>  $this->getName(),
                'user_login'  =>  $this->getEmail(),
                'user_email'  =>  $this->getEmail(),
                'user_pass'   =>  NULL  // When creating a new user, `user_pass` is expected.
            );
            $user_id = wp_insert_user( $userdata );
            if ( is_wp_error( $user_id ) ) {
                $error_string = $user_id->get_error_message();
                echo '<div id="message" class="error"><p>' . $error_string . '</p></div>';
            }
            $this->user = get_user_by('ID', $user_id);
        }
        //anyways, update user meta
        foreach($this->getMeta() as $k => $v){
            delete_user_meta($this->user->ID, $k);
            add_user_meta($this->user->ID, $k, $v);
        }
        return $this;
    }
    /*
    * return UL HTML element with all information from object for intro
    */
    public function getEmailIntro(){
        $markup = '<p>'. sprintf(__('Hello %s, this is the membership request receipt.', 'tryst-member'), $this->getName()).'</p>';
        return $markup;
    }
    /*
    * return UL HTML element with all information from object
    */
    public function getEmailForm(){
        global $post;
        $markup = '<ul>';
        $markup .= '<li><strong>'.__('Date', 'tryst-member').'</strong>: '.$this->getUser()->user_registered.'</li>';
        $markup .= '<li><strong>'.__('E-mail', 'tryst-member').'</strong>: '.$this->getEmail().'</li>';
        $markup .= '<li><strong>'.__('Phone', 'tryst-member').'</strong>: '.$this->getPhone().'</li>';
        $markup .= '<li><a href="'.get_page_link().'?key='.$this->getFormKey().'">'.__('View full data as html page of the website', 'tryst-member').'</a></li>';
        $markup .= '</ul>';
        return $markup;
    }
    /*
    * return UL HTML element with all information from object for footer
    */
    public function getEmailFooter(){
        $markup = '<p>'.__('Thanks for your subscription.', 'tryst-member').'</p>';
        $options = get_option('tryst_option');
        $markup .= $options['email_footer'];
        return $markup;
    }
    public function getEmailFilePath(){
        //send mail
        return realpath(dirname(__FILE__)).'/../../public/templates/E-mail/membership.html';
    }
    public function getEmailTitle(){
        global $tryst_plugin;
        switch($this->getEmailKey()){
            case "confirm":
            return sprintf(__('The membership request for %s was sent', 'tryst-member'), get_bloginfo('name'));
            break;
            case "update":
            return sprintf(__('The membership request for %s was updated', 'tryst-member'), get_bloginfo('name'));
            break;
            case "cancel":
            return sprintf(__('The membership request for %s was canceled', 'tryst-member'), get_bloginfo('name'));
            break;
        }
        return __('Member');
    }
    public function setEmailKey($key){
        $this->email_key = $key;
    }
    public function getEmailKey(){
        return $this->email_key;
    }
}