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
        
        echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
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
        
        echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
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

function getCatPro(){
    if(isset($_GET['cat'])){
            global $conn;
            $cat_id = $_GET['cat'];
        
            $get_cat_pro = "SELECT * FROM Products WHERE product_cat='$cat_id'";

            $run_cat_pro = mysqli_query($conn,$get_cat_pro);
            $countProd = mysqli_num_rows($run_cat_pro);    
            if($countProd == 0){
                echo "<h2>There are no products in this category</h2>";
                exit();
            }    
        
            while($row_cat_pro = mysqli_fetch_array($run_cat_pro)){
                $pro_id = $row_cat_pro['product_id'];
                $pro_cat = $row_cat_pro['product_cat'];
                $pro_brand = $row_cat_pro['product_brand'];
                $pro_title = $row_cat_pro['product_title'];
                $pro_price = $row_cat_pro['product_price'];
                $pro_image = $row_cat_pro['product_image'];

                echo "<div id='single_product'>
                    <h3>$pro_title</h3>
                    <img src='img/product-images/$pro_image' width='180' height='180' />
                    <p><b> $ $pro_price</b></p>
                    <a href='details.php?pro_id=$pro_id' style='float:left'>Details</a>
                    <a href='index.php?pro_id=$pro_id' ><button style='float:right'</button>Add to Cart</a>
                </div>";

            }
        }
}
function getBrandPro(){
    if(isset($_GET['brand'])){
            global $conn;
            $brand_id = $_GET['brand'];
        
            $get_brand_pro = "SELECT * FROM Products WHERE product_brand='$brand_id'";

            $run_brand_pro = mysqli_query($conn,$get_brand_pro);
            $countProd = mysqli_num_rows($run_brand_pro);    
            if($countProd == 0){
                echo "<h2>There are no products in this brand</h2>";
                exit();
            }    
        
            while($row_brand_pro = mysqli_fetch_array($run_brand_pro)){
                $pro_id = $row_brand_pro['product_id'];
                $pro_cat = $row_brand_pro['product_cat'];
                $pro_brand = $row_brand_pro['product_brand'];
                $pro_title = $row_brand_pro['product_title'];
                $pro_price = $row_brand_pro['product_price'];
                $pro_image = $row_brand_pro['product_image'];

                echo "<div id='single_product'>
                    <h3>$pro_title</h3>
                    <img src='img/product-images/$pro_image' width='180' height='180' />
                    <p><b> $ $pro_price</b></p>
                    <a href='details.php?pro_id=$pro_id' style='float:left'>Details</a>
                    <a href='index.php?pro_id=$pro_id' ><button style='float:right'</button>Add to Cart</a>
                </div>";

            }
        }
}
function getPro(){
    if(!isset($_GET['cat'])){
        if(!isset($_GET['brand'])){
            global $conn;

            $get_pro = "SELECT * FROM Products ORDER BY RAND() LIMIT 0,6";

            $run_pro = mysqli_query($conn,$get_pro);

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
                    <a href='details.php?pro_id=$pro_id' style='float:left'>Details</a>
                    <a href='index.php?pro_id=$pro_id' ><button style='float:right'</button>Add to Cart</a>
                </div>";

            }
        }
    }
}


function getDetailsPage(){
    if(isset($_GET['pro_id'])){
        $pro_id = $_GET['pro_id'];
        global $conn;

        $get_pro = "SELECT * FROM Products WHERE product_id = $pro_id";

        $run_pro = mysqli_query($conn,$get_pro);

        while($row_pro = mysqli_fetch_array($run_pro)){
            $pro_id = $row_pro['product_id'];
            $pro_cat = $row_pro['product_cat'];
            $pro_brand = $row_pro['product_brand'];
            $pro_title = $row_pro['product_title'];
            $pro_price = $row_pro['product_price'];
            $pro_image = $row_pro['product_image'];
            $pro_desc = $row_pro['product_desc'];

            echo "<div id='single_product'>
                <h3>$pro_title</h3>
                <img src='img/product-images/$pro_image' width='400' height='300' />
                <h3>$pro_desc</h3>
                <p><b> $ $pro_price</b></p>
                <a href='index.php' style='float:left'>Go Back</a>
                <a href='index.php?pro_id=$pro_id' ><button style='float:right'</button>Add to Cart</a>
            </div>";

        }
        
    }else{
        echo "No pro_id for details page detected";
    }
}












?>