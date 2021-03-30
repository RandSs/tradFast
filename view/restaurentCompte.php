<article id="restau">
<h1 class="text-dark" style="text-align: center;">Bienvenue: <?php echo strtoupper($monRestaurentCompte['nom']); ?> </h1>

<section >
<div class="card-deck container-fluid " style="margin-top: 2rem; margin-bottom:5rem;">
  
  <div id="mesClients" class="card col-2" >
   
    <div class="card-body">
      <h5 class="card-title text-success">Mes Client</h5>
      <div class="card-text">
                        <table class="table">
                        <thead class="thead-dark">
                              <tr>
                                <th scope="col">N° Client</th>
                                <th scope="col">Nom Client</th>
                                <th scope="col">Prenom Client</th>
                                <th scope="col">Adresse</th>
                                <th scope="col">N° Tel</th>
                                <th scope="col">Email</th>
                               
                              </tr>
                    </thead>
                    <tbody>
                          <?php
                             
                              foreach($commadeInformation as $client){ 
                                echo'<tr>
                                <td><h6>'.
                                $client["id_client"] 
                                
                                .'</h6></td>
                                <td><h6>'.
                                $client["nom_client"] 
                                .'</h6></td>
                                <td><h6>'.
                                $client["prenom_client"] 
                                .'</h6></td>
                                <td><h4 style="font-size: 10px;">'.
                                $client["adresse_client"]
                                .'</h4></td>
                                <td><h4 style="font-size: 10px;">'.
                                $client["tel_client"]
                                .'</h4></td>
                                <td><h4 style="font-size: 10px;">'.
                                $client["client_email"]
                                .'</h4></td>
                              </tr>';
                            }
                         

                          ?>
                       
                        </tbody>
                      </table>
             </div>
    
    </div>
  </div>
  <div class="card col-10"  id="mesCommandes">
   
    <div class="card-body">
      <h5 class="card-title text-success">Gérer mes commandes</h5>

      <table class="table">
              <thead class="thead-dark">
                    <tr>
                    <th scope="col">N° Commande</th>
                    <th scope="col">Plat</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">date de commande</th>
                    <th scope="col">date de livraison</th>
                    <th scope="col">N° Client</th>
                  </tr>
           </thead>
          <tbody>
              <?php
                foreach ($commadeInformation as $plat ) {
            
                  echo '<tr>
                  
                        <td>' . $plat["id_commande"] . '</td>
                        <td>' . $plat["plat"] . '</td>
                        <td>' . $plat["quantite"] . '</td>
                        <td>' . $plat["date_de_commande"] . '</td>
                        <td>' . $plat["date_de_livraison"] . '</td>
                        <td>' . $plat["id_client"] . '</td>
                
                        </tr>';
                
                }

            
            ?>
            </tbody>
</table>


    
    </div>
  </div>
</div>
</section>
<section>
<div  class="card-deck container-fluid" style="margin-bottom: 2rem;">
  
  <div class="card col-4">
   
    <div class="card-body">
      <h5 class="card-title text-success">Mes Infos</h5>
      <h6> <?php echo'Mon N° restaurant c\'est : ' . ucfirst($monRestaurentCompte['id_restaurent']) ?></h6>
      <h6> <?php echo'Ma spécialité c\'est : ' . ucfirst($monRestaurentCompte['cuisine']) ?></h6>
      <h6> <?php echo'Mon email c\'est : ' . $monRestaurentCompte['email'] ?></h6>
      <h6> <?php echo'Mon N° tel c\'est : ' . ucfirst($monRestaurentCompte['tel']) ?></h6>
      
 
    </div>
  </div>
  <div id="monMenu" class="card col-8">
 
    <div class="card-body">
      <h5 class="card-title text-success">Mon menu</h5>

      <div class="modal-body d-flex flex-row justify-content-between" >
                  
                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th >Entrée</th>
                  
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                         
                         foreach($commadeInformation as $plat)
                         { 
                                if($plat["typeDePlat"] == "entree"){
                                  echo'<tr>
                                  <td><h5>' .$plat["plat"] .'</h5><p style="font-size: 10px;">'
                                           .$plat["ingredient"].
                                '</p></td><td><a href="#" ><i class="far fa-trash-alt text-danger"></i></a></td>
                              </tr>';
                                  }
                 
                         }

                      ?>
                   
                    </tbody>
                  </table>
                
          
                        
              
                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th>Main</th>
                  
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                         
                         foreach($commadeInformation as $plat)
                         { 
                                if($plat["typeDePlat"] == "main"){
                                      echo'<tr>
                                              <td><h5>' .$plat["plat"] .'</h5><p style="font-size: 10px;">'
                                                       .$plat["ingredient"].
                                            '</p></td><td><a href="#" ><i class="far fa-trash-alt text-danger"></i></a></td>
                                          </tr>';
                                  }
                 
                         }

                     ?>
                     
                    </tbody>
                  </table>
                
                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th>Dessert</th>

                  
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                         
                         foreach($commadeInformation as $plat)
                         { 
                                if($plat["typeDePlat"] == "dessert"){
                                      echo'<tr>
                                      <td><h5>'.$plat["plat"] .'</h5><p style="font-size: 10px;">'
                                               .$plat["ingredient"].
                                    '</p></td><td><a href="#" ><i class="far fa-trash-alt text-danger"></i></a></td>
                                  </tr>';
                                  }
                 
                         }

                     ?>
                     
                    </tbody>
                  </table>
                  
            </div>

    </div>
  </div>
</div>
</section>

<section>

      <!-- Modal -->
      <div class="modal fade" id="modifierMenue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-success" id="exampleModalLongTitle">Menue</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
                
            <div class="modal-footer" >
              <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
             
            </div>
          </div>
        </div>
      </div>
</section>
<hr>
  </article>