<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "3";
// Database connection details
$host = "wptest22-d4494f6580-wpdbserver.mysql.database.azure.com";
$username = "wptest22-d4494f6580-wpidentity";
$password = "834765jhfsd@#$%resad234wqeftEWR";
$database = "wptest22_d4494f6580_database";
$port = 3306;

// Create connection
$conn = new mysqli($host, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
