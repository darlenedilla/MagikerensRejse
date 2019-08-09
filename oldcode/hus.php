<?php 
// include("cookieRedirect.php");
get_header();


/*
Template Name: hus

THIS IS THE POKAL PAGE MAIN FILE
*/
?>

<!--Her starter mainsection-->
<section class="mainsection">
  <!--Her starter trophy section-->
  <section class="trophySection">
    <div id="mainTrophy">
      <img id="largeTrophy" src="<?php echo get_stylesheet_directory_uri(); ?>/img/trophy_emblems/ild_trophy.png">
      <img id="largeEmblem" class="smallEmblem" src="<?php echo get_stylesheet_directory_uri(); ?>/img/trophy_emblems/ild_emblem.png">
    </div>
    <ul class="otherTrophies">
      <li>
        <span>304 point</span>
        <img class="smallTrophy" src="<?php echo get_stylesheet_directory_uri(); ?>/img/trophy_emblems/vand_trophy.png">
        <img class="smallEmblem" src="<?php echo get_stylesheet_directory_uri(); ?>/img/trophy_emblems/vand_emblem.png">
      </li>
      <li>
        <span>187 point</span>
        <img class="smallTrophy" src="<?php echo get_stylesheet_directory_uri(); ?>/img/trophy_emblems/luft_trophy.png">
        <img class="smallEmblem" src="<?php echo get_stylesheet_directory_uri(); ?>/img/trophy_emblems/luft_emblem.png">
      </li>
      <li>
        <span>456 point</span>
        <img class="smallTrophy" src="<?php echo get_stylesheet_directory_uri(); ?>/img/trophy_emblems/jord_trophy.png">
        <img class="smallEmblem" src="<?php echo get_stylesheet_directory_uri(); ?>/img/trophy_emblems/jord_emblem.png">
      </li>
    </ul>
  </section><!--Her slutter trophy section-->

  <!--Her starter point tavle-->
  <section class="scoreBoard">
    <table id="scoreTable">
    <tr>
      <th>Top 10 troldmænd og hekse</th>
      <th>Point</th> 
    </tr>
    <tr>
      <td>1. Mrs. Hooch</td> 
      <td>34</td>
    </tr>
    <tr>
      <td>2. Mrs. Malkins</td>
      <td>32</td>
    </tr>
    <tr>
      <td>3. Mr. Walfoy</td>
      <td>23</td>
    </tr>
    <tr>
      <td>4. Mr. Drarry</td>
      <td>20</td>
    </tr>
    <tr>
      <td>5. Mrs. Nevaco</td>
      <td>15</td>
    </tr>
    <tr>
      <td>6. Mrs. Olliwander</td>
      <td>14</td>
    </tr>
  </table>
  </section> <!--Her slutter point tavle-->

</section><!--Her slutter mainsection-->

<!-- baggrundsbillede -->
<img class="mainsectionImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/background.jpg" alt="background">

<?php get_footer(); ?>
