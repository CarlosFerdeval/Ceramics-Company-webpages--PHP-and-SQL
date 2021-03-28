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
        
        $conn = @mysqli_connect("localhost:3307", "root", "");
if (!$conn)
{
echo "The connection has failed: " . mysqli_error($conn);

}
else
{
//echo "Successfully connected to mySQL!";
//Need to create a database called test
$query = "CREATE DATABASE IF NOT EXISTS acme";
if (!mysqli_query($conn,$query))
{
echo "<p>Could not create the database: " . mysqli_error($conn)."</p>";
}
else
{
//echo "<p>Database successfully created</p>";
if (!mysqli_select_db($conn,"acme"))
{
echo "<p>Could not open the database: " . mysqli_error($conn)."</p>";
}
else
{
//echo "<p>Database selection successful</p>";
$query = "CREATE TABLE IF NOT EXISTS products(id int not null auto_increment primary key, prodName varchar(30) not null, prodFinish varchar (30) not null,prodUsage varchar (30) not null, prodCost float(8,2)not null, imagePath varchar (60)not null) ;";
if (!mysqli_query($conn,$query))
{
echo "table query failed: " . mysqli_error($conn);
}
else
{
//echo "<p>table query successful</p>";
//insert data in the table
$insert = "INSERT INTO products (prodName, prodFinish, prodUsage,prodCost,imagePath) VALUES ('$_POST[productName]','$_POST[productFinish]',
'$_POST[productUsage]', '$_POST[productCost]', '$filelocation' )";
//$insert = "INSERT INTO products(imagePath) VALUES ('$filelocation')";

if (mysqli_query($conn,$insert))
{
//update successful, retrieve the auto id - NameID
$productID = mysqli_insert_id($conn);
}
else
{
echo "table query failed: " . mysqli_error($conn);
}
}
}
}
}
//Close the connection
mysqli_close($conn);
?>
        
    </body>
</html>







<!--<!DOCTYPE html>

To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        //<?php
//        
//        $conn = @mysqli_connect("localhost:3307", "root", "");
//if (!$conn)
//{
//echo "The connection has failed: " . mysqli_error($conn);
//
//}
//else
//{
////echo "Successfully connected to mySQL!";
////Need to create a database called test
//$query = "CREATE DATABASE IF NOT EXISTS acme";
//if (!mysqli_query($conn,$query))
//{
//echo "<p>Could not create the database: " . mysqli_error($conn)."</p>";
//}
//else
//{
////echo "<p>Database successfully created</p>";
//if (!mysqli_select_db($conn,"acme"))
//{
//echo "<p>Could not open the database: " . mysqli_error($conn)."</p>";
//}
//else
//{
////echo "<p>Database selection successful</p>";
//$query = "CREATE TABLE IF NOT EXISTS products(id int not null auto_increment primary key, prodName varchar(30) not null, prodFinish varchar (30) not null,prodUsage varchar (30) not null, prodCost float(8,2)not null,  imagePath varchar (100)not null));";
//if (!mysqli_query($conn,$query))
//{
//echo "table query failed: " . mysqli_error($conn);
//}
//else
//{
////echo "<p>table query successful</p>";
////insert data in the table
//$insert = "INSERT INTO products (prodName, prodFinish, prodUsage,prodCost, imagePath) VALUES ('$_POST[productName]','$_POST[productFinish]',
//'$_POST[productUsage]', '$_POST[productCost]', '$filelocation' )";
//
//if (mysqli_query($conn,$insert))
//{
////update successful, retrieve the auto id - NameID
//$productID = mysqli_insert_id($conn);
//}
//else
//{
//echo "table query failed: " . mysqli_error($conn);
//}
//}
//}
//}
//}
////Close the connection
//mysqli_close($conn);
//?>
        
    </body>
</html>
-->
