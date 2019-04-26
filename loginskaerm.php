<?php get_header();
/*
Template Name: Login
*/?>


<section class="desktopMainSection">
  <h1>Begynd din magiske rejse på din smartphone!</h1>
  <h3>Scan QR koden og oplev magien</h3>
  <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/qr.png" alt="QR-kode">
</section>
<section class="desktopBottomLinks">
<span>   <a href="https://magiskedageodense.dk/" target="_blank"><u>Magiske Dage</u></a> </span>
<span>   <a href="https://www.odense.dk/" target="_blank"><u>Odense Kommune</u></a> </span>
<span>   <a href="https://www.odensebib.dk/" target="_blank"><u>Odense Biblioteker</u></a> </span>
</section>

<div class="darkOverlay"></div>

<section class="mainsection">

  <?php

  //Connect to server
  //
  $server ="localhost";
  $user ="root";
  $pw ="";
  $db = "1221s_com_magikerensrejse";

  //
  // include("config.php");
  // Create connection
  $conn = new mysqli($server, $user, $pw, $db);
  //check fann_get_total_connections
  if ($conn->connect_error) {
    die("Connection failed:" .$conn->connect_error);
  } else {
    echo '<script>console.log("connected succesfully")</script>';
  }


   ?>
<div class="loginPaper">
  <!-- background image to login information -->
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/loginPaper.png" alt="loginPaper" class="loginPaperBG">

      <!-- Log ind form -->
      <form class="logInForm" method="post">

            <!-- 'brugernavn' -->
            <input type="number" name="phoneNo" value="" placeholder="Telefonummer..."><br/>

            <!-- Password -->
            <input type="text" name="mPassword" value="" placeholder="Magisk Kodeord ..."><br/>

            <!-- log ind knap -->
            <input type="submit" name="logIn" value="Log Ind" class="submitBtnLogin">


      </form> <!-- end log ind form -->
</div>

<div class="konvolutLoginSkærm">
  <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/konvolutbg.png" alt="konvolutbg">
</div>

      <?php

      // Log ind funktionalitet
      //if 'log ind' is pressed:
      if (isset($_POST['logIn'])) {

        $phoneNo = $_POST['phoneNo'];
        $mPassword = $_POST['mPassword'];

          //only do this if a phone number has been entered
          if (isset($_POST['phoneNo'])) {

          //sql query to ask for the password where it matches the phone number given
          $sqlCheckLogin = "SELECT `mPassword` FROM `user` WHERE `phoneNo` = '$phoneNo'";
            $sqlLoginQuery = $conn->query($sqlCheckLogin);

            while($sqlQueryResult = $sqlLoginQuery->fetch_assoc()) {
            if ($sqlQueryResult['mPassword'] == $mPassword) {
              //If the password is correct:

              // code...
            }
             else {
               //if the password is incorrect:
              echo "login no success :(";
            } };

        } else {
          echo "please enter a phone number";
        };
        };

       ?>
</section> <!-- end 'mainSection' -->


<!-- baggrundsbillede -->
  <img class="mainsectionImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/login.jpg" alt="background">

</body>
</html>
