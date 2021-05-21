<?php

//use CommandeController;

class Rooter
{
    private $page;


    public function __construct($page = null)
    {
        $this->page = $page;
    }

    function pageDemander()
    {

        switch ($this->page) {

            //inscription restaurant.

            case 'inscriptionRestaurent':

                $newRestaurent =  new RestaurentController();
                $newRestaurent->setInscription();

                break;
                //page sign in pour diriger les utilisateur restuarant ou client.
            case 'signIn':

                include("view/signIn.php");

                break;

                //sign in restaurant.

            case 'signInRest':

                $signInRestau = new RestaurentController();
                $signInRestau->connecteMoi();

                break;
               //le compte restaurant pour gérer les commandes et le menu ect.
            case 'restaurentCompte':

                $restauCompte = new RestaurentController();
                $restauCompte->restaurentCompte(@$_SESSION["id_restaurent"]);

                break;

                //page = restaurant&id_restaurent => pour visualiser le menu de chaque restaurant par les clients.
            case 'restaurant':
                $voirMenuRestau = new RestaurentController();
                $voirMenuRestau->voireMenu(@$_GET["id_restaurent"]);

                break;
            //formulaire pour pouvoir ajouter un plat au menu par le restaurant.
            case 'modifier':
                $ajouter = new RestaurentController();
                $ajouter->ajouterPlat();

                break;

              //inscription client.
            case 'inscriptionClient':

                $newClient = new ClientController();
                $newClient->inscriptionControllerClient();

                break;

                // sign in client.
            case 'signInClient':

               $singInClient = new ClientController();
                $singInClient->jeMeConnect();

                break;

                //page client ou il peut visualiser le panier et ces commandes 

            case 'addpanier':
   
                $passerCommande = new CommandeController();
                $passerCommande->getCommande();
                $suprimerPlat= new CommandeController();
                $suprimerPlat->del($_GET['id_pl']);
             
               
                break;


                case 'del':
   
                   // $suprimerPlat= new CommandeController();
                 //   $suprimerPlat->del($_GET['id_pl']);
                   
                    break;
                    
                

                case 'sql':

                    $sql = new CommandeController();
                    $sql->sql();

                    break;
    
                //gérer le panier d'une commande par le client.

            case  $_SESSION['nom_client']:

                $commanderPlat = new CommandeController($id_plat);
                $commanderPlat->passerCommande($_GET['id_plat']);
               
                break;

                // recherche un restaurant pricis par les client.
            case 'recherche':

                $chercherRestaurant = new RechecheController();
                $chercherRestaurant->rechercheRestaurant($_GET["search"]);

                break;

                // recherche un type de cuisine ? resultats afficher tous les restaurant qui 
                //ont le meme type de cuisine.

            case 'typeDecuisine':

                $voirUnTypeDeCuisine = new RechecheController();
                $voirUnTypeDeCuisine->AfficherUnTypeDeCuisine($_GET["tCuisine"]);

                break;

              // la page d'accueil.
            case 'accueil':

                $dernierInscription = new RestaurentController();
                $dernierInscription->afficheRestaurents($_GET["pL"]);

                break;
              //sign out.
            case 'signOut':

                $_SESSION = array();

                header('Location: index.php?page=accueil');

                break;
        }
    }
}
