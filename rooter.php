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
                
                $dernierInscription = new AccueilController();
                $dernierInscription->afficheDixDernierInscription();
                break;
            case 'signIn':
               include("view/viewSignIn.php");
                break;
            case 'inscription':
                include("view/viewInscription.php");
                break;

        }
    }
}


