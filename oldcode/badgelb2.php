<?php get_header();
/*
Template Name: Badge-lightboxes test

THIS IS NO LONGER IN USE AND WAS USED FOR TESTING THE FUNCTIONALITY OF THE BADGE-LIGHTBOXES
*/
?>

<body>
<!-- starting the while loop of the pages -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <!-- getting the data for the letter -->
    <?php
        $badges = new Pod('badge_lb');
        $badges->findRecords('badge_id ASC');
        $total_badges = $badges->getTotalRows();
        echo "<h1>Antal badges:" .$total_badges ."</h1>";

        while ($badges->fetchRecord('badge_id ASC')) {
            $title = $badges->get_field('badge_title');
            $badgeImage = $badges->get_field('badge_image.guid');
            $eventLink = $badges->get_field('event_link');
            $badgeRetning = $badges->get_field('badge_retning');
            $Id = $badges->get_field('badge_id');
            $badgeId = (int)$Id;
    ?>

    <!-- actual code -->
    <h2 class="mainBadgeTitle"><?php echo $badgeId . $title; ?></h2>

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <div class="modalContent">
            <h3 class="eTitle"><?php echo $title; ?></h3>
            <!-- The Close Button -->
            <span class="close">&times;</span>
            <!-- The badge -->
            <div class="badgeBadgeImgContainer">
                    <img class="badgeBadgeImg" src="<?php echo $badgeImage ?>">
                </div>
        </div>
    </div>
        <?php } //End of second while?>
    <?php endwhile;?>
<?php endif;?>

<script>
    var badgeTitle = document.getElementsByClassName('mainBadgeTitle');
    var modals = document.getElementsByClassName('modal');

    for(let i = 0; i < badgeTitle.length; i++){
        badgeTitle[i].onclick = function(){
            modals[i].style.display = "block";
            console.log("This works");
        }
    };

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close");
    for(let i = 0; i <span.length; i++){
        // When the user clicks on <span> (x), close the modal
        span[i].onclick = function() {
            modals[i].style.display = "none";
        }
    }
</script>

</body>
</html>