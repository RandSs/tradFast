<?php
 
class FileController extends Restaurent
{
   

    public function chargerFile()
    {

    
        if(isset($_FILES['image']))
       
        {
    
            $image_name = $_FILES['image']['name'];
            $image_ext = explode(".",   $image_name );
            $image_ext = strtolower(end($image_ext));
            $image_new_name = uniqid('', true) . '.' .  $image_ext ;
            $image_destination = 'images/' . $image_new_name ;
            $this->image = $image_destination ;

        
             $image_size = $_FILES['image']['size'];
             $image_error =  $_FILES['image']['error'];


            

             $accepted_ext = array("jpg", "png", "jpeg", "gif") ;


             if(in_array( $image_ext,   $accepted_ext ))
             {
                 if($image_error === 0)
                 {
                     if( $image_size <= 10000000)
                     {
                       
                        
                        //echo  $image_destination ;
                         if(!file_exists( $image_destination)){
                             echo "no file!"  ;
                            }

                          if(move_uploaded_file(   $_FILES['image']['tmp_name'] , basename($image_destination)))
                          {
                             echo"move";
                          }
                     
                 }
                }


             }
             

        }

    }









    /*{
 
       var_dump($_FILES);

    if(!empty($_FILES)){
        $nomFichier  = $_FILES["image"]["name"];
    
        $fichier_extension = strrchr($nomFichier , ".");

        $fichier_tmp_name  = $_FILES["image"]["tmp_name"];

        $extensionAccept = array(".jpg", ".png", ".jpeg", ".gif") ;

       $pathRepertoir =   'images/' . basename($nomFichier)  ;

        if(in_array($fichier_extension,  $extensionAccept)){
       echo "extension autorisées!";
          
       if(move_uploaded_file( $fichier_tmp_name   ,    $pathRepertoir ))
       {
           echo "Fichier envoyer avec succés";
       }
       else
       {
           echo "une Erreur est survenue lors de l'envoi du fichier!";
       }

       }

      }

 
   }*/


}