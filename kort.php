<?php 
// include("cookieRedirect.php");
get_header();
/*
Template Name: Kort

THIS IS THE MAP MAIN FILE
*/ ?>

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
              $lat = $events->get_field('lat');
              $lng = $events->get_field('lng');
              $eventId = (int)$Id;
      ?>

      <!-- Placeholders with data: -->
      <h2 class="mainEventTitles"><?php echo $eventId . " " . $title; ?>
        <p class="eventlat"><?php echo $lat;?></p>
        <p class="eventlng"><?php echo $lng?></p>
        <p class="standaloneTitle"><?php $title; ?></p>
        </h2>
      

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


<!--Her startet mainsection-->
<section class="mainsection">
  
            
  <!--Her starter peekaboo sektionen-->      
  <section id="peekabooWrapper">
    <div id="peekaboo">
      <div class="peekabooHeaderBox" id="peekabooHeaderBox">
          <i class="fas fa-arrow-up" id="peekabooArrow"></i>
          <h2>Lokationer</h2></div>
      <ul id="eventList">
      </ul>
    </div>
  </section><!--Her slutter peekaboo sektion-->
   
  
  <!-- Her starter leaflet kort section -->
  <div id="leafletMap"></div>
  <!-- Her slutter leaflet kort section -->

</section><!--Her slutter mainsection-->

<!-- baggrundsbillede -->
<img class="mainsectionImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/background.jpg" alt="background">

<?php get_footer(); ?>

<script defer>
    
var eventTitles = document.getElementsByClassName("mainEventTitles");
var events = document.getElementsByClassName("eventTitle");
var eventList = document.getElementById("eventList");
var event = "";
var eventlat = document.getElementsByClassName("eventlat");
var eventlng = document.getElementsByClassName("eventlng");
var modals = document.getElementsByClassName('modal');

//For hver eventTitle skal der laves et list item
for(let i = 0; i < eventTitles.length; i++){
    event += "<li class='eventTitle'>";
    event += eventTitles[i].innerHTML;
    event += "</li>";
};
    eventList.innerHTML += event;

    
// var marker[i] = L.marker([eventlat[i].innerHTML, eventlng[i].innerHTML]{}).addTo(mymap);
//For hvert event tilføjes click funktion som åbner modal box
for (let i = 0; i < events.length;i++) {
    
  events[i].onclick = function(){
    console.log("This works");
    console.log(eventlat[i].innerHTML, eventlng[i].innerHTML);

    // Pan and zoom to location on map:
    mymap.flyTo([eventlat[i].innerHTML, eventlng[i].innerHTML], 18);
 
  }
};

// var span = document.getElementsByClassName("close");
// //For hver kryds-ikon tilføjes click funktion der lukker modal
// for(let i = 0; i <span.length; i++){
//     // When the user clicks on <span> (x), close the modal
//     span[i].onclick = function() {
//         modals[i].style.display = "none";
//     };
// };
</script>