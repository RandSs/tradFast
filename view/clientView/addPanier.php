<?php
session_start();

use Entity\Commande;

require_once("entity/Commande.php");

$totalAmount = new CommandeController();





echo '<center>
<h1 class="text-success">Bienvenue : ' . strtoupper($_SESSION['nom_client']) . '</h1>
</center>';

echo '<center>
  <h4 class="text-success">Mes Commandes</h4>
</center>';

?>

<section class="container">

  <div class="card">

    <div class="card-body">
      <h5 class="card-title text-success">Panier</h5>


      <?php if (empty($panier)) {
        die("<center><h3 class='text-danger'>Votre panier est vide !</h3></center>");
      } else {
      ?>


        <form id="dateForm" name="dataForm" action="index.php" method="GET">
          <input type="hidden" name="page" value="validerCommande">
          <table class="table">

            <thead class="thead-light">
              <tr>
                <th scope="col"></th>
              <?php foreach ($panier as  $keys => $valeurs) {
                echo  '<th scope="col" >' . $keys . '</th>';
              }

              echo '<th>Sup</th>';

              '</tr>
         </thead>

         <tbody>';
              //var_dump($panier);

              foreach ($panier as $k) {

                echo  ' <tr id="supPlat">
<th class="sup" scope="row"> plat </th>
<td>' . $k['id_plat'] . '</td>
<input type="hidden" id="id_plat_" name="commandePla[]" value="' . $k['id_plat'] . '">
<td >' . $k['plat'] . '</td>
<td >' . $k['prix'] . '</td>
<td >' . $k['qte'] . '</td>
<td >' . $k['id_restaurant'] . '</td>
<input type="hidden" id="id_restaurant_" name="commandeRest" value="' . $k['id_restaurant'] . '">
<input type="hidden" id="qte_" name="commandeQte[]" value="' . $k['qte'] . '">

<td id="sup" class="supprimer"  >
      <a href="index.php?page=supprimer&id_plat=' . $k['id_plat'] . '"; onclick="alert(\"hello\")">
    <i  class="fas fa-trash-alt text-danger"></i></a>
</td></tr>';
              }


              /*

           for ($num = 0; $num < count($panierId); $num++) {
   
              echo  ' <tr id="supPlat">
          <th class="sup" scope="row"> plat </th>
          <td>' . $panier['id_plat'][$num] . '</td>
          <input type="hidden" id="id_plat_" name="commandePla[]" value="'.$panier['id_plat'][$num].'">
          <td >' . $panier['plat'][$num] . '</td>
          <td >' . $panier['prix'][$num] . '</td>
          <td >' . $panier['qte'][$num] . '</td>
          <td >' . $panier['id_restaurant'][$num] . '</td>
          <input type="hidden" id="id_restaurant_" name="commandeRest" value="'.$panier['id_restaurant'][$num].'">
          <input type="hidden" id="qte_" name="commandeQte[]" value="'.$panier['qte'][$num].'">
          
          <td id="sup" class="supprimer"  >
                <a href="index.php?page=supprimer&id_plat='. $num.'";>
              <i  class="fas fa-trash-alt text-danger"></i></a>
          </td></tr>';
        
            }
    */
              echo
              '<th scope="row" class="text-success">Total</th>
        <td></td>
        <td></td>
        <td >' . $totalAmount->getTotal() . ' €</td>
        <td >' . $quantitePlats . '</td>
        <td></td>';
            }

              ?>

              </tbody>
          </table>

          <label for="date_de_commande">Date de commande
            <input type="date" name="date_de_commande" id="date_de_commande" value="">
          </label>
          <label for="date_de_livraison">Date de livraison
            <input type="date" name="date_de_livraison" id="date_de_livraison" value="">
          </label>
          <input type="hidden" id="id_client_" name="id_client_commande" value="<?= $_SESSION['id_client'] ?>">

          <button type="submit" id="dateDeCommande" role="button" name="date" class="btn btn-outline-success">Commander</a>
        </form>

        <div id="return"></div>
    </div>
  </div>
</section>