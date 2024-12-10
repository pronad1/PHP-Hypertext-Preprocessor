<?php
$servername="localhost";
$username="root";
$password="";

$con= new mysqli($servername,$username,$password);

if (!$con) {
    die("Connection failed: " . mysqli_connect_errno());
}

echo "Connected successfully settle.";

?>