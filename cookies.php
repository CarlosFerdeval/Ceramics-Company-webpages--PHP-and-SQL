<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <title>Product Form Confirmation</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/style1.css">
    </head>
    <body>
        <div class="col-75">
        <h1>Products</h1>
        <h1>File Uploaded</h1>
       
        
        <p>Product details successfully added to the database.</p>
        
        
          
        

<a href='productFormValidation.php'>Return to Product Form form</a>
        </div>
    </body>
</html>
   
        <?php
        


        $productID = 0;
        if (isset($_COOKIE['count'])) {
            $productID = ++$_COOKIE['count'];
        } else {
            $productID =1;
        }
          setcookie("count", $productID, time() + (86400 * 7));
          
         echo "<img src= '$filelocation' height='300' width='200'/>";


             if ($productID == 1) {
                 echo "<p>The product ID for this product is 1<p>";
             } else {
                 echo "<p>The product ID for this product is <b>" .
$_COOKIE['count'] . "</b> .<p>";
             }
             ?>
        





    
