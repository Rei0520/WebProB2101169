<?php

// 1 connect to DB

define("LOCALHOST" , "localhost");
define("DBUSER" , "root");
define("DBPASS" , "");
define("DBNAME" , "BIT210_Project");
define("POST", "3306");

$con = new mysqli(LOCALHOST , DBUSER, DBPASS , DBNAME);

?>