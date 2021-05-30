<?php



class Router
{
    private $page;


    public function __construct($page = null)
    {
        $this->page = $page;
    }

    public function pageDemander()
    {

        switch ($this->page) {

                //inscription restaurant.
            case 'inscriptionRestaurant':

                $newRestaurant =  new RestaurantController();
                $newRestaurant->setInscription();

                break;

                //page sign in pour diriger les utilisateur restuarant ou client.
            case 'signIn':

                $signIn = new Controller();
                $signIn->signIn();

                break;

                //sign in restaurant.
            case 'signInRest':

                $signInRestau = new RestaurantController();
                $signInRestau->meConnecte();


                break;

                //le compte restaurant pour gérer les commandes et le menu ect.
            case 'restaurantCompte':

                $restauCompte = new RestaurantController();
                $restauCompte->restaurantCompte(@$_SESSION["id_restaurant"]);

                break;

                //page = restaurant&id_restaurant => pour visualiser le menu de chaque restaurant par les clients.
            case 'restaurant':
                $voirMenuRestau = new RestaurantController();
                $voirMenuRestau->voireMenu(@$_GET["id_restaurant"]);

                break;

                //formulaire pour pouvoir ajouter un plat au menu par le restaurant.
            case 'modifier':
                $ajouter = new RestaurantController();
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
                $singInClient->connexionClient();

                break;

                //page client ou il peut visualiser le panier et ces commandes 
            case 'addpanier':

                $passerCommande = new CommandeController();
                //  $passerCommande->passerCommande($_GET['id_plat']);
                $passerCommande->commandeInfos($_GET['id_plat']);

                break;

            case 'validerCommande':

                $validerCommande = new CommandeController();
                $validerCommande->validerCommande($_GET['id_plat']);

                break;

                //gérer le panier d'une commande par le client.
            case  $_SESSION['nom_client']:

                //$commanderPlat = new CommandeController();
                //$commanderPlat->passerCommande($_GET['id_plat']);
                $passerCommande = new CommandeController();
                //  $passerCommande->passerCommande($_GET['id_plat']);
                $passerCommande->commandeInfos($_GET['id_plat']);

                break;

                //suprimer un plat du panier avant de valider la commande.
            case  'supprimer':

                $supprimer = new CommandeController();
                $supprimer->del($_GET['id_plat']);


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

                $dernierInscription = new RestaurantController();
                $dernierInscription->afficheRestaurants($_GET["pL"]);

                break;

                //sign out.
            case 'signOut':

                $signOut = new Controller();
                $signOut->signOut();

                break;
            default:
                $dernierInscription = new RestaurantController();
                $dernierInscription->afficheRestaurants($_GET["pL"]);

                break;
        }
    }
}
