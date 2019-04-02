<html>

<head>
<!-- metadata -->
    <meta charset="UTF-8">
    <meta name="description" content="Begynd din magiske rejse med Magikerens Rejse der tager dig gennem Magiske Dage Odense festivallen.">
    <meta name="keywords" content="Magi, Harry Potter, Magiske Dage Odense, Odense, Festival, Magisk, Rejse">
    <meta name="author" content="Magiske Dage Odense">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Magikerens Rejse">
    <title><?php get_title() ?></title>
<!-- favicon -->
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />
<!-- Stylesheets -->
    <link rel="stylesheet" href="style.css">
<!-- eksternt materiale-->
    <!-- FontAwesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
    crossorigin="anonymous">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- fonts -->

    <!-- Scripts -->
    <script type="text/javascript" src="<?php echo get_template_directory_uri()?>/main.js" defer></script>
    <?php wp_head();?>
</head>
<body>
    <header class="header">
        <?php get_custom_header()?>
    </header>
