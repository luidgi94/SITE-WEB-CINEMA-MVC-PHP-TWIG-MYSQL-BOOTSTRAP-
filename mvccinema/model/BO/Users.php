<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * affiche of Films
 *
 * @author luidgi
 */
    class Users 
    {
        private $_email;
        private $_password;

        function __construct(array $users) 
        {
            
            $this->set_email($users['email']);
            $this->set_password($users['password']);
            
        }


        public function set_email($email)
        {
            $this->_email = $email;
        }

        public function get_email()
        {
            return $this->_email;
        }


        public function set_password($password)
        {
            $this->_password= $password;
        }
        
        public function get_password()
        {
            return $this->_password;
        }
    }