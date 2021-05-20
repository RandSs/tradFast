<?php
use Ripository\RechercheRepository;

include("model/RechercheRepository.php");


class RechecheController 
{

    public function rechercheRestaurant($search = null)
    {
        $recherche = new RechercheRepository;
        if($search == true && $recherche->requeteRestaurant($search) == true )
        {
            $resultats = $recherche->requeteRestaurant($search);

            include("view/rechercheView/viewRecherche.php"); 
             
        }else 
        {
            include("view/coreView/404.php"); 
        }
   
    }

    public function AfficherUnTypeDeCuisine($tCuisine = null)
    {
        $typeDeCuisine = new RechercheRepository;
            if($tCuisine !== null)
            {
                $resultatTypeCuisine = $typeDeCuisine->requeterUnTypeDeCuisine($tCuisine);
                include("view/rechercheView/viewTypeDeCuisine.php");
            }
    }


}



