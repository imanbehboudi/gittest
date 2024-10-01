<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
echo "44";

// Database connection parameters
$host = "database-no-2.mysql.database.azure.com";
$username = "dbadmin2";
$password = "834765jhfsd@#$%resad234wqeftEWR";
$database = "sec_wordpress";
$port = 3306;
$cert = "bin/DigiCertGlobalRootCA.crt.pem";

// Initialize MySQLi connection
$conn = mysqli_init();

// Set SSL parameters (update the path with the actual location of the CA cert)
mysqli_ssl_set($conn, NULL, NULL, $cert, NULL, NULL);

// Establish a connection to the Azure MySQL database using SSL
if (!mysqli_real_connect($conn, $host, $username, $password, $database, $port, NULL, MYSQLI_CLIENT_SSL)) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully using SSL<br>";
}

// SQL query to get the list of tables
$sql = "SHOW TABLES";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Tables in the database:<br>";
    while ($row = mysqli_fetch_row($result)) {
        echo $row[0] . "<br>";
    }
} else {
    echo "Error fetching tables: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
