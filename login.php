<script src="alert/dist/sweetalert-dev.js"></script>
<link rel="stylesheet" href="css/alert.css">
<?php
session_start();
$email = $_POST['email'];
$password = $_POST['password'];
include "admin/connect.php";



// Identification Client 

if(isset($_POST['login-btn']))
{
$req = "SELECT * FROM utilisateur WHERE email='$email' AND motdepasse='$password'";
$res=mysqli_query($con,$req);  
if (mysqli_num_rows($res) == 1) {
  $row = mysqli_fetch_assoc($res);
  if ($row['email'] === $email && $row['motdepasse'] === $password) {
    $_SESSION['nom_user'] = $row['nom_user'];
    $_SESSION['prenom_user'] = $row['prenom_user'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['id_user'] = $row['id_user'];
    $_SESSION['telephone'] = $row['telephone'];
    $_SESSION['cp'] = $row['cp'];
    $_SESSION['adresse'] = $row['adresse'];
   

    echo "<script>window.location.href='javascript:history.go(-1)'</script>";


  }else{
     header("Location: index.php?error=Incorect User name or password");
 
}}

else {
   echo"<script>alert('incorrect user name or password')</script>";
   echo "<script>window.location.href='javascript:history.go(-1)'</script>";
 } 
} 



// Inscription Nouv Client

if(isset($_POST['sinscrire-profile']))
{
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $telephone = $_POST['telephone'];
  $adresse = $_POST['adresse'];
  $cp = $_POST['cp'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  $sql= "INSERT INTO utilisateur 
    (nom_user,prenom_user,telephone,adresse,cp,email,motdepasse) values
    ('$nom','$prenom','$telephone','$adresse','$cp','$email','$password')";
  $result=mysqli_query($con,$sql);
  echo"<script>alert('inscription  avec succès')</script>";
  echo "<script>window.location.href='javascript:history.go(-1)'</script>";

} 
?>