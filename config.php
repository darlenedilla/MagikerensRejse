<?php
  //Nanna Connect to server
  //COMMENT THIS OUT WHEN UPLOADING TO LIVE
  // $host ="localhost";
  // $user ="root";
  // $password ="";
  // $dbname = "1221s_com_magikerensrejse";

$host = "1221s.com.mysql.service.one.com"; /* Host name */
$user = "1221s_com_magikerensrejse"; /* User */
$password = "magikerensRejse:)"; /* Password */
$dbname = "1221s_com_magikerensrejse"; /* Database name */

// Create connection
$con = mysqli_connect($host, $user, $password,$dbname);

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
} else {
  echo '<script>console.log("connected succesfully")</script>';
}
//echo "Connected successfully";
