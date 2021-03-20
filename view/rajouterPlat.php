<?php 
echo $message;
   
?>
<section>
<div class="card border-success mb-3 mx-auto" style="max-width: 40rem; margin-top:3rem;">
      <div class="card-header"><h4 class="card-title text-success">Ajouter un Plat</h4></div>

  <div class="card-body">
 
    
        <form action="" method="POST"> 
        <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="plat">Plat</label>
                    <input type="text" class="form-control" id="plat" name="plat" placeholder="Enter plat">
                </div>

                <div class="form-group col-md-6">
                    <label for="prix">Prix</label>
                    <input type="text" class="form-control" id="pseudo" name="prix" placeholder="Enter prix">
                </div>

                <div class="form-group col-md-12">
                    <label for="ingredient">ingrédient</label>
                    <input type="text" class="form-control" id="ingredient" name="ingredient" placeholder="ingredient">
                </div>

                <div class="form-group col-md-6">

                    <label for="typePlat">Type de plat :</label>
                    
                        <select class="border-muted" id="typeDePlat" name="typeDePlat" style=" height: 2rem;">
                            <option class="text-muted" value="">Entrée le type de cuisine</option>
                            <option value="entree">Entrée</option>
                            <option value="main">Main</option>
                            <option value="dessert">Dessert</option>
                        </select>
                       
                </div>

                <div class="form-group col-md-8">
                    <label for="image">Photo du plat</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                
                <div class="col-10">
                    <input type="hidden" class="form-control" id="id_restaurtent" name="id_restaurent" value="<?php $id_restaurent ?>">
                </div>
               
                <div class="form-group"> 
                    <button type="submit" class="btn btn-success" style="float: right;">Ajouter</button>
                </div>
          </div>
        </form>

     </div>
</div>
</section>
