<?php
$servername = "localhost"; // Replace with your database server name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$database = "shoeslab"; // Replace with your database name




$connection = mysqli_connect($servername, $username, $password, $database) or die (mysqli_error($connection));

?>