
<?php 
include("cookieRedirect.php");
get_header();
/*
Template Name: Events
*/
?>

<body>
<!-- starting the while loop of the pages -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <!-- getting the data for the letter -->
    <?php
        $events = new Pod('event_lightboxes');
        $events->findRecords('event_id ASC');
        $total_events = $events->getTotalRows();
        echo "<h1>Antal events:" .$total_events ."</h1>";

        while ($events->fetchRecord('event_id ASC')) {
            $title = $events->get_field('eventtitle');
            $description = $events->get_field('eventdescription');
            $badgeText = $events->get_field('badge_text');
            $badgeImage = $events->get_field('badge_image.guid');
            $Id = $events->get_field('event_id');
            $eventId = (int)$Id;
    ?>

    <!-- actual code -->
    <h2 class="mainEventTitle"><?php echo $eventId . $title; ?></h2>

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <div class="modalContent">
            <h3 class="eTitle"><?php echo $title; ?></h3>
            <!-- The Close Button -->
            <span class="close">&times;</span>
            <!-- The actual event -->
            <div class="eventDescription">
                <p><?php echo $description; ?></p>
            </div>
            <!-- The badge -->
            <div class="badgeDescription">
                <p><?php echo $badgeText?>
                    <img class="curvedArrow" src="<?php echo get_stylesheet_directory_uri();?>/img/arrows/curvedarrow.png">
                </p>
                <div class="eventBadgeImgContainer">
                    <img class="eventBadgeImg" src="<?php echo $badgeImage ?>">
                </div>
            </div>
        </div>
    </div>
        <?php } //End of second while?>
    <?php endwhile;?>
<?php endif;?>

<script>
    var eventTitle = document.getElementsByClassName('mainEventTitle');
    var modals = document.getElementsByClassName('modal');
   
    for(let i = 0; i < eventTitle.length; i++){
        eventTitle[i].onclick = function(){
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

