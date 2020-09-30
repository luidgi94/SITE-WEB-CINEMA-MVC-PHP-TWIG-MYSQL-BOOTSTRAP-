<?php

//On affiche le template Twig correspondant
echo $twig->render('erreur.html.twig', ['erreur' => 404]);
