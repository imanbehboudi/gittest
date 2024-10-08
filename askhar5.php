<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
echo "555";

// Database connection parameters
$host = "wptest22-d4494f6580-wpdbserver.mysql.database.azure.com";
$username = "wptest22-d4494f6580-wpidentity";
$password = "834765jhfsd@#$%resad234wqeftEWR";
$database = "wptest22_d4494f6580_database";
$port = 3306;
$cert = "bin/DigiCertGlobalRootCA.crt.pem";

/* Initialize MySQLi connection
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

*/






use Microsoft\Azure\Identity\DefaultAzureCredential;
use Microsoft\Azure\Database\MySQL\MySQLConnection;

// Acquire access token using DefaultAzureCredential
$credential = new DefaultAzureCredential();
$token = $credential->getToken("https://ossrdbms-aad.database.windows.net");

// Token-based connection to the MySQL database
$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, $cert, NULL, NULL);

// Use the token instead of a password
if (!mysqli_real_connect($conn, $host, $username, NULL, $database, $port, NULL, MYSQLI_CLIENT_SSL)) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully using token-based authentication and SSL<br>";
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
