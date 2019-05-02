<?php
    function setUserCookie($phoneNo){
        $cookie_name = "user";
        $cookie_value = $phoneNo;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    };
?>
<?php get_header();
/*
Template Name: Login
*/
?>


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
  $user ="Darlene";
  $pw ="Dgs55qhk:)..";
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
include("config.php");

// Log ind funktionalitet
//if 'log ind' is pressed:
if (isset($_POST['logIn'])) {
  $phoneNo = $_POST['phoneNo'];
  $mPassword = $_POST['mPassword'];
  $url = "";
    //only do this if a phone number has been entered
    if (isset($_POST['phoneNo'])) {
    //sql query to ask for the password where it matches the phone number given
    $sqlCheckLogin = "SELECT `mPassword` FROM `user` WHERE `phoneNo` = '$phoneNo'";
      $sqlLoginQuery = $conn->query($sqlCheckLogin);
      if($sqlLoginQuery->num_rows > 0){
        while($sqlQueryResult = $sqlLoginQuery->fetch_assoc()) {

          $sqlPassword = $sqlQueryResult['mPassword'];
          if ($sqlQueryResult['mPassword'] === $mPassword) {
            //If the password is correct:
            $url = "../badges";
            setUserCookie($phoneNo);
            echo "<script>console.log('Cookie was set: $_COOKIE[$cookie_name]');</script>";
            //echo "<script>window.onload= function(){document.getElementById('loginForm').submit();};</script>";
            echo "login success";
          }
          else {
            //if the password is incorrect:
            echo "login no success :(";
            $url ="";
          }
        };
      }
      else{
        echo "0 results";
      }
            //checks if the password from the server is the same as the one entered
              // if ($sqlLoginQuery = $mPassword) {
              //       echo "login succesful";
              // };
    }
    else {
      echo "please enter a phone number";
    };
};




   ?>
<div class="loginPaper" id="loginPaper">
  <!-- background image to login information -->
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/loginPaper.png" alt="loginPaper" class="loginPaperBG">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/waxsealRED.png" alt="loginPaper" class="loginPaperBG waxseal">


      <!-- Log ind form -->
      <form id="loginForm" class="logInForm" method="post" >

            <!-- 'brugernavn' -->
            <input type="number" name="phoneNo" value="" placeholder="Telefonummer..."><br/>

            <!-- Password -->
            <input id="mPassword" type="password" name="mPassword" value="" placeholder="Magisk Kodeord ..."><br/>

            <!-- log ind knap -->
            <input type="submit" name="logIn" value="Log Ind" class="submitBtnLogin">


      </form> <!-- end log ind form -->

      <!-- end log ind form -->

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
        <!-- starting the while loop of the pages -->
         <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <!-- getting the data for the letter -->
        <?php
        $oprettelsesBrev = new Pod('oprettelsesbrev');
        $oprettelsesBrev->findRecords('pagecontent ASC');
        $total_pages = $oprettelsesBrev->getTotalRows();?>

        <?php
        while ($oprettelsesBrev->fetchRecord() ) {
          $pageImg = $oprettelsesBrev->get_field('image.guid');?>

        <div class="imageScrollerWrapper" id="imageScrollerImages">
          <img src="<?php echo $pageImg; ?>" alt="photo for the page with the title <?php $title; ?>">

            </div>

          <?php  } endwhile; ?>
          <?php  endif;?>
      </div>

      <!-- Envelope snippet thingy -->
      <div class="envelope" id="envelopeOprettelse">
        <div class="paper" id="envelopePaper">
          <div id="paperContent">

            <!-- starting the while loop of the pages -->
             <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <!-- getting the data for the letter -->
            <?php
            $oprettelsesBrev = new Pod('oprettelsesbrev');
            $oprettelsesBrev->findRecords('page_number ASC');
            $total_pages = $oprettelsesBrev->getTotalRows();

            while ($oprettelsesBrev->fetchRecord() ) {

              $title = $oprettelsesBrev->get_field('title');
              $pageContent = $oprettelsesBrev->get_field('pagecontent');

              //cleanup - automatically makes <p>s
              $pageContent = wpautop( $pageContent );

            ?>
             <!-- actual code -->
             <div class="paperPage">
               <h2> <?php echo $title; ?> </h2>
               <div class="pageContent">
                 <?php echo $pageContent; ?>
               </div>
             </div>

            <?php } ?>
            <?php endwhile; ?>
            <?php  endif;?>

            <div class="" id="paperNextArrow">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/arrows/arrowRight.png" alt="rightArrow">
            </div>

            <div class="" id="paperBackArrow">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/arrows/arrowRight.png" alt="leftArrow">
            </div>

            <!-- CHANGE THIS LINK TO FIT THE CORRECT PATH - CHANGELATER -->
            <a href="https://mr.1221s.com/optagelse/" class="" id="paperOverlayOprettelse">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/loginPaper.png" alt="the next button">
              <p>Videre</p>
            </a>
          </div>

        </div>
      </div>

</section>
<!-- baggrundsbillede -->
  <img class="mainsectionImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/login.jpg" alt="background">
</body>
</html>
