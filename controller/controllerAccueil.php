<?php 

include("model/modelAccueil.php");
class AccueilController extends AccueilModel
{

    public $nom;
    public $prenom;
    public $adresse;
    public $tel;
    public $email;
    public $codePostal;
    public $mdp;
    public $id_restaurateur;

   // déclarer une fonction pour recuperer les données du model et les passer à la vue.
    public function afficheDixDernierInscription(){
      $dernierInscription  = $this->getDernierDixInscription();// model 
     
 
       include("view/viewAccueil.php");
    }
}