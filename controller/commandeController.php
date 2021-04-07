<?php

use commande\Commande;
use CommandeRepo;


include("classes/commande.php");
include("model/commandeRepository.php");

class CommandeController extends CommandeRepo
{

    public function passerCommande($id_plat = null)
    {

        //registrer par quel page le visiteur a acceder au site 
        //faire un header(Location:  $SESSION['page'] ) 
        //pour revenir sur la meme page.

        $SESSION['page'] = $_SERVER['REQUEST_URI'];

        // obliger le visiteur de signe in ou s'inscrir avant de passer un ecommande.

        if (!isset($_SESSION["id_client"])) {

            die("<center class='alert alert-danger'><h2>il faut etre un client avant de passer une commande!</h2></center>
      <center><a href='index.php?page=inscriptionClient'>S'inscrir</a></center>");
        }
        if (!isset($_SESSION['panier'])); 

            // on déclare la session['panier'].
            $panier = $_SESSION['panier'];

            $id = $_GET['id_plat'];
            $qte = $_GET['qte'];
            $plat = $_GET['plat'];
            $prix = $_GET['prix'];

            $_SESSION['panier'][$id] = $qte;

            if (isset($_GET['id_plat'])) {

                $resultats = $this->accepterCommande($id_plat);

                if (empty($resultats)) {

                    die("Vous n'avais commander aucun plat !! ");
                }

                $_SESSION['panier'][$resultats[0]->id_plat] = 1;
                
          //die('le plat a bien été ajouté à votre panier <a href="javascript:history.back()">retourner sur le menu</a>');

                $ids = array_keys($_SESSION['panier']);

               print_r("mon $ids :  " . $ids);

                if (empty($ids)) {

                    $resultats = array();
                } else {

                }
               
            }


     
       include("view/clientCompte.php");
    }
}
