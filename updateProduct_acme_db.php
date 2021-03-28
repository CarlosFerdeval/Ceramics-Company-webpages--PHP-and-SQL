<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title> Update Product acme_db</title>
    </head>
    <body>
        <?php
$conn = @mysqli_connect("localhost:3307","root","","acme");
// Check connection
if (mysqli_connect_errno())
{
echo "<p>Failed to connect to MySQL and the acme db: " . mysqli_connect_error() . "</p>";
}
else
{
echo "<p>Connected to MySQL and the acme DB</p>";
$query = "UPDATE products SET prodCost ='".$productCost."' WHERE id= ".$productID;
$results = mysqli_query($conn,$query);
$numRowsAffected = mysqli_affected_rows($conn);
if (!$results)
{
echo "<p>Error updating products data: " . mysqli_error($conn) . "</p>";
}
else
{


if ($numRowsAffected == 0)
{
$loginErr = "Error- ID could not be found in the table products.";
}
else
{
echo "<p>Product Cost successfully updated for product ID: ".$productID."</p>";
//Show the updated record
$query = "SELECT * FROM products WHERE id=".$productID;
$results = mysqli_query($conn,$query);
if ($results)
{
$numRecords=mysqli_num_rows($results);
if ($numRecords != 0)
{
//fetch and display results
while ($row = mysqli_fetch_array($results))
{
echo "<p>Product Name: $row[prodName]</p>";
echo "<p>Product Finish: $row[prodFinish]</p>";
echo "<p>Product Usage: $row[prodUsage]</p>";
echo "<p>Product Cost: $row[prodCost]</p>";
}
}
else
{
echo "<p>User ID not found!</p>";
}
}
else
{
echo "<p>User ID not found!</p>";
}
}
}
}
//Close the connection
mysqli_close($conn);
?>
    </body>
</html>
