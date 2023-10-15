<?php
session_start();
include('admin/connect.php');

if(isset($_POST['changeqte']))
{   $qte=$_POST['qte'];
    $c=$_POST['order'];
    echo "$c";
    
    $sql = "UPDATE etre_commande 
            SET Qte='$qte'
            WHERE id_cmd='$c' ";


        $result=mysqli_query($con,$sql);
        echo"<script>alert('Mise à jour avec succès')</script>";
        echo "<script>window.location.href='javascript:history.go(-1)'</script>";

   
    
}

if(isset($_POST['edit-profile']))
{
    $id=$_SESSION['id_user'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $cp = $_POST['cp'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "UPDATE utilisateur 
            SET nom_user='$nom', prenom_user='$prenom' , telephone='$telephone', adresse='$adresse' , cp='$cp', email='$email', motdepasse='$password'
            WHERE id_user='$id' ";


        $result=mysqli_query($con,$sql);
        echo"<script>alert('Mise à jour avec succès')</script>";
        echo "<script>window.location.href='javascript:history.go(-1)'</script>";
    
}


?>