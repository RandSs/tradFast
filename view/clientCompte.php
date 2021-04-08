<h1>Mon panier </h1>
<pre>
  <?php 
  session_start();
  print_r($panier);
  ?>
</pre>
<section class="container" >

  <div class="card" >

    <div class="card-body">
      <h5 class="card-title text-success">Panier</h5>
      

      <table class="table">

        <thead class="thead-light"> 

       
      
          <tr>
            <th scope="col" >N°</th>
            <th scope="col"  >Id plat </th>
            <th scope="col" >Plat </th>
            <th scope="col" >Prix </th>
            <th scope="col" >Qte</th>
            <th scope="col"  >Sup</th>
          
          </tr>

              </thead>
        <tbody>
        <tr>
        <?php  
        

        $num = 1;

         foreach ( $panier as  $keys => $values  ) {  ?>
    
              
          <?php $num++;  }?>
   
                <td>
                    <a href ="index.php?page=clientCompte" >
                   <i class="fas fa-trash-alt text-danger"></i></a>
                  </td>

             
               

            </tr>

            

        
        </tbody>
      </table>

      <a href="#" class="btn btn-outline-success">Commander</a>
    </div>
  </div>
</section>