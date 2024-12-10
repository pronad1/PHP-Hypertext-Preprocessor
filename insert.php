<?php

$sn="localhost";
$un="root";
$pa="";
$db="myphp";

$con=new mysqli($sn,$un,$pa,$db);

if (!$con) {
    dir("Connection failed: ", mysqli_connect_errno());
}

$sql="INSERT INTO accademic(id,nam,dep,mail)
VALUES(2102049,'Prosenjit Mondol','CSE','prosenjit1156@gmail.com')";

$sql="INSERT INTO accademic(nam,dep,mail)
VALUES('dipjoy','EEE','@gmail.com')";



if ($con->query($sql)==TRUE) {
    $last_id=$con->insert_id;
    echo "New record created successfully. Last inserted ID is : ",$last_id;
}
else{
    echo "Error: " , $sql , "<br>",mysqli_connect_errno();
}


?>