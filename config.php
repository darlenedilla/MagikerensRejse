<?php


//Darlene connect to server
// COMMENT THIS OUT WHEN UPLOADING TO LIVE
$server = "localhost";
$user = "Darlene"; 
$pw = "Dgs55qhk:).."; 
$db = "1221s_com_magikerensrejse"; 

// Create connection
$con = mysqli_connect($server, $user, $pw,$db);

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
} else {
  echo '<script>console.log("connected succesfully")</script>';
}
//echo "Connected successfully";
