<?php get_header();
/*
Template Name: Camera Access

*/?>

<?php
include("config.php");

if(isset($_POST['image_upload'])){


  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
 
     // Insert record
      $query = "UPDATE user SET 'image' = " . $name . " WHERE phoneNo = 28141151";
       // Insert record

     // Upload file
     move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

     if (mysqli_query($con, $query)) {
      echo "New record created successfully";
      } else {
      echo "Error: " . $query . "<br>" . mysqli_error($con);
      }

  }

  
 
}
?>

<!--<form method="post" action="" enctype="multipart/form-data" id="form">
  <video id="player" controls autoplay></video>
  <button id="capture">Tag billede</button>
  <canvas id="canvas" width=320 height=100></canvas>
  <input type="file" accept="image/*" id="image" capture="camera">
  <input type="submit" id="save" value="Gem billede" name="image_upload">
</form>-->
<div id="container">
<video id="player" controls autoplay></video>
<canvas id="canvas" width=320 height=240></canvas>
<button id="capture">Capture</button>

</div>

<!--<form method="post" action="" enctype='multipart/form-data'>
  <input type='file' name='file' />
  <input type='submit' value='Save name' name='but_upload'>
</form>-->

<?php get_footer();?>


