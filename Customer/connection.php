<?php

define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "TourismManagementCompany");
// Define the port number as a constant
define("PORT", 5222);

// Pass the port number as a parameter to mysqli_connect
$connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE,PORT);

if (!$connection) {
    die("Connection Failed");
} else {
    //echo "yes";
}
