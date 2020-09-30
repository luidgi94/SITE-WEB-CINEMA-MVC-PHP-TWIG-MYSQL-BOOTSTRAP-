<?php

    if (isset($_POST['mail']) && isset($_POST['password']))
    { 
        if (empty($_POST['mail']) || empty($_POST['password']))
        {
            echo $twig->render('registers.html.twig',['erreur2' => "Vous devez nous fournir un e-mail et un mot de passe !"]);
        }
        else
        {
            var_dump($_POST);
            $usersDao = new UsersDAO();
            $loggin = $_POST['mail'];
            $user = $usersDao->getOne($loggin);
            //On vérifie d'abord si l'email que l'on veut utiliser pour créer un compte n'est pas déjà enregistré dans la BDD
            if ($_POST['mail'] == $user->get_email())
            {
                echo $twig->render('registers.html.twig', ['erreur' => "Votre e-mail existe déjà !"]);
            }
            else
            {
                $options = 
                [
                    'cost' => 12,
                ];
                $password= password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
                $newUser = new Users(array('email' => $_POST['mail'], 'password' => $password));
                var_dump($newUser);
                $compte = $usersDao->add($newUser);
                //On affiche le template Twig correspondant
                echo $twig->render('creer_compte.html.twig', ['compte' => $compte, 'newUser' => $newUser]); 
            }  
        }
        
    }
    else
    {
        echo $twig->render('registers.html.twig');
    }