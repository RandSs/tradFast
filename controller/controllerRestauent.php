<?php 

include("model/modelRestaurent.php");
//include("controller/restaurent.php");
class RestaurentController extends RestaurentModel 
{


  public $nom;
  public $pseudo;
  public $adresse;
  public $code_postal;
  public $tel;
  public $email;
  public $mdp;
  public $image;
  public $id_cuisine;
  public $id_role;


    // déclarer une fonction pour récupérer les données du model et les passer à la vue.
    public function afficheRestaurents()
    {
      $dernierInscription  = $this->getRestaurent();// model 
     
       include("view/viewAccueil.php");
    }

    /**
     * déclarer une fonction pour gérer le formulaire d'inscription et controler les information
     * avant de les passer au model.
     */
  public function setInscription()
  {

     $this->nom = $_POST["nom"];
     $this->pseudo = $_POST["pseudo"];
     $this->adresse = $_POST["adresse"];
     $this->tel = $_POST["tel"];
     $this->code_postal = $_POST["code_postal"];
     $this->email = $_POST["email"];
     $this->mdp = $_POST["mdp"];
     $this->image = $_POST["image"];
     $this->id_cuisine = $_POST["typeCuisine"];
     $this->id_role = $_POST["id_role"];
     
     
         if(isset($_POST['email']) && isset($_POST["typeCuisine"])){
           $message = "votre inscription est prise en compte!"; 
           if(!$this->email) {
             $message = "alert email wrong";
           }
         } 
         if ($this->email && $this->nom && $this->pseudo) {
          $this->mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
          
          if ($this->inscription()) {
          
              echo $message = "<center class='alert alert-info>Inscription est pris en compte </center>";
          } else {
              include("view/inscriptionRestaurent.php");
          }
      }
         
         
      
     include("view/inscriptionRestaurent.php");

  }

}
