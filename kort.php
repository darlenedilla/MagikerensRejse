<?php 
// include("cookieRedirect.php");
get_header();
/*
Template Name: Kort

THIS IS THE MAP MAIN FILE
*/

?>
<!--Her startet mainsection-->
<section class="mainsection">
  <!-- starting the while loop of the pages -->
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <!-- getting the data for the letter -->
      <?php
          $events = new Pod('event_lightboxes');
          $events->findRecords('event_id ASC');
          $total_events = $events->getTotalRows();
          while ($events->fetchRecord('event_id ASC')) {
              $title = $events->get_field('eventtitle');
              $description = $events->get_field('eventdescription');
              $badgeText = $events->get_field('badge_text');
              $badgeImage = $events->get_field('badge_image.guid');
              $Id = $events->get_field('event_id');
              $eventId = (int)$Id;
      ?>
      <h2 class="mainEventTitles"><?php echo $eventId . " " . $title; ?></h2>

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
          <?php } //Her slutter første while?>
      <?php endwhile;?>
  <?php endif;?>
            
  <!--Her starter peekaboo sektionen-->      
  <section id="peekabooWrapper">
    <div id="peekaboo">
      <span id="closePeek">&times;</span>
      <div class="peekabooHeaderBox"><h2>Events</h2></div>
      <ul id="eventList"></ul>
    </div>
  </section><!--Her slutter peekaboo sektion-->
   
  
  <!-- Her starter leaflet kort section -->
  <div id="leafletMap"></div>
  <!-- Her slutter leaflet kort section -->

</section><!--Her slutter mainsection-->

<!-- baggrundsbillede -->
<img class="mainsectionImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/background.jpg" alt="background">

<script defer>

//HERE STARTS PEEKABOO
var peekaboo = document.getElementById("peekaboo");
var peekabooLabel = document.getElementById("peekabooLabel");
var eventTitles = document.getElementsByClassName("mainEventTitles");
var events = document.getElementsByClassName("eventTitle");
var eventList = document.getElementById("eventList");
var event = "";
var modals = document.getElementsByClassName('modal');
var closePeek = document.getElementById("closePeek");


//For hver eventTitle skal der laves et list item
for(let i = 0; i < eventTitles.length; i++){
    event += "<li class='eventTitle'>";
    event += eventTitles[i].innerHTML;
    event += "</li>";
    eventTitles[i].onclick = function(){
    console.log("This works");
    }
};
    eventList.innerHTML += event;

//For hvert event tilføjes click funktion som åbner modal box
for (let i = 0; i < events.length;i++) {
  events[i].onclick = function(){
    modals[i].style.display = "block";
    // peekaboo.style.width = "10%";
    // peekabooLabel.style.width = "100%";
    peekaboo.style.transition = "1s";
    peekaboo.style.left="-65%";
  }
};
  
var span = document.getElementsByClassName("close");
//For hver kryds-ikon tilføjes click funktion der lukker modal
for(let i = 0; i <span.length; i++){
    // When the user clicks on <span> (x), close the modal
    span[i].onclick = function() { 
        modals[i].style.display = "none";
    };
};
</script><!--Her slutter script for kortet-->

<?php get_footer(); ?>
