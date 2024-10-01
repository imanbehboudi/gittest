<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "2";
// Database connection details
$host = "database-no-2.mysql.database.azure.com";
$username = "dbadmin2";
$password = "834765jhfsd@#$%resad234wqeftEWR";
$database = "sec_wordpress";
$port = 3306;

// Create connection
$conn = new mysqli($host, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
