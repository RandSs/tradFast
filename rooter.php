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

            case 'signIn':
                include("view/viewSignIn.php");
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


