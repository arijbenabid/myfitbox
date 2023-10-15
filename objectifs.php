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
                'item_price' => $_POST["hiddenprice"] * $_POST["boxdays"] * $_POST["quantity"],
                'boxdays' => $_POST["boxdays"],
                'quantity' => $_POST["quantity"]
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        } else {
            echo '<script>alert("Item Already Added")</script>';
            echo '<script>window.location="objectifs.php"</script>';
        }
    } else {
        $item_array = array(
            'item_id' => $_GET["id"],
            'item_name' => $_POST["hiddenname"],
            'item_price' => $_POST["hiddenprice"] * $_POST["boxdays"] * $_POST["quantity"],
            'boxdays' => $_POST["boxdays"],
            'quantity' => $_POST["quantity"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}
//echo count($_SESSION['shopping_cart']);


include "categories.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fitbox.tn Objectif</title>
<style>
.nbrcalorie{
    color: #343434;
    font-weight:700;
    font-size: 12px;
}
</style>
</head>

<body>
<?php
include "header.php";
?>
 <!-- Breadcrumb -->
 <nav id="bg-grey" class=" bg-secondary" aria-label="breadcrumb">
        <div class="container">
          <ol class="breadcrumb breadcrumb-alt  justify-content-center font-weight-bold">
            
  
            <li class="breadcrumb-item justify-content-center" aria-current="page">Les objectifs</li>
          </ol>
        </div>
      </nav>
       <video autoplay loop muted class="img-fluid mb-5">
            <source src="img/food.mp4" type="video/mp4">
            Sorry, your browser doesn't support embedded videos.
        </video>


        <h3 class="text-center mb-4"></h3>
        <div class="container">
            <!--<button name="perte" class="btn rounded-pill col-3  active m-3 p-1">Perte du poids</button>
            <button name="gain" class="btn rounded-pill col-3 objectifs m-3 p-1">Gain du poids</button>
            <button name="mantien" class="btn rounded-pill col-3 objectifs m-3 p-1">Mantien du poids</button>-->

            <form id="allobjectifs" method="POST" class=" row d-flex justify-content-center">
                <input type="submit" name="perte" class="btn btn-secondary rounded-pill col-3 m-3 p-1 btn1 allbtn objectifs" value="Perte du poids">
                <input type="submit" name="gain" class="btn  btn-secondary rounded-pill col-3 m-3 p-1 btn2 allbtn objectifs " value="Gain du poids">
                <input type="submit" name="mantien" class="btn  btn-secondary rounded-pill col-3 m-3 p-1 btn3 allbtn objectifs " value="Mantien du poids">
            </form>
        </div>

        <?php
        include("categories.php");
        // print_r($ligne);
        echo "
        <section class='container py-lg-6 py-5 order-first'>
        <div class='row'>
          <div class='col-md-5 pr-md9 mb-3' sable-parallax-down='md'>
            
            <div class='py-4 px-lg-4 px-sm-2 px-1 bg-light rounded box-shadow-sm'>
                <div class=' mr-3 text-right' style='font-weight:700;'>
                    <p style='font-size:20px;'>{$ligne[1]}</p>
                    <p class='text-right' style='color:#d6c900; font-size:25px;'>du poids</p>
                </div>
                    <p class='pr-sm-4  text-right' style='line-height:1;'>
                        {$ligne[2]}
                    </p>
              </div>
           
          </div>

          <!-- photo -->
          <div class='col-lg-7 px-2 mb-3'>
            <div class='img-responsive'>
            <img class='img-fluid' src='{$ligne[3]}'>
            </div>
          </div>
        </div>
      </section>
        
        
        ";
        ?>
        <div class="container">
            <h3 class="text-center m-5">Plats</h3>
            <?php
            include("connect.php");
            include("categories.php");

            echo "       
            <section class='container mt-1 mb-3 my-sm-4 py-5'>
            <div class='album py-5 mx-auto'>
            <div class='container'>
            <div class='row '>
            ";
            while ($ligne2 = mysqli_fetch_array($result2)) {  ?>

<div class="col-md-3  mb-4 align-items-stretch">
<div class="card mb-4 box-shadow h-100">
<img class="card-img-top" src="<?php echo $ligne2['image'] ?>" alt="Card image cap">
<div class="card-body">
   <h6 class="card-title"><?php echo $ligne2['nomplat'] ?></h5>
   <table>
      <tr class="mr-2">
         <td class="pr-3 font-weight-bold">Calories</td>
         <td class="pr-1 font-weight-bold">Proteines</td>
         <td class="font-weight-bold">Graisses</td>
      </tr>
      <tr>
         <td><?php echo $ligne2['nbr_calories'] ?> Kcal</td>
         <td>350</td>
         <td>20</td>
      </tr>
   </table>
   <div class="d-flex">
      <div class="input-group mt-4 rounded-pill mb-3 commanderbtn">
         <button type="submit" name="showprod" class="btn" data-toggle='modal' data-target='#modalContactForm<?php echo $ligne2['id_plat'] ?>'>
         <span class="mr-1">Aperçu rapide</span>
         <i class="far fa-eye"></i>
         </button>
      </div>
   </div>
</div> 
</div>
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
                            <form method="POST" action="objectifs.php?action=add&id=<?php echo $ligne2['id_plat'] ?>">
                                <div class='modal-body'>
                                    <div class='row'>
                                        <img class='col-6' src='<?php echo $ligne2['image'] ?>'>
                                        <div class='col-6'>
                                            <h5 class='mb-3' style='color: #D6C900;font-size:17px;'>Les Ingredients</h5>
                                            <?php $ingredients = explode(',', $ligne2['ingredients']) ?>
                                            <p style="font-size:14px;"><?php echo $ingredients[0] ?> <?php echo $ingredients[1] ?> <?php echo $ingredients[2] ?></p>
                                            <label for="quantity">Quantité:</label>
                                            <input type="number" class="" id="quantity" name="quantity" min="1" max="10" value="1">
                                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="boxdays">
                                                <option value="1" selected>Box 1 jour</option>
                                                <option value="7">Box 7 jours</option>
                                                <option value="30">Box 30 jours</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class='modal-footer'>


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
  

      </section>



   

    </div>
    </div>
    <?php include "footer.php";?>
</body>
</html>