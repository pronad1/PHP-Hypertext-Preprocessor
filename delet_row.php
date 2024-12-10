<?php

$sn="localhost";
$un="root";
$pa="";
$db="myphp";

$conn=new mysqli($sn,$un,$pa,$db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  // sql to delete a record
  $sql = "DELETE FROM accademic WHERE nam='dipjoy'";
  
  if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }
  
  $conn->close();

?>