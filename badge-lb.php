<?php
/*
Template name: badge tester
*/
$server ="localhost";
$user ="root";
$pw ="";
$db = "1221s_com_magikerensrejse";

// Create connection
$con = new mysqli($server, $user, $pw, $db);
//check fann_get_total_connections
if ($con->connect_error) {
  die("Connection failed:" .$con->connect_error);
} else {
  echo '<script>console.log("connected succesfully")</script>';
}

  $userCookie = $_COOKIE['user']; //Henter brugernavnet på den bruger, der er logget ind



//Fetching the badges this user has
$selectBadgeSql = "SELECT badge.badgeId as badgeId
              FROM badge, userbadge
              WHERE userbadge.userId = $userCookie
              AND userbadge.badgeId = badge.badgeId
              AND userbadge.badgeId IN (1,2,3,4,5,6,7,8,9,10,11,13,14,15,16,17,18,19,20,21)
              GROUP BY badge.badgeId;";

$selectBadgeQuery = $con->query($selectBadgeSql);
if($selectBadgeQuery->num_rows > 0){
   //output data of each row

     $badgeArray = array();
  while ($selectBadgeRow = $selectBadgeQuery->fetch_assoc()) {

      foreach ($selectBadgeRow as $key => $value) {
        array_push($badgeArray, $value);
      }
  }


}
else{
  echo "<a href='https://mr.1221s.com/login/'>Gå til forsiden</a>";

?>
