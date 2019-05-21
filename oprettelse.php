<?php 
include("cookieRedirect.php");
get_header();
/*
Template Name: Oprettelse
*/
?>

<!-- CONNECTION TO SERVER -->

<?php
//UN-COMMENT WHEN UPLOADING TO LIVE
include("config.php");

//COMMENT OUT WHEN UPLOADING TO LIVE
//Nanna connect to server
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
//   die("Connection failed:" .$con->connect_error);
// } else {
//   echo "connected succesfully";
// }



//Oprettelsesfunktionalitet
//Her tjekkes om om submitUser er clicket
if (isset($_POST['submitUser'])) {
    // Variabler fra formularen
      // Første del af formular
      $name = $_POST['fornavn'];
      $gender = $_POST['gender'];
      $area = $_POST['area'];
      $age = $_POST['age'];
      $tlf = $_POST['tlf'];
      $password = $_POST['password'];

      // Anden del af formular
      $mName = $_POST['mName'];
      $house = $_POST['house'];
      $blood = $_POST['blood'];
      $pet = $_POST['pet'];

      // Tredje del af formular
      //Billedeupload
      $target_dir = get_stylesheet_directory(). "/img/portraits/";
      $image = basename( $_FILES["image"]["name"]);
      $target_file = $target_dir . $image;
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      //Check om billedet er et rigtigt billede
      $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
          $uploadOk = 1;
        } 
        else {
          $uploadOk = 0;
        }

        // Godkendte filtyper
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
          echo "Dit billede blev ikke uploadet";
        } 
        else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                //echo "The file ". $image. " has been uploaded.";
            } 
            else {
                //echo "Sorry, there was an error uploading your file.";
            }
        }

      // Send formulardata videre til databasen i user-entiteten
      $sqlCreateUser = "INSERT INTO user (phoneNo, mPassword, age, gender, name, magicalName, image, houseId, bloodTypeId, areaId, petId)
      VALUES ($tlf,'$password',$age,$gender,'$name','$mName','$image',$house,$blood,$area,$pet)";

      //Send query afsted med db-forbindelse
      $con->query($sqlCreateUser);
}//Her slutter if (isset)
?>

<!--Her begynder mainsection-->
<section class="mainsection">

  <!--Her begynder oprettelsesformularen-->
  <div id="createUserFormWrapper"> 
    <!--Formular, start-->
    <form id="createUserForm" method="POST" enctype="multipart/form-data" action="https://mr.1221s.com/badge/">
      
      <!--Første form sektion, start-->
      <div id="firstFormSection" class="formSection">
        <h3>Hvem starter denne rejse?</h3>

        <input class="large-input" id="firstname" type="text" name="fornavn" placeholder="Fornavn" value="">

        <input class="small-input" id="age" type="number" name="age" placeholder="Alder"><br/>

        <select class="area large-select" name="area">
          <option selected>Område</option>
          <option value="1">Fyn</option>
          <option value="2">Sjælland</option>
          <option value="3">Nordjylland</option>
          <option value="4">Sønderjylland</option>
          <option value="5">Bornholm</option>
        </select>

        <select id="gender" class="small-select" name="gender">
          <option selected>Køn</option>
          <option value="1">Pige</option>
          <option value="0">Dreng</option>
        </select><br/>

        <input class="large-input" id="phone" type="number" name="tlf" placeholder="Tlf.nr/Brugernavn"><br/>

        <input class="large-input" id="password" type="text" name="password" placeholder="Adgangskode"><br/>
      </div><!-- Første form sektion, slut-->       
                        
      <!--Anden form sektion, start-->
      <div id="secondFormSection" class="formSection">
        <h3>Beskriv din indre magiker</h3>

        <input class="large-input" id="mName" type="text" name="mName" placeholder="Magisk Navn">

        <select class="houseDropDown small-select" name="house">
          <option selected>Hus</option>
          <option value="1">Ild</option>
          <option value="2">Jord</option>
          <option value="3">Luft</option>
          <option value="4">Vand</option>
        </select><br/>
        
        <select class="petDropDown small-select" name="pet">
          <option selected>Kæledyr</option>
          <option value="1">Kat</option>
          <option value="2">Ugle</option>
          <option value="3">Tudse</option>
        </select>

        <select class="bloodDropDown large-select" name="blood">
          <option selected>Blodstatus</option>
          <option value="1">Fuldblods</option>
          <option value="2">Halvblods</option>
          <option value="3">Fumlerfødt</option>
          <option value="4">Vand</option>
        </select>
      </div><!--Anden form sektion, slut-->

      <!--Tredje form sektion, start -->
      <div id="thirdFormSection" class="formSection">
        <h3>Magisk Portræt</h3>

        <!--Vælg billede-->
        <label for="image" class="custom-file-upload">
        <i class="fas fa-camera"></i><br/>
        Vælg et billede fra telefonen
        </label>
        <input id="image" type="file" name="image">
      </div><!--Tredje form sektion, slut-->

      <input id="submit" type="submit" name="submitUser" value="Gem oplysninger">
    </form> <!--Formular, slut-->
  </div><!--Her slutter oprettelsesformularen-->

<!--Pile frem og tilbage, start-->
  <div id="btnWrapper">
    <div class="btnslide" id="slide-prev"></div>
    <div class="btnslide" id="slide-next"></div>
  </div>
<!--Pile frem og tilbage, slut-->

</section> <!--Her slutter mainsection-->

<!--Baggrundsbillede-->
<img class="mainsectionImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/login.jpg" alt="background">

<!--Her starter scriptet for dynamiske pile-->
<script>
  var formWrapper = document.getElementById("createUserFormWrapper");
  var nextslider = document.getElementById("slide-next");
  var prevslider = document.getElementById("slide-prev");
  var submit = document.getElementById("submit");



nextslider.addEventListener("click", function(){
  if(formWrapper.style.left === "-100vw"){
    formWrapper.style.left = "-200vw";
    nextslider.style.opacity = 0;
    submit.style.display = "block";
  }
  else{
    formWrapper.style.left = "-100vw";
    prevslider.style.opacity = 1;
    nextslider.style.opacity = 1;
  }
});

prevslider.addEventListener("click", function(){
  if(formWrapper.style.left === "-200vw"){
    formWrapper.style.left = "-100vw";
    nextslider.style.opacity = 1;
  }
  else{
    formWrapper.style.left = "0";
    prevslider.style.opacity = 0.4;
    nextslider.style.opacity = 1;
  }
});
</script>
<!--Her slutter scriptet for dynamiske pile-->

</body>
</html>
