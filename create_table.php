<?php

$servername="localhost";
$username="root";
$password="";
$dbname="myphp";

$con=new mysqli($servername,$username,$password,$dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_errno());
}

$sql="CREATE TABLE Accademic(
id int(6) auto_increment primary key,
nam varchar(30),
mail varchar(20),
dep varchar(20)
)";

if ($con->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }

  $con->close();

?>