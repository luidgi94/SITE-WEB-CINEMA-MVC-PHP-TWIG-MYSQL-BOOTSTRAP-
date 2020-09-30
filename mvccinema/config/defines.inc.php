<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Si on a pas ces infos, rien ne peut fonctionner : die
if (!isset($_SERVER['DOCUMENT_ROOT'])) {
    die();
}

// Define de la racine du site
define('_PATH_', $_SERVER['DOCUMENT_ROOT'] . '/mvccinema/');

// Define du dossier Coeur
define('_MODEL_', _PATH_ . 'model/');

// Define du dossier des Controleurs
define('_CTRL_', _PATH_ . 'controller/');

// Define du dossier des Configs
define('_CONFIG_', _PATH_ . 'config/');

// Define du dossier des TPL
define('_VIEW_', _PATH_ . 'view/');
