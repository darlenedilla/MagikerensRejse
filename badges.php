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
$selectBadgeSql = "SELECT badge.badgeId as badgeId
                FROM badge, userbadge
                WHERE userbadge.userId = 28141151
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
      };
  };

  //check for 'Magiker' badges
  $badge_1 = in_array(1, $badgeArray);
  $badge_2 = in_array(2, $badgeArray);
  $badge_3 = in_array(3, $badgeArray);
  $badge_4 = in_array(4, $badgeArray);

  //check for 'Alkymist' badges
  $badge_5 = in_array(5, $badgeArray);
  $badge_6 = in_array(6, $badgeArray);
  $badge_7 = in_array(7, $badgeArray);
  $badge_8 = in_array(8, $badgeArray);

  //check for 'Quidditch stjerne' badges
  //NOTE: Jeg fuckede up med nummereringen så nr. 12 springes over!
  $badge_9 = in_array(9, $badgeArray);
  $badge_10 = in_array(10, $badgeArray);
  $badge_11= in_array(11, $badgeArray);
  $badge_13 = in_array(13, $badgeArray);

  //check for 'Dragetæmmer' badges
  $badge_14 = in_array(14, $badgeArray);
  $badge_15 = in_array(15, $badgeArray);
  $badge_16 = in_array(16, $badgeArray);
  $badge_17 = in_array(17, $badgeArray);

  //check for 'Erfaren Magiker' badges
  $badge_18 = in_array(18, $badgeArray);
  $badge_19 = in_array(19, $badgeArray);
  $badge_20 = in_array(20, $badgeArray);
  $badge_21 = in_array(21, $badgeArray);
  ?>

  <!-- starting the while loop of the pages -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <!-- getting the data for the letter -->
    <?php
        $badges = new Pod('badge_lb');
        $badges->findRecords('badge_id ASC');
        $total_badges = $badges->getTotalRows();

        while ($badges->fetchRecord('badge_id ASC')) {
            $title = $badges->get_field('badge_title');
            $badgeImage = $badges->get_field('badge_image.guid');
            $eventLink = $badges->get_field('event_link');
            $badgeRetning = $badges->get_field('badge_retning');
            $Id = $badges->get_field('badge_id');
            $badgeId = (int)$Id;
    ?>
<div id="darkoverlay"></div>
    <!-- The Modal -->
    <div id="myModal" class="modal">
        <div class="modalContent">
            <h3 class="eTitle"><?php echo $title; ?></h3>
            <!-- The Close Button -->
            <span class="close">&times;</span>
            <!-- The actual Badge -->
            <div class="eventDescription">
              <p>Ved at opnå dette badge er du et skridt tættere på at opnå titlen:</p>
                <h3 class="badgeRetning"><?php echo $badgeRetning ?></h3>
            <div class="badgeKortLink">
              <a href="#">Dette Badge opnås ved <?php echo $eventLink ?>, Se på kort</a>
            </div>
              </div>
            
            <!-- The badge -->
            <div class="badgeDescription">
                <p><?php echo $badgeText?>
                    
                </p>
                <div class="eventBadgeImgContainer badgeLightboxImg">
                    <img class="eventBadgeImg" src="<?php echo $badgeImage ?>">
                </div>
            </div>
        </div>
    </div>
  

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

                  <div id="1" class="badgeImg top-left mainBadgeTitle">
                    <img class="badgeActualImg

                      <?php
                      // check if badge has been acquired, and if it has, add an extra class to it:
                      // NOTE: Its important that the badge number is correct!!!
                        if ($badge_1) {
                        echo " badgeAcquired";
                      }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/magiker/capeBadge.png">
                  </div>

                  <div id="2" class="badgeImg top-right">
                    <img class="badgeActualImg

                    <?php
                    // check if badge has been acquired, and if it has, add an extra class to it:
                    // NOTE: Its important that the badge number is correct!!!
                      if ($badge_2) {
                      echo "badgeAcquired";
                    }; ?>"

                     src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/magiker/wandBadge.png">
                  </div>

                  <div id="4" class="badgeImg bottom-left">
                    <img class="badgeActualImg

                    <?php
                    // check if badge has been acquired, and if it has, add an extra class to it:
                    // NOTE: Its important that the badge number is correct!!!
                      if ($badge_4) {
                      echo "badgeAcquired";
                    }; ?>"

                     src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/magiker/ghostBadge.png">
                  </div>

                  <div id="3" class="badgeImg bottom-right">
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

                  <div id="7" class="badgeImg top-left">
                    <img class="badgeActualImg

                    <?php
                    // check if badge has been acquired, and if it has, add an extra class to it:
                    // NOTE: Its important that the badge number is correct!!!
                      if ($badge_7 ) {
                      echo "badgeAcquired";
                    }; ?>"

                     src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/alkymist/botanikBadge.png">
                  </div>

                  <div id="8" class="badgeImg top-right">
                    <img  class="badgeActualImg

                    <?php
                    // check if badge has been acquired, and if it has, add an extra class to it:
                    // NOTE: Its important that the badge number is correct!!!
                      if ($badge_8 ) {
                      echo "badgeAcquired";
                    }; ?>"

                     src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/alkymist/creatureBadge.png">
                  </div>

                  <div id="5" class="badgeImg bottom-left">
                    <img class="badgeActualImg

                    <?php
                    // check if badge has been acquired, and if it has, add an extra class to it:
                    // NOTE: Its important that the badge number is correct!!!
                      if ($badge_5 ) {
                      echo "badgeAcquired";
                    }; ?>"

                     src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/alkymist/eliksirBadge.png">
                  </div>

                  <div id="6" class="badgeImg bottom-right">
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

                  <div id="10" class="badgeImg top-left">
                    <img class="badgeActualImg

                    <?php
                    // check if badge has been acquired, and if it has, add an extra class to it:
                    // NOTE: Its important that the badge number is correct!!!
                      if ($badge_10 ) {
                      echo "badgeAcquired";
                    }; ?>"

                     src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/quidditch/qtournamentBadge.png">
                  </div>

                  <div id="9" class="badgeImg top-right">
                    <img class="badgeActualImg

                    <?php
                    // check if badge has been acquired, and if it has, add an extra class to it:
                    // NOTE: Its important that the badge number is correct!!!
                      if ($badge_9 ) {
                      echo "badgeAcquired";
                    }; ?>"

                     src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/quidditch/quidditchBadge.png">
                  </div>

                  <div id="13" class="badgeImg bottom-left">
                    <img class="badgeActualImg

                    <?php
                    // check if badge has been acquired, and if it has, add an extra class to it:
                    // NOTE: Its important that the badge number is correct!!!
                      if ($badge_13 ) {
                      echo "badgeAcquired";
                    }; ?>"

                     src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/quidditch/broomBadge.png">
                  </div>

                  <div id="11" class="badgeImg bottom-right">
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

                  <div id="14" class="badgeImg top-left">
                    <img class="badgeActualImg

                    <?php
                    // check if badge has been acquired, and if it has, add an extra class to it:
                    // NOTE: Its important that the badge number is correct!!!
                      if ($badge_14 ) {
                      echo "badgeAcquired";
                    }; ?>"

                     src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/drage/eggBadge.png">
                  </div>

                  <div id="16" class="badgeImg top-right">
                    <img class="badgeActualImg

                    <?php
                    // check if badge has been acquired, and if it has, add an extra class to it:
                    // NOTE: Its important that the badge number is correct!!!
                      if ($badge_16 ) {
                      echo "badgeAcquired";
                    }; ?>"

                     src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/drage/dragonBadge.png">
                  </div>

                  <div id="15" class="badgeImg bottom-left">
                    <img class="badgeActualImg

                    <?php
                    // check if badge has been acquired, and if it has, add an extra class to it:
                    // NOTE: Its important that the badge number is correct!!!
                      if ($badge_15 ) {
                      echo "badgeAcquired";
                    }; ?>"

                     src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/drage/animalBadge.png">
                  </div>

                  <div id="17" class="badgeImg bottom-right">
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

                  <div id="20" class="badgeImg top-left">
                    <img class="badgeActualImg

                    <?php
                    // check if badge has been acquired, and if it has, add an extra class to it:
                    // NOTE: Its important that the badge number is correct!!!
                      if ($badge_20 ) {
                      echo "badgeAcquired";
                    }; ?>"

                     src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/erfaren/concertBadge.png">
                  </div>

                  <div id="21" class="badgeImg top-right">
                    <img class="badgeActualImg

                    <?php
                    // check if badge has been acquired, and if it has, add an extra class to it:
                    // NOTE: Its important that the badge number is correct!!!
                      if ($badge_21 ) {
                      echo "badgeAcquired";
                    }; ?>"

                     src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/erfaren/promBadge.png">
                  </div>

                  <div id="19" class="badgeImg bottom-left">
                    <img class="badgeActualImg

                    <?php
                    // check if badge has been acquired, and if it has, add an extra class to it:
                    // NOTE: Its important that the badge number is correct!!!
                      if ($badge_19 ) {
                      echo "badgeAcquired";
                    }; ?>"

                     src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/erfaren/stormsBadge.png">
                  </div>

                  <div id="18" class="badgeImg bottom-right">
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
          </div>
</section>
      
        <?php } //End of second while?>
    <?php endwhile;?>
<?php endif;
          };

?>

<!-- Jscript for making the boxes go from side to side -->
<script type="text/javascript">
  $(document).ready(function () {
      $(".slickContainer").slick().slick('slickFilter', '.slickItem');
  });
</script>


<!-- Jscript til lightboxes -->
<script>
    var badgeTitle = document.getElementsByClassName('mainBadgeTitle');
    var modals = document.getElementsByClassName('modal');
    var badges = document.getElementsByClassName('badgeImg');
    var darkOverlay = document.getElementById('darkoverlay');
    
    for(let i = 0; i < badges.length; i++){
        badges[i].onclick = function(){
            darkOverlay.style.display="block";
            modals[i].style.display = "block";
            console.log("This works");
        }
    };

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close");
    for(let i = 0; i <span.length; i++){
        // When the user clicks on <span> (x), close the modal
        span[i].onclick = function() {
            darkOverlay.style.display="none";
            modals[i].style.display = "none";
        }
    }

      for(let i = 0; i <span.length; i++){
        // When the user clicks on <span> (x), close the modal
        darkOverlay.onclick = function() {
            darkOverlay.style.display="none";
            modals[i].style.display = "none";
        }
    }
</script>

    <!-- baggrundsbillede -->
    <img class="mainsectionImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/background.jpg" alt="background">

  <?php get_footer(); ?>
