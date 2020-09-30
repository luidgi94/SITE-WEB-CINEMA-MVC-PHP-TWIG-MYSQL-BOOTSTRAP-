<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * prenom of Films
 *
 * @author luidgi
 */
class Acteurs 
{
    private $_nom;
    private $_prenom;

    function __construct( string $nom, string $prenom) 
    {
    
        $this->set_nom($nom);
        $this->set_prenom($prenom);
        
    }

    public function get_nom()
    {
        return $this->_nom;
    }

    public function get_prenom()
    {
        return $this->_prenom;
    }
    
    function set_nom($nom) 
    {
        $this->_nom = $nom;
    }

    function set_prenom($prenom) 
    {
        $this->_prenom = $prenom;
    }
}