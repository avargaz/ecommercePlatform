<!DOCTYPE>
<?php
include ("../functions/functions.php");
?>
<html>
    <head>
      <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>
        <title>Inserting Product</title>
    </head>
    <body bgcolor="skyblue">
    
        <form method="post" enctype="multipart/form-data">
            <table align="center" width="750" border="2" bgcolor="gray">
                <tr align="center">
                    <td colspan="8"><h2>Insert new post here</h2></td>
                </tr>
                <tr align="center">
                    <td>Product Title</td>
                    <td align="left"><input type="text" name="product_title"/></td>
                </tr>
                <tr align="center">
                    <td>Product Category</td>
                    <td align="left">
                        <select name="product_cat" >
                            <?php
                            getCategoriesOptions();
                            ?>
                        </select>
                    </td>
                </tr>
                <tr align="center">
                    <td>Product Brand</td>
                    <td align="left" >
                        <select name="product_brand">
                            <?php
                            getBrandsOptions();
                            ?>
                        </select>
                    </td>
                </tr>
                <tr align="center">
                    <td>Product Price</td>
                    <td align="left"><input type="text" name="product_price" /></td>
                </tr>
                <tr align="center">
                    <td>Product Description</td>
                    <td align="left"><textarea name="product_desc" cols="30" rows="8" ></textarea></td>></td>
                </tr>
                <tr align="center">
                    <td>Product Image</td>
                    <td align="left"><input type="file" name="product_image" /></td>
                </tr>
                <tr align="center">
                    <td>Product Keywords</td>
                    <td align="left"><input type="text" name="product_keywords" /></td>
                </tr>
                <tr align="center">
                    <td colspan="8"><input type="submit" name="insert_post" value="Insert"/></td>
                </tr>
                
            </table>
        </form>

    </body>
</html>

<?php
    //if the insert button is clicked
    if(isset($_POST['insert_post'])){
        //getting the text data from fields
        $product_title = $_POST['product_title'];
        $product_cat = $_POST['product_cat'];
        $product_brand = $_POST['product_brand'];
        $product_price = $_POST['product_price'];
        $product_desc = $_POST['product_desc'];
        $product_keywords = $_POST['product_keywords'];
        //getting the image
        $product_image = $_FILES['product_image']['name'];
        $product_image_tmp = $_FILES['product_image']['tmp_name'];
        //move temp photo to folder
        move_uploaded_file($product_image_tmp, "../img/product-images/$product_image");
        
        $insert_product = "INSERT INTO Products (product_cat,   product_brand, product_title, product_price, product_desc, product_image, product_keywords) VALUES ('$product_cat', '$product_brand', '$product_title', '$product_price', '$product_desc', '$product_image', '$product_keywords')";
        //echo $insert_product;
        $insert_pro = mysqli_query($conn, $insert_product);
        
        if($insert_pro){
            echo "<script>alert('Product has been inserted')</script>";
            echo "<script>window.open('insert_product.php',_self')</script>";
        }else
            echo "error";
    }


?>


