<?php 
echo $message;
   
?>
<article  class="row signInscriptiption"  >
 
<section id="inscriptionC" class="col-sm-8 ">
<div class="card border-success mb-3 mx-auto" style="max-width: 40rem;">
      <div class="card-header"><h4 class="card-title text-success">Je m'inscris</h4></div>

  <div class="card-body">
 
    
        <form action="" method="POST"> 
            
        <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom_client" name="nom_client" aria-describedby="emailHelp" placeholder="Enter nom">
                </div>

                <div class="form-group col-md-6">
                    <label for="pseudo">Prenom</label>
                    <input type="text" class="form-control" id="prenom_client" name="prenom_client" placeholder="Enter prenom">
                </div>

                <div class="form-group col-md-12">
                    <label for="adresse">Adresse</label>
                    <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Enter adresse">
                </div>

                <div class="form-group col-md-6">
                    <label for="code_postal">Code postal</label>
                    <input type="text" class="form-control" id="code_postal" name="code_postal" placeholder="Enter code postal">
                </div>

                <div class="form-group col-md-6">
                    <label for="tel">Tel</label>
                    <input type="tel" class="form-control" id="tel" name="tel" placeholder="Enter tel">
                </div>

               
                <div class="form-group col-md-6">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="client_email" name="client_email" aria-describedby="emailHelp" placeholder="Enter email">
                </div>

                <div class="form-group col-md-6">
                    <label for="mdp">Mot de passe</label>
                    <input type="password" class="form-control" id="mdp_client" name="mdp_client" placeholder="Enter mot de passe">
                </div>

 
                <div class="col">
                    <input type="hidden" class="form-control" id="id_role" name="id_role" value="2">
                </div>

                <div class="form-group"> 
                <button type="submit" class="btn btn-success" style="float: right;">S'inscrir</button>
                </div>

          </div>
        </form>

     </div>
</div>
</section>
<section id="signInClient" class="col-sm-4"  >
  
  
<div class="card border-success mb-3 " style="margin-right: 5rem;">
  <div class="card-header"><a href="index.php?page=signInClient" ><h4 class="card-title text-success">Je suis d??ja un client  <i class="fas fa-sign-in-alt"></i></h4> </a></div>
  <div class="card-body">
    
        

  </div>
</div>
<div>
  
</div>
</section>

</article>

