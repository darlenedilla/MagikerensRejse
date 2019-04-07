<?php

$host = "1221s.com.mysql.service.one.com"; /* Host name */
$user = "1221s_com_portfolio"; /* User */
$password = "mku72szz"; /* Password */
$dbname = "1221s_com_portfolio"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}