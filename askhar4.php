<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "4";
// Database connection details
$host = "database-no-2.mysql.database.azure.com";
$username = "dbadmin2";
$password = "834765jhfsd@#$%resad234wqeftEWR";
$database = "sec_wordpress";
$port = 3306;

$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, "bin/DigiCertGlobalRootCA.crt.pem", NULL, NULL);
mysqli_real_connect($conn, $host, $username, $password, $database, 3306, MYSQLI_CLIENT_SSL);
if (mysqli_connect_errno()) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}

echo "Connected successfully";
