<?php

    /*
    * To change this license header, choose License Headers in Project Properties.
    * To change this template file, choose Tools | Templates
    * and open the template in the editor.
    */
    $filmsDao = new FilmsDAO();
    //On appelle la fonction getAll()
    /* @var $alloffers type */

    if (isset($_POST['recherche']))
    {
        $recherche = $_POST['recherche'];
    }
    else
    {
        $recherche = '';

    }

    $allfilms = $filmsDao->getAll($recherche);
    //On affiche le template Twig correspondant
    echo $twig->render('films.html.twig', ['allfilms' => $allfilms], ['deconnection' => 'Vous vous êtes bien déconnecter !']);