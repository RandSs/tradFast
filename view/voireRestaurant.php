<article id="voirestau">
<h1 class="text-success" style="text-align: center;">Soyez les bienvenus chez : <?php echo strtoupper($monRestaurentCompte['nom']); ?> </h1>

<section >

<div class="card-deck container-fluid " style="margin-top: 2rem; margin-bottom:5rem; opacity:0.6;">
  
  
  <div  class= "card col-12"  id="mesCommandes">
   
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
                                  <td ><button  onclick="addPlat('. $id_plat .')"><i class="fas fa-shopping-basket"></i></button>
                                  <a  href="index.php?page=addpanier&id_plat='. $plat["id_plat"] .'"  >
                                  <h5  id="id_plat">'.$plat["id_plat"]. '</h5>
                                  <h5 id="plat">'.$plat["plat"]. '</h5></a>
                                  <input type="number" name ="qte" id="qte">
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
                                      <td ><a  href="index.php?page=addpanier&id_plat='. $plat["id_plat"] .'"  ><i class="fas fa-shopping-basket ">
                                      <h5 >'.$plat["id_plat"]. ' '.$plat["plat"]. '</h5>
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
                               echo   '<tr>
                                  <td ><a class="add" href="index.php?page=addpanier&id_plat='. $plat["id_plat"] .'"  ><i class="fas fa-shopping-basket ">
                                  <h5  >'.$plat["id_plat"]. ' '.$plat["plat"]. '</h5>
                                  </i></a>
                                  <p style="font-size: 10px;">'.$plat["ingredient"].'</p></td>
                                  <td id="prix">'. number_format($plat["prix"], 2, ',', ' ' ).' €</td>
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
                               echo   '<tr>
                                      <td ><a class="add" href="index.php?page=addpanier&id_plat='. $plat["id_plat"] .'"  ><i class="fas fa-shopping-basket ">
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
  
</div>
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