<?php

ob_start();
if (isset($_GET['logout'])) {
    header('Location: https://mr.1221s.com/');
    setcookie("user", "", time() - 3600);
    exit;
};
global $wp;
?>
<!doctype html>
<html>
    <head>
    <!-- metadata -->
        <meta charset="UTF-8">
        <meta name="description" content="Begynd din magiske rejse med Magikerens Rejse der tager dig gennem Magiske Dage Odense festivallen.">
        <meta name="keywords" content="Magi, Harry Potter, Magiske Dage Odense, Odense, Festival, Magisk, Rejse">
        <meta name="author" content="Magiske Dage Odense">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="title" content="Magikerens Rejse">
        <title><?php get_the_title(); ?></title>

    <!-- favicon -->
        <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />
   
    <!-- eksternt materiale-->
        <!-- FontAwesome-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
        crossorigin="anonymous">

        <!-- QR CODE reader FIND NEW ONE-->
        <script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/qr_packed.js" defer>
        </script>

        <!-- jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- fonts -->

        <!-- Scripts -->
            <!-- The map scripts (?) -->
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/svg-pan-zoom@3.5.0/dist/svg-pan-zoom.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>

            <!-- The custom logo, I think -->
            <?php wp_head();?>

        <!-- slickbox css (?) -->
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

        
        <!-- Leaflet -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin=""/> 

         <!-- Make sure you put this AFTER Leaflet's CSS -->
            <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
            integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
            crossorigin="" defer></script>
    <!-- Stylesheets -->   
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_template_directory_uri();?>/style.css?ver=<?php echo rand(111,999)?>">
        <!-- <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_template_directory_uri();?>/scss/index.css?ver=<?php echo rand(111,999)?>"> -->

         <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/main.js?ver=<?php echo rand(111,999)?>" defer></script>
    
    </head>

<body>

  <section class=" <?php echo $bgImg ?> ">

    <header class="header">
        <!--burgermenu-->
        <div id="nav-icon">
            <span class="menuSpan"></span>
            <span class="menuSpan"></span>
            <span class="menuSpan"></span>
        </div>
        <div id="mySidenav" class="sidenav">
            <div class="appLinks">
                <a href="https://mr.1221s.com/magiker">Se profil</a>
                <a href="https://mr.1221s.com/settings">Skift indstillinger</a>
            </div>
            <div class="websiteLinks">
                <p ><strong>Vores hjemmesider</strong></p>
                <a href="https://magiskedageodense.dk/" target="_blank"><u>Magiske Dage Odense</u></a>
                <a href="https://www.odensebib.dk/" target="_blank"><u>Odense Biblioteker</u></a>
                <a href="https://www.odense.dk/" target="_blank"><u>Odense Kommune</u></a>
            </div>
            <a href="<?php echo home_url($wp->request);?>/?logout=true" id="logOut">Log ud</a>
            <a href="https://www.facebook.com/magiskedageodense/" target="_blank"><i class="fab fa-facebook-square"><p>Følg os på Facebook!</p></i></a>
        </div>

        <div class="headerMenu">

            <label class=qrcode-text-btn>
            <input type=file
                    accept="image/*"
                    capture=environment
                    onclick="return showQRIntro();"
                    onchange="openQRCamera(this);"
                    tabindex=-1>
            </label>
        </div>

        <div class="logoHeader">
          <?php if ( function_exists( 'the_custom_logo' ) ) {
              the_custom_logo();
          }?>
        </div>
        <div class="desktopHeader">
          <img class="desktopHeaderLogo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/desktopLogo.png" alt="the golden logo">
        </div>

    </header>