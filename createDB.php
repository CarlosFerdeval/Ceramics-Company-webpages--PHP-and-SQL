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
        $conn = mysqli_connect("localhost:3307", "root", "");
        // Check connection
        if (mysqli_connect_errno()) {
            echo "<p>Failed to connect to MySQL: " . mysqli_connect_error() . "</p>";
        } else {
            echo "<p>Connected to DB</p>";
            // Create database and table
            $createDB = "DROP DATABASE IF EXISTS acme;";
            $createDB .= "CREATE DATABASE acme;";
            $createDB .= "USE acme;";
            $createDB .= "CREATE TABLE IF NOT EXISTS products(id int not null auto_increment primary key, prodName varchar(30) not null, prodFinish varchar (30) not null,prodUsage varchar (30) not null, prodCost float(8,2)not null);";
            
            //The inner if() statement uses the mysqli_multi_query() function. This function returns false if the first command fails.
            if (mysqli_multi_query($conn, $createDB)) {
                echo "<p>Database acme and table created successfully</p>";
            //The do … while loop is needed to move on to the next command in the multi query set
                do {
                    mysqli_next_result($conn);
                } while (mysqli_more_results($conn));
            } else {
                echo "<p>Error: " . mysqli_error($conn) . "</p>";
            }
        }
        ?>
    </body>
</html>
