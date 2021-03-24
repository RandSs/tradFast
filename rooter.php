<?php


class Rooter 
{
    private $page;
   

    public function __construct($page= null)
    {
        $this->page = $page;
    
      
    }

    function pageDemander(){

        switch($this->page)
        {
            case 'accueil':
                
                $dernierInscription = new RestaurentController();
                $dernierInscription->afficheRestaurents($_GET["pL"]);
          
                
                break;
                case 'restaurant':

                    $voirMenuRestau = new RestaurentController();
                    $voirMenuRestau->voireMenu(@$_GET["id_restaurent"]);
                    
                    break;


            case 'restaurentCompte':

                $restauCompte = new RestaurentController();
                $restauCompte->restaurentCompte(@$_SESSION["id_restaurent"]);
             
                
                break;

            case 'signIn':
                $signIn = new RestaurentController();
                $signIn->connecteMoi();
                
                break;

                case 'modifier':
                    $ajouter = new RestaurentController;
                    $ajouter->ajouterPlat();
                   
                    break;


            case 'signOut':

              $_SESSION = array();
              header('Location: index.php?page=accueil');
                
                break;

                case 'inscriptionRestaurent':

                $newRestaurent =  new RestaurentController();
                $newRestaurent->setInscription();
                
                break;

                case 'inscriptionClient':
                   
                    include("view/inscriptionClient.php");
                break;

                 case 'recherche':

                        $chercherRestaurant = new RechecheController();
                        $chercherRestaurant ->rechercheRestaurant($_GET["search"]);
                       
                        
                 break;

                 case 'typeDecuisine':

                    $voirUnTypeDeCuisine = new RechecheController();
                    $voirUnTypeDeCuisine ->AfficherUnTypeDeCuisine($_GET["tCuisine"]);
                    
                   
                    
             break;


        }
    }
}


