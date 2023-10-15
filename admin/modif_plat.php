<?php

include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
.form-control{
    margin-bottom: 30px;
}
.imgplat{width: 205px; height: 150px; margin-bottom: 10px; box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important; border:6px solid #f7f7f7;}
</style>
<?php include_once("header.php") ?></php>
<title>Fitbox.tn - Modification d'un plat</title>
</head>
<body id="page-top">
<div id="wrapper">
<?php include_once("nav.php") ?></php>
 <!-- Begin Page Content -->
 <div class="container-fluid">




<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Modification d'un plat</h1>
   
</div>






<!-- Show Categorie data -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Plat</h6>
        </div>


        <form action="categorie_ed.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
        <?php

if(isset($_POST['modif_plat']))
{
    $id = $_POST['modi_id'];
    $sql = "SELECT * FROM plat WHERE id_plat='$id' ";
    $query_run = mysqli_query($con, $sql);

    foreach($query_run as $row)
    {
        ?>
   
         <div class="form-group">

         <label>ID de plat</label>
         <input type="text" class="form-control"  name="id_plat"  value="<?php echo $row['id_plat'] ?>" >
         
         <label>Nom Plat</label>
         <input type="text" class="form-control"  name="nomplat" value="<?php echo $row['nomplat'] ?>">
         
         <label>Prix Plat</label>
         <input type="text" class="form-control" rows="10" name="prixplat" value="<?php echo $row['prix'] ?>" >
        
         <label>Nombre de calories</label>
         <input type="text" class="form-control" rows="10" name="nbrcal" value="<?php echo $row['nbr_calories'] ?>">

         <label>Nombre de graisse</label>
         <input type="text" class="form-control" rows="10" name="graisse" value="<?php echo $row['graisse'] ?>">

         <label>Nombre de proteine</label>
         <input type="text" class="form-control" rows="10" name="proteine" value="<?php echo $row['proteine'] ?>">

         <label>Ingredients</label>
         <input type="text" class="form-control" rows="10" name="ingredients" value="<?php echo $row['ingredients'] ?>">  
        
         <label>Image Plat </label>
         <div class="img"><?php  echo  '<img class="imgplat" src="./'.( $row['image'] ).'"/>';?></div>
         <label for="fileup">Modifier image plat</label>
        <input type="file" class="form-control" id="fileup" name="fileup">
</br>
    
  </div>


        </div>
        <div class="modal-footer">
        <a href="categorie.php" class="btn btn-danger"> Annuler </a>
        <button type="submit" name="modifbtnplat" class="btn btn-primary"> Modifier </button>
        </div>
    </form>
      <?php
                }
            }
        ?>
    </div>

</div>






</body>
<?php include_once("footer.php") ?></php>
<form 