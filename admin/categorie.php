<?php

include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
 .imgcat{width: 205px; height: 150px; margin-bottom: 10px; box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important; border:6px solid #f7f7f7;}
</style>
<?php include_once("header.php") ?></php>
<title>Fitbox.tn - Ajout Catégorie</title>
</head>
<body id="page-top">
<div id="wrapper">
<?php include_once("nav.php") ?></php>
 <!-- Begin Page Content -->
 <div class="container-fluid">



<!-- Content Row -->



<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ajout d'un Catégorie</h1>
   
</div>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajout d'un Categorie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="addcategory.php" enctype="multipart/form-data" method="POST">

        <div class="modal-body">

   
  <div class="form-group">
  <label for="nomcat">Nom de Categorie</label>
    <input type="text" class="form-control" id="nomcat" name="categorie" placeholder="Nom de categorie">
    </br>
    </br>
    <label for="descr">Description de Categorie</label>
    <input type="text" class="form-control" id="descr" name="desc" placeholder="Descriptio de Categorie">
    </br>
    </br>
    <label for="fileup">Image de Categorie</label>
    <input type="file" class="form-control" id="fileup" name="fileup">
</br>
    
  </div>
        </div>
        <div class="modal-footer">
            <button type="reset" class="btn btn-warning" data-dismiss="modal">Cancel</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Ajouter une Catégorie</button>
        </div>
      </form>

    </div>
  </div>
</div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
       Ajouter une Catégorie
</button>





</br> 
</br>





<!-- Show Categorie data -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Catégories</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <?php
                $query = "SELECT * FROM categorie";
                $query_run = mysqli_query($con, $query);

            ?>
                <table class="table table-bordered" id="dataTable"  cellspacing="0">
                    <thead>
                        <tr>
                            <th> Id Catégorie </th>
                            <th> Nom Catégorie </th>
                            <th> Description Catégorie </th>
                            <th> Image Categrorie </th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                        ?>
                            <tr>
                                <td><?php  echo $row['id_cat']; ?></td>
                                <td><?php  echo $row['nom_cat']; ?></td>
                                <td><?php  echo $row['descrip_cat']; ?></td>

                               <div class="img"><td><?php  echo  '<img src="./'.( $row['image_cat'] ).'"/>';?></td></div>
          
                                <td>
                                    <form action="edit_categorie.php" method="post">
                                        <input type="hidden" name="modif_id" value="<?php echo $row['id_cat']; ?>">
                                        <button type="submit" name="modif_btn" class="btn btn-success"> Modifier</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="categorie_ed.php" method="POST">
                                        <input type="hidden" name="supr_id" class="imgcat" value="<?php echo $row['id_cat']; ?>">
                                        <button type="submit" name="supr_cat" class="btn btn-danger"> Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                            } 
                        }
                        
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>






</body>
<?php include_once("footer.php") ?></php>
<form 