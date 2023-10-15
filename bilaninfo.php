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
    <link rel="stylesheet" href="./css/style.css">
    <title>Bilan information</title>
</head>

<body>
    <?php include("header.php");?>
    <div id="parent">
        <div class="image d-lg-block d-none">
            <img src="./img/saladfruits.png" alt="" class="img-responsive" width="100%">
        </div>
        <div class="bilanbox shadow-sm" style="width:50%">
            <div class="container" style="width: 80%; ">
                <h3 class="text-center my-5" style="color: #707070;">Vos Informations</h3>
                <form action="bilan.php" method="POST">
                    <div class="row sexe mb-3 form-check-vertical justify-content-center">
                        <div class="form-check mr-sm-5" style="padding-left: inherit;">
                            <label class="radio-inline">
                                <input type="radio" name="optradio" checked>Homme
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="radio-inline">
                                <input type="radio" name="optradio">Femme
                            </label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="taille py-3 col-12 shadow-sm">
                            <label for="#range" class="form-label col-12">Taille(cm)*:</label>
                            <div class="valeur">
                                <center class="">
                                    <div id="value"></div>
                                </center>
                            </div>
                            <div class="middle">
                                <div class="slider-container">
                                    <span class="bar"><span class="fill"></span></span>
                                    <input class="col-12" type="range" id="slider" name="slider" class="form-range" max="240">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row twoboxes my-3">
                        <div class="poidsbox col-6 py-4 shadow-sm">
                            <label class="mb-4">Poids(Kg):*</label>
                            <div class="input-group input-number-group" style="width:102%">
                                <div class="input-group-button">
                                    <span class="input-number-decrement">-</span>
                                </div>
                                <input class="input-number" name="poids" type="number" value="89" min="0" max="1000">
                                <div class="input-group-button">
                                    <span class="input-number-increment">+</span>
                                </div>
                            </div>
                        </div>
                        <div class="agebox col-6 py-4 shadow-sm">
                            <label class="mb-4">Age:*</label>
                            <div class="input-group input-number-group" style="width:102%">
                                <div class="input-group-button">
                                    <span class="input-number-decrement">-</span>
                                </div>
                                <input class="input-number" type="number" name="age" value="25" min="0" max="1000">
                                <div class="input-group-button">
                                    <span class="input-number-increment">+</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row imcbtn justify-content-center mb-5 mt-2">
                        <div class="btn-group align-items-center">
                            <button type="submit" class="btn">Voir mon IMC</button>
                            <i class="fas fa-long-arrow-alt-right"></i>
                        </div>
                    </div>
                </form>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-input-spinner@1.17.2/src/bootstrap-input-spinner.js"></script>
    <script>
        $('.input-number-increment').click(function() {
            var $input = $(this).parents('.input-number-group').find('.input-number');
            var val = parseInt($input.val(), 10);
            $input.val(val + 1);
        });

        $('.input-number-decrement').click(function() {
            var $input = $(this).parents('.input-number-group').find('.input-number');
            var val = parseInt($input.val(), 10);
            $input.val(val - 1);
        })
    </script>
    <script>
        var $slider = $("#slider");
        var $fill = $(".bar .fill");

        function setBar() {
            $fill.css("width", $slider.val() + "%");
        }

        $slider.on("input", setBar);

        setBar();
    </script>
    <!-- <script>
        $("input[type='number']").inputSpinner()
    </script>-->
    <script type="text/javascript">
        var slider = document.getElementById("slider");
        var val = document.getElementById("value");
        val.innerHTML = slider.value + ' <span>cm</span>';
        slider.oninput = function() {
            val.innerHTML = `${this.value} <span>cm</span>`;
        }
    </script>
</body>

</html>