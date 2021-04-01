<article id="voirestau">
<h1 class="text-success" style="text-align: center;">Soyez les bienvenus chez : <?php echo strtoupper($monRestaurentCompte['nom']); ?> </h1>

<section >

<div class="card-deck container-fluid " style="margin-top: 2rem; margin-bottom:5rem; opacity:0.6;">
  
  
  <div  class= "card col-10"  id="mesCommandes">
   
    <div class="card-body">
      <h5 class="card-title text-success">Menu</h5>
      <div class="modal-body d-flex flex-row justify-content-between" >
                  
                  <table class="table">
                    <thead class="">
                      <tr >
                        <th >Entrée</th>
                  
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
                         foreach( $menus as $plat)
                         { 
                                if($plat["typeDePlat"] == "entree"){
                                  echo'<tr>
                                  <td ><i class="fas fa-shopping-basket placerAuPannier">
                                  <a class="add" href="index.php?page=addpaneir&id_plat='. $plat["id_plat"] .'"  ><h5  id="id_plateau">'.$plat["id_plat"]. ' '.$plat["plat"]. '</h5></i></a>
                                  <p style="font-size: 10px;">' .$plat["ingredient"].'</p></td>

                                  <td>'. number_format($plat["prix"], 2, ',', ' ' ).' €</td>
                              </tr>';
                                  }
                 
                         }

                      ?>
                   
                    </tbody>
                </table>
              
                <table class="table">
                    <thead class="">
                      <tr>
                        <th>Main</th>
                  
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                         
                         foreach( $menus as $plat)
                         { 
                                if($plat["typeDePlat"] == "main"){
                                      echo
                                      '<tr>
                                      <td ><a class="add" href="index.php?page=addpaneir&id_plat='. $plat["id_plat"] .'"  ><i class="fas fa-shopping-basket ">
                                      <h5  id="id_plateau">'.$plat["id_plat"]. ' '.$plat["plat"]. '</h5>
                                      </i></a>
                                      <p style="font-size: 10px;">'.$plat["ingredient"].'</p></td>
                                      <td>'. number_format($plat["prix"], 2, ',', ' ' ).' €</td>
                                      </tr>';
                                  }
                 
                         }

                     ?>
                     
                    </tbody>
                  </table>
                
                  <table class="table">
                    <thead class="">
                      <tr>
                        <th>Dessert</th>

                  
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                         
                         foreach( $menus as $plat)
                         { 
                                if($plat["typeDePlat"] == "dessert"){
                                  '<tr>
                                  <td ><a class="add" href="index.php?page=clientCompte&id_plat='. $plat["id_plat"] .'"  ><i class="fas fa-shopping-basket ">
                                  <h5  id="id_plateau">'.$plat["id_plat"]. ' '.$plat["plat"]. '</h5>
                                  </i></a>
                                  <p style="font-size: 10px;">'.$plat["ingredient"].'</p></td>
                                  <td>'. number_format($plat["prix"], 2, ',', ' ' ).' €</td>
                                  </tr>';
                                  }
                 
                         }

                     ?>
                     
                    </tbody>
                  </table>
                  <table class="table">
                    <thead class="">
                      <tr >
                        <th >Extras</th>
                  
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                         
                         foreach( $menus as $plat)
                         { 
                                if($plat["typeDePlat"] == "extras"){
                                  '<tr>
                                      <td ><a class="add" href="index.php?page=addpaneir&id_plat='. $plat["id_plat"] .'"  ><i class="fas fa-shopping-basket ">
                                      <h5  id="id_plateau">'.$plat["id_plat"]. ' '.$plat["plat"]. '</h5>
                                      </i></a>
                                      <p style="font-size: 10px;">'.$plat["ingredient"].'</p></td>
                                      <td>'. number_format($plat["prix"], 2, ',', ' ' ).' €</td>
                                      </tr>';
                                  }
                 
                         }

                      ?>
                   
                    </tbody>
                </table>
                  
            </div>

    </div>
  </div>
  <div class="card col-2" style="width: 18rem;">

  <div class="card-body">
    <h5 class="card-title text-success">Pannier</h5>

    <table class="table">
                    <thead class="">
                      <tr >
                        <th >Restaurant</th>
                        <th >Plat</th>
                        <th >Prix</th>
                  
                      </tr>
                    </thead>
                    <tbody>
                    
                          <form  action='' id="commandeForm"  method='GET' >
                                  <tr>
                                 
                                  <td><h5 id="plat"></h5>
                                  <p  style="font-size: 10px;">
                                 
                                         
                                  </p></td><td>
                                 </td>
                                  </tr>
                                  <button type="submit" id="commande" href='#'  >Commande</button>

                                
                                </form>
      
                                 
                    </tbody>
                    </table>

  </div>
</div>

</div>
</section>

     
    
 
</section>
<section>
<div  class="card-deck container-fluid" style="margin-bottom: 2rem;">
  
  <div class="card col-4" style="opacity:0.6">
   
    <div class="card-body">
      <h5 class="card-title text-success">Contact nous</h5>
      <h6> <?php echo'Mon N° restaurant c\'est : ' . ucfirst($monRestaurentCompte['id_restaurent']) ?></h6>
      <h6> <?php echo'Ma spécialité c\'est : ' . ucfirst($monRestaurentCompte['cuisine']) ?></h6>
      <h6> <?php echo'Mon email c\'est : ' . $monRestaurentCompte['email'] ?></h6>
      <h6> <?php echo'Mon N° tel c\'est : ' . ucfirst($monRestaurentCompte['tel']) ?></h6>
      <h6> <?php echo'Mon adresse c\'est : ' . ucfirst($monRestaurentCompte['adresse']) ?></h6>
      <h6> <?php echo'Mon code postal c\'est : ' . ucfirst($monRestaurentCompte['code_postal']) ?></h6>
      
 
    </div>
  </div>



  <div id="monMenu" class="card col-8" style="opacity:0.6">
 
    <div class="card-body">
      <h5 class="card-title text-success">Meilleure vente</h5>
      <?php foreach($commadeInformation as $plat)
      {
               echo  '<h4 >'. ucfirst($plat["plat"])
                 .'</h4>';
      } 
      ?>
     

    </div>
  </div>
</div>
</section>

    






<hr>
</article>