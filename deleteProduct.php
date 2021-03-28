<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Delete Product</title>
        <link rel="stylesheet" type="text/css" href="./css/style1.css">
    </head>
    <style>
    .error {
    color: #FF0000;
   }
    </style>
    <body>
        <?php
        $errMessageID = "required field";       
        $loginErr = "";
        $productID = "";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") { //User has pressed the submit button
            $productID = $_POST["productId"];
            if ($productID == "") {
                $errMessageID = "Product ID must not be blank";
            } elseif (!is_numeric($productID)) {
                $errMessageID = "Product ID must be numeric only";
            } else {
                include('deleteProduct_db.php');
                
            }
        }
        ?>
        <div class="row">
            <div class="col-75">
                <div class="container">
                    <h1>Delete Product </h1>
                    <a href="./productFormValidation.php" class="btn">Add Product</a>
                    <a href="./loginDetails.php" class="btn">Login Account</a>
                    <a href= "./updateProducts.php" class="btn">Update Product</a><br /><br />
                    
                    
                    <form method="post" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>>
                        <label for="productId">Enter product ID: <input type="text" id="productId" name="productId" size="20" value="<?php echo
                        $productID;
                        ?>"><span class="error">* <?php echo $errMessageID; ?></span><br /><br /></label>
                        <input type="submit" name="submit" value="Submit" class="btn">
                        <br /><br /><span class="error"><?php echo $loginErr;?></span><br /><br />
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
