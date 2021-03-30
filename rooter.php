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

                case 'clientCompte':

                 
                 
                    include("view/clientComte.php");
                 
                   
                    break;
                    case 'signIn':
                
                        include("view/signIn.php");
                        break;

            case 'signInRest':

                $signInRestau = new RestaurentController();
                $signInRestau->connecteMoi();
                
                break;

                case 'signInClient':
                  
                    $singInClient = new ClientController();
                    $singInClient->jeMeConnect();
                    
                    break;

                case 'modifier':
                    $ajouter = new RestaurentController();
                    $ajouter->ajouterPlat();

                    $commande = new RestaurentController();
                    $commande->passerCommande();
                    break;


                    case 'commandePlat':
            
                        $commande = new RestaurentController();
                        $commande->passerCommande($_GET["plat"]);

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
                   
                    $newClient = new ClientController();
                    $newClient->inscriptionControllerClient();
                   
                   
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


