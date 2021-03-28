<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    
    <head>
        <meta charset="UTF-8">
        <html lang="en">
        <title>Product Form</title>
        <link rel="stylesheet" type="text/css" href="./css/style1.css">
    </head>
    <style>
.error {
color: #FF0000;
}
</style>
<body>
<?php
$errMessageProductName="required field";
$errMessageProductFinish="required field";
$errMessageProductUsage="required field";
$errMessageProductCost="required field";
$errMessageAge="required field";
$errMessageName="required field";
$errMessagefileupload="";
$errMessageNofile=" No file upload";
$errMessageType="";
$productName ="";
$productFinish ="";
$productUsage ="";
$productCost ="";
$fileupload ="";
$filetype ="";

$invalidData=false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {//User has pressed the submit button
$productName = checkInput($_POST["productName"]);
$productFinish = checkInput($_POST["productFinish"]);
$productUsage = checkInput($_POST["productUsage"]);
$productCost = checkInput($_POST["productCost"]);


if($productName == "") {
$errMessageProductName=" Product Name must not be blank";
$invalidData = true;
}
else {
$errMessageProductName ="";
}
if($productFinish == "") {
$errMessageProductFinish="Product Finish must not be blank";
$invalidData = true;
}
else {
$errMessageProductFinish ="";
}
if($productUsage == "") {
$errMessageProductUsage="Product Usage must not be blank";
$invalidData = true;
}
else {
$errMessageProductUsage ="";
}
if($productCost == "") {
$errMessageProductCost="Product Cost must not be blank";
$invalidData = true;
}
elseif (!is_numeric($productCost)){
$errMessageProductCost="Product Cost must be numeric only";
$invalidData = true;
}
else {
$errMessageProductCost ="";
}

//if (($_FILES['images']['type'] == "image/jpeg") || ($_FILES['images']['type']== "image/png) )
//{
////image file is valid
//}
//else {
//}





$fileupload = $_FILES['images']['name'];
$filetype = $_FILES['images']['type'];
$filesize = $_FILES['images']['size'];
$tempname = $_FILES['images']['tmp_name'];
$filelocation = "images/$fileupload";
//make sure a file has been entered
if($fileupload == "") {
$errMessagefileupload="No file Uploaded";

}
else {
}
if (($_FILES['images']['type'] != "image/jpg") || ($_FILES['images']['type']!= "image/png"))
{
$errMessageType="image must be either a jpg or png file";
}
else {
}

if (!move_uploaded_file($tempname,$filelocation)) {
switch ($_FILES['images']['error'])
{
case UPLOAD_ERR_INI_SIZE:
echo "<p>Error: File exceeds the maximum size limit set by the server</p>" ;
break;

//case UPLOAD_ERR_TYPE:
//$errMessageType= "No file uploaded" ;
break;
case UPLOAD_ERR_FORM_SIZE:
echo "<p>Error: File exceeds the maximum size limit set by the browser</p>" ;
break;
case UPLOAD_ERR_NO_FILE:
$errMessageNofile= "No file uploaded" ;
break;
default:
echo "<p>File could not be uploaded </p>" ;
}
}
else
{
}


if ($invalidData == false){
 /*The include() statement is used to include php code from another file. 
 The php file connects to MySQL, creates the database and table and adds the fields from the
form to the table.   */
include('writetoDB.php');

/* Show thank you page */
include('cookies.php');
exit();
}

}



function checkInput($inputData) {
$inputData = trim($inputData);
$inputData = stripslashes($inputData);
$inputData = htmlspecialchars($inputData);
return $inputData;
}



?>
    <div class="row">
        <div class="col-75">
            <div class="container">
                <div class="row">
                    <div class="col-50">
                        <h1>Door Lever Inventory - Part 1</h1>
                       
                        <a href= "./updateProducts.php" class="btn">Update Product</a>
                        <a href="./deleteProduct.php" class="btn">Delete Product</a>
                        <a href="./loginDetails.php" class="btn">Login Account</a><br /><br />
                        
                        <h2>Product Entry Form</h2>
                        <p>Please enter the Door Lever product details into the form and when you are ready, click the submit button</p>
                        <form method="post" enctype='multipart/form-data'  action=<?php   echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>>
                            <label for="productName">Product Name: <input type="text" name="productName"  size="20" value="<?php echo
                            $productName;
                            ?>"><span class="error">* <?php echo $errMessageProductName; ?></span><br /><br /></label>
                            <label for="productFinish">Product Finish: <input type="text" name="productFinish"  size="20" value="<?php echo
                            $productFinish;
                            ?>"><span class="error">* <?php echo $errMessageProductFinish; ?></span><br /><br /></label>
                            <label for="productUsage">Product Usage: <input type="text" name="productUsage"  size="20" value="<?php echo
                            $productUsage;
                            ?>"><span class="error">* <?php echo $errMessageProductUsage; ?></span><br /><br /></label>
                            <label for="productCost">Product Cost: <input type="text" name="productCost"  size="20" value="<?php echo
                            $productCost;
                            ?>"><span class="error">* <?php echo $errMessageProductCost; ?></span><br /><br /></label>
                           
                            
                           
                            <input type='hidden' name='MAX_FILE_SIZE'  value='1048576'>
                            <label for="images">Upload Product Image</label><input type='file'  name='images'>
                            <span class="error">* <?php echo $errMessagefileupload; ?></span><br /><br /></label>
<!--                             <span class="error"> <?php echo $errMessageType; ?></span><br /><br /></label>-->
                           
                    </div>
                </div>
            </div>

            <button type="submit" name="submit" value="Submit" class="btn">Submit</button>

    </form>
</body>
</html>


