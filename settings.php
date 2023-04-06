
<?php
$host = "localhost";
$user = "root";
$pwd = "";
$sql_db = "assignment 2";
$port = 8080;

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (mysqli_connect_errno()) {
    // Handle connection error
    $error_message = "Failed to connect to MySQL: " . mysqli_connect_error();
    die($error_message);
}


// Replace with your database credentials
$host_orders = "localhost";
$user_orders = "root";
$pwd_orders = "";
$sql_db_orders = "assignment 2";

// Create connection
$conn_orders = mysqli_connect($host_orders, $user_orders, $pwd_orders, $sql_db_orders);

// Check connection
if (!$conn_orders) {
  die("Connection failed: " . mysqli_connect_error());
}

?>