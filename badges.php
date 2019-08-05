<?php 
include("cookieRedirect.php");
get_header();
/*
Template name: Badges
*/
?>
<?php
// UN-COMMENT THIS WHEN UPLOADING TO LIVE
include("config.php");

//$userCookie = $_COOKIE['user']; //Henter brugernavnet på den bruger, der er logget ind
$userCookie = $_COOKIE['user'];

//Query til at hente magiske navn via telefonnummer
$fetchUser = "SELECT user.magicalName FROM user WHERE phoneNo = $userCookie";

//Sender query med db-forbindelse
$fetchUserQuery = $con->query($fetchUser);

//Tjekker om resultat er mere end 0
if($fetchUserQuery->num_rows > 0){
  //For hver række i resultatet
  while($fetchUserRow= $fetchUserQuery->fetch_assoc()){
    //Variabler
    $magicalName = $fetchUserRow['magicalName'];
  }
};

//Her hentes de badges, som brugeren har
$selectBadgeSql = "SELECT badge.badgeId as badgeId
                FROM badge, userbadge
                WHERE userbadge.userId =  $userCookie
                AND userbadge.badgeId = badge.badgeId
                AND userbadge.badgeId IN (1,2,3,4,5,6,7,8,9,10,11,13,14,15,16,17,18,19,20,21)
                GROUP BY badge.badgeId;";

//Query sendes med db-forbindelse
$selectBadgeQuery = $con->query($selectBadgeSql);

//Tjekker om resultatet er mere end 0
if($selectBadgeQuery->num_rows > 0){
  //Tomt array oprettes
  $badgeArray = array();
  //For hver række i resultatet
  while ($selectBadgeRow = $selectBadgeQuery->fetch_assoc()) {
    //Hvert resultat føjes til det tomme array
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
  //NOTE: nr. 12 springes over!
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
}
?>

<!--Her starter while loop for pages-->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php
      //Henter data fra pods plugin i wordpress (Badge Lightbox)
      $params = array('orderby' => 'badge_id ASC', 'limit' => -1);
      $badges = new Pod('badge_lb', $params);
      $badges->findRecords($params);
      $total_badges = $badges->getTotalRows();
      //For hver Pod
      while ($badges->fetchRecord($params)) {
          $title = $badges->get_field('badge_title');
          $badgeImage = $badges->get_field('badge_image.guid');
          $eventLink = $badges->get_field('event_link');
          $badgeRetning = $badges->get_field('badge_retning');
          $Id = $badges->get_field('badge_id');
          $badgeId = (int)$Id;
          echo "<script>console.log('$title')</script>";
    ?>

    <!--Her starter Badge Lightbox-->
    <div id="darkoverlay"></div>
        <!--Modal, start-->
        <div id="myModal" class="modal">
            <!--Modal indhold, start-->
            <div class="modalContent">
              <h3 class="eTitle"><?php echo $title; ?></h3>
              <!-- Luk knap -->
              <span class="close">&times;</span>

              <!--Badge, start -->
              <div class="eventDescription">
                <p>Ved at opnå dette badge er du et skridt tættere på at opnå titlen:</p>
                <h3 class="badgeRetning"><?php echo $badgeRetning ?></h3>
                <div class="badgeKortLink">
                  <a href="https://mr.1221s.com/kort/">Dette Badge opnås ved <?php echo $eventLink ?>, Se på kort</a>
                </div>
              </div><!--Badge, slut-->
              
              <!--Badge ikon, start-->
              <div class="badgeDescription">
                  <p><?php echo $badgeText?></p>
                  <div class="eventBadgeImgContainer badgeLightboxImg">
                    <img class="eventBadgeImg" src="<?php echo $badgeImage ?>">
                  </div>
              </div><!--Badge ikon, slut-->
            </div><!--Modal indhold, slut-->
        </div><!--Modal, slut-->
  
        <!--Her begynder Badge sektionen-->
        <section class="badgeIndex">
          <h2 id="welcome">Velkommen</h2>
          <!--Ribbon, start-->
          <div class="ribbonContainer">
              <h3 class="magicalName"><?php echo $magicalName; ?></h3>
              <img class="ribbon" src="<?php echo get_stylesheet_directory_uri();?>/img/ribbon.png" alt="Ribbon">
          </div><!--Ribbon, slut-->

          <!--Her begynder slickcontainer med slickitems-->
          <div class="slickContainer badgeContainer">
            <!-- Magiker Box, start -->
              <div class="badge slickItem" id="magiker">
                  <img class="journeyBadge" src="<?php echo get_stylesheet_directory_uri();?>/img/badges/magiker/magikerBadge.png">

                  <!--Cape badge, start-->
                  <div id="1" class="badgeImg top-left mainBadgeTitle">
                    <img class="badgeActualImg
                      <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                        if ($badge_1) {
                        echo " badgeAcquired";
                      }; ?>"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/magiker/capeBadge.png">
                  </div>
                  <!--Cape badge, slut-->
                          
                  <!--Wand badge, start-->
                  <div id="2" class="badgeImg top-right">
                    <img class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_2) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/magiker/wandBadge.png">
                  </div>
                  <!--Wand badge, slut-->

                  <!--Nordheim badge, start-->
                  <div id="3" class="badgeImg bottom-right">
                    <img class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_3 ) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/magiker/nordheimBadge.png">
                  </div>
                  <!--Nordheim badge, slut-->
                  
                  <!--Ghost badge, start-->
                  <div id="4" class="badgeImg bottom-left">
                    <img class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_4) {
                      echo "badgeAcquired";
                    }; ?>"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/magiker/ghostBadge.png">
                  </div>
                  <!--Ghost badge, slut-->

              </div><!--Magiker Box, slut-->

              <!-- Alkymist Box, start -->
              <div class="badge slickItem" id="alkymist">
                  <img class="journeyBadge" src="<?php echo get_stylesheet_directory_uri();?>/img/badges/alkymist/alkymistBadge.png">

                  <!--Eliksir badge, start-->
                  <div id="5" class="badgeImg bottom-left">
                    <img class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_5 ) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/alkymist/eliksirBadge.png">
                  </div>
                  <!--Eliksir badge, slut-->

                  <!--Spiselig wand badge, start-->
                  <div id="6" class="badgeImg bottom-right">
                    <img class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_6 ) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/alkymist/spiswandBadge.png">
                  </div>
                  <!--Spiselig wand badge, slut-->
                  
                  <!--Botanik badge, start-->
                  <div id="7" class="badgeImg top-left">
                    <img class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_7 ) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/alkymist/botanikBadge.png">
                  </div>
                  <!--Botanik badge, slut-->

                  <!--Creature badge, start-->
                  <div id="8" class="badgeImg top-right">
                    <img  class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_8 ) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/alkymist/creatureBadge.png">
                  </div>
                  <!--Creature badge, slut-->

              </div><!--Alkymist Box, slut-->

              <!-- Quidditch Stjerne Box, start -->
              <div class="badge slickItem" id="quidditch">
                  <img class="journeyBadge" src="<?php echo get_stylesheet_directory_uri();?>/img/badges/quidditch/qBadge.png">
                  
                  <!--Qudditch kamo badge, start-->
                  <div id="9" class="badgeImg top-right">
                    <img class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_9 ) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/quidditch/quidditchBadge.png">
                  </div>
                  <!--Quudditch kamp badge, slut-->
                  <!--Quidditch Tournament badge, start-->
                  <div id="10" class="badgeImg top-left">
                    <img class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_10 ) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/quidditch/qtournamentBadge.png">
                  </div>
                  <!--Quidditch Tournament, slut-->

                  <!--Gyldne snitch badge, start-->
                  <div id="11" class="badgeImg bottom-right">
                    <img class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_11 ) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/quidditch/snitchBadge.png">
                  </div>
                  <!--Gyldne snitch badge, slut-->
                  
                  <!--Broom badge, start-->
                  <div id="13" class="badgeImg bottom-left">
                    <img class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_13 ) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/quidditch/broomBadge.png">
                  </div>
                  <!--Broom badge, slut-->

              </div><!--Quidditch Stjerne Box, slut-->

              <!-- Dragetæmmer box, start -->
              <div class="badge slickItem" id="dragetaemmer">
                  <img class="journeyBadge" src="<?php echo get_stylesheet_directory_uri();?>/img/badges/drage/drageBadge.png">
                  
                  <!--Drageæg badge, start-->
                  <div id="14" class="badgeImg top-left">
                    <img class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_14 ) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/drage/eggBadge.png">
                  </div>
                  <!--Drageæg badge, slut-->
               
                  <!--Pasning af dyr, start-->
                  <div id="15" class="badgeImg bottom-left">
                    <img class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_15 ) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/drage/animalBadge.png">
                  </div>
                  <!--Pasning af dyr, slut-->

                  <!--Fold en drage badge, start-->
                  <div id="16" class="badgeImg top-right">
                    <img class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_16 ) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/drage/dragonBadge.png">
                  </div>
                  <!--Fold en drage, slut-->

                  <!--Zoologmagisk tur, start-->
                  <div id="17" class="badgeImg bottom-right">
                    <img class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_17 ) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/drage/zooBadge.png">
                  </div>
                  <!--Zoologmagisk tur, slut-->

              </div><!--Dragetæmmer box, slut-->

              <!-- Erfaren magiker box, start -->
              <div class="badge slickItem" id="erfaren">
                  <img class="journeyBadge" src="<?php echo get_stylesheet_directory_uri();?>/img/badges/erfaren/erfarenBadge.png">
                  
                  <!--Tipsy Toad, start-->
                  <div id="18" class="badgeImg bottom-right">
                    <img class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_18 ) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/erfaren/toadBadge.png">
                  </div>
                  <!--Tipsy Toad, slut-->

                  <!--Storms pakhus, start-->
                  <div id="19" class="badgeImg bottom-left">
                    <img class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_19 ) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/erfaren/stormsBadge.png">
                  </div>
                  <!--Storms pakhus, slut-->

                  <!--Filmkoncert, start-->
                  <div id="20" class="badgeImg top-left">
                    <img class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_20 ) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/erfaren/concertBadge.png">
                  </div>
                  <!--Filmkoncert, slut-->

                  <!--Efteråsbal, start-->
                  <div id="21" class="badgeImg top-right">
                    <img class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_21 ) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/erfaren/promBadge.png">
                  </div>
                  <!--Efteråsbal, slut-->

              </div><!--Erfaren magiker box, slut-->
            </div><!--Her slutter slickcontaineren med slickitems-->
        </section><!--Her slutter badge sektionen-->
      
        <?php }; //Her slutter while, der tjekker badges ?>
    <?php endwhile;?>
<?php endif;?>

<!--Her starter scriptet til slickcontaineren (Basically pile frem og tilbage)-->
<script type="text/javascript">
  $(document).ready(function () {
      $(".slickContainer").slick().slick('slickFilter', '.slickItem');
  });
</script>
<!--Her slutter script til slickcontainer-->


<!-- Her startet script til lightboxes -->
<script>
    var badgeTitle = document.getElementsByClassName('mainBadgeTitle');
    var modals = document.getElementsByClassName('modal');
    var badges = document.getElementsByClassName('badgeImg');
    var darkOverlay = document.getElementById('darkoverlay');

    //Her tilføjes click funktion til hvert badge
    for(let i = 0; i < badges.length; i++){
        badges[i].onclick = function(){
            darkOverlay.style.display="block";
            modals[i].style.display = "block";
            console.log("This works");
        }
    };

    var span = document.getElementsByClassName("close");
    //Her tilføjes click funktion til hvert close-ikon
    for(let i = 0; i <span.length; i++){
        // When the user clicks on <span> (x), close the modal
        span[i].onclick = function() {
            darkOverlay.style.display="none";
            modals[i].style.display = "none";
        }
    };
    
    //Her tilføjes click funktion til hvert baggrunden for modalboksen
    for(let i = 0; i <span.length; i++){
      darkOverlay.onclick = function() {
          darkOverlay.style.display="none";
          modals[i].style.display = "none";
      }
    };
</script>
<!-- Her slutter script til lightboxes -->
<!-- baggrundsbillede -->
<img class="mainsectionImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/background.jpg" alt="background">
<?php get_footer(); ?>