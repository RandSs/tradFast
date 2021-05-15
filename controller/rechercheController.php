<?php

include("model/RechercheRepository.php");

class RechecheController extends RechercheRepository
{


    public function rechercheRestaurant($search = null)
    {
       
        if($search == true && $this->requeteRestaurant($search) == true )
        {
            $resultats = $this->requeteRestaurant($search);

            include("view/rechercheView/viewRecherche.php"); 
             
        }else 
        {
            include("view/coreView/404.php"); 
        }
   
    }


    public function AfficherUnTypeDeCuisine($tCuisine = null)
    {
            if($tCuisine !== null)
            {
                $resultatTypeCuisine = $this->requeterUnTypeDeCuisine($tCuisine);
                include("view/rechercheView/viewTypeDeCuisine.php");
            }
    }




}



