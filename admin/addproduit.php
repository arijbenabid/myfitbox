<?php

include "connect.php";
$v1=rand(1111,9999);
$v2=rand(1111,9999);
$v3=$v1.$v2;
$v3= md5($v3);
$plat = $_POST['nomp'];
$prix = $_POST['prixplat'];
$cal = $_POST['nbrcal'];
$cate = $_POST['category'];
$ingred = $_POST['ingredients'];
if ($con->connect_error)
{
     die('Connection Failed : ');
}

else
{
    $fn=$_FILES["fileup"]["name"];
    $dst="./productimg/".$v3.$fn;
    $dst1="productimg/".$v3.$fn;
    move_uploaded_file($_FILES["fileup"]["tmp_name"],$dst);
    $sql="INSERT INTO plat (nomplat,prix,nbr_calories,id_cat,image,ingredients) VALUES('$plat','$prix','$cal','$cate','$dst1','$ingred')";

    $result=mysqli_query($con,$sql);
    echo "<script>window.location.href='plat.php'</script>";  

}

?>

