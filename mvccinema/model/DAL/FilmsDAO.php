<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Films
 *
 * @author luidgi
 */
class FilmsDAO extends Dao
{

//Récupérer tout les films
    public function getAll($recherche)
    {
        //On définit la bdd pour la fonction
        $query = $this->_bdd->prepare("SELECT idFilm, titre, realisateur, affiche, annee FROM films WHERE upper(titre) LIKE :recherche OR upper(realisateur) LIKE :recherche OR annee LIKE :recherche ");
        $query->bindValue(':recherche', '%'.strtoupper($recherche).'%');
        $query->execute();
        $films = array();

        while ($data = $query->fetch()) 
        {
            $personnages = array();

            $queryP = $this->_bdd->prepare("SELECT personnage, nom, prenom 
                                        FROM role 
                                            JOIN acteurs ON acteurs.idActeur = role.idActeur
                                                WHERE idFilm = :idFilm");

            $queryP->bindValue(':idFilm', $data['idFilm']);

            $queryP->execute();

            while ($dataP = $queryP->fetch()) 
            {
                $personnages[] = new Personnages($dataP['personnage'], new Acteurs($dataP['nom'],$dataP['prenom']));
            }
            
            $films[] = new Films($data, $personnages);
            

        }
        // var_dump($films[0]->get_personnages());
        return ($films);
    }

    // Ajouter un film à la BDD
    public function add($data)
    {
        // var_dump($data->get_titre());
        // var_dump($data->get_realisateur());
        // var_dump($data->get_affiche());
        // var_dump((int) $data->get_annee());
    
        if(!$this->isExist($data->get_titre())) 
        {
            //AJOUTER FILM DANS LA BDD
            $ajoutFilm = $this->_bdd->prepare("INSERT INTO films (titre, realisateur, affiche, annee) VALUES (:titre , :realisateur, :affiche, :annee)");

            $ajoutFilm->bindValue(':titre', $data->get_titre());
            $ajoutFilm->bindValue(':realisateur', $data->get_realisateur());
            $ajoutFilm->bindValue(':affiche', $data->get_affiche());
            $ajoutFilm->bindValue(':annee',(int)$data->get_annee());

            $getFilm = $ajoutFilm->execute();
            //$getFilm = $ajoutFilm->fetch();
            // var_dump($getFilm);
        }

        //SELECT ID FILM
        $idFilm = $this->_bdd->prepare("SELECT idFilm FROM films WHERE titre = :titre");
        $idFilm->bindValue(':titre', $data->get_titre());

        $idFilm->execute();

        $getIdFilm = $idFilm->fetch();
        // var_dump((int)$getIdFilm['idFilm']);

        
        
        foreach ($data->get_personnages() as $acteur)
        {
            //AJOUTER ACTEUR DANS LA BDD
            $ajoutActeur = $this->_bdd->prepare("INSERT INTO acteurs (nom, prenom) VALUES (:nom , :prenom)");
            $ajoutActeur->bindValue(':nom', $acteur->get_acteur()->get_nom());
            $ajoutActeur->bindValue(':prenom', $acteur->get_acteur()->get_prenom());

            $ajoutActeur->execute();
        

            //SELECT ID ACTEUR
            $idActeur = $this->_bdd->prepare("SELECT idActeur FROM acteurs WHERE nom = :nom");
            $idActeur->bindValue(':nom',$acteur->get_acteur()->get_nom());
            
            $idActeur->execute();

            $getIdActeur = $idActeur->fetch();
            // var_dump($getIdActeur);
            // var_dump($data->get_personnages()[0]->get_role());


            //AJOUTER ROLE DANS LA BDD
            $ajoutRole = $this->_bdd->prepare("INSERT INTO role (idActeur, idFilm, personnage) VALUES (:idActeur, :idFilm, :personnage)");
            $ajoutRole->bindValue(':idActeur', (int)$getIdActeur['idActeur']);
            $ajoutRole->bindValue(':idFilm', (int)$getIdFilm['idFilm']);
            $ajoutRole->bindValue(':personnage', $acteur->get_role());
            $getIdRole = $ajoutRole->execute();
            // var_dump($getIdRole);
        }
        
    }

    //Méthode de vérification du film dans BDD
    public function isExist($titre_film)
    {
        $query = $this->_bdd->prepare("SELECT titre FROM films WHERE films.titre = :titre_film");
        $query->execute(array(':titre_film' => $titre_film));
        $data = $query->fetch();
        // $user = new User($data['titre_film'],$data['password']);
        if ($data ==false){
            return false;
        }
        else {
            return true;
        }
    }

    //Récupérer plus d'info sur 1 offre
    public function getOne($id_offer)
    {

        $query = $this->_bdd->prepare("SELECT * FROM offers WHERE offers.id = :id_offer")->fetch(PDO::FETCH_ASSOC);
        $query->execute(array(':id_offer' => $id_offer));
        $data = $query->fetch();
        $offer = new Offres($data);
        return ($offer);
    } 
}
