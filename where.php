<?php

$sn="localhost";
$un="root";
$pa="";
$db="myphp";

$co=new mysqli($sn,$un,$pa,$db);
if(!$co){
    die("Connection failed: ".mysqli_connect_errno());
}
$sql="SELECT id,nam,dep FROM accademic where dep='CSE'";

$res=$co->query($sql);

if ($res->num_rows >0) {
    while ($row=$res->fetch_assoc()) {
        echo "id: ",$row["id"]," - Name: ",$row["nam"]," -Dept: ",$row["dep"],"<br>";
    }
}
else {
    echo "0 results: ";
}
$co->close();
?>