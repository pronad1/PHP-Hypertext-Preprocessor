<?php

echo strpos("Prosenjit","sen"),"<br> String in uppercase ",strtoupper("prosenjit");
echo "<br>Replaces some character with some other character in a string :",str_replace("sen","pria","Prosenjit");
$x = "Hello World!";
echo "<br>Start the slice from '$x' : ",substr($x, 6, 5);

echo "<br>Start the slice from '$x' start a position to end : ",substr($x, 6);

echo "<br>Use negative indexes to start the slice from the end of the string: ",substr($x, -5, 3);

$a=(int) $x;
echo "<br><br>Note that when casting a string that starts with a number, the (int) function uses that number. If it does not start with a number, the (int) function convert strings into the number 0.<br><br>";
var_dump($a);

?>