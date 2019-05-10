
<?php 
    if (!isset($_COOKIE['cookie'])){
        header('Location: https://mr.1221s.com/login/');
        exit;
    }
get_header();
/*
Template Name: magiker
*/
?>
<?php
//COMMENT THIS OUT WHEN LOCAL
// include("config.php");

//Darlene connect to server
// COMMENT THIS OUT WHEN UPLOADING TO LIVE
// $server = "localhost";
// $user = "Darlene"; 
// $pw = "Dgs55qhk:).."; 
// $db = "1221s_com_magikerensrejse"; 

//Nanna Connect to server
//COMMENT THIS OUT WHEN UPLOADING TO LIVE
 $server ="localhost";
 $user ="root";
 $pw ="";
 $db = "1221s_com_magikerensrejse";

// //Create connection
$con = mysqli_connect($server, $user, $pw,$db);

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

//COMMENT THIS OUT WHEN UPLOADING TO LIVE:
$userCookie = 28141151;

//HER HENTES SOM ER GEMT PÅ BRUGEREN DER ER LOGGET IND--> 
// UNCOMMENT WHEN UPLOADING TO LIVE:
// $userCookie = $_COOKIE['user']; 

//Henter brugernavnet på den bruger, der er logget ind
// Hent billedet fra databasen
$selectUserSql = "SELECT image FROM user WHERE phoneNo= $userCookie";
//Send query'en afsted
$selectUserQuery = mysqli_query($con,$selectUserSql);
//Lav et array med de resultater der kommer ud fra vores sql
$selectUserRow = mysqli_fetch_array($selectUserQuery);


//Tag image-attributten fra tabellen
$imageName = $selectUserRow['image'];


$selectInfoSql = "SELECT user.magicalName, bloodtype.bloodTypeName, house.name AS houseName, pets.name AS petName, journey.name AS journeyName 
            FROM user, bloodtype, house, pets, journey, userjourney
            WHERE user.phoneNo = $userCookie 
            AND bloodtype.bloodTypeId = user.bloodTypeId
            AND house.houseId = user.houseId
            AND pets.petId = user.petId
            AND journey.journeyId = userjourney.journeyId
            AND userjourney.userId = user.phoneNo";


        $selectInfoQuery = $con->query($selectInfoSql);

        if($selectInfoQuery->num_rows > 0){
            //output data of each row
            while($selectInfoRow = $selectInfoQuery->fetch_assoc()){
                //Variables to use in html
            $magicalName = $selectInfoRow['magicalName'];
            $journeyName = $selectInfoRow['journeyName'];
            $houseName = $selectInfoRow['houseName'];
            $bloodTypeName = $selectInfoRow['bloodTypeName'];
            $petName = $selectInfoRow['petName'];
            }
        }
        else{
            echo "0 results";
        };


        // $selectBadgeSql = "SELECT badge.image as badgeImg 
        //                 FROM badge, userbadge 
        //                 WHERE userbadge.userId = $userCookie
        //                 AND userbadge.badgeId = badge.badgeId
        //                 AND userbadge.badgeId IN (1,2,3,4) 
        //                 GROUP BY badge.image;";

        //  $selectBadgeQuery = $con->query($selectBadgeSql);
        //  if($selectBadgeQuery->num_rows > 0){
        //      //output data of each row
        //      while($selectBadgeRow = $selectBadgeQuery->fetch_assoc()){
        //          //Variables to use in html
        //          //echo $row3['badgeImg'] .'</br>';
        //          $arrayOfBadges[$selectBadgeRow['badgeImg']][] = $selectBadgeQuery;
                 
        //     }
        //  }
        //  else{
        //      echo "0 Badges found";
        //  }
?>


<section class="mainsection" >
    <div class="profileData">
        <div id="profileImgContainer">

            <div id="profileImg"><img src="<?php echo get_stylesheet_directory_uri().'/img/portraits/' .$imageName;?>" ></div>
            
            <div class="ribbonContainer">
                <a href="#" id="settingsIcon"><i class="fas fa-cog"></i></a>
                <h3 class="magicalName"><?php echo $magicalName; ?></h3>
                <img class="ribbon" src="<?php echo get_stylesheet_directory_uri();?>/img/ribbon.png" alt="Ribbon">
            </div>
        </div>
        <!--<img id="petImg" src="">-->
        <!-- <ul id="listOfBadges">
        <?php 
            foreach($arrayOfBadges as $badge_img => $group){
                //Her looper vi igennem hver badge-image
                $src = get_stylesheet_directory_uri() .'/img/badges/' .$badge_img;
                echo("<li class='badges'><img class='badgeImg' src=$src></li>");
            }
        ?>
        </ul> -->
        <!-- <h4 id="journeyName"><?php echo $journeyName?></h4> -->
        <h4 id="otherInfo">Dine Oplysninger:</h4>
        <ul id="listOfInfo">
            <li class="infoItem" data-label="Dit Husnavn:"><?php echo $houseName?></li>
            <li class="infoItem" data-label="Din Blodtype:"><?php echo $bloodTypeName?></li>
            <li class="infoItem" data-label="Dit Kæledyr:"><?php echo $petName?></li>
        </ul>
    </div>
</section>
<!-- baggrundsbillede -->
<img class="mainsectionImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/background.jpg" alt="background">
        
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
