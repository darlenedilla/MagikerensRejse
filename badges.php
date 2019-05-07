<?php get_header();
/*
Template name: slider
*/

  // UN-COMMENT THIS WHEN UPLOADING TO LIVE
  // include("config.php");

  //Darlene Connect to server
  // $server ="localhost";
  // $user ="Darlene";
  // $pw ="Dgs55qhk:)..";
  // $db = "1221s_com_magikerensrejse";

  //Nanna Connect to server
  //COMMENT THIS OUT WHEN UPLOADING TO LIVE
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

    $user = 28141151; //SKAL LAVES OM SÅ DEN FINDER DEN BRUGER DER ER LOGGET IND!!!!

    $fetchUser = "SELECT user.magicalName FROM user WHERE phoneNo = $user";

    $fetchUserQuery = $con->query($fetchUser);

    if($fetchUserQuery->num_rows > 0){
      //output data of each row
      while($fetchUserRow= $fetchUserQuery->fetch_assoc()){
        //Variables to use in html
        $magicalName = $fetchUserRow['magicalName'];
      }
    }
    else{
      echo "0 results";
    };

    $cookie_name = "user";
    echo "<script>console.log('Cookie was set: $_COOKIE[$cookie_name]');</script>";



//Fetching the badges this user has

$fetchBadges = "SELECT `badgeId` FROM `userBadge` WHERE `userID` = $user";
$fetchBadgeResult = $con->query($fetchBadges);
if($fetchBadgeResult->num_rows > 0){
  while ($badgesAcquired = $fetchBadgeResult->fetch_assoc()) {


 //check for 'Magiker' badges
 $badge_1 = in_array(1, $badgesAcquired, TRUE);
 $badge_2 = in_array(2, $badgesAcquired, TRUE);
 $badge_3 = in_array(3, $badgesAcquired, TRUE);
 $badge_4 = in_array(4, $badgesAcquired, TRUE);

 //check for 'Alkymist' badges
 $badge_5 = in_array(5, $badgesAcquired, TRUE);
 $badge_6 = in_array(6, $badgesAcquired, TRUE);
 $badge_7 = in_array(7, $badgesAcquired, TRUE);
 $badge_8 = in_array(8, $badgesAcquired, TRUE);

 //check for 'Quidditch stjerne' badges
 //NOTE: Jeg fuckede up med nummereringen så nr. 12 springes over!
 $badge_9 = in_array(9, $badgesAcquired, TRUE);
 $badge_10 = in_array(10, $badgesAcquired, TRUE);
 $badge_11= in_array(11, $badgesAcquired, TRUE);
 $badge_13 = in_array(13, $badgesAcquired, TRUE);

 //check for 'Dragetæmmer' badges
 $badge_14 = in_array(14, $badgesAcquired, TRUE);
 $badge_15 = in_array(15, $badgesAcquired, TRUE);
 $badge_16 = in_array(16, $badgesAcquired, TRUE);
 $badge_17 = in_array(17, $badgesAcquired, TRUE);

 //check for 'Erfaren Magiker' badges
 $badge_18 = in_array(18, $badgesAcquired, TRUE);
 $badge_19 = in_array(19, $badgesAcquired, TRUE);
 $badge_20 = in_array(20, $badgesAcquired, TRUE);
 $badge_21 = in_array(21, $badgesAcquired, TRUE);


 ?><h1><?php print_r($badgesAcquired); ?></h1>

<?php
if ($badge_1) {
echo "badge 1 found";
};


?>

    <section class="badgeIndex">
        <h2 id="welcome">Velkommen</h2>
        <div class="ribbonContainer">
            <h3 class="magicalName"><?php echo $magicalName; ?></h3>
            <img class="ribbon" src="<?php echo get_stylesheet_directory_uri();?>/img/ribbon.png" alt="Ribbon">
        </div>
        <div class="slickContainer badgeContainer">

          <!-- Magiker Box -->
            <div class="badge slickItem" id="magiker">
                <img class="journeyBadge" src="<?php echo get_stylesheet_directory_uri();?>/img/badges/magiker/magikerBadge.png">

                <div id="cape" class="badgeImg top-left">
                  <img class="badgeActualImg

                  <?php
                  // check if badge has been acquired, and if it has, add an extra class to it:
                  // NOTE: Its important that the badge number is correct!!!
                    if ($badge_1) {
                    echo " badgeAcquired";
                  }; ?>"

                  src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/magiker/capeBadge.png">
                </div>

                <div id="wand" class="badgeImg top-right">
                  <img class="badgeActualImg

                  <?php
                  // check if badge has been acquired, and if it has, add an extra class to it:
                  // NOTE: Its important that the badge number is correct!!!
                    if ($badge_2 ) {
                    echo "badgeAcquired";
                  }; ?>"

                   src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/magiker/wandBadge.png">
                </div>

                <div id="ghost" class="badgeImg bottom-left">
                  <img class="badgeActualImg

                  <?php
                  // check if badge has been acquired, and if it has, add an extra class to it:
                  // NOTE: Its important that the badge number is correct!!!
                    if ($badge_4) {
                    echo "badgeAcquired";
                  }; ?>"

                   src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/magiker/ghostBadge.png">
                </div>

                <div id="nordheim" class="badgeImg bottom-right">
                  <img class="badgeActualImg

                  <?php
                  // check if badge has been acquired, and if it has, add an extra class to it:
                  // NOTE: Its important that the badge number is correct!!!
                    if ($badge_3 ) {
                    echo "badgeAcquired";
                  }; ?>"

                   src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/magiker/nordheimBadge.png">
                </div>

            </div>

            <!-- Alkymist box -->
            <div class="badge slickItem" id="alkymist">
                <img class="journeyBadge" src="<?php echo get_stylesheet_directory_uri();?>/img/badges/alkymist/alkymistBadge.png">

                <div id="botanik" class="badgeImg top-left">
                  <img class="badgeActualImg

                  <?php
                  // check if badge has been acquired, and if it has, add an extra class to it:
                  // NOTE: Its important that the badge number is correct!!!
                    if ($badge_7 ) {
                    echo "badgeAcquired";
                  }; ?>"

                   src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/alkymist/botanikBadge.png">
                </div>

                <div id="skabninger" class="badgeImg top-right">
                  <img  class="badgeActualImg

                  <?php
                  // check if badge has been acquired, and if it has, add an extra class to it:
                  // NOTE: Its important that the badge number is correct!!!
                    if ($badge_8 ) {
                    echo "badgeAcquired";
                  }; ?>"

                   src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/alkymist/creatureBadge.png">
                </div>

                <div id="eliksir" class="badgeImg bottom-left">
                  <img class="badgeActualImg

                  <?php
                  // check if badge has been acquired, and if it has, add an extra class to it:
                  // NOTE: Its important that the badge number is correct!!!
                    if ($badge_5 ) {
                    echo "badgeAcquired";
                  }; ?>"

                   src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/alkymist/eliksirBadge.png">
                </div>

                <div id="spisWand" class="badgeImg bottom-right">
                  <img class="badgeActualImg

                  <?php
                  // check if badge has been acquired, and if it has, add an extra class to it:
                  // NOTE: Its important that the badge number is correct!!!
                    if ($badge_6 ) {
                    echo "badgeAcquired";
                  }; ?>"

                   src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/alkymist/spiswandBadge.png">
                </div>

            </div>

            <!-- Quidditch Stjerne Box -->
            <div class="badge slickItem" id="quidditch">
                <img class="journeyBadge" src="<?php echo get_stylesheet_directory_uri();?>/img/badges/quidditch/qBadge.png">

                <div id="qturnering" class="badgeImg top-left">
                  <img class="badgeActualImg

                  <?php
                  // check if badge has been acquired, and if it has, add an extra class to it:
                  // NOTE: Its important that the badge number is correct!!!
                    if ($badge_10 ) {
                    echo "badgeAcquired";
                  }; ?>"

                   src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/quidditch/qtournamentBadge.png">
                </div>

                <div id="quidditch" class="badgeImg top-right">
                  <img class="badgeActualImg

                  <?php
                  // check if badge has been acquired, and if it has, add an extra class to it:
                  // NOTE: Its important that the badge number is correct!!!
                    if ($badge_9 ) {
                    echo "badgeAcquired";
                  }; ?>"

                   src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/quidditch/quidditchBadge.png">
                </div>

                <div id="kost" class="badgeImg bottom-left">
                  <img class="badgeActualImg

                  <?php
                  // check if badge has been acquired, and if it has, add an extra class to it:
                  // NOTE: Its important that the badge number is correct!!!
                    if ($badge_13 ) {
                    echo "badgeAcquired";
                  }; ?>"

                   src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/quidditch/broomBadge.png">
                </div>

                <div id="snitch" class="badgeImg bottom-right">
                  <img class="badgeActualImg

                  <?php
                  // check if badge has been acquired, and if it has, add an extra class to it:
                  // NOTE: Its important that the badge number is correct!!!
                    if ($badge_11 ) {
                    echo "badgeAcquired";
                  }; ?>"

                   src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/quidditch/snitchBadge.png">
                </div>

            </div>

            <!-- Dragetæmmer box -->
            <div class="badge slickItem" id="dragetaemmer">
                <img class="journeyBadge" src="<?php echo get_stylesheet_directory_uri();?>/img/badges/drage/drageBadge.png">

                <div id="egg" class="badgeImg top-left">
                  <img class="badgeActualImg

                  <?php
                  // check if badge has been acquired, and if it has, add an extra class to it:
                  // NOTE: Its important that the badge number is correct!!!
                    if ($badge_14 ) {
                    echo "badgeAcquired";
                  }; ?>"

                   src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/drage/eggBadge.png">
                </div>

                <div id="foldDrage" class="badgeImg top-right">
                  <img class="badgeActualImg

                  <?php
                  // check if badge has been acquired, and if it has, add an extra class to it:
                  // NOTE: Its important that the badge number is correct!!!
                    if ($badge_16 ) {
                    echo "badgeAcquired";
                  }; ?>"

                   src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/drage/dragonBadge.png">
                </div>

                <div id="dyrsPasning" class="badgeImg bottom-left">
                  <img class="badgeActualImg

                  <?php
                  // check if badge has been acquired, and if it has, add an extra class to it:
                  // NOTE: Its important that the badge number is correct!!!
                    if ($badge_15 ) {
                    echo "badgeAcquired";
                  }; ?>"

                   src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/drage/animalBadge.png">
                </div>

                <div id="zoo" class="badgeImg bottom-right">
                  <img class="badgeActualImg

                  <?php
                  // check if badge has been acquired, and if it has, add an extra class to it:
                  // NOTE: Its important that the badge number is correct!!!
                    if ($badge_17 ) {
                    echo "badgeAcquired";
                  }; ?>"

                   src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/drage/zooBadge.png">
                </div>

            </div>

            <!-- Erfaren magiker box -->
            <div class="badge slickItem" id="erfaren">
                <img class="journeyBadge" src="<?php echo get_stylesheet_directory_uri();?>/img/badges/erfaren/erfarenBadge.png">

                <div id="concert" class="badgeImg top-left">
                  <img class="badgeActualImg

                  <?php
                  // check if badge has been acquired, and if it has, add an extra class to it:
                  // NOTE: Its important that the badge number is correct!!!
                    if ($badge_20 ) {
                    echo "badgeAcquired";
                  }; ?>"

                   src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/erfaren/concertBadge.png">
                </div>

                <div id="prom" class="badgeImg top-right">
                  <img class="badgeActualImg

                  <?php
                  // check if badge has been acquired, and if it has, add an extra class to it:
                  // NOTE: Its important that the badge number is correct!!!
                    if ($badge_21 ) {
                    echo "badgeAcquired";
                  }; ?>"

                   src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/erfaren/promBadge.png">
                </div>

                <div id="storms" class="badgeImg bottom-left">
                  <img class="badgeActualImg

                  <?php
                  // check if badge has been acquired, and if it has, add an extra class to it:
                  // NOTE: Its important that the badge number is correct!!!
                    if ($badge_19 ) {
                    echo "badgeAcquired";
                  }; ?>"

                   src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/erfaren/stormsBadge.png">
                </div>

                <div id="toad" class="badgeImg bottom-right">
                  <img class="badgeActualImg

                  <?php
                  // check if badge has been acquired, and if it has, add an extra class to it:
                  // NOTE: Its important that the badge number is correct!!!
                    if ($badge_18 ) {
                    echo "badgeAcquired";
                  }; ?>"

                   src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/erfaren/toadBadge.png">
                </div>

            </div>
            <p>
                Shouldn't be an item.
            </p>
        </div>
    </section>
    <?php
};
}; //end of if from chechking Badges ?>

<script type="text/javascript">
  $(document).ready(function () {
      $(".slickContainer").slick().slick('slickFilter', '.slickItem');
  });
</script>


    <!-- baggrundsbillede -->
    <img class="mainsectionImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/background.jpg" alt="background">

  <?php get_footer(); ?>
