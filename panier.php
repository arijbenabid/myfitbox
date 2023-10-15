<?php
session_start();
if (isset($_GET["action"])) {
  if ($_GET["action"] == "delete") {
    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
      if ($values["item_id"] == $_GET["id"]) {
        unset($_SESSION["shopping_cart"][$keys]);
        echo '<script>window.location="panier.php"</script>';
      }
    }
  }
}
include "connect.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Fitbox.tn Panier</title>


  
  
 
  
</head>

<!-- Body-->

<body>
<?php
include "header.php";
?>

  <main class="cs-page-wrapper">



    <!-- Sign in modal-->
    <div class="modal fade" id="modal-signin" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0">

          <!-- Sign in form -->
          <div class="cs-view show" id="modal-signin-view">
            <div class="modal-header border-0 pb-0 px-md-5 px-4 d-block position-relative">
              <h3 class="modal-title mt-4 mb-0 text-center">Sign in</h3>
              <button type="button" class="close position-absolute" style="top: 1.5rem; right: 1.5rem;" data-dismiss="modal" aria-label="Close">
                <i class="fas fa-times"></i>
              </button>
            </div>
            <div class="modal-body px-md-5 px-4">
              <p class="font-size-sm text-muted text-center">Connectez-vous à votre compte en utilisant l'e-mail et le mot de passe fournis lors de l'inscription.</p>
              
                <div class="form-group">
                  <label for="signin-email">Email</label>
                  <input type="email" class="form-control" id="signin-email" placeholder="Your email address" required>
                </div>
                <div class="form-group">
                  <label for="signin-password" class="form-label">Mot de passe</label>
                  <div class="cs-password-toggle input-group-overlay">
                    <input type="password" class="form-control appended-form-control" id="signin-password" placeholder="Your password" required>
                    <div class="input-group-append-overlay">
                      <label class="btn cs-password-toggle-btn input-group-text">
                        <input type="checkbox" class="custom-control-input">
                        <i class="far fa-eye"></i>
                        <span class="sr-only">Show password</span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-center form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="remember-me" checked>
                    <label for="remember-me" class="custom-control-label">Remember me</label>
                  </div>
                  <a href="#" class="font-size-sm text-decoration-none">Mot de passe oublié?</a>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                <p class="font-size-sm pt-4 mb-0">
                  Don't have an account?
                  <a href="#" class="font-weight-bold text-decoration-none" data-view="#modal-signup-view">Sign up</a>
                </p>
              
            </div>
          </div>

          <!-- Sign up form -->
   
          <div class="cs-view" id="modal-signup-view">
            <div class="modal-header border-0 pb-0 px-md-5 px-4 d-block position-relative">
              <h3 class="modal-title mt-4 mb-0 text-center">Sign up</h3>
              <button type="button" class="close position-absolute" style="top: 1.5rem; right: 1.5rem;" data-dismiss="modal" aria-label="Close">
                <i class="fas fa-times"></i>
              </button>
            </div>
            <div class="modal-body px-md-5 px-4">
              <p class="font-size-sm text-muted text-center">Sign in to your account using email and password provided during registration.</p>
           
                <div class="form-group">
                  <label for="signup-name">Full name</label>
                  <input type="text" class="form-control" id="signup-name" placeholder="Your full name" required>
                </div>
                <div class="form-group">
                  <label for="signup-email">Email</label>
                  <input type="email" class="form-control" id="signup-email" placeholder="Your email address" required>
                </div>
                <div class="form-group">
                  <label for="signup-password" class="form-label">Password</label>
                  <div class="cs-password-toggle input-group-overlay">
                    <input type="password" class="form-control appended-form-control" id="signup-password" placeholder="Your password" required>
                    <div class="input-group-append-overlay">
                      <label class="btn cs-password-toggle-btn input-group-text">
                        <input type="checkbox" class="custom-control-input">
                        <i class="far fa-eye"></i>
                        <span class="sr-only">Show password</span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="signup-confirm-password" class="form-label">Confirm password</label>
                  <div class="cs-password-toggle input-group-overlay">
                    <input type="password" class="form-control appended-form-control" id="signup-confirm-password" placeholder="Confirm your password" required>
                    <div class="input-group-append-overlay">
                      <label class="btn cs-password-toggle-btn input-group-text">
                        <input type="checkbox" class="custom-control-input">
                        <i class="far fa-eye"></i>
                        <span class="sr-only">Show password</span>
                      </label>
                    </div>
                  </div>
                </div>
                <button class="btn btn-primary btn-block" type="submit">Sign up</button>
                <p class="font-size-sm pt-4 mb-0">Already have an account?
                  <a href="#" class="font-weight-bold text-decoration-none" data-view="#modal-signin-view">Sign in</a>
                </p>
            
            </div>
          </div>
          <div class="modal-body text-center px-0 pt-2 pb-4">
            <hr>
            <p class="font-size-sm text-heading mb-3 pt-4">Or sign in with</p>
            <a href="#" class="social-btn sb-solid mx-1 mb-2" data-toggle="tooltip" title="Facebook">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-btn sb-solid mx-1 mb-2" data-toggle="tooltip" title="Google">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-btn sb-solid mx-1 mb-2" data-toggle="tooltip" title="Twitter">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-btn sb-solid mx-1 mb-2" data-toggle="tooltip" title="LinkedIn">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </div>
      </div>
    </div>

    <?php
              /*  Login/register  */
              if (!isset($_SESSION['nom_user']) || empty($_SESSION['nom_user'])){  ?>
    <section class="container pt-3 pt-md-4 pb-3 pb-sm-4 pb-lg-5 mb-4">
      
    <div class="row">
      <div class="col-lg-8 pr-lg-6 ">
          <div class="d-flex align-items-center justify-content-between">
          </div>
              </div>
              </div>
              </section>
              <div class="container px-2   border-bottom">
              <h2 class="h4 mb-4 ">1. Examen de la commande</h2> 
                    <!-- Alert -->
          <div class="alert alert-inf mb-5" role="alert">
            <div class="media align-items-center">
              <i class="far fa-user mr-3"></i>
              <div class="media-body ">
              Votre panier est vide .&nbsp;&nbsp;<a href="nosplats.php" >Voulez-vous découvrir</a>&nbsp;&nbsp;
              </div>
            </div>
          </div>
             
    <!-- Order review -->
      <h2 class="h4  ">2. Adresse d'expédition et de facturation</h2>
          <div class="rounded ">
          <div class="media border-bottom">
          <div class="alert alert-inf" role="alert">
            <div class="media align-items-center">
              <i class="far fa-user mr-3"></i>
              <div class="media-body">
              Vous avez déjà un compte?&nbsp;&nbsp;<a href="#modal-signin" class="alert-link" data-toggle="modal" data-view="#modal-signin-view">Connectez-vous</a>&nbsp;&nbsp; pour une expérience de paiement plus rapide.
              </div>
            </div>
                </div>

     

          <?php }
else {  ?>
    <section class="container pt-3 pt-md-4 pb-3 pb-sm-4 pb-lg-5 mb-4">
      <div class="row">

        <!-- Checkout content -->
        <div class="col-lg-8 pr-lg-6">
          <div class="d-flex align-items-center justify-content-between pb-2 mb-4">
            <h1 class="mb-0">Checkout</h1>
            <a href="nosplats.html"><strong>Back to shopping</strong></a>
          </div>

          

          <hr class="border-top-0 border-bottom pt-2 mb-4">

          <!-- Order review -->
          <h2 class="h4 mb-4">1. Examen de la commande</h2>
          <div class="rounded mb-5">
            <?php
            if (!empty($_SESSION["shopping_cart"])) {
              $total = 0;
              foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            ?>
                <!-- Item -->
                <div class="media px-2 px-sm-4 py-4 border-bottom">
                  <div class="media-body w-100 pl-3">
                    <div class="d-sm-flex">
                      <div class="pr-sm-3 w-100" style="max-width: 16rem;">
                        <h3 class="mb-3" style="font-weight: 600; font-size:20px;"><?php echo $values["item_name"] ?>
                        </h3>
                      </div>
                      <div class="d-flex pr-sm-3">
                        <div class="text-nowrap pt-2"><strong class="text-danger"><?php echo $values["item_price"]; ?> DT </strong></div>
                      </div>
                      <div class="d-flex align-items-center flex-sm-column text-sm-center ml-sm-auto pt-3 pt-sm-0">
                        <a href="panier.php?action=delete&id=<?php echo $values["item_id"]; ?>" class="btn btn-primary btn-sm mr-2 mr-sm-0">Supprimer</a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php
                $total = $total + $values["item_price"];
              } 
              ?>
              <div class="px-3 px-sm-4 py-4 text-right">
                <span class="text-muted">Total:<strong class="text-dark font-size-lg ml-2"><?php echo number_format($total, 2); ?> DT</strong></span>
              </div>
          </div>

        <?php
           }else { echo '<div class="media px-2 px-sm-4 py-4 border-bottom">
                  <div class="media-body w-100 pl-3">
                    <div class="d-sm-flex">
                      <p class="mr-3"> Votre panier est vide .</p>
                      <p > Voulez-vous découvrir <a href="nosplats.php"> nos plats</a></p>
                    </div>
                  </div>
                    <div class="d-sm-flex">
                    </div>
                  </div>
                </div>'; }
        ?>
           <form action="passecmd.php" method="POST" class="needs-validation" >
        <!-- Adresses -->
        <?php
                                {
                                    $id=$_SESSION['id_user'];
                                    
                                    $sql = "SELECT * FROM utilisateur WHERE id_user='$id' ";
                                    $query_run = mysqli_query($con, $sql);
                                
                                    foreach($query_run as $row)
                                    {?>
        <h2 class="h4 mb-4">2. Adresse d'expédition et de facturation</h2>
        <div class="row pb-3">
          <div class="col-sm-6 form-group">
            <label for="ch-fn">Prenom</label>
            <input type="text" class="form-control form-control-lg" id="ch-fn" value="<?php echo  $row['prenom_user'] ?>" placeholder="votre prenom">
          </div>
          <div class="col-sm-6 form-group">
            <label for="ch-ln">Nom</label>
            <input type="text" class="form-control form-control-lg" id="ch-ln" placeholder="Votre nom" value="<?php echo  $row['prenom_user'] ?>">
          </div>
          <div class="col-sm-6 form-group">
            <label for="ch-email">Email</label>
            <input type="email" class="form-control form-control-lg" id="ch-email" placeholder="Votre adresse mail" value="<?php echo $row['email']?>">
          </div>
          <div class="col-sm-6 form-group">
            <label for="ch-phone">Telephone</label>
            <input type="text" class="form-control form-control-lg" id="ch-phone" placeholder="votre numero de telephone" value="<?php echo $row['telephone']?>">
          </div>
          <div class="col-sm-6 form-group">
            <label for="ch-address">Adresse</label>
            <input type="text" class="form-control form-control-lg" id="ch-address" placeholder="rue , appartment..." value="<?php echo $row['adresse']?>">
          </div>
          <div class="col-sm-6 form-group">
            <label for="ch-zip">ZIP</label>
            <input type="text" class="form-control form-control-lg" id="ch-zip" placeholder="ZIP" value="<?php echo $row['cp']?>">
          </div>
          <div class="col-12 form-group">
          
          </div>
        </div>

        <hr class="mb-4 pb-2">

        <!-- Shipping -->
        <h2 class="h4 mb-4">3. Méthode d'expédition</h2>
        <div class="custom-control custom-radio mb-3">
          <input type="radio" class="custom-control-input" id="courier" name="shipping"  value="adomicile" checked>
          <label for="courier" class="custom-control-label d-flex align-items-center">
            <span>
              <strong class="d-block">Courriel à votre adresse</strong>
            </span>
            <span class="ml-auto">Gratuit</span>
          </label>
        </div>
        <div class="custom-control custom-radio mb-3">
          <input type="radio" class="custom-control-input" id="store-pickup" name="shipping" value="magasin">
          <label for="store-pickup" class="custom-control-label d-flex align-items-center">
            <span>
              <strong class="d-block">Ramasser au magasin</strong>
            </span>
            <span class="ml-auto">Gratuit</span>
          </label>
        </div>

        <hr class="border-top-0 border-bottom pt-4 mb-4">

        <!-- Payment -->
        <h2 class="h4 pt-2 mb-4">4. Méthode de paiement</h2>
        <div class="row pb-4">
          <div class="col-lg-7">
            <div class="accordion-alt" id="payment-methods">

              <!-- Card: Credit card -->
              <div class="card mb-3 px-4 py-3 border rounded box-shadow-sm">
                <div class="card-header py-2">
                  <div class="accordion-heading custom-control custom-radio" data-toggle="collapse" data-target="#cc-card">
                    <input type="radio" class="custom-control-input" id="cc" name="payment" value="credit-card" checked>
                    <label for="cc" class="custom-control-label d-flex align-items-center">
                      <strong class="d-block mr-3">Credit card</strong>
                      <img src="" width="108" alt="Credit cards">
                    </label>
                  </div>
                </div>
                <div class="collapse show" id="cc-card" data-parent="#payment-methods">
                  <div class="card-body pt-3 pb-0">
                    <div class="form-group mb-3">
                      <label for="cc-number">Numero de la carte</label>
                      <input type="text" id="cc-number" class="form-control form-control-lg" data-format="card" placeholder="0000 0000 0000 0000">
                    </div>
                    <div class="d-flex">
                      <div class="form-group mb-3 mr-3">
                        <label for="cc-exp-date">Date d'expiration</label>
                        <input type="text" id="cc-exp-date" class="form-control form-control-lg" data-format="date" placeholder="mm/yy">
                      </div>
                      <div class="form-group mb-3">
                        <label for="cc-cvc">CVC</label>
                        <input type="text" id="cc-cvc" class="form-control form-control-lg" data-format="cvc" placeholder="000">
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              
              
              <!-- Card: Cash -->
              <div class="card mb-3 px-4 py-3 border rounded box-shadow-sm">
                <div class="card-header py-2">
                  <div class="accordion-heading custom-control custom-radio" data-toggle="collapse" data-target="#cash-card">
                    <input type="radio" class="custom-control-input" id="cash" name="payment" value="livraison">
                    <label for="cash" class="custom-control-label">
                      <strong class="d-block mr-3">En espèces à la livraison</strong>
                    </label>
                  </div>
                </div>
                <div class="collapse" id="cash-card" data-parent="#payment-methods">
                  <div class="card-body pt-3 pb-0">
                    <p class="mb-2 text-muted">Vous avez choisi de payer en espèces à la livraison.</p>
                  </div>
                </div>
              </div>
              <hr class="border-top-0 border-bottom pt-4 mb-4">
              <h2 class="h4 mb-4 pt-2">5. Informations supplémentaires (facultatif)</h2>
              <div class="form-group">
              <label for="note">Notes sur la commande</label>
              <input type="text" class="form-control" name="note" placeholder="Remarques sur votre commande, par exemple spécial note pour la livraison.">
            </div>                        


            </div>
          </div>
        </div>

        <hr class="mb-4 pb-2">
        </div>


        <!-- Order totals (sticky sidebar) -->
        <!-- For more sticky sidebar options visit https://abouolia.github.io/sticky-sidebar/#options -->
        <aside class="col-lg-4">
          <div class="sidebar-sticky" data-sidebar-sticky-options='{
              "topSpacing": 120,
              "minWidth": 991
            }'>
            <div class="sidebar-sticky-inner">
              <div class="form-group">
                <label for="promo-code">Appliquer un code promo</label>
                <div class="input-group input-group-lg">
                  <input type="text" id="promo-code" class="form-control" placeholder="Saisir le code promotionnel">
                  <div class="input-group-append">
                    <button type="button" class="btn btn-primary" name="test2">&nbsp;&nbsp;Appliquer&nbsp;&nbsp;</button>
                  </div>
                </div>
              </div>
              <div class="rounded mb-4">
              <?php
                if (!empty($_SESSION["shopping_cart"])) {
                  $total = 0;
                  foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                
                    $total = $total + $values["item_price"];
                  }
                    ?>
                <div class="border-bottom p-4">
                  <h2 class="h4 mb-0">Totaux des commandes</h2>
                </div>
                  <ul class="list-unstyled border-bottom mb-0 p-4">
                    <li class="d-flex justify-content-between mb-2">
                      <span class="font-weight-bold">Total:</span>
                      <span class="font-weight-bold"> <?php echo number_format($total, 2); ?></span>
                    </li>
                    <li class="d-flex justify-content-between mb-2">
                      <span>Les frais de livraison:</span>
                      <span>0 DT</span>
                    </li>
                    <li class="d-flex justify-content-between mb-2">
                      <span>Discount:</span>
                      <span>&mdash;</span>
                    </li>
                  </ul>
                  <div class="d-flex justify-content-between p-4">
                    <span class="h5 mb-0">Order total:</span>
                    <span class="h5 mb-0"> <?php echo number_format($total, 2); ?> DT </span>
                  </div>
              </div>
              
           
         
              <button type="submit" name="commander" class="btn btn-primary btn-lg btn-block" style="color: d6c900;">Commander</button>
            </form>
            <?php
                }}
            }}
        ?>
        
            </div>
          </div>
        </aside>
      </div>
    </section>
  </main>
  <!-- Back to top button-->
  <a class="btn-scroll-top" href="#top" data-scroll data-fixed-element>
    <span class="btn-scroll-top-tooltip text-muted font-size-sm mr-2">Top</span>
    <i class="fas fa-arrow-up mt-2"></i>
  </a>


</body>

</html>