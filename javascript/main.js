function addPlat(id_plat)
{

    var id_plat =  document.getElementById("id_plat_" + id_plat ).innerText;
    var plat =  document.getElementById("plat_" + id_plat ).innerText;
    var prix =  document.getElementById("prix_"+ id_plat).innerText;
    var qte =  document.getElementById("qte_" + id_plat).value;
    location.href = "index.php?page=addpanier&id_plat=" + id_plat + "&qte=" + qte + "&plat=" + plat + "&prix=" + prix ;

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





