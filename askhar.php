hi
<?php
// Database connection details
$servername = "database-no-2.mysql.database.azure.com"; // e.g., "localhost" or the server IP
$username = "dbadmin2";
$password = "834765jhfsd@#$%resad234wqeftEWR";
$dbname = "sec_wordpress";
echo "sup";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, 3306);
echo "here!";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo "Not Connected successfully";
} else {
    echo "Connected successfully";
}

// Close connection
$conn->close();
