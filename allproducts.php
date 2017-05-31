<!DOCTYPE>
<?php
include ("functions/functions.php");
?>
<html>
    <head>
        <title> My Online Store</title>
        <link rel="stylesheet" href="css/style.css" media="all"/>
        
    </head>
    
<body>

    <div class="main_wrapper">
        
        <!--Header starts here-->
        <div class="header_wrapper">
            <img id="logo" src="img/logo.jpg"/>
            <img id="banner" src="img/logo.jpg"/>
        </div>
        <!--Header ends here-->
        <!--Menubar starts here-->
        <div class="menubar">
            <ul id="menu">
                <li><a href="http://localhost/ecommerce/">Home</a> </li>
                <li><a href="http://localhost/ecommerce/allproducts.php">All Products</a> </li>
                <li><a href="#">My Account</a> </li>
                <li><a href="#">Sign Up</a> </li>
                <li><a href="#">Shopping Cart</a> </li>
                <li><a href="#">Contact Us</a> </li>
                <div id="form">
                    <form method="get" action="results.php" enctype="multipart/form-data">
                        <input type="text" name="user_query" placeholder="Search a Product" />
                        <input type="submit" name="search" value="Search"/>
                    </form>
                </div>
            </ul>
            

        </div>
        <!--Menubar ends here-->
        <!--Content starts here-->
        <div class="content_wrapper"> 
            
            <div id="sidebar">
                
                <div id="sidebar_title">Categories </div>
                <ul id="categories">
                    <?php getCategories();?>
                </ul>
                
                <div id="sidebar_title">Brands </div>
                <ul id="categories">
                    <?php getBrands();?>
                </ul>
                
            </div>
            <div id="content_area">
                <div id="shopping_cart">
                    <span style="float:right">
                        Welcome Guest!
                    <b style="color:yellow">Shopping Cart - </b>
                    Total Items: Total Price:
                    <a href="cart.php"> Go to Cart</a></span> 
                </div>
                <div id="products_box">
                    <?php
                        global $conn;
                        $get_pro = "SELECT * FROM Products";
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
                    ?>
                </div>
                
            </div>
        </div>
        <!--Content ends here-->
        <!--Footer starts here-->
        <div id="footer">
            <h2 style="text-align:center; padding-top:30px;">&copy; 2017 by Alejandro Vargas</h2>
        </div>
        <!--Footer ends here-->
    </div>

</body>



</html>