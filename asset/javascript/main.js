/**
 * 
 * @param {intger} id_plat 
 * onclick fonction pour  récuperer les données  avec la superglobal variable $_GET a partir de 
 * la page voirRestaurant.php exactement le Menu pour commnander un plat;
 * et je les transfert vers la page commandeController.php pour les traiter
 * et par la suite je les transfert vers la page addpanier pour les afficher
 * au coté client.
 */
function addPlat(id_plat)
{

    var id_plat =  document.getElementById("id_plat_" + id_plat ).innerText;
    var plat =  document.getElementById("plat_" + id_plat ).innerText;
    var prix =  document.getElementById("prix_"+ id_plat).innerText;
    var qte =  document.getElementById("qte_" + id_plat).value;
    var id_restaurant =  document.getElementById("id_restaurant_" + id_plat).value;

    location.href = "index.php?page=addpanier&id_plat=" + id_plat + "&qte=" + qte + "&plat=" + plat + "&prix=" + prix + "&id_restaurant=" + id_restaurant;

}


/**
 * déclare une fonction jquery pour supprimer les plat placer dans le panier
 * avant de passer la commande.
 */

$(document).ready(function(){
        
$("#sup").on("click", function(){
    alert("es que vous ete sure de vouloir suprimer ce plat?");
 
})

})
