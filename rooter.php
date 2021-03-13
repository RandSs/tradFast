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
                $dernierInscription->afficheRestaurents();
                break;


            case 'restaurentCompte':

                $restauCompte = new RestaurentController;
                $restauCompte->restaurentCompte($_SESSION["id_restaurent"]);
                
                break;

            case 'signIn':
                $signIn = new RestaurentController;
                $signIn->connecteMoi();
                
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

        }
    }
}


