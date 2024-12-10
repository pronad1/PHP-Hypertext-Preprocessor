<?php
$servername="localhost";
$username="username";
$password="password";

$conn= new mysqli($servername,$username,$password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_errno());
}

echo "Connected successfully";

?>