<?php

include("model/modelRecherche.php");

class RechecheController extends RechercheModel 
{


    public function rechercheRestaurant($search = null)
    {
       
        if($search == true && $this->requeteRestaurant($search) == true )
        {
            $resultats = $this->requeteRestaurant($search);

            include("view/viewRecherche.php"); 
             
        }else 
        {
            include("view/404.php"); 
        }
   
    }


    public function AfficherUnTypeDeCuisine($tCuisine = null)
    {
            if($tCuisine !== null)
            {
                $resultatTypeCuisine = $this->requeterUnTypeDeCuisine($tCuisine);
                include("view/viewTypeDeCuisine.php");
            }
    }




}



