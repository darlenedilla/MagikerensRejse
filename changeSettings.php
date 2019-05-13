<?php
/*
Template Name: Change settings
*/
get_header();

include("cookieRedirect.php");
?>

<!-- CONNECTION TO SERVER -->

    <?php
    //UN-COMMENT WHEN UPLOADING TO LIVE
    include("config.php");

    //COMMENT OUT WHEN UPLOADING TO LIVE
    // Nanna connect to server
    // $server ="localhost";
    // $user ="root";
    // $pw ="";
    // $db = "1221s_com_magikerensrejse";

    //Darlene connect to server
    // $server ="localhost";
    // $user ="Darlene";
    // $pw ="Dgs55qhk:)..";
    // $db = "1221s_com_magikerensrejse";

    // Create connection
    // $con = new mysqli($server, $user, $pw, $db);
    // //check fann_get_total_connections
    // if ($con->connect_error) {
    // die("Connection failed:" .$con->connect_error);
    // } else {
    // // echo "connected succesfully";
    // }
    
?>

<?php


//HER HENTES SOM ER GEMT PÅ BRUGEREN DER ER LOGGET IND-->
$userCookie = $_COOKIE['user']; //Henter brugernavnet på den bruger, der er logget ind
// Hent billedet fra databasen
// $selectUserSql = "SELECT image FROM user WHERE phoneNo= $userCookie";
// //Send query'en afsted
// $selectUserQuery = mysqli_query($con,$selectUserSql);
// //Lav et array med de resultater der kommer ud fra vores sql
// $selectUserRow = mysqli_fetch_array($selectUserQuery);



// FORM FUNCTIONALITY
// When submit is pressed send info to db
  if (isset($_POST['submitChanges'])) {

    // variables
          // First part of form
          $password = $_POST['changePassword'];

          // Second part of form
          $mName = $_POST['mName'];

          // THIRD PART OF form
          //IMAGE UPLOAD
            $target_dir = get_stylesheet_directory(). "/img/portraits/";
            $image = basename( $_FILES["image"]["name"]);
            $target_file = $target_dir . $image;
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
            //   echo "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
            } else {
              echo "File is not an image.";
              $uploadOk = 0;
            }
  
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    //echo "The file ". $image. " has been uploaded.";
                } else {
                    //echo "Sorry, there was an error uploading your file.";
                }
            }

            // SENDING INFO TO ENTITIET
            $sqlUpdateUser = "UPDATE `user` SET `mPassword`='$password',`magicalName`='$mName',`image`='$image' WHERE `phoneNo` = $userCookie";

            //Sending to db
            $con->query($sqlUpdateUser);
        }

?>

<section class="mainsection">

<form action="" method="post" id="changeSettingsForm" enctype="multipart/form-data">
        <label for="mName">Ændr Magisk Navn:</label></br>
        <input class="large-input" id="mName" type="text" name="mName" placeholder="Magisk Navn"></br>

        <label for="changePassword">Skift magisk kodeord:</label></br>
        <input type="text" class="large-input" name="changePassword" id="changePassword" placeholder="Kodeord..."></br>


        <!-- INDSÆT KAMERA FUNKTION -->
        <label for="image" class="settings-file-upload">
            <h3>Klik her for at vælge et nyt profil-billede:</h3>
            <i class="fas fa-camera"></i><br/>
        </label>
        <input id="image" type="file" name="image"></br>

    
    <input id="submitChanges" type="submit" name="submitChanges" value="Gem oplysninger">

</form>
</section>


<!-- baggrundsbillede -->
<img class="mainsectionImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/background.jpg" alt="background">
       


<?php get_footer();?>