<?php 

// This file contains the database access information. 
// This file establishes a connection to MySQL and selects the database.

// Set the database access information as constants:
DEFINE ('DB_USER', 'dmr1674');  //replace yourusername with your own username
DEFINE ('DB_PASSWORD', '54NvPNqLo'); //replace yourDBpassword with your own DB password which (was originally sent via email from "root")
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'dmr1674'); //replace yourusername with your own username or your group db

// Make the connection:
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
//$dbc is a variable representing the current database connection which will be used by other pages to execute queries

mysqli_set_charset($connection,"utf8");
?>
