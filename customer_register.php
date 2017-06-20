<!DOCTYPE>
<?php
session_start();
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
                <form action="customer_register.php" method="post" enctype="multipart/form-data" >
                    <table align="center" width="750">
                        <tr><td><h2>Create an Account</h2></td></tr>
                        <tr>
                            <td align="right">Customer Name:</td>
                            <td><input type="text" name="c_name" required>
                        </tr>
                        <tr>
                            <td align="right">Customer Email</td>
                            <td><input type="text" name="c_email" required></td>
                        </tr>
                        <tr>
                            <td align="right">Customer Password:</td>
                            <td><input type="password" name="c_pass" required></td>
                        </tr>
                        <tr>
                            <td align="right">Customer Image</td>
                            <td><input type="file" name="c_image" required></td>
                        </tr>
                        <tr>
                            <td align="right">Customer Country</td>
                            <td>
                                <select name="c_country" required>
                                    <option>Select a Country</option>
                                    <option>Afghanistan</option>
                                    <option>India</option>
                                    <option>Japan</option>
                                    <option>Mexico</option>
                                    <option>USA</option>
                                    <option>Argentina</option>
                                    <option>Canada</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">Customer City:</td>
                            <td><input type="text" name="c_city" required/></td>
                        </tr>
                        <tr>
                            <td align="right">Customer Contact:</td>
                            <td><input type="text" name="c_contact" required/></td>
                        </tr>
                        <tr>
                            <td align="right">Customer Address:</td>
                            <td><textarea cols="20" rows="5" name="c_address" required></textarea></td>
                        </tr>
                        <tr>
                            <td align="right"></td>
                            <td><input type="submit" name="register" value="Create Account"/></td>
                        </tr>
                        
                    </table>
                
                </form>
                
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


<?php
    if(isset($_POST['register'])){
        $ip = getUserIP();
        $c_name = $_POST['c_name'];
        $c_email = $_POST['c_email'];
        $c_pass = $_POST['c_pass'];
        $c_image = $_FILES['c_image']['name'];
        $c_image_tmp = $_FILES['c_image']['tmp_name'];
        $c_country = $_POST['c_country'];
        $c_city = $_POST['c_city'];
        $c_contact = $_POST['c_contact'];
        $c_address = $_POST['c_address'];
    
    
        move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");
        $insert_c = "INSERT INTO customers (customer_ip, customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_address, customer_image) VALUES  ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";

        $run_c = mysqli_query($conn, $insert_c);

        $sel_cart = "SELECT * FROM cart WHERE ip_add = '$ip'";
        $run_cart = mysqli_query($conn, $sel_cart);
        $check_cart = mysqli_num_rows($run_cart);

        if($check_cart == 0){
            $_SESSION['customer_email'] = $c_email;
            echo "<script>alert('Account has been created successfully')</script>";
            echo "<script>window.open('customer/my_account.php','_self')</script>";
        }else{
            $_SESSION['customer_email'] = $c_email;
            echo "<script>alert('Account has been created successfully')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        }

    }



?>


