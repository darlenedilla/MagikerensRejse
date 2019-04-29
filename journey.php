
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

        $user = 28141151; //DETTE SKAL RETTES TIL SÅ DEN TAGER DEN BRUGER DER ER LOGGET IND

        if(isset($_POST['magiker'])){
            $sql1 = "SELECT journey.journeyId FROM journey WHERE journey.name = 'Magiker'";
            $result1 = $con->query($sql1);
        }
    
        if(isset($_POST['alkymist'])){
            $sql1 = "SELECT journey.journeyId FROM journey WHERE journey.name = 'Alkymist'";
            $result1 = $con->query($sql1);

        }

        if(isset($_POST['quidditch'])){
            $sql1 = "SELECT journey.journeyId FROM journey WHERE journey.name = 'Quidditch Stjerne'";
            $result1 = $con->query($sql1);
        }

        if(isset($_POST['dragetaemmer'])){
            $sql1 = "SELECT journey.journeyId FROM journey WHERE journey.name LIKE 'Draget%'";
            $result1 = $con->query($sql1);
        }

        if(isset($_POST['erfaren'])){
            $sql1 = "SELECT journey.journeyId FROM journey WHERE journey.name = 'Erfaren'";
            $result1 = $con->query($sql1);
        }

            //SQL1 QUERY TO FETCH JOURNEYID
            if($result1->num_rows > 0){
                //output data of each row
                while($row1 = $result1->fetch_assoc()){
                    //Variables to use in html
                    $journeyId = $row1['journeyId'];
                }

                //SQL2 QUERY TO INSERT DATA INTO USERJOURNEY ENTITY
                    $sql2 = "INSERT INTO userjourney(userId,journeyId) VALUES ($user,$journeyId)";
                    $result2 = $con->query($sql2);
            }

            $sql3 = "SELECT user.age FROM user WHERE phoneNo = $user";

                    $result3 = $con->query($sql3);

                    if($result3->num_rows > 0){
                        //output data of each row
                        while($row3 = $result3->fetch_assoc()){
                            //Variables to use in html
                            $userAge = $row3['age'];
                        }
                    }

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
                </div>
            </div>
            <div class="jBadge" id="alkymistBadge">
                <img class="jBadgeImg" id="alkymistBadgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/alkymistBadge.png">
                <div class="jRibbonContainer">
                    <h3 class="journeyName">Alkymist</h3>
                    <button style="border:none; background-color:transparent;" type="submit" name="alkymist"><img  class="jRibbon" src="<?php echo get_stylesheet_directory_uri(); ?>/img/ribbon.png"></button>
                </div>
            </div>
            <div class ="jBadge" id="quidditchBadge">
                <img class="jBadgeImg" id="quidditchBadgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/quidditchBadge.png">
                <div class="jRibbonContainer">
                    <h3 class="journeyName">Quidditch Stjerne</h3>
                    <button style="border:none; background-color:transparent;" type="submit" name="quidditch"><img  class="jRibbon" src="<?php echo get_stylesheet_directory_uri(); ?>/img/ribbon.png"></button>
                </div>
            </div>
            <div class ="jBadge" id="drageBadge">
                <img class="jBadgeImg" id="drageBadgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/drageBadge.png">
                    <div class="jRibbonContainer">
                        <h3 class="journeyName">Dragetæmmer</h3>
                        <button style="border:none; background-color:transparent;" type="submit" name="dragetaemmer"><img  class="jRibbon" src="<?php echo get_stylesheet_directory_uri(); ?>/img/ribbon.png"></button>
                    </div>
            </div>
            <div class ="jBadge" id="erfarenBadge">
                <img class="jBadgeImg" id="erfarenBadgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/erfarenBadge.png">
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
