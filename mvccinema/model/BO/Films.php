<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * affiche of Films
 *
 * @author Julia
 */
class Films 
{

    private $_titre;
    private $_realisateur;
    private $_affiche;
    private $_annee;
    private $_personnages = array();

    function __construct(array $films, array $personnages) 
    {
        
        $this->set_personnages($personnages);
        $this->set_titre($films['titre']);
        $this->set_realisateur($films['realisateur']);
        $this->set_affiche($films['affiche']);
        $this->set_annee($films['annee']);
        
    }

    public function get_realisateur() 
    {
        return $this->_realisateur;
    }

    function get_affiche() 
    {
        return $this->_affiche;
    }

    public function get_titre()
    {
        return $this->_titre;
    }

    public function get_annee()
    {
        return $this->_annee;
    }
    
    public function get_personnages()
    {
        return $this->_personnages;
    }
    
    function set_realisateur($_realisateur) 
    {
        $this->_realisateur = $_realisateur;
    }

    function set_affiche($_affiche) 
    {
        $this->_affiche = $_affiche;
    }

    public function set_titre($_titre)
    {
        $this->_titre = $_titre;
    }

    public function set_annee($_annee)
    {
        $this->_annee = $_annee;
    }

    public function set_personnages($personnages)
    {
        $this->_personnages = $personnages;
    }

}
