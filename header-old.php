
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Fitbox</title>


    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

   

    <!-- icons-->
    <link rel="stylesheet" media="screen" href="css/style.css"/>
    <link rel="stylesheet" media="screen" href="css/s.css"/>
    <link rel="stylesheet" media="screen" href="css/tiny-slider.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">

    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="css/bootstrap.css">    
    <!-- Page loading styles-->
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap');
*{
    font-family: 'Montserrat', sans-serif;
}
.cxi-search{
  color:#D6C900;
}

      .cs-page-loading {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        -webkit-transition: all .4s .2s ease-in-out;
        transition: all .4s .2s ease-in-out;
        background-color: #fff;
        opacity: 0;
        visibility: hidden;
        z-index: 9999;
      }
      .cs-page-loading.active {
        opacity: 1;
        visibility: visible;
      }
      .cs-page-loading-inner {
        position: absolute;
        top: 50%;
        left: 0;
        width: 100%;
        text-align: center;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        -webkit-transition: opacity .2s ease-in-out;
        transition: opacity .2s ease-in-out;
        opacity: 0;
      }
      .cs-page-loading.active > .cs-page-loading-inner {
        opacity: 1;
      }
      .cs-page-loading-inner > span {
        display: block;
        font-size: 1rem;
        font-weight: normal;
        color: #787a80;
      }
      .cs-page-spinner {
        display: inline-block;
        width: 2.75rem;
        height: 2.75rem;
        margin-bottom: .75rem;
        vertical-align: text-bottom;
        background-color: #cfcfd1; 
        border-radius: 50%;
        opacity: 0;
        -webkit-animation: spinner .75s linear infinite;
        animation: spinner .75s linear infinite;
      }
      @-webkit-keyframes spinner {
        0% {
          -webkit-transform: scale(0);
          transform: scale(0);
        }
        50% {
          opacity: 1;
          -webkit-transform: none;
          transform: none;
        }
      }
      @keyframes spinner {
        0% {
          -webkit-transform: scale(0);
          transform: scale(0);
        }
        50% {
          opacity: 1;
          -webkit-transform: none;
          transform: none;
        }
      }
    </style>

    <!-- Page loading scripts-->
    <script>
      (function () {
        window.onload = function () {
          var preloader = document.querySelector('.cs-page-loading');
          preloader.classList.remove('active');
          setTimeout(function () {
            preloader.remove();
          }, 2000);
        };
      })();
    </script>


  </head>


  <!-- Body-->
  <body>
    

    <!-- Page loading spinner-->
    <div class="cs-page-loading active">
      <div class="cs-page-loading-inner">
        <div class="cs-page-spinner"></div><span>Loading...</span>
      </div>
    </div>

    <!-- Page wrapper for sticky footer -->
    <!-- Wraps everything except footer to push footer to the bottom of the page if there is little content -->
    <main class="cs-page-wrapper">
      
      

      
      
      <header>
        <!-- Navbar with logo search icons -->
        <div class="navbar navbar-expand-lg navbar-light bg-light navbar-sticky pt-3" data-fixed-element>
          <div class="container px-0 px-xl-3 ">
            <a href="index.html" class="navbar-brand mr-0 pr-lg-3 mr-lg-4">
              <img src="img/logo.png" alt="fitbox Logo" width="130">
            </a>
            <!-- Search desktop -->
            <form action="inc/search.php"></form>
            <div class="input-group-overlay ml-4 d-lg-block d-none order-lg-3 " style="max-width: 30rem;">
              <input class="form-control appended-form-control search rounded-pill "  type="text" placeholder="Chercher un plat...">
              <div class="input-group-append-overlay">
                <span class="input-group-text"><i class="cxi-search lead align-middle " ></i></span>
              </div>
            </div>
            <!-- Toolbar -->
            <div class="d-flex align-items-center order-lg-3">
              <ul class="nav nav-tools flex-nowrap">
                <li class="nav-item align-self-center mb-0">
                  <a href="#" class="nav-tool pr-lg-0" data-toggle="offcanvas" data-target="cart">
                    <i class="cxi-cart nav-tool-icon"></i>
                    <span class="badge badge-success align-middle mt-n1 ml-2 px-2 py-1 font-size-xs"></span>
                  </a>
                </li>

                <div class="input-group-overlay  mb-0 d-lg-none d-block d-flex align-items-center"> 
                  <ul class="nav">
                    <li class="divider-vertical mb-0 d-lg-none d-block"></li>
                  <li class="nav-item mb-0">
                    <a href="#" class="nav-tool pr-lg-0" data-toggle="offcanvas" data-target="profile">
                      <i class="cxi-profile nav-tool-icon"></i>
                      <span class="badge badge-success align-middle mt-n1 ml-2 px-2 py-1 font-size-xs"></span>
                    </a>
                  </li>
                  </ul>
                </div>

                <li class="divider-vertical mb-0 d-lg-none d-block"></li>
                <li class="nav-item mb-0">
                  <button class="navbar-toggler mt-n1 mr-n3" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                </li>
              </ul>
              <!-- User Not Logged in -->
              <?php 
                                 if (!isset($_SESSION['nom_user']) || empty($_SESSION['nom_user'])){  ?>
                                <button type="button" href="mon-compte.php" class="btn">
                                  <a href="mon-compte.php" class="topbar-link d-lg-inline-block d-none ml-4 pl-1 text-decoration-none text-nowrap"><i class="cxi-profile mr-1 font-size-base align-middle"></i>Utilisateur</a>

                                <?php }
                                else {  ?>

              <div class="dropdown">
                <a href="#" class="topbar-link dropdown-toggle d-lg-inline-block d-none ml-4 pl-1 text-decoration-none text-nowrap" data-toggle="dropdown">
                  <i class="cxi-profile mr-1 font-size-base align-middle"></i>
                  <?php echo$_SESSION['nom_user'];
                                    ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a href="account-profile.html" class="dropdown-item d-flex align-items-center">
                    <i class="cxi-profile font-size-base mr-2"></i>
                    <span>Mon compte</span>
                  </a>
                  <a href="account-orders.html" class="dropdown-item d-flex align-items-center">
                    <i class="cxi-bag font-size-base mr-2"></i>
                    <span>Mes commandes</span>
                  </a>
                  <a href="account-wishlist.html" class="dropdown-item d-flex align-items-center">
                    <i class="cxi-map-pin-outline font-size-base mr-2"></i>
                    <span>Mes adresses</span>
                    <span class="badge badge-warning ml-auto"></span>
                  </a>
                  <a href="account-recently-viewed.html" class="dropdown-item d-flex align-items-center">
                    <i class="cxi-info font-size-base mr-2"></i>
                    <span>suivi du poids</span>
                  </a>
                  
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item d-flex align-items-center">
                    <i class="cxi-logout font-size-base mr-2"></i>
                    <span>Déconnexion</span>
                  </a>
                </div>
              </div>
              <?php 
                                }
                                ?>
            </div>
            </div>
            <!-- Navbar collapse -->
          

            
          </div>
        </div>




      





         <!-- Navbar -->
        <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page -->
        <div class="navbar navbar-expand-lg navbar-light bg-light navbar-sticky" data-fixed-element>
          <div class="container px-0 px-xl-3">
            
           
            
            <!-- Navbar collapse -->
            <nav class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
              <!-- Search mobile -->
              <div class="input-group-overlay form-group mb-0 d-lg-none d-block">
                <input type="text" class="form-control prepended-form-control rounded-0 border-0" placeholder="Chercher un produit ...">
                <div class="input-group-prepend-overlay">
                  <span class="input-group-text">
                    <i class="cxi-search font-size-lg align-middle mt-n1"></i>
                  </span>
                </div>
              </div>
              <!-- Menu -->
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a href="index.html" class="nav-link">Accueil</a>
                </li>
                <li class="nav-item dropdown">
                  <a href="#" class="nav-link">Objectifs</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link" >Not Plats</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link" >Bilan</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link" >Contacter Nous</a>
                </li>
                <li class="nav-item">
                  <a href="tel:58917123" class="nav-link">
                  Besoin D'aide ? sur
                  <span class=''>58 917 123</span>
                </a>
              </li>
             
               
              </ul>
            </nav>
          </div>
        </div>

        



      </header>
 <!-- Vendor scripts: js libraries and plugins-->
 <script src="js/jquery.slim.min.js"></script>
 <script src="js/bootstrap.bundle.min.js"></script>
 <script src="js/smooth-scroll.polyfills.min.js"></script>

 


 <!-- Main theme script-->
 <script src="js/fit.js"></script>
