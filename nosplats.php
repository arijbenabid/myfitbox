<?php
session_start();
//print_r($_SESSION["shopping_cart"]);

if (isset($_POST["add_to_cart"])) {
    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id' => $_GET["id"],
                'item_name' => $_POST["hiddenname"],
                'item_price' => $_POST["hiddenprice"]
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        } else {

            echo '<script>window.location="nosplats.php"</script>';
        }
    } else {
        $item_array = array(
            'item_id' => $_GET["id"],
            'item_name' => $_POST["hiddenname"],
            'item_price' => $_POST["hiddenprice"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}
//echo count($_SESSION['shopping_cart']);


include "connect.php";
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
    <title>Fitbox Nos plats</title>
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
                                <a href="index.php" class="nav-link">ACCUEIL</a>
                            </li>
                            <li class="nav-item">
                                <a href="objectifs.php" class="nav-link">OBJECTIFS</a>
                            </li>
                            <li class="nav-item">
                                <a href="nosplats.php" class="nav-link">NOS PLATS</a>
                            </li>
                            <li class="nav-item">
                                <a href="bilaninfo.php" class="nav-link">BILAN</a>
                            </li>
                            <li class="nav-item">
                                <a href="contact.php" class="nav-link">CONTACTER NOUS</a>
                            </li>
                            <!--
                            <li class="nav-item">
                                <a href="" class="nav-link">BESOIN D'AIDE ? +216 58 123 123</a>
                            </li>
                            -->
                        </ul>
                    </div>
            </div>
            </nav>
        </div>
        <h3 class="text-center my-4">Nos plats</h3>
        <div class="dropdown"> <!--d-flex justify-content-end-->
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Trier par
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <form method="POST">
                    <input type="submit" name="croissant" class="dropdown-item" value="Prix croissant">
                    <input type="submit" name="decroissant" class="dropdown-item" value="Prix decroissant">
                    <input type="submit" name="calorieup" class="dropdown-item" value="Nombre de calories croissant">
                    <input type="submit" name="caloriedown" class="dropdown-item" value="Nombre de calories decroissant">
                </form>
            </div>
        </div>
        <div class="mt-5">
            <?php
            include("connect.php");
            $sql = "SELECT * from plat";
            $result2 = mysqli_query($con, $sql);
            $ligne2 = mysqli_fetch_array($result2, MYSQLI_NUM);
            if (isset($_REQUEST['croissant'])) {
                $sql = "SELECT * from plat order by prix desc";
                $result2 = mysqli_query($con, $sql);
            } else if (isset($_REQUEST['decroissant'])) {
                $sql = "SELECT * from plat order by prix asc";
                $result2 = mysqli_query($con, $sql);
            } else if (isset($_REQUEST['calorieup'])) {
                $sql = "SELECT * from plat order by nbr_calories asc";
                $result2 = mysqli_query($con, $sql);
            } else if (isset($_REQUEST['caloriedown'])) {
                $sql = "SELECT * from plat order by nbr_calories desc";
                $result2 = mysqli_query($con, $sql);
            }

            echo " <div class=\"row\">";
            while ($ligne2 = mysqli_fetch_array($result2)) {  ?>

                <div class="card-group col-lg-3 col-md-6 col-sm-12 mb-5 ">
                    <form method="POST" action="nosplats.php?action=add&id=<?php echo $ligne2['id_plat'] ?>">
                        <div class="card">

                            <img class="card-img-top get_id" src="<?php echo $ligne2['image'] ?>" alt="Card image cap" data-toggle='modal' data-target='#modalContactForm<?php echo $ligne2['id_plat'] ?>'>
                            <div class="card-body">
                                <h5 class="card-title nomplat"><?php echo $ligne2['nomplat'] ?></h5>
                                <div class="row">
                                    <div class="btn-group info col-4 ">
                                        <span class="infotext mr-2">Calories</span>
                                        <span class="nbrcalorie"><?php echo $ligne2['nbr_calories'] ?> Kcal</span>
                                    </div>

                                    <div class="btn-group info col-4">
                                        <span class="infotext mr-2">Graisses</span>
                                        <span class="nbrcalorie">test</span>
                                    </div>
                                    <div class="btn-group info col-4 ">
                                        <span class="infotext mr-2">Proteins</span>
                                        <span class="nbrcalorie">test</span>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="hiddenname" value="<?php echo $ligne2['nomplat']  ?>">
                            <input type="hidden" name="hiddenprice" value="<?php echo $ligne2['prix']  ?>">
                            <div class="input-group rounded-pill mb-3 commanderbtn">
                                <button type="submit" name="add_to_cart" class="btn">
                                    <span class="mr-1"><?php echo $ligne2['prix'] ?>DT</span>
                                    <span class="mr-1 line">|</span>
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class='modal fade' id='modalContactForm<?php echo $ligne2['id_plat'] ?>' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                    <div class='modal-dialog' role='document'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h2 class='modal-title' id='exampleModalLabel' style='color: #D6C900;'><?php echo $ligne2['nomplat'] ?></h2>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                                <div class='row'>
                                    <img class='col-6' src='<?php echo $ligne2['image'] ?>'>
                                    <div class='col-6'>
                                        <h5 class='mb-3' style='color: #D6C900;'>Les Ingredients</h5>
                                        <p>Tomate</p>
                                        <p>Laitue</p>
                                        <p>Pomme de terre </p>
                                    </div>
                                </div>

                            </div>
                            <div class='modal-footer'>

                                <form method="POST" action="nosplats.php?action=add&id=<?php echo $ligne2['id_plat'] ?>">
                                    <input type="hidden" name="hiddenname" value="<?php echo $ligne2['nomplat']  ?>">
                                    <input type="hidden" name="hiddenprice" value="<?php echo $ligne2['prix']  ?>">
                                    <div class="btn-group modalbtn">
                                        <div class="input-group rounded-pill mb-3 commanderbtn2 mr-4">
                                            <button type="submit" name="add_to_cart" class="btn">
                                                <span class="mr-1"><?php echo $ligne2['prix'] ?>DT</span>
                                                <span class="mr-1 line">|</span>
                                                <i class="fas fa-shopping-cart"></i>
                                            </button>
                                        </div>
                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            echo "</div>";


            ?>
        </div>

    </div>
    </div>
    <footer>
        <div class="container py-5">
            <div class="row footer">
                <div class="col-3">
                    <img src="img/logo.png" alt="" class="img-fluid">
                    <p class="footertext mt-3">Is simply dummy text of the printing and typesetting industry. Lorem </p>
                    <div class="btn-group">
                        <a href="" class="mr-2"><img src="img/facebook.svg" alt=""></a>
                        <a href="" class="mr-2"><img src="img/twitter.svg" alt=""></a>
                        <a href="" class="mr-2"><img src="img/instagram.svg" alt=""></a>
                    </div>
                    <p class="rights mt-3">© 2020. All Rights Reserved.</p>
                </div>
                <div class="col-3">
                    <h2 class="mb-3">Pages</h2>
                    <ul class="liste1 list-unstyled">
                        <a href="">
                            <li>Plats</li>
                        </a>
                        <a href="">
                            <li>Objectifs</li>
                        </a>
                        <a href="">
                            <li>Contacter nous</li>
                        </a>
                        <a href="">
                            <li>Bilan</li>
                        </a>
                    </ul>

                </div>
                <div class="col-3">
                    <h2 class="mb-3">Policy</h2>
                    <ul class="liste1 list-unstyled">
                        <a href="">
                            <li>Terms of usage</li>
                        </a>
                        <a href="">
                            <li>Privacy policy</li>
                        </a>
                        <a href="">
                            <li>Return policy</li>
                        </a>
                    </ul>
                </div>
                <div class="col-3">
                    <h2 class="mb-3">Objectifs</h2>
                    <ul class="liste1 list-unstyled">
                        <a href="">
                            <li>Perte du poids</li>
                        </a>
                        <a href="">
                            <li>Mantien du poids</li>
                        </a>
                        <a href="">
                            <li>Gain du poids</li>
                        </a>
                    </ul>
                </div>
            </div>

        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</body>

</html>