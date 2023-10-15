<?php
include "connect.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Bilan</title>
</head>

<body>
    <div class="container">
        <div class="row mt-3 align-items-center">
            <div class="col-4"><a href="homepage.html"><img src="img/logo.png" class="logo img-fluid" alt=""></a> </div>
            <div class="searchbox col-4">
                <form class="d-flex">
                    <input class="form-control border-0 search rounded-pill" type="search" placeholder="Rechercher des plats" aria-label="Search">
                    <div class="search-icon">
                        <span>
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                </form>
            </div>
            <div class="col-4 text-right">
                <button class="btn btn-group">
                    <span><i class="fas fa-shopping-cart a"></i></span>
                    <?php if (isset($_SESSION['shopping_cart']) && (count($_SESSION['shopping_cart']) > 0)) {
                        echo " <span class='badge badge-danger badge-counter' style='transform-origin: right; transform: scale(0.7); position: absolute;'> " . count($_SESSION['shopping_cart']) . " +</span>";
                    } ?>
                    <a href="panier.php" style="text-decoration: none; color: black;">
                        <span class="d-sm-block d-none ml-2 ">Panier</span>
                    </a>
                </button>
                <button class="btn btn-group">
                    <span><i class="far fa-user-circle"></i></span>
                    <a href="#" style="text-decoration: none; color: black;">
                        <span class="d-sm-block d-none ml-2">Utilisateur</span>
                    </a>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 justify-content-sm-center d-flex mt-2">
                <nav class="navbar navbar-expand-sm ">
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
                        <span class="navbar-toggler-icon "><i class="fas fa-bars"></i></span>
                    </button>
                    <div class="collapse navbar-collapse" id="menu">
                        <ul class="navbar-nav ">
                            <li class="nav-item">
                                <a href="" class="nav-link">ACCUEIL</a>
                            </li>
                            <li class="nav-item">
                                <a href="objectifs.php" class="nav-link">OBJECTIFS</a>
                            </li>
                            <li class="nav-item">
                                <a href="nosplats.php" class="nav-link">NOS PLATS</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">BILAN</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">CONTACTER NOUS</a>
                            </li>
                           
                        </ul>
                    </div>
            </div>
            </nav>
        </div>
    </div>

    <div id="parent">
        <div class="image">
            <img src="./img/bilan2.png" alt="" class="img-responsive" width="100%">
        </div>
        <div class="bilan2 pb-5 shadow-sm" style="width:50%">
            <div class="container" style="width: 80%; ">
                <p class="resultbilan">Je découvre mon resultat</p>
                <p style="color:#707070;">Mon IMC et mon programme favorable</p>
            </div>
        </div>
    </div>
    <?php
    $poids = $_POST['poids'];
    $taille = $_POST['slider'] * 0.01;
    $calcul = round(($poids / ($taille * $taille)), 1);
    $statut = 't';
    $conseil = 't';
    $prog = 't';
    if ($calcul < 18.5) {
        $statut = 'maigre';
        $conseil = 'Nous vous conseillons de consulter un médecin pour mieux comprendre les raisons de votre
        manque de poids.';
        $prog = 'Vous pouvez découvrir notre méthode de rééquilibrage alimentaire Fitbox* à travers notre page
        objectifs précisément gain du poids
        ';
    } else
    if (($calcul > 18.5) and ($calcul < 24.9)) {
        $statut = 'de corpulence normale';
        $conseil = 'Une alimentation équilibrée et la pratique d\'une activité physique régulière préservera votre
        santé.';
        $prog = 'Vous pouvez découvrir notre méthode de rééquilibrage alimentaire FITBOX à travers notre
        page qui définisse les objectifs
        on vous guide aux calories, protéines et graisse que chaque repas contient.
        Évitez les régimes restrictifs proposant une perte de poids rapide (+ de 4kg par mois).
        ';
    } else
    if (($calcul > 24.9) and ($calcul < 30)) {
        $statut = 'en surpoids';
        $conseil = 'Vos kilos en trop impactent déjà votre santé. Vous pouvez déjà être concerné par
        l\'essoufflement, des douleurs rhumatologiques, des troubles de la circulation, etc. Développer
        de l\'hypertension, faire un infarctus, ou encore avoir un accident vasculaire cérébral sont des
        risques à ne pas négliger.';
        $prog = 'Notre méthode de perte du poids Fitbox, vous permettra de perdre en moyenne 800g à 1kg par
        semaine Et donc d\'atteindre votre objectif de perte de poids en quelques mois .C’est pourquoi
        nous vous conseillons de réserver nos plats pendant 3 mois';
    } else
    if ($calcul > 30) {
        $statut = 'Entre 30 et 34,9 = modérée si Vous êtes 
        entre 35 et 39,9 = Sévére et si Vous êtes
        plus que 40 = Massive';
        $conseil = 'Votre poids est trop élevé par rapport à votre taille. vos kilos en trop impactent fortement votre
        santé et vous êtes déjà concerné par l’essoufflement, les douleurs rhumatologiques ou les
        troubles de la circulation... Il existe un risque important de développer de l’hypertension, un
        diabète gras ou une insuffisance cardiaque liée à un excès de graisse dans les vaisseaux
        sanguins.';
        $prog = 'Notre méthode de perte du poids Fitbox, vous permettra de perdre en moyenne 800g à 1kg par
        semaine Et donc d\'atteindre votre objectif de perte de poids en quelques mois .C’est pourquoi
        nous vous conseillons de reserver nos plats pendant plus que 7 mois et nous vous conseillons
        de pratiquer une activité physique régulière préservera votre santé.
        ';
    }

    ?>
    <div class="container">
        <div class="row my-5">
            <div class="d-inline col-lg-6 col-md-6 col-sm-12 shadow-sm">
                <div class="monimc p-3" style="width: 95%;">
                    <h2 style="font-weight: 700;color:#707070;">Mon <span style="color:#D6C900;">IMC</span></h2>
                    <div class="imcvalue text-center">
                        <span class="imc"><?php echo $calcul ?></span>
                        <img src="./img/iconeimc.png" class="mb-4" height="40px" alt="">
                    </div>
                    <div class="imctext1">
                        <p>Votre IMC* est de <span style="font-weight: 800;"> <?php echo $calcul ?></span> , Vous êtes <span style="font-weight: 800;"> <?php echo $statut ?></span> </p>
                        <p style="font-weight:800; color:#707070;"><?php echo $conseil ?></p>
                        <hr>
                        <p class="info" style="color:#D6C900;font-size:15px;">*L'IMC (Indice de Masse Corporelle) est le seul indice validé par l’Organisation Mondiale de la Santé pour évaluer la corpulence et les éventuels risques pour la santé.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 shadow-sm">
                <div class="imcprog p-3" style="width: 95%;">
                    <h2 style="font-weight: 700;color:#707070;">Mon <span style="color:#D6C900;">programme favorable</span> </h2>
                    <p><?php echo $prog ?></p>
                    <hr>
                    <div class="row imcbtn justify-content-end mb-5 mt-2">
                        <div class="btn-group align-items-center">
                           <a href="objectifs.php"> <button type="submit" class="btn">Voir la page</button></a>
                            <i class="fas fa-long-arrow-alt-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php" ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-input-spinner@1.17.2/src/bootstrap-input-spinner.js"></script>
</body>

</html>