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
  //COMMENT THIS OUT WHEN UPLOADING TO LIVE
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
    echo '<script>console.log("connected succesfully")</script>';
  }

// UN-COMMENT THIS WHEN UPLOADING TO LIVE
// include("config.php");

   ?>
<div class="loginPaper" id="loginPaper">
  <!-- background image to login information -->
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/loginPaper.png" alt="loginPaper" class="loginPaperBG">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/waxsealRED.png" alt="loginPaper" class="loginPaperBG waxseal">


      <!-- Log ind form -->
      <form class="logInForm" method="post">

            <!-- 'brugernavn' -->
            <input type="number" name="phoneNo" value="" placeholder="Telefonummer..."><br/>

            <!-- Password -->
            <input type="text" name="mPassword" value="" placeholder="Magisk Kodeord ..."><br/>

            <!-- log ind knap -->
            <input type="submit" name="logIn" value="Log Ind" class="submitBtnLogin">


      </form> <!-- end log ind form -->


      <!-- end log ind form -->

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
                  //checks if the password from the server is the same as the one entered
                    // if ($sqlLoginQuery = $mPassword) {
                    //       echo "login succesful";
                    // };
        } else {
          echo "please enter a phone number";
        };
        };
       ?>

</div>

<div class="konvolutLoginSkærm" id="konvolutLoginSkærm">
  <img class="konvolutLoginSkærmImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/konvolutbg.png" alt="konvolutbg">
  <div class="startDinRejseWrapper">
    <p>Start din magiske rejse</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/arrows/curvedarrow.png" alt="curvedarrow-down">
  </div>
</div>

<!--  The image scroller once envelope has been opened -->
<div class="imageScroller" id="imageScroller">
  <div class="unroller"></div>
  <div class="imageScrollerWrapper">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/imagescroller.jpg" alt="firstImage">
      </div>

      <div class="imageScrollerWrapper">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/imagescroller.jpg" alt="firstImage">
          </div>

          <div class="imageScrollerWrapper">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/imagescroller.jpg" alt="firstImage">
              </div>
</div>

<!-- Envelope snippet thingy -->
<div class="envelope" id="envelopeOprettelse">
  <div class="paper" id="envelopePaper">
    <div id="paperContent">
      <div class="paperPage" id="paperPage1">
        <h2>Tilykke!</h2>
        <p>Du er hermed optaget på Tromheims trolddomsakademi!</p>
      </div>

      <div class="paperPage" id="paperPage2">
        <h2>Elementerne</h2>
        <p>Dette er de fire elementer, der styrer hver og en af os</p>
      </div>

      <div class="paperPage" id="paperPage3">
        <h2>Magiske Dage Odense</h2>
        <p>Magien er omrking os</p>
      </div>

      <div class="paperPage" id="paperPage4">
        <h2>Noget om fumlere ...</h2>
        <p>Praktisk information eller noget andet vi har aftalt</p>
      </div>

      <div class="" id="paperNextArrow">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/arrows/arrowRight.png" alt="rightArrow">
      </div>

      <div class="" id="paperBackArrow">
<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/arrows/arrowRight.png" alt="leftArrow">
      </div>
    </div>

  </div>
</div>

</section>
<!-- baggrundsbillede -->
  <img class="mainsectionImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/login.jpg" alt="background">

</body>
</html>
