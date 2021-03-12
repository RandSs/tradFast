<div><h1 style="text-align: center;  color: green; opacity:0.7">Nouveauté</h1></div>
<section>




<section>
<div class="container" >
  <div class="card-deck" style="margin-top: 1rem; ">

    <?php
    //la variable $dernierInscription vien de la class controllerAccueil qui contien le resultat du fetch de la fonction 
    // getDernierDixInscription() de la class AccueilModel. 
    foreach ($dernierInscription as $dI) {

      echo
      '<div class="card " style="min-width: 14rem; max-height: 21rem;  margin-top: 1rem;">' .
        '<img class="card-img-top" src="' . $dI["image"] . '"  alt="Card image cap">' .
        '<div class="card-body" >' .
        '<h5 class="card-title">' . strtoupper($dI["nom"]) . " " .  strtoupper($dI["pseudo"]) . '</h5>'.
        '<p class="card-text" style="color:green;"><b>Type de cuisine:' . $dI["cuisine"] . '</b></p>'.
        '<p class="card-text"><small class="text-muted"></small></p>' .
        '<a class="btn btn-outline-success" href="#" role="button" data-toggle="modal" data-target="#exampleModalLong">Voir menue</a>' .
        '</div></div>';
    }

    ?>


  </div>
  </section>