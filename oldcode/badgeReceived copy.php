<?php 

/* CONNECT TO THE SERVER */
include("config.php");

get_header();
/*
Template name: Badge Received

THIS IS THE CONFIRMATION PAGE FOR RECEIVING A BADGE MAIN FILE
*/
?>


<?php

//$userCookie = $_COOKIE['user']; //Henter brugernavnet på den bruger, der er logget ind
$userCookie = $_COOKIE['user'];

// The badge received hardcoded:
$badgeReceivedId = 4;

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
}; ?>

<?php

// Her checkes om brugeren allerede har opnået dette badge:
$checkBadgeSql = "SELECT `userId`, `badgeId` 
                    FROM `userbadge` 
                    WHERE `userId` = $userCookie 
                    AND `badgeId` = $badgeReceivedId";
                    
//Query sendes med db-forbindelse
$checkBadgeQuery = $con->query($checkBadgeSql);

    if($checkBadgeQuery->num_rows > 0){
        // Hvis brugeren har dette badge:
        echo '<script language="javascript">';
        echo 'alert("Du har allerede opnået dette badge!")';
        echo '</script>';
    } else {
        
        // Hvis brugeren ikke har dette badge:
        //Her tilføjes det nye badge til brugeren
            $selectBadgeSql = "INSERT INTO `userbadge`(`userId`, `badgeId`) VALUES ($userCookie, $badgeReceivedId)";

        //Query sendes med db-forbindelse
            $selectBadgeQuery = $con->query($selectBadgeSql);

    }
?>

<!--Her starter while loop for pages-->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php
      //Henter data fra pods plugin i wordpress (Badge Lightbox)
      $params = array('where' => "badge_id.meta_value = $badgeReceivedId",
      'limit'   => 1 );

      $badges = new Pod('badge_lb', $params);
      $badges->findRecords($params);
      $total_badges = $badges->getTotalRows();
      //For hver Pod
          $title = $badges->get_field('badge_title');
          $badgeImage = $badges->get_field('badge_image.guid');
          $eventLink = $badges->get_field('event_link');
          $badgeRetning = $badges->get_field('badge_retning');
          $Id = $badges->get_field('badge_id');
          $badgeId = (int)$Id;
          echo "<script>console.log('$Id')</script>";
      
    ?>

<section class="badgeReceived">
<div class="badgeReceivedMsg">
<h2>Tillykke!</h2>
<h1>Du har nu opnået dette badge:</h1>
<h3 class="badgeReceivedTitle"> <?php echo $title; ?></h3>
<img class="badgeReceivedImage" src="<?php echo $badgeImage; ?>" alt="">
</div>

<div class="badgeReceivedBackBtn">

<!-- CHANGE THIS WHEN UPLOADING TO LIVE -->
<a href="http://localhost/magikerensRejse/">Tilbage</a>

</div>

</section>

<?php 
       endwhile;
endif;
?>



<!-- Her slutter script til lightboxes -->
<!-- baggrundsbillede -->
<img class="mainsectionImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/background.jpg" alt="background">
<?php get_footer(); ?>