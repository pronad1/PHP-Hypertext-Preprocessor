<?php
$servername="localhost";
$username="root";
$passsword="";
$dbname="mydb";

// Create connection
$con=new mysqli($servername,$username,$passsword);

//Check connection
if (!$con) {
    die("Connection Failed: " . mysqli_connect_errno());
}

// sql delete databse

$sql="DROP DATABASE $dbname";
if (mysqli_query($con,$sql)) {
    echo "Database Deleted successfullu";
}
else {
    echo "Error deleting database:" . mysqli_connect_errno();
}

// Close connection
$con->close();

?>