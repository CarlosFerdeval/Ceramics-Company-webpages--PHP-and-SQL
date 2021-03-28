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
//Connect to the database server using the syntax mysqli_connect(server, username, password)
$conn = @mysqli_connect("localhost:3307", "root", "");
if (!$conn) {
echo "<p>Failed to connect to MySQL: " . mysqli_connect_error() . "</p>";
}
else
{
    $dbName ="acme";
$query = "CREATE DATABASE IF NOT EXISTS ". $dbName;
if (!mysqli_query($conn,$query))
{
echo "<p>Could not open the database: " . mysqli_error($conn)."</p>";
}
else
{
if (!mysqli_select_db($conn,$dbName))
{
echo "<p>Could not open the database: " . mysqli_error($conn)."</p>";
}
else
{
$query = "CREATE TABLE IF NOT EXISTS userLogin (username varchar(50) not null primary key
,userpassword varchar(255) not null)";
if (!mysqli_query($conn,$query))
{
echo "<p>table query failed: " . mysqli_error($conn)."</p>";
}
else
{
$userName = $_POST['userName'];
$userPassword = $_POST['userPassword'];
$query = "SELECT * FROM userLogin WHERE username='".$userName."'";
$results = mysqli_query($conn,$query);
if ($results)
{
$numRecords=mysqli_num_rows($results);
if ($numRecords != 0) //found a match with the username
{
//need to verify user - check the password
$row = mysqli_fetch_array($results);
$hashedPassword = $row['userpassword'];
$passwordsAreTheSame = password_verify($userPassword,$hashedPassword);
if ($passwordsAreTheSame == true)
{
$loginErr="Passwords match!";
}
else
{
$loginErr = "Username exists but the Password does not match the stored
password.";
}
}
else
{
$loginErr = "This user does not exist in the table.";
$hashedPassword = password_hash($userPassword,PASSWORD_DEFAULT);


}
}
}
}
}
}

?>


    </body>
</html>