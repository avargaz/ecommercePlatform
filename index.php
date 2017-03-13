<!DOCTYPE>
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
                <li><a href="#">Home</a> </li>
                <li><a href="#">Products</a> </li>
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
            
            </div>
            <div id="content_area">This is the content area!</div>
        </div>
        <!--Content ends here-->
        <!--Footer starts here-->
        <div id="footer">This is the footer!</div>
        <!--Footer ends here-->
    </div>

</body>



</html>