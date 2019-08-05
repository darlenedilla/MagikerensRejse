<?php get_header();
/*
Template Name: Camera Access

*/?>

<?php
//Rigtig Database forbindelse findes i config.php
include("config.php");
// Fetch user data from database
// $host = "localhost"; /* Host name */
// $user = "Darlene"; /* User */
// $password = "Dgs55qhk:).."; /* Password */
// $dbname = "1221s_com_magikerensrejse"; /* Database name */

// Create connection
$con = mysqli_connect($host, $user, $password,$dbname);

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

//Tjek om der er trykket på submit-knappen i formularen
if(isset($_POST['image_upload'])){

    $target_dir = get_stylesheet_directory_uri() .'/img/portraits/';
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
            echo "file: " .$target_file;
            echo "TEMP file: " .$_FILES["file"]["tmp_name"];
        }
    }

  }
?>


<!--ALMINDELIG FORM TIL AT VEDHÆFTE BILLEDE-->
<form id="imageForm" method="post" action="" enctype='multipart/form-data'>
  <input type='file' name='file' />
  <input type='submit' value='Save image' name='image_upload'>
</form>


<!-- HER KAN DER TAGES ET STILBILLEDE
<video id="player" width="320" height="240" controls autoplay></video>
<button id="capture" style="width: 100px;">Tag billede</button>
<input type="file" accept="image/*" id="image" capture="camera">
<canvas width="320" height="240"></canvas>-->



<!--HER VISES DET BILLEDE SOM ER GEMT PÅ BRUGEREN DER ER LOGGET IND-->
<?php
$userCookie = $_COOKIE['user']; //Henter brugernavnet på den bruger, der er logget ind
//Hent billedet fra databasen
$selectUserImageSql = "SELECT image FROM user WHERE phoneNo= $userCookie";
//Send query'en afsted
$selectUserImageQuery = mysqli_query($con,$selectUserImageSql);
//Lav et array med de resultater der kommer ud fra vores sql
$selectUserImageRow = mysqli_fetch_array($selectUserImageQuery);

//Tag image-attributten fra tabellen
$image = $selectUserImageRow['image'];
//Lav en src-sti til billedet
$image_src = get_stylesheet_directory_uri().'/img/portraits/'.$image;

//Udskriv billedet i img-tag
?>
<img style="width: 150px; height: 250px;"src='<?php echo $image_src;  ?>' >

<?php get_footer();?>

<style>
  #imageForm{
    margin-top: 50%;
  }
</style>


