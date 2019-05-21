<?php
    if (isset($_GET['logout'])) {
        setcookie("user", "", time() - 3600);
        $cookie = $_COOKIE['user'];
        echo $cookie;
    };
?>
<!doctype html>
<html>
    <head>
    <!-- metadata -->
        <meta charset="UTF-8">
        <meta name="description" content="Begynd din magiske rejse med Magikerens Rejse der tager dig gennem Magiske Dage Odense festivallen.">
        <meta name="keywords" content="Magi, Harry Potter, Magiske Dage Odense, Odense, Festival, Magisk, Rejse">
        <meta name="author" content="Magiske Dage Odense">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="title" content="Magikerens Rejse">
        <title><?php get_the_title(); ?></title>
    <!-- favicon -->
        <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />
    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_template_directory_uri();?>/style.css?ver=<?php echo rand(111,999)?>">


    <!-- eksternt materiale-->
        <!-- FontAwesome-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
        crossorigin="anonymous">

        <!-- jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- fonts -->

        <!-- Scripts -->
        <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/main.js?ver=<?php echo rand(111,999)?>" defer></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/svg-pan-zoom@3.5.0/dist/svg-pan-zoom.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <?php wp_head();?>
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
                <a href="#" target="_blank">Se tutorial igen</a>
                <a href="#" target="_blank">Skift indstillinger</a>
            </div>
            <div class="websiteLinks">
                <p ><strong>Vores hjemmesider</strong></p>
                <a href="https://magiskedageodense.dk/" target="_blank"><u>Magiske Dage Odense</u></a>
                <a href="https://www.odensebib.dk/" target="_blank"><u>Odense Biblioteker</u></a>
                <a href="https://www.odense.dk/" target="_blank"><u>Odense Kommune</u></a>
            </div>
            <a href="https://mr.1221s.com/login/?logout=true" id="logOut">Log ud</a>
            <a href="https://www.facebook.com/magiskedageodense/" target="_blank"><i class="fab fa-facebook-square"><p>Følg os på Facebook!</p></i></a>
        </div>

        <div class="headerMenu">
          <?php wp_nav_menu( array('theme_location' => 'main_menu') ); ?>
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
