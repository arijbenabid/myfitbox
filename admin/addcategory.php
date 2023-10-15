<?php
    include "connect.php";
   $fn=$_FILES["fileup"]["name"];
 $v1=rand(1111,9999);
 $v2=rand(1111,9999);
 $v3=$v1.$v2;
 $v3= md5($v3);
 $categorie = $_POST['categorie'];
 $descr = $_POST['desc'];
 

 if ($con->connect_error)
    {
         die('Connection Failed : ');
    }
    
    else
    {
        
      
         $dst="./productimg/".$v3.$fn;
         $dst1="productimg/".$v3.$fn;
         move_uploaded_file($_FILES["fileup"]["tmp_name"],$dst);
         $sql= "INSERT INTO categorie(nom_cat,descrip_cat,imgcat) values('$categorie','$descr','$dst1')";
         mysqli_query($con, $sql);
    }

 ?>
<!--
    include "connect.php";
 $categorie = $_POST['categorie'];
 $descr = $_POST['desc'];
 $image = $_POST['imgcat'];
 $sql= "INSERT INTO categorie(nom_cat) values('$categorie')";

      mysqli_query($con,$sql);
         printf("Message d'erreur : %s\n", mysqli_error('mysqli_query'));
       /*   echo"<script>alert('ajout catégorie avec success')</script>";
         echo "<script>window.location.href='categorie.php'</script>"; */
    


 ?> -->