<!DOCTYPE html>
<html lang="en">
  <head>
  <?php
  session_start();
include('connect.php');
?>
    <meta charset="utf-8">
    <title>Fitbox- Mon compte</title>
    <!-- Viewport-->
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>


  <!-- Body-->
  <body>
  <?php include('header.php') ?> 
    

    <!-- Page wrapper for sticky footer -->
    <!-- Wraps everything except footer to push footer to the bottom of the page if there is little content -->
    <main class="cs-page-wrapper">
      <!-- Breadcrumb -->
      <nav id="bg-grey" class=" bg-secondary mb-3" aria-label="breadcrumb">
        <div class="container">
          <ol class="breadcrumb breadcrumb-alt mb-0 justify-content-center font-weight-bold">
            
  
            <li class="breadcrumb-item justify-content-center" aria-current="page">Mon Profile</li>
          </ol>
        </div>
      </nav>
      <!-- Page container -->
      <section class="container pt-3 pt-lg-4 pb-5 pb-lg-6">
        <div class="row pb-2 pb-lg-0">
          <?php
              /*  Login/register  */
              if (!isset($_SESSION['nom_user']) || empty($_SESSION['nom_user'])){  ?>
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
                                {
                                    $id=$_SESSION['id_user'];
                                    
                                    $sql = "SELECT * FROM utilisateur WHERE id_user='$id' ";
                                    $query_run = mysqli_query($con, $sql);
                                
                                    foreach($query_run as $row)
                                    {
                                      


                     echo $row['nom_user'];
                     echo "&nbsp;&nbsp;" .$row['prenom_user'];?></h5>
                    <p class="card-text text-muted mb-lg-0"><?php echo  $row['email'] ?></p>
                    <a href="#account-menu" class="btn btn-primary btn-block d-lg-none" data-toggle="collapse">Account Menu</a>
                  </div>
                  <div id="account-menu" class="collapse d-lg-block">
                    <div class="list-group list-group-flush border-top">
                      <a href="mon-compte.php" class="list-group-item list-group-item-action d-flex align-items-center active">
                        <i class="cxi-profile font-size-lg mr-2"></i>
                        <span>My profile</span>
                      </a>
                      <a href="mescommandes.php" class="list-group-item list-group-item-action d-flex align-items-center ">
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
            <div class="d-flex align-items-center justify-content-between mb-4 pb-1 pb-sm-3">
              <h1 class="h2 mb-0">Mon Compte</h1>
              <a href="mon-compte.php" class="btn text-danger btn-link font-size-base text-decoration-none pr-0">
                <i class="cxi-delete font-size-lg mt-n1 mr-2"></i>
                Delete account
              </a>
            </div>

            <form method="post" action="account.php">
              <div class="row pb-3">
                <div class="col-sm-6 form-group">
                  <label for="ac-fn">Nom</label>
                  <input type="text" name="nom" id="ac-fn" class="form-control form-control-lg" value="<?php echo $row['nom_user']?>">
                </div>
                <div class="col-sm-6 form-group">
                  <label for="ac-ln">Prénom</label>
                  <input type="text" name="prenom" id="ac-ln" class="form-control form-control-lg" value="<?php echo $row['prenom_user']?>">
                </div>
                <div class="col-sm-6 form-group">
                  <label for="ac-email">Email</label>
                  <input type="email" name="email" id="ac-email" class="form-control form-control-lg" value="<?php echo $row['email']?>">
                </div>
                <div class="col-sm-6 form-group">
                  <label for="ac-phone">Téléphone</label>
                  <input type="text" id="ac-phone" name="telephone" class="form-control form-control-lg" value="<?php echo $row['telephone']?>">
                </div>
                <div class="col-sm-6 form-group">
                  <label for="ac-password">Nouveau mot de passe</label>
                  <div class="cs-password-toggle input-group-overlay">
                    <input type="password" id="ac-password" class="form-control form-control-lg" name="password">
                    <div class="input-group-append-overlay">
                      <label class="btn cs-password-toggle-btn input-group-text">
                        <input type="checkbox" class="custom-control-input" >
                        <i class="cxi-eye cs-password-toggle-indicator"></i>
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
                        <i class="cxi-eye cs-password-toggle-indicator"></i>
                        <span class="sr-only">Afficher le mot de passe</span>
                      </label>
                    </div>
                  </div>
                </div>
                
                <div class="col-sm-6 form-group">
                  <label for="ac-address">Adresse</label>
                  <input type="text" id="ac-address" name="adresse" class="form-control form-control-lg" value="<?php echo $row['adresse']?>">
                </div>
                <div class="col-sm-6 form-group">
                  <label for="ac-zip">Code Postale</label>
                  <input type="text" id="ac-zip" name="cp" class="form-control form-control-lg" value="<?php echo $row['cp']?>">
                </div>
              </div>
              <button type="submit" name="edit-profile" class="btn btn-primary btn-lg">&nbsp;Sauvegarder les modifications &nbsp;</button>
            </form>
            <?php
                }
            }
        ?>
          </div>

        </div>
      </section>
    </main>


      <?php 
}
?>
    </footer>


    <!-- Back to top button-->
    <a class="btn-scroll-top" href="#top" data-scroll data-fixed-element>
      <span class="btn-scroll-top-tooltip text-muted font-size-sm mr-2">Top</span>
      <i class="btn-scroll-top-icon cxi-angle-up"></i>
    </a>

    

  </body>
</html>