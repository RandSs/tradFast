<?php 

include("model/modelRestaurent.php");

class RestaurentController extends RestaurentModel 
{


    // déclarer une fonction pour récupérer les données du model et les passer à la vue.
    public function afficheRestaurents()
    {
      $dernierInscription  = $this->getRestaurents();// model 
     
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

  public function connecteMoi()
  {
    if(isset($_POST["email"]) && isset($_POST["mdp"]))
    {
       $this->email = ($_POST["email"]);
       $restaurent = $this->seConnecter(); // model
       
       if(password_verify($_POST["mdp"], $restaurent["mdp"]))
       {
             $_SESSION['nom'] = $restaurent['nom'];
             $_SESSION['pseudo'] = $restaurent['pseudo'];
             $_SESSION["id_restaurent"] = $restaurent["id_restaurent"];
             $_SESSION["id_role"] = $restaurent["id_role"];
             $_SESSION["role"] = $restaurent["role"];

             header('Location: index.php?page=restaurentCompte');
       }else{
         echo $message = "centre class='alert alert-danger'>Email ou mot de passe incorrect </center>";
         include("view/viewSignIn.php");
       }

    }
    include("view/viewSignIn.php");
  }

  public function restaurentCompte($id_restaurent = null)
  {
      if($id_restaurent !== null)
      {
            $compte = $this->getRestauCompte($id_restaurent);
             echo"$id_restaurent";
            include("view/restaurentCompte.php");
      } else{
                echo "on est pas connecter";
            }
      
  }
      
}
