<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Product Cost Form</title>
        <link rel="stylesheet" type="text/css" href="./css/style1.css">
    </head>
    <div><style>
   .error {
   color: #FF0000;
   }
    </style></div>
    <body>
        <?php
        $errMessageID = "required field";         
        $errMessageProductCost="required field";
        $productID = "";
        $productCost ="";
        $loginErr = "";
        
        $invalidData=false;
        if ($_SERVER["REQUEST_METHOD"] == "POST") { //User has pressed the submit button
            $productID = $_POST["productId"];
            $productCost = $_POST["productCost"];
            if ($productID  == "") {
                $errMessageID = "Product ID must not be blank";
                $invalidData = true;
            }               
            elseif (!is_numeric($productID)){
                $errMessageID="Product ID must be numeric only";
                $invalidData = true;
            } 
            else {
                   $errMessageID ="";    
            }
            if ($productCost == "") {
                $errMessageProductCost = "Product Cost must not be blank";
                $invalidData = true;
            } 
            
            elseif (!is_numeric($productCost)) {
                $errMessageProductCost = "Product Cost must be numeric only";
                $invalidData = true;
            } 
            elseif ($productCost < 20 || $productCost > 200 ) {
                $errMessageProductCost = "Product Cost must between 20 and 200";
                $invalidData = true;
            }
            else {
                   $errMessageProductCost ="";
            }
            
            if ($invalidData == false){
                include('updateProduct_acme_db.php');
               
            }
        }
       
        ?>
        <div class="row">
            <div class="col-75">
                <div class="container">
                    <h1>Update Product Cost Form</h1>
                    <a href="./productFormValidation.php" class="btn">Add Product</a>
                    <a href="./loginDetails.php" class="btn">Login Account</a>                   
                    <a href="./deleteProduct.php" class="btn">Delete Product</a><br /><br />
                    
                    
                    <form method="post" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>>
                        <label for="productId">Enter product ID: <input type="text" id="productId" name="productId" size="20" value="<?php echo
                         $productID;
                         ?>"><span class="error">* <?php echo $errMessageID; ?></span><br /><br /></label>
                        <label for="productCost">Enter Product Cost: <input type="text" id="productCost" name="productCost" size="20"
                        value="<?php echo $productCost; ?>"><span class="error">* <?php echo $errMessageProductCost; ?></span><br /><br/></label>
                        <input type="submit" name="submit" value="Submit" class="btn">
                        <br /><br /><span class="error"><?php echo $loginErr;?></span><br /><br />
                    </form>
                </div>
            </div>
        </div>
    </body>

</html>
