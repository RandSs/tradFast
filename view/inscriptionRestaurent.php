<?php 
echo $message;
   
?>

<div class="card border-success mb-3 mx-auto" style="max-width: 40rem;">
      <div class="card-header"><h4 class="card-title text-success">Inscrivez vous</h4></div>

  <div class="card-body">
 
    
        <form action="" method="POST"> 
        <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" aria-describedby="emailHelp" placeholder="Enter nom">
                </div>

                <div class="form-group col-md-6">
                    <label for="pseudo">Pseudo</label>
                    <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Enter pseudo">
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
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                </div>

                <div class="form-group col-md-6">
                    <label for="mdp">Mot de passe</label>
                    <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Enter mot de passe">
                </div>
              
                <div class="form-group col-md-6">

                    <label for="typeCuisine">Type de cuisine</label>
                    
                        <select class="border-muted" id="typeCuisine" name="typeCuisine" style=" height: 2.5rem;">
                            <option class="text-muted" value="">Entrée le type de cuisine</option>
                            <option value="1">Chinese</option>
                            <option value="2">Maghrebine</option>
                            <option value="3">Italian</option>
                            <option value="4">Indian</option>
                            <option value="5">Gastronomie française</option>
                            <option value="6">Autre</option>

                        </select>
                       
                </div>

                <div class="form-group col-md-6">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
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
