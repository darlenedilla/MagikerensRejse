<?php get_header();
/*
Template name: slider
*/
?>

    <div style='background-color:#BBB;padding:25px;margin-top:25%;'>
        <div class="slickContainer badgeContainer">
            <div class="badge slickItem" id="magiker">
                MAGIKER
                <img class="badgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/magiker/capeBadge.png">
                <img class="badgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/magiker/wandBadge.png">
                <img class="badgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/magiker/ghostBadge.png">
                <img class="badgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/magiker/nordheimBadge.png">
            </div>
            <div class="badge slickItem" id="alkymist">
                ALKYMIST
                <img class="badgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/alkymist/botanikBadge.png">
                <img class="badgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/alkymist/creatureBadge.png">
                <img class="badgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/alkymist/eliksirBadge.png">
                <img class="badgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/alkymist/spiswandBadge.png">
            </div>
            <div class="badge slickItem" id="quidditch">
                QUIDDITCH
                <img class="badgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/quidditch/qtournamentBadge.png">
                <img class="badgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/quidditch/quidditchBadge.png">
                <img class="badgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/quidditch/broomBadge.png">
                <img class="badgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/quidditch/snitchBadge.png">
            </div>
            <div class="badge slickItem" id="dragetaemmer">
                DRAGETÆMMER
                <img class="badgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/drage/eggBadge.png">
                <img class="badgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/drage/dragonBadge.png">
                <img class="badgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/drage/animalBadge.png">
                <img class="badgeImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/drage/zooBadge.png">
            </div>
            <p>
                Shouldn't be an item.
            </p>
        </div>
    </div>

  <script type="text/javascript">
    $(document).ready(function () {
        $(".slickContainer").slick().slick('slickFilter', '.slickItem');
    });
  </script>