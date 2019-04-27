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
</div>

<div class="konvolutLoginSkærm" id="konvolutLoginSkærm">
  <img class="konvolutLoginSkærmImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/konvolutbg.png" alt="konvolutbg">
  <div class="startDinRejseWrapper">
    <p>Start din magiske rejse</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/arrows/curvedarrow.png" alt="curvedarrow-down">
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
