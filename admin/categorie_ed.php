<?php
include('connect.php');
$v1=rand(1111,9999);
$v2=rand(1111,9999);
$v3=$v1.$v2;


if(isset($_POST['delete_btn']))
{

    $id = $_POST['delete_id'];
    
        $sql = "DELETE FROM plat WHERE id_plat='$id' ";
        $result=mysqli_query($con,$sql);
        echo"<script>alert('Suppression de plat avec success')</script>";
        echo "<script>window.location.href='plat.php'</script>";   
}

if(isset($_POST['delete_btn']))
{

    $id = $_POST['delete_id'];
    
        $sql = "DELETE FROM plat WHERE id_plat='$id' ";
        $result=mysqli_query($con,$sql);
        echo"<script>alert('Suppression de plat avec success')</script>";
        echo "<script>window.location.href='plat.php'</script>";   
}


if(isset($_POST['supr_cat']))
{

    $id = $_POST['supr_id'];
    
        $sql = "DELETE FROM categorie WHERE id_cat ='$id' ";
        $result=mysqli_query($con,$sql);
        echo"<script>alert('Suppression de categorie  avec success')</script>";
        echo "<script>window.location.href='categorie.php'</script>";   
}


if(isset($_POST['modifbtncat']))
{
    $id = $_POST['id_categorie'];
    $nomcat = $_POST['edit_categorie'];
    $descr = $_POST['edit_descrcat'];
    $fn=$_FILES["fileup"];
    $sql = "UPDATE categorie SET nom_cat='$nomcat', descrip_cat='$descr' WHERE id_cat='$id' ";
    $result=mysqli_query($con,$sql);
   echo"<script>alert('Mise a jour de catégorie avec success')</script>";
   echo "<script>window.location.href='categorie.php'</script>";  
 }



 if(isset($_POST['modifbtnplat']))
{
    $id = $_POST['id_plat'];
    $nomplat = $_POST['nomplat'];
    $prix = $_POST['prixplat'];
    $nbrcal = $_POST['nbrcal'];
    $graisse = $_POST['graisse'];
    $proteine = $_POST['proteine'];
    $ingredients = $_POST['ingredients'];
    $fn=$_FILES["fileup"]["name"];
    $dst="./productimg/".$v3.$fn;
    $dst1="productimg/".$v3.$fn;
    move_uploaded_file($_FILES["fileup"]["tmp_name"],$dst);

    $sql = "UPDATE plat SET nomplat='$nomplat', prix='$prix' , nbr_calories='$nbrcal', ingredients='$ingredients' , graisse='$graisse' , proteine='$proteine' image='$dst1' WHERE id_plat='$id' ";
    //$result=mysqli_query($con,$sql);
   echo"<script>alert('Mise a jour de plat avec success')</script>";
  echo "<script>window.location.href='plat.php'</script>";  
 }
?>