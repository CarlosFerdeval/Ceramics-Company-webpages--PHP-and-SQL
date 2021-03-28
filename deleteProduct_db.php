<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php
$conn = @mysqli_connect("localhost:3307","root","","acme");
// Check connection
if (mysqli_connect_errno())
{
echo "<p>Failed to connect to MySQL and acme db: " . mysqli_connect_error() . "</p>";
}
else
{
echo "<p>Connected to MySQL and acme DB</p>";

$query = "DELETE FROM products WHERE id= ".$productID;
$results = mysqli_query($conn,$query);
$numRowsAffected = mysqli_affected_rows($conn);
if (!$results)
{
echo "<p>Error deleting product data: " . mysqli_error($conn) . "</p>";
}
else
{
if ($numRowsAffected == 0)
{
$loginErr = "Error- ID could not be found in the table products.";
}
else
{
echo "<p>product ID ".$productID." successfully deleted</p>";
}
}
}

//Close the connection
mysqli_close($conn);
?>
    </body>
</html>
