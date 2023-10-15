<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once("header.php") ?></php>
<title>Fitbox.tn - Contacter Nous</title>
</head>
<body id="page-top">
<div id="wrapper">
<?php include_once("nav.php") ?></php>
 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Contacter Nous</h1>
   
</div>
<!-- Show product data -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Plats</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <?php
                $query = "SELECT * FROM contact";
                $query_run = mysqli_query($con, $query);
            ?>
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">                    <thead>
                 <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Email</th>
                                            <th>Sujet</th>
                                            <th>Message</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Email</th>
                                            <th>Sujet</th>
                                            <th>Message</th>
                                        </tr>
                                    </tfoot>
                    <tbody>
                        <?php
                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                        ?>
                            <tr>
                                <td scope="row"><?php  echo $row['nom']; ?></td>
                                <td><?php  echo $row['email']; ?></td>
                                <td><?php  echo $row['sujet']; ?></td>
                                <td><?php  echo $row['message']; ?></td>
                               
                                
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