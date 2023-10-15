<?php 
include('connect.php'); //Database Connection
?>
<!DOCTYPE html>
<html lang="en">
 
<head>
    <style>
        .product-grid, .product-grid .product-image4 {
    position: relative 
}
.product-grid {
    font-family: Poppins, sans-serif;
    text-align: center;
    border-radius: 3px;
    overflow: hidden;
    z-index: 1;
    transition: all .3s ease 0s;
    margin-bottom: 20px;
}
.product-grid:hover {
    box-shadow: 0 0 10px rgba(0, 0, 0, .2) 
}
.product-grid .product-image4 a {
    display: block 
}
.product-grid .product-image4 img {
    width: 100%;
    height: auto 
}
.product-grid .pic-1 {
    opacity: 1;
    transition: all .5s ease-out 0s 
}
.product-grid:hover .pic-1 {
    opacity: 0 
}
.product-grid .pic-2 {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
    transition: all .5s ease-out 0s 
}
.product-grid:hover .pic-2 {
    opacity: 1 
}
.product-grid .social {
    width: 180px;
    padding: 0;
    margin: 0 auto;
    list-style: none;
    position: absolute;
    right: 0;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    transition: all .3s ease 0s 
}
.product-grid .social li {
    display: inline-block;
    opacity: 0;
    transition: all .7s 
}
.product-grid .social li:nth-child(1) {
    transition-delay: .15s 
}
.product-grid .social li:nth-child(2) {
    transition-delay: .3s 
}
.product-grid .social li:nth-child(3) {
    transition-delay: .45s 
}
.product-grid:hover .social li {
    opacity: 1 
}
.product-grid .social li a {
    color: #222;
    background: #fff;
    font-size: 17px;
    line-height: 36px;
    width: 40px;
    height: 36px;
    border-radius: 2px;
    margin: 0 5px;
    display: block;
    transition: all .3s ease 0s 
}
.product-grid .social li a:hover {
    color: #fff;
    background: #0b0d1e 
}
.product-grid .social li a:after, .product-grid .social li a:before {
    content: attr(data-tip);
    color: #fff;
    background-color: #000;
    font-size: 12px;
    line-height: 20px;
    border-radius: 3px;
    padding: 0 5px;
    white-space: nowrap;
    opacity: 0;
    transform: translateX(-50%);
    position: absolute;
    left: 50%;
    top: -30px 
}
.product-grid .social li a:after {
    content: '';
    height: 15px;
    width: 15px;
    border-radius: 0;
    transform: translateX(-50%) rotate(45deg);
    top: -22px;
    z-index: -1 
}
.product-grid .social li a:hover:after, .product-grid .social li a:hover:before {
    opacity: 1 
}
.product-grid .product-discount-label, .product-grid .product-new-label {
    color: #fff;
    background-color: #0b0d1e;
    font-size: 13px;
    font-weight: 800;
    text-transform: uppercase;
    line-height: 45px;
    height: 45px;
    width: 45px;
    border-radius: 50%;
    position: absolute;
    left: 10px;
    top: 15px;
    transition: all .3s 
}
.product-grid .product-discount-label {
    left: auto;
    right: 10px;
    background-color: #5a45ff;
}
.product-grid:hover .product-new-label {
    opacity: 0 
}
.product-grid .product-content {
    padding: 25px 
}
.product-grid .title {
    font-size: 15px;
    font-weight: 400;
    text-transform: capitalize;
    margin: 0 0 7px;
    transition: all .3s ease 0s 
}
.product-grid .title a {
    color: #222 
}
.product-grid .title a:hover {
    color: #0b0d1e 
}
.product-grid .price {
    color: #0b0d1e;
    font-size: 17px;
    font-weight: 700;
    margin: 0 2px 15px 0;
    display: block 
}
.product-grid .price span {
    color: #909090;
    font-size: 13px;
    font-weight: 400;
    letter-spacing: 0;
    text-decoration: line-through;
    text-align: left;
    vertical-align: middle;
    display: inline-block 
}
.product-grid .add-to-cart {
    border: 1px solid #e5e5e5;
    display: inline-block;
    padding: 10px 20px;
    color: #888;
    font-weight: 600;
    font-size: 14px;
    border-radius: 4px;
    transition: all .3s 
}
.product-grid:hover .add-to-cart {
    border: 1px solid transparent;
    background: #0b0d1e;
    color: #fff 
}
.product-grid .add-to-cart:hover {
    background-color: #505050;
    box-shadow: 0 0 10px rgba(0, 0, 0, .5) 
}
@media only screen and (max-width: 990px) {
    .product-grid {
        margin-bottom: 30px 
   }
}
/* SideBar */
#price_range {
    height: 6px;
}
.ui-slider-handle {
    height: 13px !important;
    width: 13px !important;
    background: #0b0d1e !important;
    border-radius: 25px;
}
.ui-slider-range.ui-corner-all.ui-widget-header {
    background: #5a45ff;
}
.list-group {
    border: 1px solid #f3f3f3;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 3px;
}
.list-group h3 {
    font-size: 22px;
}
.list-group-item {
    border: none;
    margin-left: -10px;
    margin-bottom: -20px;
    font-size: 16px;
}
.list-group-item:focus, .list-group-item:hover {
    z-index: 0;
}
    </style>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title>Online Shopping Products Filter using Ajax & PHP</title>
 
    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="css/jquery-ui.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
 
</head>
 
<body>
 
    <!-- Page Content -->
    <div class="container">
 
        <br/>
        <br/>
        <h1 class="text-center">AOX - Online Shopping Products Filter using Ajax & PHP</h1>
        <br/>
        <br/>
 
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <h3>Price</h3>
                    <input type="hidden" id="min_price_hide" value="0" />
                    <input type="hidden" id="max_price_hide" value="300" />
                    <p id="price_show">$10 - $300</p>
                    <div id="price_range"></div>
                </div>
 
 
                <div class="list-group">
                    <h3>Brand</h3>
                         <?php
 
                    $query = "
                    SELECT DISTINCT(product_brand) FROM product ORDER BY product_brand DESC
                    ";
                    $statement = $con->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                            <div class="list-group-item checkbox">
                                <label>
                                    <input type="checkbox" class="filter_all brand" value="<?php echo $row['product_brand']; ?>">
                                    <?php echo $row['product_brand']; ?>
                                </label>
                            </div>
                            <?php
                    }
 
                    ?>
                 </div>
 
                <div class="list-group">
                    <h3>Color</h3>
                    <?php
 
                    $query = "
                    SELECT DISTINCT(product_color) FROM product WHERE stock_avail = '1' ORDER BY product_color DESC
                    ";
                    $statement = $con->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                        <div class="list-group-item checkbox">
                            <label>
                                <input type="checkbox" class="filter_all color" value="<?php echo $row['product_color']; ?>">
                                <?php echo $row['product_color']; ?>
                            </label>
                        </div>
                        <?php    
                    }
 
                    ?>
                </div>
 
            </div>
 
            <div class="col-md-9">
 
                <div class="row filter_data">
 
                </div>
 
            </div>
        </div>
 
    </div>
 
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
 
    <script src="js/jquery-ui.js"></script>
 
    <script>
        $(document).ready(function() {
 
            filter_data();
 
            function filter_data() {
                $('.filter_data');
                var action = 'fetch_data';
                var minimum_price = $('#min_price_hide').val();
                var maximum_price = $('#max_price_hide').val();
                var brand = get_filter('brand');
                var color = get_filter('color');
                var gender = get_filter('gender');
                $.ajax({
                    url: "fetch.php",
                    method: "POST",
                    data: {
                        action: action,
                        minimum_price: minimum_price,
                        maximum_price: maximum_price,
                        brand: brand,
                        color: color,
                        gender: gender
                    },
                    success: function(data) {
                        $('.filter_data').html(data);
                    }
                });
            }
 
            function get_filter(class_name) {
                var filter = [];
                $('.' + class_name + ':checked').each(function() {
                    filter.push($(this).val());
                });
                return filter;
            }
 
            $('.filter_all').click(function() {
                filter_data();
            });
 
            $('#price_range').slider({
                range: true,
                min: 10,
                max: 300,
                values: [10, 300],
                step: 10,
                stop: function(event, ui) {
                    $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                    $('#min_price_hide').val(ui.values[0]);
                    $('#max_price_hide').val(ui.values[1]);
                    filter_data();
                }
            });
 
        });
    </script>
 
</body>
 
</html>