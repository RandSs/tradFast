<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

  <link rel="stylesheet" href="css/style.css">
  
  <title>trad Fast</title>
</head>

<body id="body">
  <header id="header"> 
    <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="index.php?page=accueil" style="color:  rgb(127, 255, 8); font-size:3rem; margin-right:8rem;">TradfasT</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      


      <div>
      
        <form class="form-inline my-2 my-lg-0" method="GET">
          <input type="hidden" name="page" value="recherche" >
          <input class="form-control mr-sm-2" type="search" name ="search"  id="search" placeholder="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>

    
              
                      
                              
                              
                   
      
               <div class="dropdown show   " style="margin-left: 1rem;">


                <a class="btn btn-outline-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Type de cuisine
                </a>

              <div class="dropdown-menu " aria-labelledby="dropdownMenuLink" >

                <form style="margin-left: auto;"   id="chineseForm" action="" method="get">
                  
                  <input type="hidden" name="page" value="typeDecuisine">
                  <input type="hidden" name="tCuisine" id="tCuisine" value="chinese">
                  <a  role="button"   type="submit" class="dropdown-item btn btn-outline-success " id="chinese"   href="#">Chinese</a>
      
              </form>  

              <form style="margin-left: auto;"   id="italianForm" action="" method="get">
                  
                  <input type="hidden" name="page" value="typeDecuisine">
                  <input type="hidden" name="tCuisine" id="tCuisine" value="italian">
                  <a  role="button"   type="submit" class="dropdown-item btn btn-outline-success " id="italian"   href="#">Italian</a>
      
              </form>  


             

              <form style="margin-left: auto;"   id="maghrebForm" action="" method="get">
                  
                  <input type="hidden" name="page" value="typeDecuisine">
                  <input type="hidden" name="tCuisine" id="tCuisine" value="maghrebine">
                  <a  role="button"   type="submit" class="dropdown-item btn btn-outline-success " id="maghrebine"   href="#">Maghrebine</a>
      
              </form>  

              <form style="margin-left: auto;"   id="gastroForm" action="" method="get">
                  
                  <input type="hidden" name="page" value="typeDecuisine">
                  <input type="hidden" name="tCuisine" id="tCuisine" value="gastronomie francaise">
                  <a  role="button"   type="submit" class="dropdown-item btn btn-outline-success " id="gastro"   href="#">Gastronomie francaise</a>
      
              </form>  

              <form style="margin-left: auto;"   id="indianForm" action="" method="get">
                  
                  <input type="hidden" name="page" value="typeDecuisine">
                  <input type="hidden" name="tCuisine" id="tCuisine" value="indian">
                  <a  role="button"   type="submit" class="dropdown-item btn btn-outline-success " id="indian"   href="#">Indian</a>
      
              </form>  

              <form style="margin-left: auto;"   id="africanForm" action="" method="get">
                  
                  <input type="hidden" name="page" value="typeDecuisine">
                  <input type="hidden" name="tCuisine" id="tCuisine" value="autre">
                  <a  role="button"   type="submit" class="dropdown-item btn btn-outline-success " id="african"   href="#">Autre</a>
      
              </form>  

              </div>
            </div>
         


  
            <div class="collapse navbar-collapse" id="navbarColor01" style="margin-left: 4rem;">
        <ul class="navbar-nav mr-auto my-lg-0 " >
                <li class="nav-item  ">
                  <a class="nav-link" style="color:  rgb(127, 255, 8);" href="index.php?page=accueil" >Accueil
                    <span class="sr-only">(current)</span>
                  </a>
                </li>
  <?php if(isset($_SESSION['id_restaurent'])) { ?>    

    <?php if($_SESSION['id_role']==1 )  { ?> 
       
                <li class="nav-item">
                  <a class="nav-link"  style="color: rgb(127, 255, 8);" href="index.php?page=admin">Admin</a>
                </li>
    <?php } ?>            
                 <li class="nav-item">
                  <a class="nav-link"  style="color: rgb(127, 255, 8);" href="index.php?page=restaurentCompte">
                      <?php echo ucfirst($_SESSION['pseudo']); ?>
                </a>
                </li>

              

                <li class="nav-item">
                  <a class="nav-link"  style="color: rgb(127, 255, 8);"  href="#" >Menue</a>
                </li>

              

                <li class="nav-item">
                  <a class="nav-link"  style="color: rgb(127, 255, 8);" href="index.php?page=modifier">Modifier</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link"  style="color: rgb(127, 255, 8);" href="index.php?page=contact">
                      Contact
                </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link"  style="color: rgb(127, 255, 8);" href="index.php?page=signOut">Sign off</a>
                </li>

                <?php }elseif (isset($_SESSION["id_client"])) { ?>
                <li class="nav-item">
                  <a class="nav-link"  style="color: rgb(127, 255, 8);" href="index.php?page=clientCompte">
                      <?php echo ucfirst($_SESSION['nom_client']); ?>
                </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link"  style="color: rgb(127, 255, 8);" href="index.php?page=clientCompte"  >
                      Pannier
                </a>
                </li>
              

                <li class="nav-item">
                  <a class="nav-link"  style="color: rgb(127, 255, 8);" href="index.php?page=contact">
                      Contact
                </a>
                </li>
                 
                <li class="nav-item">
                  <a class="nav-link"  style="color: rgb(127, 255, 8);" href="index.php?page=signOut">Sign off</a>
                </li>
              
                <?php } else { ?>
                <li class="nav-item">
                  <a class="nav-link" style="color: rgb(127, 255, 8);" href="index.php?page=inscriptionRestaurent">Restaurent</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" style="color: rgb(127, 255, 8);" href="index.php?page=inscriptionClient">Client</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link"  style="color: rgb(127, 255, 8);" href="index.php?page=signIn">Sign In</a>
                </li>

              
        </ul>
                <?php } ?>
       

      </div>
    </nav>
  </header>
