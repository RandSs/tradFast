<?php
use tradFast\Bdd;

class RechercheModel 
{
    public function requeteRestaurant($search)
        {
          $bdd = Bdd::getConnection();
                $requete = ("SELECT * FROM restaurent 
                            INNER JOIN specialite  
                            ON restaurent.id_restaurent = specialite.id_restaurent
                            INNER JOIN type_cuisine 
                            ON type_cuisine.id_cuisine = specialite.id_cuisine
                            WHERE restaurent.nom LIKE :search OR pseudo LIKE :search");



               $recherche = $bdd->prepare($requete);
               $recherche->execute([":search"=> "%" .$search. "%"]);

               $resultatRecherche = $recherche->fetchAll();

                   $bdd = null; 
               
                return  $resultatRecherche;

        }


        public function requeterUnTypeDeCuisine($tCuisine)
        {
               $bdd = Bdd::getConnection();

               $requete = ("SELECT * FROM restaurent 
                            INNER JOIN specialite  
                            ON restaurent.id_restaurent = specialite.id_restaurent
                            INNER JOIN type_cuisine 
                            ON type_cuisine.id_cuisine = specialite.id_cuisine
                            WHERE type_cuisine.cuisine = :cuisine" );

               $rechercher =  $bdd->prepare($requete);
               $rechercher->execute([":cuisine" => $tCuisine ]);

               $resultatType = $rechercher->fetchAll();

               return  $resultatType;

        }
    


}