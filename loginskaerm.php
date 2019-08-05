<?php
ob_start();
if (isset($_COOKIE['user'])){
  header("location: https://mr.1221s.com/badge");
}
function setUserCookie($phoneNo){
  $cookie_name = "user";
  //$cookie_value = 28141151; //Hard coded fordi cookie ikke virker ordenligt
  $cookie_value = $phoneNo;
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
}
?>
<?php 
get_header();
/*
Template Name: Login
*/
?>
<?php
  // UN-COMMENT THIS WHEN UPLOADING TO LIVE
include("config.php");

  //Darlene Connect to server
  // $server ="localhost";
  // $user ="Darlene";
  // $pw ="Dgs55qhk:)..";
  // $db = "1221s_com_magikerensrejse";

  //Nanna Connect to server
  //COMMENT THIS OUT WHEN UPLOADING TO LIVE
  // $server ="localhost";
  // $user ="root";
  // $pw ="";
  // $db = "1221s_com_magikerensrejse";

  // // Create connection
  // $con = new mysqli($server, $user, $pw, $db);
  // //check fann_get_total_connections
  // if ($con->connect_error) {
  //   die("Connection failed:" .$con->connect_error);
  // } else {
  //   echo '<script>console.log("connected succesfully")</script>';
  // }
  ?>

<!--Her begynder desktop section-->
<section class="desktopMainSection">
  <h1>Begynd din magiske rejse på din smartphone!</h1>
  <h3>Scan QR koden og oplev magien</h3>
  <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/qr.png" alt="QR-kode">
</section>
<section class="desktopBottomLinks">
<span>   <a href="https://magiskedageodense.dk/" target="_blank"><u>Magiske Dage Odense</u></a> </span>
<span>   <a href="https://www.odensebib.dk/" target="_blank"><u>Odense Biblioteker</u></a> </span>
<span>   <a href="https://www.odense.dk/" target="_blank"><u>Odense Kommune</u></a> </span>
</section>

<div class="darkOverlay"></div>
<!--Her slutter desktop section-->

<!--Her begynder mainsection-->
<section class="mainsection">

<!--Her begynder Loginformularen-->
<div class="loginPaper" id="loginPaper">
  <!-- background image to login information -->
  <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/loginPaper.png" alt="loginPaper" class="loginPaperBG">
  <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/waxsealRED.png" alt="loginPaper" class="loginPaperBG waxseal">

  <!-- Log ind form -->
  <form id="loginForm" class="logInForm" method="post" action="">
    <!-- 'brugernavn' -->
    <input type="number" name="phoneNo" value="" placeholder="Telefonummer..."><br/>
    <!-- Password -->
    <input id="mPassword" type="password" name="mPassword" value="" placeholder="Magisk Kodeord ..."><br/>
    <!-- log ind knap -->
    <input type="submit" name="logIn" value="Log Ind" class="submitBtnLogin">
  </form> <!-- end log ind form -->
</div> <!--Her slutter Loginformularen-->

<?php
// Log ind funktionalitet
//if 'log ind' is pressed:
  if (isset($_POST['logIn'])) {
    $phoneNo = $_POST['phoneNo'];
    $mPassword = $_POST['mPassword'];
  
    //sql query to ask for the password where it matches the phone number given
    $sqlCheckLogin = "SELECT `mPassword` FROM `user` WHERE `phoneNo` = $phoneNo";
      $sqlLoginQuery = $con->query($sqlCheckLogin);
    
      //Hvis der er flere end 0 resultater
      if($sqlLoginQuery->num_rows > 0){
        while($sqlQueryResult = $sqlLoginQuery->fetch_assoc()) {
          $sqlPassword = $sqlQueryResult['mPassword'];
            if ($sqlQueryResult['mPassword'] === $mPassword) {
              //If the password is correct:
              setUserCookie($phoneNo);
              //echo "This is the cookie: " .$_COOKIE['user'];
              header("location: https://mr.1221s.com/badge/");
            
            }//Her slutter password check
        }//Her slutter while
      }//Her slutter if > 0
  }//Her slutter if(isset)
?>

<!--Her begynder Optagelsekonvolut-->
<div class="konvolutLoginSkærm" id="konvolutLoginSkærm">
  <img class="konvolutLoginSkærmImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/konvolutbg.png" alt="konvolutbg">
  <div class="startDinRejseWrapper">
    <p>Start din magiske rejse</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/arrows/curvedarrow.png" alt="curvedarrow-down">
  </div>
</div>


<!--Her begynder image scroller efter konvolut er åben-->
<div class="imageScroller" id="imageScroller">
  <div class="unroller"></div>
  <!--Starter while loop for pages-->
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <!-- getting the data for the letter -->
    <?php
      //Her hentes data fra Pod plugin i wordpress (Optagelsesbrev, billeder)
      $oprettelsesBrev = new Pod('oprettelsesbrev');
      $oprettelsesBrev->findRecords('page_number ASC');
      $total_pages = $oprettelsesBrev->getTotalRows();
      while ($oprettelsesBrev->fetchRecord('page_number ASC') ) {
        $pageImg = $oprettelsesBrev->get_field('image.guid');
    ?>
    
      <!--Her vises image scroller billeder-->
      <div class="imageScrollerWrapper" id="imageScrollerImages">
        <img src="<?php echo $pageImg; ?>" alt="photo for the page with the title <?php $title; ?>">
      </div>

    <?php  } endwhile; ?>
    <?php  endif;?>
</div> <!--Her slutter image scroller-->

<!--Her begynder optagelseskonvolut-->
<div class="envelope" id="envelopeOprettelse"><!--Konvolut, start-->
  <div class="paper" id="envelopePaper"><!--Papir, start-->
    <div id="paperContent"><!--Papirtekst, start-->

      <!-- starting the while loop of the pages -->
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <!-- Henter data fra Pods plugin i wordpress (Optagelsesbrev, tekst) -->
        <?php
          $oprettelsesBrev = new Pod('oprettelsesbrev');
          $oprettelsesBrev->findRecords('page_number ASC');
          $total_pages = $oprettelsesBrev->getTotalRows();

          while ($oprettelsesBrev->fetchRecord() ) {
            $title = $oprettelsesBrev->get_field('title');
            $pageContent = $oprettelsesBrev->get_field('pagecontent');
            //Her genereres automatisk p-tags til teksten
            $pageContent = wpautop( $pageContent );
        ?>
          <!--Papir og tekst, start-->
          <div class="paperPage">
            <h2> <?php echo $title; ?> </h2>
            <div class="pageContent">
              <?php echo $pageContent; ?>
            </div>
          </div> <!--Papir og tekst, slut-->
        <?php } ?><!--Her slutter while fetchRecord-->
      <?php endwhile; ?>
      <?php  endif;?>
      
      <!--Her begynder pile til frem og tilbage-->
      <div class="" id="paperNextArrow">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/arrows/arrowRight.png" alt="rightArrow">
      </div>

      <div class="" id="paperBackArrow">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/arrows/arrowRight.png" alt="leftArrow">
      </div>
      <!--Her slutter pile frem og tilbage-->

      <!-- CHANGE THIS LINK TO FIT THE CORRECT PATH - CHANGELATER -->
      <a href="https://mr.1221s.com/optagelse/" class="" id="paperOverlayOprettelse">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/loginPaper.png" alt="the next button">
        <p>Videre</p>
      </a>

    </div><!--Papirtekst, slut-->
  </div><!--Papir, slut-->
</div><!--Konvolut, slut-->

</section><!--Her slutter main section-->

<!-- baggrundsbillede -->
<img class="mainsectionImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/login.jpg" alt="background">

</body>
</html>