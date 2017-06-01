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
                <li><a href="http://localhost/ecommerce/allproducts.php">Products</a> </li>
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
                <?php cart(); ?>
                <div id="shopping_cart">
                    <span style="float:right">
                        Welcome Guest!
                    <b style="color:yellow">Shopping Cart - </b>
                    Total Items: <?php getTotalItems(); ?> Total Price: $ 
                        <?php getTotalPrice(); ?>
                    <a href="cart.php"> Go to Cart</a></span> 
                </div>
                <div id="products_box">
                    <?php getPro();?>
                    <?php getCatPro();?>
                    <?php getBrandPro();?>
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