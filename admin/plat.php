<style>
 .imgplat{width: 205px; height: 150px; margin-bottom: 10px; box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important; border:6px solid #f7f7f7;}
</style>
<?php
include "connect.php";
$query="SELECT id_cat, nom_cat FROM categorie";
$result= mysqli_query($con, $query);


?>




<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once("header.php") ?></php>
<title>Fitbox.tn - Ajout Plat</title>
</head>
<body id="page-top">
<div id="wrapper">
<?php include_once("nav.php") ?></php>
 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ajout d'un plat</h1>
   
</div>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajout plat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="addproduit.php" method="post" enctype="multipart/form-data">

        <div class="modal-body">

   
  <div class="form-group">
    <label for="nomp">Nom de Plat</label>
    <input type="text" class="form-control" id="nomp" name="nomp" placeholder="Nom de Plat">
</br>
</br>
    <label for="prixplat">Prix de Plat</label>
    <input type="number" class="form-control" id="prixplat" name="prixplat" placeholder="Prix de Plat(en DT) ">

    </br>
</br>
    <label for="nbrcal">Nombre de Calorie</label>
    <input type="number" class="form-control" id="nbrcal" name="nbrcal" placeholder="Nombre de calories de ce plat">

    </br>
    </br>
    <label for="nbrcal">Igredients</label>
    <input type="textno" class="form-control" id="nbrcal" name="ingredients" placeholder="Nombre de calories de ce plat">

    </br>
</br>
    <label >Categorie de Plat</label></br>
    <select name="category">
    <?php while ($row1=mysqli_fetch_array($result)); ?>


        <option default>select a category</option>
        <?php foreach ($result as $key => $value){ ?>
            <option value="<?=$value['id_cat'] ;?>"><? echo $value['nom_cat']  ?></option>
        <?php } ?>
    </select>

    </br>
</br>

    <label for="fileup">Photo Plat</label>
    <input type="file" class="form-control" id="fileup" name="fileup">

  </div>


        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-secondary" data-dismiss="modal">Save</button>
            <button type="submit" name="registerbtn" class="btn btn-primary" >Ajout Plat</button>
        </div>
      </form>

    </div>
  </div>
</div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
       Ajout Plat
</button>





</br> 
</br>


<!-- Show product data -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Plats</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <?php
                $query = "SELECT * FROM plat";
                $query_run = mysqli_query($con, $query);
            ?>
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col"> Id de Plat </th>
                            <th scope="col"> Nom Plat </th>
                            <th scope="col">Nombre de calories </th>
                            <th scope="col">ID Categorie</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Image</th>
                            <th scope="col">Modifier</th>
                            <th scope="col">Supprimer</th>
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
                                <td scope="row"><?php  echo $row['id_plat']; ?></td>
                                <td><?php  echo $row['nomplat']; ?></td>
                                <td><?php  echo $row['nbr_calories']; ?></td>
                                <td><?php  echo $row['id_cat']; ?></td>
                                <td><?php  echo $row['prix']; ?></td>
                               <div class=""><td clas=><?php  echo  '<img class=" imgplat"src="./'.( $row['image'] ).'"/>';?></td></div>
                                <td>
                                    <form action="modif_plat.php" method="POST">
                                        <input type="hidden" name="modi_id" value="<?php echo $row['id_plat']; ?>">
                                        <button type="submit" name="modif_plat" class="btn btn-success"> EDIT</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="categorie_ed.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['id_plat']; ?>">
                                        <button type="submit" name="delete_btn" class="btn btn-danger"> Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                            } 
                        }
                        else {
                            echo "No Record Found";
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
<form>