function addPlat(id_plat)
{
    var qte =  document.getElementById("qte").value;
    var id_plat =  document.getElementById("id_plat").innerText;
    var plat =  document.getElementById("plat").innerText;
    var prix =  document.getElementById("prix").innerText;
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





