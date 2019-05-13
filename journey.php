
<?php 
include("cookieRedirect.php");
get_header();
/*
Template Name: Retning
*/
?>
<?php
  // UN-COMMENT THIS WHEN UPLOADING TO LIVE
include("config.php");

  //Darlene Connect to server
//   $server ="localhost";
//   $user ="Darlene";
//   $pw ="Dgs55qhk:)..";
//   $db = "1221s_com_magikerensrejse";

  //Nanna Connect to server
  //COMMENT THIS OUT WHEN UPLOADING TO LIVE
  // $server ="localhost";
  // $user ="root";
  // $pw ="";
  // $db = "1221s_com_magikerensrejse";

  // Create connection
//   $con = new mysqli($server, $user, $pw, $db);
//   //check fann_get_total_connections
//   if ($con->connect_error) {
//     die("Connection failed:" .$con->connect_error);
//   } else {
//     echo '<script>console.log("connected succesfully")</script>';
//   }
        $userCookie = $_COOKIE['user']; //Henter brugernavnet på den bruger, der er logget ind

        if(isset($_POST['magiker'])){
            $selectUserSql = "SELECT journey.journeyId FROM journey WHERE journey.name = 'Magiker'";
            $selectUserQuery = $con->query($selectUserSql);
        }

        if(isset($_POST['alkymist'])){
            $selectUserSql = "SELECT journey.journeyId FROM journey WHERE journey.name = 'Alkymist'";
            $selectUserQuery = $con->query($selectUserSql);

        }

        if(isset($_POST['quidditch'])){
            $selectUserSql = "SELECT journey.journeyId FROM journey WHERE journey.name = 'Quidditch Stjerne'";
            $selectUserQuery = $con->query($selectUserSql);
        }

        if(isset($_POST['dragetaemmer'])){
            $selectUserSql = "SELECT journey.journeyId FROM journey WHERE journey.name LIKE 'Draget%'";
            $selectUserQuery = $con->query($selectUserSql);
        }

        if(isset($_POST['erfaren'])){
            $selectUserSql = "SELECT journey.journeyId FROM journey WHERE journey.name = 'Erfaren'";
            $selectUserQuery = $con->query($selectUserSql);
        }

            //SQL1 QUERY TO FETCH JOURNEYID
            if($selectUserQuery->num_rows > 0){
                //output data of each row
                while($selectUserRow = $selectUserQuery->fetch_assoc()){
                    //Variables to use in html
                    $journeyId = $selectUserRow['journeyId'];
                }

                //SQL2 QUERY TO INSERT DATA INTO USERJOURNEY ENTITY
                    $insertUserJourneySql = "INSERT INTO userjourney(userId,journeyId) VALUES ($userCookie,$journeyId)";
                    $insertUserJourneyQuery = $con->query($insertUserJourneySql);
            }

            $selectUserAgeSql = "SELECT user.age FROM user WHERE phoneNo = $userCookie";

                    $selectUserAgeQuery = $con->query($selectUserAgeSql);

                    if($selectUserAgeQuery->num_rows > 0){
                        //output data of each row
                        while($selectUserAgeRow = $selectUserAgeQuery->fetch_assoc()){
                            //Variables to use in html
                            $userAge = $selectUserAgeRow['age'];
                        }
                    }

            $con->close();


?>


<section class="mainsection">
    <form class="journeySection" action="" method="post" onsubmit="return confirm('Are you sure you want to submit?');">
        <div class="jBadgeContainer">
            <div class ="jBadge" id="magikerBadge">
                <!--<input class="jBadgeImg" id="magikerBadgeImg" type="image" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/magikerBadge.png">-->
                <img class="jBadgeImg" id="magikerBadgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/magiker/magikerBadge.png">
                <div class="jRibbonContainer">
                    <h3 class="journeyName">Magiker</h3>
                    <button style="border:none; background-color:transparent;" type="submit" name="magiker"><img  class="jRibbon" src="<?php echo get_stylesheet_directory_uri(); ?>/img/ribbon.png"></button>
                </div>
            </div>
            <div class="jBadge" id="alkymistBadge">
                <img class="jBadgeImg" id="alkymistBadgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/alkymist/alkymistBadge.png">
                <div class="jRibbonContainer">
                    <h3 class="journeyName">Alkymist</h3>
                    <button style="border:none; background-color:transparent;" type="submit" name="alkymist"><img  class="jRibbon" src="<?php echo get_stylesheet_directory_uri(); ?>/img/ribbon.png"></button>
                </div>
            </div>
            <div class ="jBadge" id="quidditchBadge">
                <img class="jBadgeImg" id="quidditchBadgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/quidditch/qBadge.png">
                <div class="jRibbonContainer">
                    <h3 class="journeyName">Quidditch Stjerne</h3>
                    <button style="border:none; background-color:transparent;" type="submit" name="quidditch"><img  class="jRibbon" src="<?php echo get_stylesheet_directory_uri(); ?>/img/ribbon.png"></button>
                </div>
            </div>
            <div class ="jBadge" id="drageBadge">
                <img class="jBadgeImg" id="drageBadgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/drage/drageBadge.png">
                    <div class="jRibbonContainer">
                        <h3 class="journeyName">Dragetæmmer</h3>
                        <button style="border:none; background-color:transparent;" type="submit" name="dragetaemmer"><img  class="jRibbon" src="<?php echo get_stylesheet_directory_uri(); ?>/img/ribbon.png"></button>
                    </div>
            </div>
            <div class ="jBadge" id="erfarenBadge">
                <img class="jBadgeImg" id="erfarenBadgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/erfaren/erfarenBadge.png">
                    <div class="jRibbonContainer" id="erfarenRibbon">
                        <h3 class="journeyName">Erfaren</h3>
                        <button style="border:none; background-color:transparent;" type="submit" name="erfaren"><img class="jRibbon" src="<?php echo get_stylesheet_directory_uri(); ?>/img/ribbon.png"></button>
                    </div>
                <img id="jLock" src="<?php echo get_stylesheet_directory_uri();?>/img/lock-icon.png">
            </div>
        </div>
    </form>
</section>
<!-- baggrundsbillede -->
<img class="mainsectionImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/background.jpg" alt="background">
<script>
    var userAge = <?php echo $userAge?>;
    var erfarenBadgeImg = document.getElementById("erfarenBadgeImg");
    var erfarenRibbon = document.getElementById("erfarenRibbon");
    var jLock = document.getElementById("jLock");

    if(userAge < 18){
        erfarenBadgeImg.style.opacity = 0.4;
        erfarenRibbon.style.opacity = 0.4;
        jLock.style.display = "block";
        console.log("You are under 18");
    }
</script>
<?php get_footer(); ?>
