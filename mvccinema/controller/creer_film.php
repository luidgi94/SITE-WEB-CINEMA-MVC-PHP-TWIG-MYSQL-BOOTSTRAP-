<?php
var_dump($_POST);

//VERIFICATION POUR LE FORMULAIRE PARTIE ACTEUR
for($i=1;$i<4;$i++)
{
    switch(isset($_POST['roleFilm'.$i]) && isset($_POST['nomActeur'.$i]) && isset($_POST['prenomActeur'.$i]))
    {
       
        case(empty($_POST['roleFilm'.$i]) && empty($_POST['nomActeur'.$i]) && empty($_POST['prenomActeur'.$i])): 
            
            echo false;
            
        break;

        case(!empty($_POST['roleFilm'.$i]) && !empty($_POST['nomActeur'.$i]) && !empty($_POST['prenomActeur'.$i])): 
            //switch
            $unActeur = new Acteurs($_POST['nomActeur'.$i],$_POST['prenomActeur'.$i]);
            $personnages[] = new Personnages($_POST['roleFilm'.$i], $unActeur);
            // var_dump($unActeur);
            var_dump($personnages);
            
        break;
    
    }   
}


//VERIFICATION POUR LE FORMULAIRE PARTIE FILM
switch (isset($_POST['titreFilm']) && isset($_POST['realFilm']) && isset($_POST['afficheFilm']) && isset($_POST['anneeFilm']))
{

    case (empty($_POST['titreFilm']) && empty($_POST['realFilm']) && empty($_POST['afficheFilm']) && empty($_POST['anneeFilm'])):
        
        echo "<span class='badge badge-danger mt-2 d-flex justify-content-center'>Vous devez impérativement remplir les champs necessaire a la creation d'un film..</span>";
    
    break;

    case (!empty($_POST['titreFilm']) && !empty($_POST['realFilm']) && !empty($_POST['afficheFilm']) && !empty($_POST['anneeFilm'])):
        
        $unFilm = ['titre' => $_POST['titreFilm'], 'realisateur' => $_POST['realFilm'], 'affiche' => $_POST['afficheFilm'], 'annee' => $_POST['anneeFilm']];
        $film = new Films($unFilm, $personnages);

        echo '<pre>';
        print_r($film);
        echo '</pre>';

        // $filmsDao = new FilmsDAO();
        // $ajout = $filmsDao->add($film);
        
        echo $twig->render('creer_film.html.twig', ['ajout' => "Vous avez ajouté une vidéo !"]);
    
        
    break;

    case (empty($_POST['titreFilm']) || empty($_POST['realFilm']) || empty($_POST['afficheFilm']) || empty($_POST['anneeFilm'])):

        echo "<span class='badge badge-danger mt-2 d-flex justify-content-center'>Vous devez impérativement remplir TOUT LES CHAMPS necessaire a la creation d'un film..</span>";
    
    break;    
 
}