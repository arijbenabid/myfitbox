<?php
include "connect.php";

$sql = "SELECT categorie.id_cat,nom_cat,descrip_cat,image_cat,nomplat,prix,nbr_calories,ingredients,image,plat.id_cat,id_plat from categorie,plat
               where  categorie.id_cat=plat.id_cat and categorie.id_cat='1' and plat.id_cat='1'";
   $result = mysqli_query($con, $sql);
   
   $ligne = mysqli_fetch_array($result, MYSQLI_NUM);
   $result2 = mysqli_query($con, $sql) or die(mysqli_error($con));

if (isset($_REQUEST['perte'])) {
   
   $sql = "SELECT categorie.id_cat,nom_cat,descrip_cat,image_cat,nomplat,prix,ingredients,nbr_calories,image,plat.id_cat,id_plat from categorie,plat
               where  categorie.id_cat=plat.id_cat and categorie.id_cat='1' and plat.id_cat='1'";
   $result = mysqli_query($con, $sql);
   if (!$result) {
      printf("Error: %s\n", mysqli_error($con));
      exit();
   }

   $ligne = mysqli_fetch_array($result, MYSQLI_NUM);
   $result2 = mysqli_query($con, $sql) or die(mysqli_error($con));
} else if (isset($_REQUEST['gain'])) {
  
   $sql = "SELECT categorie.id_cat,nom_cat,descrip_cat,image_cat,nomplat,prix,ingredients,nbr_calories,image,plat.id_cat,id_plat from categorie,plat
               where  categorie.id_cat=plat.id_cat and categorie.id_cat='2' and plat.id_cat='2'";
   $result = mysqli_query($con, $sql);
   if (!$result) {
      printf("Error: %s\n", mysqli_error($con));
      exit();
   }
   $ligne = mysqli_fetch_array($result, MYSQLI_NUM);
   $result2 = mysqli_query($con, $sql) or die(mysqli_error($con));
} else if (isset($_REQUEST['mantien'])) {
   
   $sql = "SELECT categorie.id_cat,nom_cat,descrip_cat,image_cat,nomplat,prix,ingredients,nbr_calories,image,plat.id_cat,id_plat from categorie,plat
                   where  categorie.id_cat=plat.id_cat and categorie.id_cat='3' and plat.id_cat='3'";
   $result = mysqli_query($con, $sql);
   if (!$result) {
      printf("Error: %s\n", mysqli_error($con));
      exit();
   }
   $ligne = mysqli_fetch_array($result, MYSQLI_NUM);
   $result2 = mysqli_query($con, $sql) or die(mysqli_error($con));
}

