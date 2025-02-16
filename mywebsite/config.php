<?php
$host = "localhost"; 
$user = "root";  
$pass = "";  
$dbname = "student"; 

$conn = new mysqli( $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
