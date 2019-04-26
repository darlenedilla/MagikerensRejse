
<?php get_header();
/*
Template Name: Retning
*/
?>
<?php

//include("config.php");
//Fetch user data from database
$host = "localhost"; /* Host name */
$user = "Darlene"; /* User */
$password = "Dgs55qhk:).."; /* Password */
$dbname = "1221s_com_magikerensrejse"; /* Database name */

//Create connection
$con = mysqli_connect($host, $user, $password,$dbname);

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}


        $badgeQuery = "SELECT badge.image as badgeImg 
                        FROM badge, userbadge 
                        WHERE userbadge.userId = 28141151
                        AND userbadge.badgeId = badge.badgeId
                        AND userbadge.badgeId IN (1,2,3,4) 
                        GROUP BY badge.image;";

         $result = $con->query($badgeQuery);
         if($result->num_rows > 0){
             //output data of each row
             while($row = $result->fetch_assoc()){
                 //Variables to use in html
                 //echo $row3['badgeImg'] .'</br>';
                 $arrayOfBadges[$row['badgeImg']][] = $result;
            }
         }
         else{
             echo "0 Badges found";
         }
?>


<section class="mainsection">
    <section class="journeySection">
        <div class="jBadgeContainer">
            <div class ="jBadge" id="magikerBadge">
                <img class="jBadgeImg" id="magikerBadgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/magikerBadge.png">
                <div class="jRibbonContainer">
                    <h3 class="journeyName">Magiker</h3>
                    <img class="jRibbon" src="<?php echo get_stylesheet_directory_uri();?>/img/ribbon.png" alt="Ribbon">
                </div>
            </div>
            <div class="jBadge" id="alkymistBadge">
                <img class="jBadgeImg" id="alkymistBadgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/alkymistBadge.png">
                <div class="jRibbonContainer">
                    <h3 class="journeyName">Alkymist</h3>
                    <img class="jRibbon" src="<?php echo get_stylesheet_directory_uri();?>/img/ribbon.png" alt="Ribbon">
                </div>
            </div>
            <div class ="jBadge" id="quidditchBadge">
                <img class="jBadgeImg" id="quidditchBadgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/quidditchBadge.png">
                <div class="jRibbonContainer">
                    <h3 class="journeyName">Quidditch Stjerne</h3>
                    <img class="jRibbon" src="<?php echo get_stylesheet_directory_uri();?>/img/ribbon.png" alt="Ribbon">
                </div>
            </div>
            <div class ="jBadge" id="drageBadge">
                <img class="jBadgeImg" id="drageBadgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/drageBadge.png">
                <div id="ribbonContainer">
                    <div class="jRibbonContainer">
                        <h3 class="journeyName">Dragetæmmer</h3>
                        <img class="jRibbon" src="<?php echo get_stylesheet_directory_uri();?>/img/ribbon.png" alt="Ribbon">
                    </div>
                </div>
            </div>
            <div class ="jBadge" id="erfarenBadge">
                <img class="jBadgeImg" id="erfarenBadgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/erfarenBadge.png">
            </div>
        </div>
    </section>
</section>
<!--<img class="mainsectionImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/background.jpg" alt="background">-->
<?php get_footer(); ?>
