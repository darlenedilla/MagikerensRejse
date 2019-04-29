
<?php get_header();
/*
Template Name: Retning
*/
?>
<?php

include("config.php");
//Fetch user data from database
// $host = "localhost"; /* Host name */
// $user = "Darlene"; /* User */
// $password = "Dgs55qhk:).."; /* Password */
// $dbname = "1221s_com_magikerensrejse"; /* Database name */
//
// //Create connection
// $con = mysqli_connect($host, $user, $password,$dbname);
//
// // Check connection
// if (!$con) {
//   die("Connection failed: " . mysqli_connect_error());
//   $sql1 = "";
// }

        $user = 28141151; //DETTE SKAL RETTES TIL SÅ DEN TAGER DEN BRUGER DER ER LOGGET IND

        if(isset($_POST['magiker'])){
            $sql1 = "SELECT journey.journeyId FROM journey WHERE journey.name = 'Magiker'";
        }

        if(isset($_POST['alkymist'])){
            $sql1 = "SELECT journey.journeyId FROM journey WHERE journey.name = 'Alkymist'";

        }

        if(isset($_POST['quidditch'])){
            $sql1 = "SELECT journey.journeyId FROM journey WHERE journey.name = 'Quidditch Stjerne'";
        }

        if(isset($_POST['dragetaemmer'])){
            $sql1 = "SELECT journey.journeyId FROM journey WHERE journey.name LIKE 'Draget%'";
        }

        //SQL1 QUERY TO FETCH JOURNEYID
        $result1 = $con->query($sql1);

        if($result1->num_rows > 0){
            //output data of each row
            while($row1 = $result1->fetch_assoc()){
                //Variables to use in html
                $journeyId = $row1['journeyId'];
            }
            echo "RETNING $journeyId VALGT";
        }
        else{
            echo "SQL 1 Error:" .$sql1. "<br>" .$con->error;
        }

         //SQL2 QUERY TO INSERT DATA INTO USERJOURNEY ENTITY
         $sql2 = "INSERT INTO userjourney(userId,journeyId) VALUES ($user,$journeyId)";
         $result2 = $con->query($sql2);

$con->close();


?>


<section class="mainsection">
    <form class="journeySection" action="" method="post" onsubmit="return confirm('Are you sure you want to submit?');">
        <div class="jBadgeContainer">
            <div class ="jBadge" id="magikerBadge">
                <!--<input class="jBadgeImg" id="magikerBadgeImg" type="image" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/magikerBadge.png">-->
                <img class="jBadgeImg" id="magikerBadgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/magikerBadge.png">
                <div class="jRibbonContainer">
                    <h3 class="journeyName">Magiker</h3>
                    <button style="border:none; background-color:transparent;" type="submit" name="magiker"><img  class="jRibbon" src="<?php echo get_stylesheet_directory_uri(); ?>/img/ribbon.png"></button>
                    <!--<img class="jRibbon" src="<?php echo get_stylesheet_directory_uri();?>/img/ribbon.png" alt="Ribbon">-->
                </div>
            </div>
            <div class="jBadge" id="alkymistBadge">
                <img class="jBadgeImg" id="alkymistBadgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/alkymistBadge.png">
                <div class="jRibbonContainer">
                    <h3 class="journeyName">Alkymist</h3>
                    <button style="border:none; background-color:transparent;" type="submit" name="alkymist"><img  class="jRibbon" src="<?php echo get_stylesheet_directory_uri(); ?>/img/ribbon.png"></button>
                    <!-- <input name="alkymist" value="Alkymist" class="jRibbon" type="image" src="<?php echo get_stylesheet_directory_uri(); ?>/img/ribbon.png"> -->
                    <!-- <img class="jRibbon" src="<?php echo get_stylesheet_directory_uri();?>/img/ribbon.png" alt="Ribbon"> -->
                </div>
            </div>
            <div class ="jBadge" id="quidditchBadge">
                <img class="jBadgeImg" id="quidditchBadgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/quidditchBadge.png">
                <div class="jRibbonContainer">
                    <h3 class="journeyName">Quidditch Stjerne</h3>
                    <button style="border:none; background-color:transparent;" type="submit" name="quidditch"><img  class="jRibbon" src="<?php echo get_stylesheet_directory_uri(); ?>/img/ribbon.png"></button>
                    <!-- <input name="quidditch" value="quidditch" class="jRibbon" type="image" src="<?php echo get_stylesheet_directory_uri(); ?>/img/ribbon.png"> -->
                    <!-- <img class="jRibbon" src="<?php echo get_stylesheet_directory_uri();?>/img/ribbon.png" alt="Ribbon"> -->
                </div>
            </div>
            <div class ="jBadge" id="drageBadge">
                <img class="jBadgeImg" id="drageBadgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/drageBadge.png">
                <div id="ribbonContainer">
                    <div class="jRibbonContainer">
                        <h3 class="journeyName">Dragetæmmer</h3>
                        <button style="border:none; background-color:transparent;" type="submit" name="dragetaemmer"><img  class="jRibbon" src="<?php echo get_stylesheet_directory_uri(); ?>/img/ribbon.png"></button>
                        <!-- <input name="journey[4]" value="dragetaemmer" class="jRibbon" type="image" src="<?php echo get_stylesheet_directory_uri(); ?>/img/ribbon.png"> -->
                        <!-- <img class="jRibbon" src="<?php echo get_stylesheet_directory_uri();?>/img/ribbon.png" alt="Ribbon"> -->
                    </div>
                </div>
            </div>
            <div class ="jBadge" id="erfarenBadge">
                <img class="jBadgeImg" id="erfarenBadgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/erfarenBadge.png">
            </div>
        </div>
    </form>
</section>
<!--<img class="mainsectionImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/background.jpg" alt="background">-->
<?php get_footer(); ?>
