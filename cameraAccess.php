<?php get_header();
/*
Template Name: Camera Access

*/?>

<?php
//Database forbindelse findes i config.php
include("config.php");

//Tjek om der er trykket på submit-knappen i formularen
if(isset($_POST['image_upload'])){
  //Hent filnavn fra det vedhæftede billede i formularen
  $name = $_FILES['file']['name'];
  //Hent sti-navnet til der hvor billedet skal gemmes
  $target_dir = "/wp-content/themes/MagikerensRejse/img/";
  //Referer til filnavnet inde i den angivede sti
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Vælg den slags filtype der må gemmes
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Fil-typer der er gyldige
  $extensions_arr = array("jpg","jpeg","png","gif");

    //Tjek om den valgte fil overholder type-reglen
  if( in_array($imageFileType,$extensions_arr) ){

  // Indsæt billedet i databasen som string
  $query = "UPDATE user SET image = '$image' WHERE phoneNo = 28141151";


  //Send query'en afsted - send fejlmeddelse, hvis der opstår en fejl    
  mysqli_query($con,$query) or die(mysqli_error($con));
  
  // Upload filen til den valgte sti
  move_uploaded_file($_FILES['file']['tmp_name'],'/wp-content/themes/MagikerensRejse/img/'.$name);
  }
 
}
?>


<!-- <br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br> -->


<!--ALMINDELIG FORM TIL AT VEDHÆFTE BILLEDE
<form method="post" action="" enctype='multipart/form-data'>
  <input type='file' name='file' />
  <input type='submit' value='Save image' name='image_upload'>
</form>-->


<video id="player" width="320" height="240" controls autoplay></video>
<button id="capture" style="width: 100px;">Tag billede</button>
<input type="file" accept="image/*" id="image" capture="camera">
<canvas width="320" height="240"></canvas>
<input type="submit" value="Gem billede" name="image_upload";>







<!--HER VISES DET BILLEDE SOM ER GEMT PÅ BRUGEREN MED TELEFONNUMMER 28141151-->
<?php
//Hent billedet fra databasen
$sql = "SELECT image FROM user WHERE phoneNo= 28141151";
//Send query'en afsted
$result = mysqli_query($con,$sql);
//Lav et array med de resultater der kommer ud fra vores sql
$row = mysqli_fetch_array($result);

//Tag image-attributten fra tabellen
$image = $row['image'];
//Lav en src-sti til billedet
$image_src = "/wp-content/themes/MagikerensRejse/img/".$image;

//Udskriv billedet i img-tag
?>
<!-- <img style="width: 150px; height: 250px;"src='<?php echo $image_src;  ?>' > -->

<?php get_footer();?>


