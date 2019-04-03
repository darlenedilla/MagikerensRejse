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
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_template_directory_uri();?>/style.css?ver=<?php echo rand(111,999)?>">
    <!-- eksternt materiale-->
        <!-- FontAwesome-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
        crossorigin="anonymous">
        <!-- jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- fonts -->

        <!-- Scripts -->
        <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/main.js?ver=<?php echo rand(111,999)?>" defer></script>
        <?php wp_head();?>
    </head>
<body>
    <header class="header">
        <!--burgermenu-->
        <div id="nav-icon">
            <span class="menuSpan"></span>
            <span class="menuSpan"></span>
            <span class="menuSpan"></span>
        </div>
        <div id="mySidenav" class="sidenav">
            <div class="appLinks">
                <a href="#" target="_blank">Se profil</a>
                <a href="#" target="_blank">Se tutorial igen</a>
                <a href="#" target="_blank">Skift kodeord</a>
            </div>
            <div class="websiteLinks">
                <p ><strong>Vores hjemmesider</strong></p>
                <a href="https://magiskedageodense.dk/" target="_blank"><u>Magiske Dage</u></a>
                <a href="https://www.odense.dk/" target="_blank"><u>Odense Kommune</u></a>
                <a href="https://www.odensebib.dk/" target="_blank"><u>Odense Biblioteker</u></a>
            </div>
            <a href="#" target="_blank">Log ud</a>
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

    </header>
