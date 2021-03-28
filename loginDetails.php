<!DOCTYPE html>
<?php
$errMessageUserName = "required field"; //this needs to be outside of the if statement otherwise
//this will not be recognised in the form tags
$errMessageUserPassword = "required field";
$userName = "";
$userpassword = "";
$loginErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") { //User has pressed the submit button
    if (isset($_POST["reset"])) {
        header("Refresh:0");
        exit();
    }
    $userName = checkInput($_POST["userName"]);
    $userPassword = checkInput($_POST["userPassword"]);
    $errMessageUserName = "";
    $errMessageUserPassword = "";
    $validData = true;
    if ($userName == "") {
        $errMessageUserName = "User Name must not be blank";
        $validData = false;
    }
    if ($userPassword == "") {
        $errMessageUserPassword = "Password must not be blank";
        $validData = false;
    }
    if ($validData) {
        include("loginDetails_Verify.php");
       
    }
}

function checkInput($inputData) {
    $inputData = trim($inputData);
    $inputData = stripslashes($inputData);
    $inputData = htmlspecialchars($inputData);
    return $inputData;
}

?>

    <head>
        <meta charset="UTF-8">
        <title>Login Details</title>
         <link rel="stylesheet" type="text/css" href="./css/style1.css">
    </head>
<style>
.error {
color: #FF0000;
}
</style>
    <body>
        
        
        <form method="post" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>>
       <div class="row">
         <div class="col-75">
            <div class="container">
                <div class="row">
                    <div class="col-50">
            <h1>Login Details</h1>
            <a href="./productFormValidation.php" class="btn">Add Product</a>
            <a href= "./updateProducts.php" class="btn">Update Product</a>
            <a href="./deleteProduct.php" class="btn">Delete Product</a><br /><br />
            
            <label for="userName">Username:</label><input type="text" id="userName" name="userName" size="20"
            value="<?php echo $userName; ?>"><span class="error">* <?php echo $errMessageUserName; ?></span>
            <br /><br />
            <label for="userPassword">Password:</label><input type="password" id="userPassword" name="userPassword"
            size="20" value=""><span class="error">* <?php echo $errMessageUserPassword; ?></span><br /><br />
            <input type="submit" name="submit" value="Submit" class="btn">
            <input type="submit" name="reset" value="Reset" title="Reset Form" class="btn">
            <br /><br /><span class="error"><?php echo $loginErr;?></span><br /><br />
                 </div>
            </div>
            </div>     
         </div>
         </div> 
        </form>
    </body>
