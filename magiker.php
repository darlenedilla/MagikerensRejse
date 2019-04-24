
<?php get_header();
/*
Template Name: magiker
*/
?>
<?php

include("config.php");
// Fetch user data from database
// $host = "localhost"; /* Host name */
// $user = "Darlene"; /* User */
// $password = "Dgs55qhk:).."; /* Password */
// $dbname = "1221s_com_magikerensrejse"; /* Database name */

// //Create connection
// $con = mysqli_connect($host, $user, $password,$dbname);

// // Check connection
// if (!$con) {
//   die("Connection failed: " . mysqli_connect_error());
// }

//HER HENTES SOM ER GEMT PÅ BRUGEREN MED TELEFONNUMMER 28141151-->
//Hent billedet fra databasen
$sql = "SELECT image FROM user WHERE phoneNo= 28141151";
//Send query'en afsted
$result1 = mysqli_query($con,$sql);
//Lav et array med de resultater der kommer ud fra vores sql
$row1 = mysqli_fetch_array($result1);

//Tag image-attributten fra tabellen
$imageName = $row1['image'];


$query = "SELECT user.magicalName, bloodtype.bloodTypeName, house.name AS houseName, pets.name AS petName, journey.name AS journeyName 
            FROM user, bloodtype, house, pets, journey, userjourney
            WHERE user.phoneNo = 28141151 
            AND bloodtype.bloodTypeId = user.bloodTypeId
            AND house.houseId = user.houseId
            AND pets.petId = user.petId
            AND journey.journeyId = userjourney.journeyId
            AND userjourney.userId = user.phoneNo";


        $result2 = $con->query($query);

        if($result2->num_rows > 0){
            //output data of each row
            while($row2 = $result2->fetch_assoc()){
                //Variables to use in html
            $magicalName = $row2['magicalName'];
            $journeyName = $row2['journeyName'];
            $houseName = $row2['houseName'];
            $bloodTypeName = $row2['bloodTypeName'];
            $petName = $row2['petName'];
            }
        }
        else{
            echo "0 results";
        };


        $badgeQuery = "SELECT badge.image as badgeImg 
                        FROM badge, userbadge 
                        WHERE userbadge.userId = 28141151
                        AND userbadge.badgeId = badge.badgeId
                        AND userbadge.badgeId IN (1,2,3,4) 
                        GROUP BY badge.image;";

         $result3 = $con->query($badgeQuery);
         if($result3->num_rows > 0){
             //output data of each row
             while($row3 = $result3->fetch_assoc()){
                 //Variables to use in html
                 //echo $row3['badgeImg'] .'</br>';
                 $arrayOfBadges[$row3['badgeImg']][] = $result3;
            }
         }
         else{
             echo "0 Badges found";
         }
?>


<section class="mainsecti" >
    <div class="profileData">
        <div id="profileImgContainer">
            <img id="profileImg" src="<?php echo get_stylesheet_directory_uri().'/img/portraits/' .$imageName;?>" >
            <div id="ribbonContainer">
                <h3 id="magicalName"><?php echo $magicalName; ?></h3>
                <img id="ribbon" src="<?php echo get_stylesheet_directory_uri();?>/img/ribbon.png" alt="Ribbon">
            </div>
        </div>
        <!--<img id="petImg" src="">-->
        <ul id="listOfBadges">
        <?php 
            foreach($arrayOfBadges as $badge_img => $group){
                //Her looper vi igennem hver badge-image
                $src = get_stylesheet_directory_uri() .'/img/badges/' .$badge_img;
                echo("<li class='badges'><img class='badgeImg' src=$src></li>");
            }
        ?>
        </ul>
        <h4 id="journeyName"><?php echo $journeyName?></h4>
        <h4 id="otherInfo">Dine Oplysninger:</h4>
        <ul id="listOfInfo">
            <li class="infoItem" data-label="Dit Husnavn:"><?php echo $houseName?></li>
            <li class="infoItem" data-label="Din Blodtype:"><?php echo $bloodTypeName?></li>
            <li class="infoItem" data-label="Dit Kæledyr:"><?php echo $petName?></li>
        </ul>
    </div>
</section>
<!--<img class="mainsectionImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/background.jpg" alt="background">-->

<script>
    var journeyName = "<?php echo $journeyName?>";
    var profileImg = document.getElementById("profileImg");
    switch(journeyName){
        case "Magiker":
            profileImg.style.borderColor = "#8d434c";
            break;
        case "Alkymist":
            profileImg.style.borderColor = "#347f41";
            break;
        case "Quidditch Stjerne":
            profileImg.style.borderColor = "#d5cb13";
            break;
        case "Dragetæmmer":
            profileImg.style.borderColor = "#4a728c";
            break;
        case "Erfaren":
            profileImg.style.borderColor = "#db873c";
            break;
    }
</script>
<?php get_footer(); ?>
