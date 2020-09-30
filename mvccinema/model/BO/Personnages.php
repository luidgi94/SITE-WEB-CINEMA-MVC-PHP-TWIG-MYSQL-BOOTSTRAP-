<?php

    class Personnages 
    {

        private $_role;
        private $_acteur;

        function __construct( string $role, Acteurs $acteur) 
        {
        
            $this->set_role($role);
            $this->set_acteur($acteur);
            
        }

        function get_role() 
        {
            return $this->_role;
        }

        public function get_acteur()
        {
            return $this->_acteur;
        }
        
        
        function set_acteur($acteur) 
        {
            $this->_acteur = $acteur;
        }

        function set_role($role) 
        {
            $this->_role = $role;
        }
    }