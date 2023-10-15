<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <title>Shop</title>
    
    <style>
            img{width:250px;
                heaight:250px:
            }</style>
</head>
<body >

    <!---header--->

    <div style="margin-top:125px;"></div>

<!---header--->
<!------filter & sort--------->
<nav class="navbar navbar-expand-lg navbar-light bg-light position-fixed w-100" style="z-index:100;">
  	<div class="container" style="display:flex;justify-content:flex-end;">
  		<button type="button" id="sidebarCollapse" class="btn ">
          <i class="fa fa-filter" aria-hidden="true"></i>
  			<span>Filter</span>
  			
          </button>
          <div class="dropdown">
          <button class="btn ml-5 " type="button" id="sortdrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-sort-amount-desc" aria-hidden="true"></i>
  			<span>Sort</span>
              </button>
  			<div class='dropdown-menu dropdown-menu-right' aria-labelledby='sortdrop'>
              
              <div class='form-check sor'>
                            <input type='radio' class='form-check-input filter-prod sorting' name='sorter' value='1' id='sorter'>
                            <label class='form-check-label' for='sorter'>By Latest</label>
                        </div> 
                        <div class="dropdown-divider"></div>
                        <div class='form-check sor'>
                            <input type='radio' class='form-check-input filter-prod sorting' name='sorter' value='2' id='sorter2'>
                            <label class='form-check-label' for='sorter2'>By Oldest</label>
                        </div> 
    
                    </div>
  		

          </div>
  	</div>
        </nav>
        
<div style="margin-top:100px; height:50px;"></div>

<div class="wrapper"  >
    <!------filter------>
<nav id="sidebar">
 	
     
     <ul class="lisst-unstyled components" >
            <li>
            <a href="#catsubmenu"data-toggle="collapse" aria-expanded="true" class="dropdown-toggle"> Shop By Category</a>
                <!--<a href="#catsubmenu"data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Categories</a>-->
                <ul class="collapse show list-unstyled" id="catsubmenu">
                
                <?php
                include_once("connect.php");
                    $req_cat = "SELECT * FROM categorie";
                    $rep_cat=mysqli_query($con,$req_cat);
                    while (($row_cat=mysqli_fetch_array($rep_cat,MYSQLI_BOTH))!=null){
                        
                        echo"
                        <li>
                        <div class='form-check ml-4'>
                            <input type='checkbox' class='form-check-input filter-prod' name='categorie'  value='".$row_cat[0]."' id='categorie'>
                            <label class='form-check-label' for='categorie'>".$row_cat[1]."</label>
                        </div>
                        </li>
                        ";
                    }
                ?>
                </ul>
            </li>
                    <hr>
            
            <hr>
                    <li>
                    <a href="#prixsubmenu"data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">Shop By Price</a>
                        <ul class="collapse show list-unstyled" id="prixsubmenu">
                            <li>
                            <div class='form-check ml-4'>
                            <input type='radio' class='form-check-input filter-prod' name='prix' value='0' id='prix' checked>
                            <label class='form-check-label' for='prix'>ALL</label>
                        </div> 
                            <div class='form-check ml-4'>
                            <input type='radio' class='form-check-input filter-prod' name='prix' value='1' id='prix'>
                            <label class='form-check-label' for='prix'>10DT - 30DT</label>
                        </div> 
                        <div class='form-check ml-4'>
                            <input type='radio' class='form-check-input filter-prod' name='prix' value='2' id='prix'>
                            <label class='form-check-label' for='prix2'>30DT - 80DT</label>
                        </div>
                        <div class='form-check ml-4'>
                            <input type='radio' class='form-check-input filter-prod' name='prix' value='3' id='prix'>
                            <label class='form-check-label' for='prix'>80DT - 150DT</label>
                        </div> 
                            </li>
                        </ul>
                    </li>
     </ul>
     
    
</nav>

<section class='row' style="margin:auto; display:flex; justify-content:center; " id="result">

        <?php
        

        include_once("connect.php");
        $req = "SELECT * FROM plat,categorie";
        if(isset($_POST['search'])){
            $req .= "WHERE plat.nomplat LIKE '%".$_POST['search']."%' ";
        }
        $req .=" GROUP BY nomplat ORDER BY nomplat desc";
        $rep =mysqli_query($con,$req);
        while (($row=mysqli_fetch_array($rep,MYSQLI_BOTH))!=null){
            $str = "SELECT * from plat WHERE  plat.id_plat IN (SELECT id_plat FROM plat WHERE nomplat='".$row["nomplat"]."')  ORDER BY id_plat desc ;";
$repstr=mysqli_query($con,$str);
while(($rowomk=mysqli_fetch_array($repstr,MYSQLI_BOTH))!=null){
  
}
        echo"
	<!--1------------------------------------>	
    <style>
    .overl{
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
        width:100%;
        height: 100%;
    
        background-position: center;
        background-size:cover;
        display: flex;
        justify-content: center;
        align-items: flex-end;
    }
    .slide-img:hover .overl{
        visibility: visible;
        animation:fade 0.5s;
    }
    .overl{
        visibility: hidden;
    }
    </style>
<!--box-slider--------------->
	<div class='box ' >
	<!--img-box---------->
	<div class='slide-img'>
	<img alt='1' src='".$row['imgp']."'class='image-prod'>
	<!--overlayer---------->
	<div class='overl' id='over'>
	<!--buy-btn------>	
    <a href=http://localhost/beyNbey/product.php?nom='".urlencode($row['nomplat'])."' class='buy-btn position-absolute w-100' style='float:left;'>Buy Now</a>	
    <img alt='1' src='http://localhost/beyNbey/admin/upload/".$row['imgp']."'class='image-prod'>
	</div>
	</div>
	<!--detail-box--------->
	<div class='detail-box'>
	<!--type-------->
	<div class='type '>
	<a href=http://localhost/beyNbey/product.php?nom='".urlencode($row['nomplat'])."'>".$row['nomplat']."</a>
	<span>".$row['nom_cat']."</span>
	</div>
    <!--prix-------->
    <div class='type' style='align-items:flex-end;'>
	<a href='#' class='prix'>".$row['prix']."DT</a>";
    
   echo" </div>
	</div>
	</div>	";
     $stock_counter=0;   }
	?>


</section>
</div>

</div>



  

        
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="http://localhost/beyNbey/include/bootstrap.bundle.min.js" ></script>
<script src="https://use.fontawesome.com/484a53bae0.js"></script>
<!-------filter script-------->
<script type="text/javascript">
$(document).ready(function () {

    $(".filter-prod").click(function(){
        
        var action = 'data';
        var categorie = get_filter_text('categorie');
        var collection = get_filter_text('collection');
        var prix = get_filter_text('prix');
        var sorter = get_filter_text('sorter');
        var sorter2 = get_filter_text('sorter2');
        
        $.ajax({
            url:'action.php',
            method:'POST',
            data:{action:action,categorie:categorie,collection:collection,prix:prix,sorter:sorter,sorter2:sorter2},      
            success:function(response){
                $("#result").html(response);
            }
        });
    });

   function get_filter_text(text_id){
       var filterData= [];
       $('#'+text_id+':checked').each(function(){
           filterData.push($(this).val());
       });
       return filterData;

   }
});
</script>


<script  type="text/javascript">

$(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
             });
</script>


</body>
</html>