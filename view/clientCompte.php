<h1>Mon panier </h1>
<pre>
  <?php 
  session_start();
  print_r($_SESSION);

  ?>
</pre>

<section class="container" >

  <div class="card" >

    <div class="card-body">
      <h5 class="card-title text-success">Panier</h5>

      <table class="table">
        <thead class="">
          <tr>
            <th>Restaurant</th>
            <th>Id plat</th>
            <th>Plat</th>
            <th>Ingredient</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th>Suprimé</th>

          </tr>
        </thead>
        <tbody>

          <?php

          foreach ($resultats as $plat) {

            echo
            '<tr>
                 <td><h5 >' . $plat->pseudo . '</h5></td>
                 <td><h5 >' . $plat->id_plat . '</h5></td>
                 <td> ' . $plat->plat.'</td>
                 <td><p style="font-size: 12px;">'.$plat->ingredient .'</p></td>
                 <td>'. number_format($plat->prix, 2, ',', ' ' ).' €</td>
                 <td id ="qty" >1</td>
                 <td><a href ="index.php?page=clientCompte" ><i class="fas fa-trash-alt text-danger"></i></a></td>
                 </tr>';

          }

          ?>
        </tbody>
      </table>

      <a href="#" class="btn btn-outline-success">Commander</a>
    </div>
  </div>
</section>

<section class="container" >

  <div class="card" >

    <div class="card-body">
      <h5 class="card-title text-success">Panier</h5>

      <table class="table">
        <thead class="">
          <tr>
            <th>Restaurant</th>
            <th>Id plat</th>
            <th>Plat</th>
            <th>Ingredient</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th>Suprimé</th>

          </tr>
        </thead>
        <tbody>

          <?php

          foreach ($panier as  $id => $qte ) {
       foreach ($resultats as $plat){
            echo
            '<tr>
                 <td><h5 >' . $plat->pseudo . '</h5></td>
                 <td><h5 >' . $id . '</h5></td>
                 <td> ' . $plat->plat .'</td>
                 <td><p style="font-size: 12px;">'.$plat->ingredient .'</p></td>
                 <td>'. number_format($plat->prix, 2, ',', ' ' ).' €</td>
                 <td id ="qty" >'.$qte.'</td>
                 <td><a href ="index.php?page=clientCompte" ><i class="fas fa-trash-alt text-danger"></i></a></td>
                 </tr>';
            }
          }

          ?>
        </tbody>
      </table>

      <a href="#" class="btn btn-outline-success">Commander</a>
    </div>
  </div>
</section>