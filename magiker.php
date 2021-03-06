
<?php 
// include("cookieRedirect.php");

/* CONNECT TO THE SERVER */
include("config.php");

get_header();
/*
Template Name: magiker

THIS IS THE PROFILE PAGE MAIN FILE
*/
?>
<?php

//HER HENTES SOM ER GEMT PÅ BRUGEREN DER ER LOGGET IND--> 
$userCookie = $_COOKIE['user']; 

//Query til at hente profilbillede
$selectUserSql = "SELECT image FROM user WHERE phoneNo= $userCookie";
//Send query'en afsted med db-forbindelse
$selectUserQuery = mysqli_query($con,$selectUserSql);
if($selectUserQuery === FALSE) {
    $imageName = "defaultportrait.jpg";
} else {
    //Array med de resultater der kommer ud fra vores sql
$selectUserRow = mysqli_fetch_array($selectUserQuery);

// Profile picture
if($selectInfoRow['image']->num_rows > 0) {
    $imageName = $selectUserRow['image'];
} 
// failsafe
else if($selectInfoRow['image']->num_rows <= 0) {
    $imageName = "portrait.jpg";
}
}


//Query til at hente al info fra brugeren,d er er logget ind
$selectInfoSql = "SELECT user.magicalName, bloodtype.bloodTypeName, house.name AS houseName, pets.name AS petName, journey.name AS journeyName 
            FROM user, bloodtype, house, pets, journey, userjourney
            WHERE user.phoneNo = $userCookie 
            AND bloodtype.bloodTypeId = user.bloodTypeId
            AND house.houseId = user.houseId
            AND pets.petId = user.petId
            AND journey.journeyId = userjourney.journeyId
            AND userjourney.userId = user.phoneNo";

        //Sender query afsted med db-forbindelsen
        $selectInfoQuery = $con->query($selectInfoSql);

        //Hvis der er flere end 0 resultater
        if($selectInfoQuery->num_rows > 0){
            //For hver række i resultatsættet
            while($selectInfoRow = $selectInfoQuery->fetch_assoc()){
            //Variabler
                $magicalName = $selectInfoRow['magicalName'];
                $journeyName = $selectInfoRow['journeyName'];
                $houseName = $selectInfoRow['houseName'];
                $bloodTypeName = $selectInfoRow['bloodTypeName'];
                $petName = $selectInfoRow['petName'];
            }
            // Failsafe:
        } else if($selectInfoQuery->num_rows <= 0){
            $magicalName = "Magisk Navn";
                $journeyName = "Rejsens Navn";
                $houseName = "Elementets navn";
                $bloodTypeName = "Blodtype";
                $petName = "Kæledyrets navn";
        };
?>
<!--Her starter mainsection-->
<section class="mainsection">
    <!--ProfileData, start-->
    <div class="profileData">
        <!--Profilbillede, start-->
        <div id="profileImgContainer">
            <div id="profileImg">
                <img src="<?php echo get_stylesheet_directory_uri().'/img/portraits/' .$imageName;?>" >
            </div>
            <div class="ribbonContainer">
                <a href="localhost/magikerensRejse/change-settings/" id="settingsIcon"><i class="fas fa-cog"></i></a>
                <h3 class="magicalName"><?php echo $magicalName; ?></h3>
                <img class="ribbon" src="<?php echo get_stylesheet_directory_uri();?>/img/ribbon.png" alt="Ribbon">
            </div>
        </div><!--Profilbillede, slut-->
        
        <!--Profiloplysninger, start-->
        <h4 id="otherInfo">Dine Oplysninger:</h4>
        <ul id="listOfInfo">
            <li class="infoItem" data-label="Dit Husnavn:"><?php echo $houseName?></li>
            <li class="infoItem" data-label="Din Blodtype:"><?php echo $bloodTypeName?></li>
            <li class="infoItem" data-label="Dit Kæledyr:"><?php echo $petName?></li>
        </ul>
    </div><!--ProfilData, slut-->
</section><!--Her slutter mainsection-->
<!-- baggrundsbillede -->
<img class="mainsectionImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/background.jpg" alt="background">

<!--Her starter scriptet for visning af profiloplysninger-->
<script>
    var journeyName = "<?php echo $journeyName?>";
    var profileImg = document.getElementById("profileImg");

    //Skift farve på border omkring profilbillede ud fra deres retning
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
        case "Rejsens Navn":
            profileImg.style.borderColor = "#fffff";
            break;
    }
</script>
<?php get_footer(); ?>
