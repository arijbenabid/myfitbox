<?php

 include_once("connect.php");

 if(isset($_POST['action'])){
    $req = "SELECT * FROM plat,categorie ";
    if(isset($_POST['categorie'])){
        $categorie=implode($_POST['categorie']);
        $req .=" WHERE nom_cat LIKE('".$categorie."')";
    }
    
    if(isset($_POST['prix'])){
        $prix=$_POST['prix'];
        if(in_array(0,$prix)){
            $req .= "";
        }
        if(in_array(1,$prix)){
            $a=10;
            $b=30;
            $req .= "WHERE prix BETWEEN ".$a." AND ".$b."";
        }  
        if(in_array(2,$prix)){
            $a=30;
            $b=80;
            $req .= "WHERE plat.prix BETWEEN ".$a." AND ".$b."";
        } 
        if(in_array(3,$prix)){
            $a=80;
            $b=150;
            $req .= "WHERE prix BETWEEN ".$a." AND ".$b."";
        }      
    }
    $rep =mysqli_query($con,$req);
    $output='';
    if(mysqli_num_rows($rep)>0){
        while (($row=mysqli_fetch_array($rep,MYSQLI_BOTH))!=null){
            //stock counter
            

   

        
           
            $output .='
            <style>
            img{width:250px;
                heaight:250px:
            }</style>
            <div class="col pb-sm-2 mb-grid-gutter">
            <div class="card card-product mx-auto">
              <div class="card-product-img">
                <a href="shop-single.html" class="card-img-top">
                <img src="'. $row['imgp'] .'"  >
                </a>
              </div>
                <div class="card-body pb-2">
                <h3 class="card-product-title text-truncate mb-2">
                 <a href="shop-single.html" class="nav-link">'. $row['nomplat'] .'</a>
                 </h3>
                 <div class="d-flex align-items-center">
                 <span class="h5 d-inline-block mb-0">'. $row['prix'] .'</span>
               </div>
             </div>
             <div class="card-footer">
             <button type="button" class="btn btn-primary btn-block">
                               <i class="cxi-cart align-middle mt-n1 mr-2"></i>
                               Add to cart
                             </button>
                             </div>
                             </div>
                           </div>
            ';
                
               $output .=" </div>
                </div>
                </div>	";
                 $stock_counter=0; 
                }}

    else{
        $output="<h3>No Results</h3>";
    }
    echo $output;
}
 
?>


