<?php
include "admin/connect.php";
session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Fitbox.tn - Mes Commandes</title>


    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

   

    <!-- icons-->
    <link rel="stylesheet" media="screen" href="style.css"/>
    <link rel="stylesheet" media="screen" href="s.css"/>

    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="bootstrap.css">

  </head>


  <!-- Body-->
  <body>
  <?php include('header.php');
   ?> 
    

    <!-- Page wrapper for sticky footer -->
    <main class="cs-page-wrapper">
      <!-- Breadcrumb -->
      <nav id="bg-grey" class=" bg-secondary mb-3" aria-label="breadcrumb">
        <div class="container">
          <ol class="breadcrumb breadcrumb-alt mb-0 justify-content-center font-weight-bold">
            
  
            <li class="breadcrumb-item justify-content-center" aria-current="page">Mes Commandes</li>
          </ol>
        </div>
      </nav>
      <!-- Page container -->
      <section class="container pt-3 pt-lg-4 pb-5 pb-lg-6">
        <div class="row pb-2 pb-lg-0">
          <?php
              /*  Login/register  */
              if (empty($_SESSION['nom_user'])){  ?>
 <div class="container login-container " id="login">
            <div class="row ">
                <div class="col-md-6  mb-5 login-form-1">
                    <h3 class="text-primary">S'identifier</h3>
                    <form method="post" action="login.php">
              <div class="row pb-3 ">
                <div class="col-sm-6 form-group">
                  <label for="ac-email">Email</label>
                  <input type="email" name="email" id="ac-email" class="form-control form-control-lg">
                </div>
                <div class="col-sm-6 form-group">
                  <label for="ac-password">mot de passe</label>
                  <div class="cs-password-toggle input-group-overlay">
                    <input type="password" id="ac-password" class="form-control form-control-lg" name="password">
                    <div class="input-group-append-overlay">
                      <label class="btn cs-password-toggle-btn input-group-text">
                        <input type="checkbox" class="custom-control-input" >
                        <i class="cxi-eye cs-password-toggle-indicator" id="togglePassword"></i>
                        <span class="sr-only">Afficher le mot de passe</span>
                      </label>
                    </div>
                  </div>
                </div>
                
              </div>
              <button type="submit" name="login-btn" class="btn btn-primary btn-lg">&nbsp; s'identifier &nbsp;</button>
            </form>
                </div>
                
                <div class="col-md-6 login-form">
                    <h3 class="text-primary">S'inscrire</h3>
                    <form method="post" action="login.php">
              <div class="row pb-3">
                <div class="col-sm-6 form-group">
                  <label for="ac-fn">Nom</label>
                  <input type="text" name="nom" id="ac-fn" class="form-control form-control-lg" >
                </div>
                <div class="col-sm-6 form-group">
                  <label for="ac-ln">Prénom</label>
                  <input type="text" name="prenom" id="ac-ln" class="form-control form-control-lg" >
                </div>
                <div class="col-sm-6 form-group">
                  <label for="ac-email">Email</label>
                  <input type="email" name="email" id="ac-email" class="form-control form-control-lg">
                </div>
                <div class="col-sm-6 form-group">
                  <label for="ac-phone">Téléphone</label>
                  <input type="text" id="ac-phone" name="telephone" class="form-control form-control-lg">
                </div>
                <div class="col-sm-6 form-group">
                  <label for="ac-phone">Date de Naissance</label>
                  <input type="date" id="ac-phone" name="date" class="form-control form-control-lg">
                </div>
                <div class="col-sm-6 form-group">
                  <label for="ac-password">Mot de passe</label>
                  <div class="cs-password-toggle input-group-overlay">
                    <input type="password" id="ac-password" class="form-control form-control-lg" name="password">
                    <div class="input-group-append-overlay">
                      <label class="btn cs-password-toggle-btn input-group-text">
                        <input type="checkbox" class="custom-control-input" >
                        <i class="cxi-eye cs-password-toggle-indicator" id="togglePassword"></i>
                        <span class="sr-only">Afficher le mot de passe</span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 form-group">
                  <label for="ac-password-confirm">Confirmer le mot de passe</label>
                  <div class="cs-password-toggle input-group-overlay">
                    <input type="password" id="ac-password-confirm" class="form-control form-control-lg">
                    <div class="input-group-append-overlay">
                      <label class="btn cs-password-toggle-btn input-group-text">
                        <input type="checkbox" class="custom-control-input">
                        <i class="cxi-eye cs-password-toggle-indicator" id="togglePassword"></i>
                        <span class="sr-only">Afficher le mot de passe</span>
                      </label>
                    </div>
                  </div>
                </div>
                
                <div class="col-sm-6 form-group">
                  <label for="ac-address">Adresse</label>
                  <input type="text" id="ac-address" name="adresse" class="form-control form-control-lg">
                </div>
                <div class="col-sm-6 form-group">
                  <label for="ac-zip">Code Postale</label>
                  <input type="text" id="ac-zip" name="cp" class="form-control form-control-lg">
                </div>
              </div>
              <button type="submit" name="sinscrire-profile" class="btn btn-primary btn-lg">&nbsp; S'inscrire &nbsp;</button>
            </form>
                </div>
</div>

<?php }
								/* MY ACCOUNT Info */
else {  ?>
          <!-- Account menu (sticky sidebar) -->
          <aside class="col-xl-3 col-lg-4 pb-3 mb-4 mb-lg-0">
            <div class="sidebar-sticky" data-sidebar-sticky-options='{
              "topSpacing": 120,
              "minWidth": 991
            }'>
              <div class="sidebar-sticky-inner">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title mb-1"><?php
                     echo $_SESSION['nom_user'];
                     echo "&nbsp;&nbsp;" .$_SESSION['prenom_user'];?></h5>
                    <p class="card-text text-muted mb-lg-0"><?php echo  $_SESSION['email'] ?></p>
                    <a href="#account-menu" class="btn btn-primary btn-block d-lg-none" data-toggle="collapse">Account Menu</a>
                  </div>
                  <div id="account-menu" class="collapse d-lg-block">
                    <div class="list-group list-group-flush border-top">
                      <a href="mon-compte.php" class="list-group-item list-group-item-action d-flex align-items-center">
                        <i class="cxi-profile font-size-lg mr-2"></i>
                        <span>My profile</span>
                      </a>
                      <a href="mescommandes.php" class="list-group-item list-group-item-action d-flex align-items-center active">
                        <i class="cxi-bag font-size-lg mr-2"></i>
                        <span>Mes Commandes</span>
                      </a>
                      <a href="logout.php" class="list-group-item list-group-item-action d-flex align-items-center">
                        <i class="cxi-logout font-size-lg mr-2"></i>
                        <span>Sign out</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </aside>

          <!-- Content -->
          <div class="col-lg-8 ml-auto">
            <div class="d-flex align-items-center justify-content-between mb-4 pb-sm-2">
              <h1 class="h2 mb-0">My orders</h1>
              <div class="form-inline">
                <label for="sort-orders" class="d-none d-sm-block font-weight-bold mr-2 pr-1">Sort orders</label>
                <select id="sort-orders" class="custom-select">
                  <option>All</option>
                  <option>Delivered</option>
                  <option>In Progress</option>
                  <option>Delayed</option>
                  <option>Canceled</option>
                </select>
              </div>
            </div>

            <!-- Orders accordion -->
            <div class="accordion-alt" id="orders">

              <!-- Order -->
              <div class="card border-bottom">
                <div class="card-header accordion-heading py-1">
                <?php
        
        $id=$_SESSION['id_user'];
        $req = "SELECT * FROM commande WHERE  id_user=$id";
        $rep =mysqli_query($con,$req);
        while (($row=mysqli_fetch_array($rep,MYSQLI_BOTH))!=null){
            $str = "SELECT * from commande,etre_commande WHERE  id_user=$id AND commande.id_cmd=etre_commande.id_cmd ";
$repstr=mysqli_query($con,$str);
while(($rowomk=mysqli_fetch_array($repstr,MYSQLI_BOTH))!=null){}

echo"            <div class='card border-bottom'>
                  <div class='card-header accordion-heading py-1'>
                    <a href='#' class='d-flex flex-wrap justify-content-between py-3' data-toggle='collapse' aria-expanded='true'>
                    <span class='pr-2'># 34BV66".$row['id_cmd']."</span>
                    <span class='font-size-sm text-muted text-nowrap px-2'>
                      <i class='cxi-clock font-size-base align-middle mt-n1 mr-1'></i>
                      ".$row['date_cmd']."
                      
                    </span> 
                    <span class='badge badge-info'>".$row['statuscmd']."</span>
                    <span class='text-dark pl-1'>".$row['total']." DT</span>
                  </a>
                  <table class='table mb-0'>
                </div>
                <div>
                <div class='rounded mb-4'>
                  <div class='table-responsive'>
                  ";
                  $cmd=$row['id_cmd'];
                  $str = "SELECT * from plat,etre_commande WHERE id_cmd=$cmd AND etre_commande.id_plat=plat.id_plat ";
                  $repstr=mysqli_query($con,$str);;
                  while($row = mysqli_fetch_array($repstr)) {
                    $_SESSION['cmd'] = $row['id_cmd'];
                    echo "
                    
                      <tbody>
                        <tr>
                        <td class='border-top-0'>
                              <div class='media pl-2 py-2'>
                                <a href='#' style='min-width: 80px;'>
                                  <img src=".$row['image']." width='80' alt='Product thumb'>
                                </a>
                                <div class='media-body pl-3'>
                                  <h3 class='font-size-sm mb-3'>
                                    <a href='' class='nav-link font-weight-bold'>".$row['nomplat']."</a>
                                 
                                  </h3>
                                  <ul class='list-unstyled font-size-xs mt-n2 mb-2'>
                                    <li class='mb-0'><span class='text-muted'>Nombre de Jours :</span> ".$row['jours']."</li>
                                  </ul>
                                </div>
                              </div>
                            </td>
                      <td class='border-top-0'>
                              <div class='py-2'>
                                <div class='font-size-xs text-muted mb-1'>prix:</div>
                                <div class='font-size-sm text-dark'>".$row['prix']." DT</div>
                              </div>
                            </td>
                            <td class='border-top-0 '>
                              <div class='py-2 center-block '>
                              <form method='POST' action='account.php'>
                                <div class='font-size-xs text-muted mb-1'>Quantité:</div>
                                <input type='text 'class='form-control col-2' name='qte' value='".$row['Qte']."'>
                                <input name='order' type='hidden' value=".$row['id_cmd'].">
                              
                                <button class='btn btn-primary btn-sm mt-3' type='submit'  name='changeqte'>change</button>
                              </form>
                              </div>
                            </td>
                          </tr>
                          </tbody>
                          </table>
                          </div>
                          

                ";}}
                    ?>
              
            

           
          </div>
        </div>
      </section>
    </main>


    
      <?php 
}

?>



    <!-- Back to top button-->
    <a class="btn-scroll-top" href="#top" data-scroll data-fixed-element>
      <span class="btn-scroll-top-tooltip text-muted font-size-sm mr-2">Top</span>
      <i class="btn-scroll-top-icon cxi-angle-up"></i>
    </a>

  
    <?php 

include("footer.php")
?>
  </body>
</html>