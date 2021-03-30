
$(document).ready(function(){
//formulair de recherche pour envoyer les type de cuisine.

    $("#chinese").click(function(){
        $("#chineseForm").submit();
    }); 

   $("#italian").click(function(){
        $("#italianForm").submit();
    }); 

    $("#african").click(function(){
        $("#africanForm").submit();
    }); 


    $("#maghrebine").click(function(){
        $("#maghrebForm").submit();
    }); 


    $("#gastro").click(function(){
        $("#gastroForm").submit();
    }); 

    $("#indian").click(function(){
        $("#indianForm").submit();
    }); 





  $(".placerAuP").on("click", function(){
      var valeur = $("#id_plat").text();
      var button = $("#button").html(  "<button type = 'submit' id='submit' name='commande'>Commande<button></form>");
      var inputValeur = "<form id='commandeForm' method='GET' >" +
      "<input type='hidden' name='page' id='page' value='commandePlat' >"+
      "<input type='text' name='plat' id='plat' value= '" + valeur + "' >";

      $("#plat").append(inputValeur);

          $("#submit").on("click", function(){

            $("#commandeForm").submit();
          })


      }) 

      $(".placerAuPannier").on("click", function(){
        var valeur = $("#id_plateau").text();
        var button = $("#button").html(  "<button type = 'submit' id='submit' name='commande'>Commande<button></form>");
        var inputValeur = "<form id='commandeForm' method='GET' >" +
        "<input type='hidden' name='page' id='page' value='commandePlat' >"+
        "<input type='text' name='plat' id='plat' value= '" + valeur + "' >";
  
        $("#plat").append(inputValeur);
  
            $("#submit").on("click", function(){
  
              $("#commandeForm").submit();
            })
  
  
        }) 
  

    
      





});


