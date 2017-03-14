<?php

//stablishing connection to DB
$conn = mysqli_connect("localhost","root","","ecommerce");

//getting categories
function getCategories(){
    global $conn;
    $sqlString = "SELECT * FROM Categories";
    $query = mysqli_query($conn, $sqlString);
    
    while($row_cats = mysqli_fetch_array($query)){
        $cat_id = $row_cats['cat_id'];
        $cat_title = $row_cats['cat_title'];
        
        echo "<li><a href='#'>$cat_title</a></li>";
    }
}

//getting brands
function getBrands(){
    global $conn;
    $sqlString = "SELECT * FROM Brands";
    $query = mysqli_query($conn, $sqlString);
    
    while($row_cats = mysqli_fetch_array($query)){
        $brand_id = $row_cats['brand_id'];
        $brand_title = $row_cats['brand_title'];
        
        echo "<li><a href='#'>$brand_title</a></li>";
    }
}

function getCategoriesOptions(){
    global $conn;
    $sqlString = "SELECT * FROM Categories";
    $query = mysqli_query($conn, $sqlString);
    
    while($row_cats = mysqli_fetch_array($query)){
        $options_title = $row_cats['cat_title'];
        
        echo "<option>$options_title</option>";
    }
}

function getBrandsOptions(){
    global $conn;
    $sqlString = "SELECT * FROM Brands";
    $query = mysqli_query($conn, $sqlString);
    
    while($row_cats = mysqli_fetch_array($query)){
        $options_title = $row_cats['brand_title'];
        
        echo "<option>$options_title</option>";
    }
}

function getPro(){
    global $conn;
    $getProQuery = "SELECT * FROM Products ORDER BY RAND() LIMIT 0,6";
    
    $run_pro = mysqli_query($conn,$getProQuery);
    
    while($row_pro = mysqli_fetch_array($run_pro)){
        $pro_id = $row_pro['product_id'];
        $pro_cat = $row_pro['product_cat'];
        $pro_brand = $row_pro['product_brand'];
        $pro_title = $row_pro['product_title'];
        $pro_price = $row_pro['product_price'];
        $pro_image = $row_pro['product_image'];
        
        echo "<div id='single_product'>
            <h3>$pro_title</h3>
            <img src='img/product-images/$pro_image' width='180' height='180' />
            <p><b> $ $pro_price</b></p>
            <a href='details.php' style='float:left'>Details</a>
            <a href='index.php' ><button style='float:right'</button>Add to Cart</a>
        </div>";
        
    }
}





















?>