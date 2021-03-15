<article id="restau">
<h1 class="text-danger" >Bien venue <?php echo strtoupper($monRestaurentCompte['nom']); ?> </h1>

<section>
      
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
                <div class="modal-body d-flex flex-row justify-content-between" >
                  
                      <table>
                        <thead>
                          <tr>
                            <th>Entrée</th>
                      
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                             
                              for($i=0; $i < 10 ; $i++){ 
                                echo'<tr>
                                <td>César salad 4€<p style="font-size: 10px;">
                                          éscalope poulet, salade, tomate
                                </p></td><td><a href="#" ><i class="far fa-trash-alt text-danger"></i></a></td>
                              </tr>';
                            }
                         

                          ?>
                       
                        </tbody>
                      </table>
                    
              
                            
                  
                      <table>
                        <thead>
                          <tr>
                            <th>Main</th>
                      
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                             
                             for($i=0; $i < 5 ; $i++){ 
                               echo'<tr>
                               <td>César salad 4€<p style="font-size: 10px;">
                                         éscalope poulet, salade, tomate
                               </p></td><td><a href="#" ><i class="far fa-trash-alt text-danger"></i></a></td>
                             </tr>';
                           }
                        

                         ?>
                         
                        </tbody>
                      </table>
                    
                      <table>
                        <thead>
                          <tr>
                            <th>Dessert</th>

                      
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                             
                             for($i=0; $i < 5 ; $i++){ 
                               echo'<tr>
                               <td>César salad 4€<p style="font-size: 10px;">
                                         éscalope poulet, salade, tomate
                               </p></td><td><a href="#" ><i class="far fa-trash-alt text-danger"></i></a></td>
                             </tr>';
                           }
                        

                         ?>
                         
                        </tbody>
                      </table>
                      
                </div>
            <div class="modal-footer" >
              <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
              <button type="button" class="btn btn-success">Valider</button>
            </div>
          </div>
        </div>
      </div>
</section>

<section>

          <div class="container" >
            <div class="card-deck" style="margin-top: 1rem; ">
            

              <?php

              //la variable $dernierInscription vien de la class controllerAccueil qui contien le resultat du fetch de la fonction 
              // getDernierDixInscription() de la class AccueilModel. 

       

                echo
                  '<div class="card " style="min-width: 14rem; max-height: 21rem;  margin-top: 1rem;">' .
                  '<img class="card-img-top" src="' . $monRestaurentCompte["image"] . '"  alt="Card image cap" style="width: 150px; height:150; ">' .
                  '<div class="card-body" >' .
                  '<h5 class="card-title">' . strtoupper($monRestaurentCompte["nom"]) . " " .  strtoupper($monRestaurentCompte["pseudo"]) . '</h5>'.
                  '<p class="card-text" style="color:green;"><b>ID ROLE : ' . $monRestaurentCompte["id_role"] . '</b></p>'.
                  '<p class="card-text" style="color:green;"><b>ROLE :' . $monRestaurentCompte["role"] . '</b></p>'.
                  '<p class="card-text" style="color:green;"><b> Cuisine :' . $monRestaurentCompte["cuisine"] . '</b></p>'.
                  '<p class="card-text" style="color:green;"><b>id Cuisine :' . $monRestaurentCompte["id_cuisine"] . '</b></p>'.
                  '<p class="card-text" style="color:green;"><b>id Restaurent :' . $monRestaurentCompte["id_plat"] . '</b></p>'.
                  '<p class="card-text" style="color:green;"><b>id Menue  :' . $monRestaurentCompte["id_menue"] . '</b></p>'.
                  '<p class="card-text" style="color:green;"><b>id Restaurent :' . $monRestaurentCompte["id_restaurent"] . '</b></p>'.
                  '<p class="card-text" style="color:green;"><b>type de plate :' . $monRestaurentCompte["type_plat"] . '</b></p>'.
                  '<p class="card-text" style="color:green;"><b>ingredient :' . $monRestaurentCompte["ingredient"] . '</b></p>'.
                  '<p class="card-text" style="color:green;"><b>plat :' . $monRestaurentCompte["plat"] . '</b></p>'.
                  '<p class="card-text" style="color:green;"><b>prix :' . $monRestaurentCompte["prix"] . '</b></p>'.
                  '<p class="card-text" style="color:green;"><b>id plat : ' . $monRestaurentCompte["id_plat"] . '</b></p>'.
                  '<p class="card-text" style="color:green;"><b>id commande :' . $monRestaurentCompte["id_commande"] . '</b></p>'.
                  '<p class="card-text" style="color:green;"><b>date de commande :' . $monRestaurentCompte["date_de_commande"] . '</b></p>'.
                  '<p class="card-text" style="color:green;"><b>quantite :' . $monRestaurentCompte["quantite"] . '</b></p>'.
                  '<p class="card-text" style="color:green;"><b>date de livraison:' . $monRestaurentCompte["date_de_livraison"] . '</b></p>'.
                  '<p class="card-text" style="color:green;"><b>id client:' . $monRestaurentCompte["id_client"] . '</b></p>'.
                  '<p class="card-text" style="color:green;"><b>nom client:' . $monRestaurentCompte["nom_client"] . '</b></p>'.
                  '<p class="card-text" style="color:green;"><b>prenom client:' . $monRestaurentCompte["prenom_client"] . '</b></p>'.
                  '<p class="card-text" style="color:green;"><b>iadresse client:' . $monRestaurentCompte["adresse_client"] . '</b></p>'.
                  '<p class="card-text" style="color:green;"><b>cp client:' . $monRestaurentCompte["code_postal_client"] . '</b></p>'.
                  '<p class="card-text" style="color:green;"><b>pseudo:' . $monRestaurentCompte["pseudo"] . '</b></p>'.
                  '<p class="card-text" style="color:green;"><b>nom rest :' . $monRestaurentCompte["nom"] . '</b></p>'.
                  '<p class="card-text" style="color:green;"><b>email:' . $monRestaurentCompte["email"] . '</b></p>'.





                  




              



                  '<p class="card-text"><small class="text-muted"></small></p>' .
                  '<a class="btn btn-outline-success" href="#" role="button" data-toggle="modal" data-target="#voirMenue">Voir menue</a>' .
              
                  '</div></div>';
            

              ?>

             </div>
          </div>

  </section>
  </article>