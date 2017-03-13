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
?>