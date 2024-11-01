<?php

/*
* domain specialization for a member
*/

namespace Tryst\Domain;

use Tryst\Member as M;

class Member extends M {
    
    protected $company, $cnpj, $observation, $dependents;
    
    public function __construct($user = null, $meta = null){
        
        array_walk($meta, function($val) {
            if(!is_scalar($val))
            return $val;
            return sanitize_text_field($val);
        });
        
        parent::__construct($user, $meta);

        if($meta != null)
        $this->meta = self::getFilteredMeta($meta);
        
        return $this;
        
    }
    
    /**
    * Get the value of company
    */ 
    public function getCompany()
    {
        return $this->getMeta('company');
    }
    
    /**
    * Set the value of company
    *
    * @return  self
    */ 
    public function setCompany($company)
    {
        $this->meta['company'] = $company;
        
        return $this;
    }
    
    /**
    * Get the value of cnpj
    */ 
    public function getCnpj()
    {
        return $this->getMeta('cnpj');
    }
    
    /**
    * Set the value of cnpj
    *
    * @return  self
    */ 
    public function setCnpj($cnpj)
    {
        $this->meta['cnpj'] = $cnpj;
        
        return $this;
    }
    
    /**
    * Get the value of cpf
    */ 
    public function getCpf()
    {
        return $this->getMeta('cpf');
    }
    
    /**
    * Set the value of cpf
    *
    * @return  self
    */ 
    public function setCpf($cpf)
    {
        $this->meta['cpf'] = $cpf;
        
        return $this;
    }
    
    /**
    * Get the value of observation
    */ 
    public function getObservation()
    {
        return $this->getMeta('observation');
    }
    
    /**
    * Set the value of observation
    *
    * @return  self
    */ 
    public function setObservation($observation)
    {
        $this->meta['observation'] = $observation;
        
        return $this;
    }
    
    /* walk over allowed fields before saving */
    public function getFilteredMeta($meta){
        
        $allowed = [
            'cnpj' => true, 'company' => true, 'observation' => true,
            'address_street' => true, 'address_district' => true, 
            'address_city' => true,  'address_state' => true,
            'zipcode' => true,
            'nationality' => true,            'civil_state' => true,            
            'naturality' => true,
            'father_name' => true,            'mother_name' => true,            
            'date_birth' => true,            'profession' => true,           
            'instruction_degree' => true,
            'company_address' => true,            'contracted_at' => true,
            'function' => true,            'work_permit_number' => true,
            'work_permit_serie' => true,            'identity' => true,
            'division' => true,            'cpf' => true,
            'register' => true,
            'partner_name' => true, 'partner_birth' => true,
            'dependent_1' => true,            'dependent_2' => true,
            'dependent_3' => true,            'dependent_4' => true,
            'dependent_5' => true,            'dependent_6' => true,
            'dependent_7' => true,            'dependent_8' => true,
            'dependent_9' => true,            'dependent_10' => true,
            'contributor' => true
        ];
        
        $filtered = array_intersect_key($meta, $allowed);
        
        if($this->getMeta() != null)
        $filtered = array_merge($filtered, $this->getMeta());
        
        return $filtered;
    }
    /**
    * save
    */ 
    public function save()
    {
        parent::save();

        $this->setPassword();
            
        $this->user->user_pass = $this->getPassword(); 
        
        $user_id = wp_update_user( $this->getUser() );

        //anyways, update user meta
        foreach($this->getMeta() as $k => $v){
            delete_user_meta($this->getUser()->ID, $k);
            add_user_meta($this->getUser()->ID, $k, $v);
        }
        
        return $this;        
    }
    
    public function setDependents($dependents){
        
        foreach($dependents as $k => $d){
            $dependent_data = $d;
            array_walk($dependent_data, function($val) {
                if(!is_scalar($val))
                return $val;
                return sanitize_text_field($val);
            });
            $this->meta['dependent_'.$k] = $dependent_data;
        }
        
        return $this;
    }
    
    public function getDependents(){
        $dependents = [];
        
        for($c = 1; $c <= 10; $c++){
            $dependents[$c] = json_decode($this->getMeta('dependent_'.$c));
        }
        
        return $dependents;
    
    }

    public function setPassword(){

        if($this->getMeta('contributor') == 'Empresa')
        $this->password = preg_replace("/[^0-9]/", "", $this->getCnpj());
        else
        $this->password = preg_replace("/[^0-9]/", "", $this->getCpf());

        return $this->password;
    }   
    
    public function getPasswordDescription(){
        return 'CPF, apenas números';
    }
    
    /*
    * return UL HTML element with all information from object
    */
    public function getEmailForm(){
        global $post;
        
        $date = new \DateTime($this->getUser()->user_registered);
        $markup = '<ul>';
        $markup .= '<li><strong>'.__('Date', 'tryst-member').'</strong>: '.$date->format('d/m/Y \à\s H:i').'</li>';
        $markup .= '<li><strong>'.__('E-mail', 'tryst-member').'</strong>: '.$this->getEmail().'</li>';
        $markup .= '<li><strong>'.__('Phone', 'tryst-member').'</strong>: '.$this->getPhone().'</li>';
        $markup .= '<li><a href="'.get_page_link().'?key='.$this->getFormKey().'">'.__('View full data as html page of the website', 'tryst-member').'</a></li>';
        $markup .= '</ul>';
        
        return $markup;
    }
    
}