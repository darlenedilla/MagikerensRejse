<?php get_header();
/*
Template Name: Oprettelse
*/
?>

<!-- CONNECTION TO SERVER -->

<?php
//include("config.php");
// $server ="localhost";
// $user ="root";
// $pw ="";
// $db = "1221s_com_magikerensrejse";

$server ="localhost";
$user ="Darlene";
$pw ="Dgs55qhk:)..";
$db = "1221s_com_magikerensrejse";

// Create connection
$conn = new mysqli($server, $user, $pw, $db);
//check fann_get_total_connections
if ($conn->connect_error) {
  die("Connection failed:" .$conn->connect_error);
} else {
  echo "connected succesfully";
}
// FORM FUNCTIONALITY

// When submit is pressed send info to db
  if (isset($_POST['submitUser'])) {

    // variables
          // First part of form
          $name = $_POST['fornavn'];
          $gender = $_POST['gender'];
          $area = $_POST['area'];
          $age = $_POST['age'];
          $tlf = $_POST['tlf'];
          $password = $_POST['password'];

          // Second part of form
          $mName = $_POST['mName'];
          $house = $_POST['house'];
          $blood = $_POST['blood'];
          $pet = $_POST['pet'];

          // THIRD PART OF form
          //$image = $_POST['image'];

          //Hent filnavn fra det vedhæftede billede i formularen
          $image = $_FILES['image']['name'];
          //Hent sti-navnet til der hvor billedet skal gemmes
          $target_dir = get_stylesheet_directory_uri().'/img/portraits/';
          //Referer til filnavnet inde i den angivede sti
          $target_file = $target_dir . basename($_FILES["image"]["name"]);

          // Vælg den slags filtype der må gemmes
          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

          // Fil-typer der er gyldige
          $extensions_arr = array("jpg","jpeg","png","gif");
            //Tjek om den valgte fil overholder type-reglen
          if( in_array($imageFileType,$extensions_arr) ){

            // Upload filen til den valgte sti
            // move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile);
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
              echo "The file ". basename($image). " has been uploaded.";
            } 
            else {
              echo "Sorry, there was an error uploading your file.";
              echo $_FILES["image"]["tmp_name"];
              echo $target_file;
            }

            // SENDING INFO TO ENTITIET
            $sqlCreateUser = "INSERT INTO user (phoneNo, mPassword, age, gender, name, magicalName, image, houseId, bloodTypeId, areaId, petId)
            VALUES ($tlf,'$password',$age,$gender,'$name','$mName','$image',$house,$blood,$area,$pet)";

            //Sending to db
            $con->query($sqlCreateUser);
          }
  }
// } else {
//     echo "Please fill out all fields in the form";
//   }
   ?>

<section class="mainsection">

  <div id="createUserFormWrapper"> 
    <form id="createUserForm" method="POST" enctype="multipart/form-data" action="">
      <!-- First part of form -->
      <div id="firstFormSection" class="formSection">
        <h3>Hvem starter denne rejse?</h3>
        <!-- <label for="fornavn">Fornavn</label> -->
        <input id="firstname" type="text" name="fornavn" placeholder="Fornavn" value="">
        <!-- <label for="age">Alder</label> -->
        <input id="age" type="number" name="age" placeholder="Alder"><br/>

        
        <!-- <label for="area">Område</label> -->
        <select class="area" name="area">
          <option selected>Område</option>
          <option value="1">Fyn</option>
          <option value="2">Sjælland</option>
          <option value="3">Nordjylland</option>
          <option value="4">Sønderjylland</option>
          <option value="5">Bornholm</option>
        </select>

        <!-- <label for="gender">Køn</label> -->
        <!-- find a better solution -->
        <select name="gender">
          <option selected>Køn</option>
          <option value="1">Pige</option>
          <option value="0">Dreng</option>
        </select><br/>

        <!-- <label for="tlf">Telefon nummer</label> -->
        <input id="phone" type="number" name="tlf" placeholder="Tlf.nr/Brugernavn"><br/>

        <!-- <label for="password">Magisk kodeord</label> -->
        <input id="password" type="text" name="password" placeholder="Adgangskode"><br/>
      </div><!-- END OF FIRST FORM SECTION-->       
                        
      <!-- second part of form -->
      <div id="secondFormSection" class="formSection">
        <h3>Beskriv din indre magiker</h3>
        <!-- <label for="mName">Magisk Navn</label> -->
        <input id="mName" type="text" name="mName" placeholder="Magisk Navn"><br/>

        <!-- <label for="house">hus</label> -->
        <select class="houseDropDown" name="house">
          <option selected>Hus</option>
          <option value="1">Ild</option>
          <option value="2">Jord</option>
          <option value="3">Luft</option>
          <option value="4">Vand</option>
        </select> <br/>

        <!-- <label for="blood">Blodstatus</label> -->
        <select class="bloodDropDown" name="blood">
          <option selected>Blodstatus</option>
          <option value="1">Fuldblods</option>
          <option value="2">Halvblods</option>
          <option value="3">Fumlerfødt</option>
          <option value="4">Vand</option>
        </select> <br/>

        <!-- <label for="pet">Kæledyr</label> -->
        <select class="petDropDown" name="pet">
          <option selected>Kæledyr</option>
          <option value="1">Kat</option>
          <option value="2">Ugle</option>
          <option value="3">Tudse</option>
        </select> <br/>
      </div><!--END OF SECOND FORM SECTION-->

      <!-- third part of form -->
      <div id="thirdFormSection" class="formSection">
        <h3>Vælg et billede</h3>
        <!-- INDSÆT KAMERA FUNKTION -->
        <input id="image" type="file" name="image">
      </div><!--END OF THIRD FORM SECTION-->
      <!--<input id="submit" type="image" name="submitUser" value="Gem oplysninger" src="<?php //echo get_stylesheet_directory_uri(); ?>/img/submitPaper.png" alt="submit">-->
      <input id="submit" type="submit" name="submitUser" value="Gem oplysninger">
    </form>
  </div>

  <div id="btnWrapper">
    <div class="btnslide" id="slide-prev"></div>
    <div class="btnslide" id="slide-next"></div>
  </div>

</section>

  <img class="mainsectionImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/login.jpg" alt="background">
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

</body>
</html>
