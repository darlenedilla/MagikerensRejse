
<?php get_header();
/*
Template Name: magiker
*/
?>
<?php

//include("config.php");
// Fetch user data from database
$host = "localhost"; /* Host name */
$user = "Darlene"; /* User */
$password = "Dgs55qhk:).."; /* Password */
$dbname = "1221s_com_magikerensrejse"; /* Database name */

// Create connection
$con = mysqli_connect($host, $user, $password,$dbname);

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

//HER HENTES SOM ER GEMT PÅ BRUGEREN MED TELEFONNUMMER 28141151-->
//Hent billedet fra databasen
$sql = "SELECT image FROM user WHERE phoneNo= 28141151";
//Send query'en afsted
$result = mysqli_query($con,$sql);
//Lav et array med de resultater der kommer ud fra vores sql
$row = mysqli_fetch_array($result);

//Tag image-attributten fra tabellen
$imageName = $row['image'];
$badgeImgName = $row['badgeImg'];


$query = "SELECT user.magicalName, 
            user.name AS username, 
            house.name AS houseName, 
            bloodType.bloodTypeName, 
            user.image AS profileImg, 
            pets.name AS petName, 
            journey.name AS journeyName, 
            badge.image AS badgeImg,
            userBadge.badgeId as badgeId
            FROM user, house, bloodType, journey, pets, userJourney, userBadge, badge
            WHERE user.phoneNo = 28141151 
            AND userJourney.userId = user.phoneNo
            AND userBadge.userId = user.phoneNo
            AND badge.badgeId = userBadge.badgeId;";
        $result = $con->query($query);
        if($result->num_rows > 0){
            //output data of each row
            while($row = $result->fetch_assoc()){
                //Variables to use in html
            $image_src = get_stylesheet_directory_uri().'/img/' ."$imageName";
            $badgeImage_src =  get_stylesheet_directory_uri().'/img/badges/' ."$badgeImageName";
            $magicalName = $row['magicalName'];
            $badgeId = $row['badgeId'];
            $journeyName = $row['journeyName'];
            $houseName = $row['houseName'];
            $bloodTypeName = $row['bloodTypeName'];
            $petName = $row['petName'];
            }
        }
        else{
            echo "0 results";
        }

        $badgeQuery = "SELECT badge.image as badgeImage 
        FROM badge, userbadge 
        WHERE userbadge.userId = 28141151
        AND userbadge.badgeId = badge.badgeId
        AND userbadge.badgeId 
        IN (1,2,3,4) 
        GROUP BY badge.image;";

         $result = $con->query($badgeQuery);
         if($result->num_rows > 0){
             //output data of each row
             while($row = $result->fetch_assoc()){
                 //Variables to use in html
                 //echo $row['badgeImage'] .'</br>';
             }
         }
         else{
             echo "0 Badges found";
         }


        $con->close();
?>


<section class="mainsection" >
    <div class="profileData">
        <div id="profileImgContainer">
            <img id="profileImg" src="<?php echo $image_src;  ?>" >
            <div id="ribbonContainer">
                <h3 id="magicalName"><?php echo $magicalName; ?></h3>
                <img id="ribbon" src="<?php echo get_stylesheet_directory_uri();?>/img/ribbon.png" alt="Ribbon">
            </div>
        </div>
        <!--<img id="petImg" src="">-->
        <ul id="listOfBadges">
            <li class="badges"><img class="badgeImg" src="<?php echo get_stylesheet_directory_uri();?>/img/badges/wandBadge.png"></li>
            <li class="badges"><img class="badgeImg" src="<?php echo get_stylesheet_directory_uri();?>/img/badges/capeBadge.png"></li>
            <li class="badges"><img class="badgeImg" src="<?php echo get_stylesheet_directory_uri();?>/img/badges/ghostBadge.png"></li>
            <li class="badges"><img class="badgeImg" src="<?php echo get_stylesheet_directory_uri();?>/img/badges/nordheimBadge.png"></li>
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
<img class="mainsectionImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/background.jpg" alt="background">
<?php get_footer(); ?>
