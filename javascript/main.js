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
    var id_restaurent =  document.getElementById("id_restaurent_" + id_plat).value;

    location.href = "index.php?page=addpanier&id_plat=" + id_plat + "&qte=" + qte + "&plat=" + plat + "&prix=" + prix + "&id_restaurent=" + id_restaurent;

    /*
      Ajax.
    url = "index.php?page=addpanier&id_plat=" + id_plat + "&qte=" + qte;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            console.log(xhr.responseText);
        }
       };
    xhr.send();
    */

}
/*
function envoyerData(id_client)
{
   var idPlat = document.getElementById("id_plat_" + id_client).value;
   var idrestaurent = document.getElementById("id_restaurent_" + id_client).value;
   var quantite = document.getElementById("qte_" + id_client).value;
   var id_client = document.getElementById("id_client_" + id_client).value;
   var dateDeLivraison = document.getElementById("date_de_livraison_" + id_client).value;
   var dateDeCommande = document.getElementById("date_de_commande_" + id_client).value;

   location.href = "index.php?page=addpanier&id_client= " + id_client + "&id_restaurent = " + idrestaurent + "&qte= " + quantite + "&id_plat= " + idPlat+   "&dateDeLivrason=" +dateDeLivraison+ "&dateDeCommande=" +dateDeCommande;

}
*/



$(document).ready(function(){

   /* $("#submitCommande").on("click", function(){
   var idPlat = $("#id_plat").val();
   var  idrestaurent = $("#idrestaurent").val();
   var quantite = $("#qte").val();
   var id_client =  $("#id_client").val();
   var dateDeLivraison =  $("#date_de_livraison").val();
   var dateDeCommande =  $("#date_de_commande").val();
   if(idPlat == "" || dateDeCommande == "") {
       $("#return").html("<h4 style='color:red;'> il faut remplir tous les champs Merci!</h4>")
   } else{
       $.ajax({
           url:"panierSql.php",
           method:"POST",
           data:$("#data"),
           success: function(data){
               $("#data").trigger("reset");
               $("return").fadeIn().html(data);
               setTimeout(function(){
                   $("#return").fadeOut("slow");
               }, 60000);
           }
       });
    }

    })*/
})
