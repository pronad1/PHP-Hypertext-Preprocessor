<?php

$sn="localhost";
$un="root";
$pa="";
$db="myphp";

$co=new mysqli($sn,$un,$pa,$db);

if(!$co){
    dir("Connection failed: ",mysqli_connect_errno());

}


$sql="INSERT INTO accademic(nam,dep,mail)
VALUES('Md. Naiem','CSE','11@gmail.com')";
$sql="INSERT INTO accademic(nam,dep,mail)
VALUES('Tanmoy','CCE','1@gmail.com')";
$sql="INSERT INTO accademic(nam,dep,mail)
VALUES('Sakib','CSIT','SK@gmail.com')";

if ($co->multi_query($sql)==TRUE) {
    $li=$co->insert_id;
    echo "New records created successfully and the last id is ",$li;
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
?>