<?php

$host = "1221s.com.mysql.service.one.com"; /* Host name */
$user = "1221s_com_magikerensrejse"; /* User */
$password = "magikerensRejse:)"; /* Password */
$dbname = "1221s_com_magikerensrejse"; /* Database name */

// Create connection
$con = mysqli_connect($host, $user, $password,$dbname);

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
?>
