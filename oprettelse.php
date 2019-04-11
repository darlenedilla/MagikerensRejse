<?php get_header();
/*
Template Name: Oprettelse
*/?>

<!-- CONNECTION TO SERVER -->

<?php

$server ="localhost";
$user ="root";
$pw ="";
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

// // check if all fields are filled
//   if (isset($_POST['fornavn'])
//              && isset($_POST['gender'])
//              && isset($_POST['area'])
//              && isset($_POST['age'])
//              && isset($_POST['tlf'])
//              && isset($_POST['password'])
//              && isset($_POST['mName'])
//              && isset($_POST['hous'])
//              && isset($_POST['blood'])
//              && isset($_POST['pet'])
//
//                             //if starts
//                             ) {

// When submit is pressed send info to db
  if (isset($_POST['createUser'])) {

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
          // PLS INSERT

// SENDING INFO TO ENTITIES
        $sqlCreateUser = "INSERT INTO `user` (`phoneNo`, `mPassword`, `age`, `gender`, `name`, `magicalName`, `image`, `houseId`, `bloodTypeId`, `areaId`, `petId`)
                                          VALUES ('$tlf','$password','$age','$gender','$name','$mName','hello.png','$house','$blood','$area',$pet)";

                                          //Sending to db
                                                $conn->query($sqlCreateUser);
 }
// } else {
//     echo "Please fill out all fields in the form";
//   }
   ?>

<section class="mainsection">

<!-- HERE STARTS FORM -->
<section class="createUserFormWrapper">
  <!-- IKKE sikker på hvilken Action den skal have : -->
  <form class="createUserForm" method="post">

    <!-- First part of form -->
    <label for="fornavn">Fornavn</label>
    <input type="text" name="fornavn" value="skriv dit navn..."><br/>

    <label for="gender">Køn</label>
    <!-- find a better solution -->
    <select  name="gender">
      <option value="1">Pige</option>
      <option value="0">Dreng</option>
    </select>

    <label for="area">Område</label>
    <select class="" name="area">
      <option value="1">Fyn</option>
      <option value="2">Sjælland</option>
      <option value="3">Nordjylland</option>
      <option value="4">Sønderjylland</option>
      <option value="5">Bornholm</option>
    </select>

    <label for="age">Alder</label>
    <input type="number" name="age" value="6"><br/>

    <label for="tlf">Telefon nummer</label>
    <input type="number" name="tlf" value="45"><br/>

    <label for="password">Magisk kodeord</label>
    <input type="text" name="password" value="Vælg ....."><br/>

    <!-- second part of form -->


        <label for="mName">Magisk Navn</label>
        <input type="text" name="mName" value="vælg dit magiske navn"><br/>

        <label for="house">hus</label>
        <select class="houseDropDown" name="house">
          <option value="1">Ild</option>
          <option value="2">Jord</option>
          <option value="3">Luft</option>
          <option value="4">Vand</option>
        </select> <br/>

        <label for="blood">Blodstatus</label>
        <select class="bloodDropDown" name="blood">
          <option value="1">Fuldblods</option>
          <option value="2">Halvblods</option>
          <option value="3">Fumlerfødt</option>
          <option value="4">Vand</option>
        </select> <br/>

        <label for="pet">Kæledyr</label>
        <select class="petDropDown" name="pet">
          <option value="1">Kat</option>
          <option value="2">Ugle</option>
          <option value="3">Tudse</option>
        </select> <br/>
    <!-- third part of form -->

      <!-- INDSÆT KAMERA FUNKTION -->

      <input type="submit" name="createUser" value="Gem Oplysninger">

  </form>



<?php
if (isset($_POST['testConnection'])) {
  $sqlTestConnection = "INSERT INTO area (areaId, areaName) VALUES('6', 'Name');";

$conn->query($sqlTestConnection);
}

 ?>

  <form class="tester" method="post">
    <input type="submit" name="testConnection" value="Test">
  </form>

  <!-- END OF FORM -->


</section>
</section>

  <img class="mainsectionImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/login.jpg" alt="background">

</body>
</html>
