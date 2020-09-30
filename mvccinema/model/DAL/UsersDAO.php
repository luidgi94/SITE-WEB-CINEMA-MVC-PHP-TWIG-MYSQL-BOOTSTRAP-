<?php

    /*
    * To change this license header, choose License Headers in Project Properties.
    * To change this template file, choose Tools | Templates
    * and open the template in the editor.
    */

    /**
     * password of Films
     *
     * @author luidgi
     */
    class UsersDAO extends Dao
    {
        // Récupérer tout les films
        public function getAll($mail)
        {
            //On définit la bdd pour la fonction

            $query = $this->_bdd->prepare("SELECT email FROM user WHERE 1");
            $query->execute();
            $users = array();

            while ($data = $query->fetch()) 
            {  
                $users[] = new Users($data);
            }
            // var_dump($films[0]->get_personnages());
            return ($users);
        }

        // Ajouter user sur la BDD
        public function add($data)
        {

            $valeurs = ['email' => $data->get_email(), 'password' => $data->get_password()];
            $requete = 'INSERT INTO user (email, password) VALUES (:email , :password)';
            $insert = $this->_bdd->prepare($requete);
            if (!$insert->execute($valeurs)) 
            {
                //print_r($insert->errorInfo());
                return false;
            } 
            else 
            {
                return true;
            }

        }

        //Récupérer mail user pour vérification authentification
        public function getOne($mail_user)
        {
            $query = $this->_bdd->prepare('SELECT email, password FROM user WHERE user.email = :mail_user');
            $query->bindValue(':mail_user', $mail_user);
            $query->execute();
            
            while ($data = $query->fetch()) 
            {  
                $user = new Users($data);
            }

            return ($user);
        }
    }
