<?php
    
    if (isset($_POST['mail']) && isset($_POST['password']))
    {
        $loggin = $_POST['mail'];
        $usersDao = new UsersDAO();
        $user = $usersDao->getOne($loggin);
        var_dump($user);
        $password = password_verify($_POST['password'],$user->get_password());
        if ($_POST['mail'] == $user->get_email() && $password == true)
        {
            $_SESSION['user'] = $user->get_email();
            echo $twig->render('users.html.twig', ['connexion' => 'Bienvenue sur votre session personelle !']);
            
        }
        else
        {
            echo $twig->render('connexion.html.twig', ['erreur' => 'Réessayez de vous connecter !']);
        }
    }
    else
    {
        echo $twig->render('connexion.html.twig',['deconnexion' => 'Vous êtes déconnecté !']);
    }