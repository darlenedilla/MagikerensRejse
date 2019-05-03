<?php
/*
Template Name: oprettelsesbrev test
*/
?>

<!-- starting the while loop of the pages -->
 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<!-- getting the data for the letter -->
<?php
$oprettelsesBrev = new Pod('oprettelsesbrev');
$oprettelsesBrev->findRecords('pagecontent ASC');
$total_pages = $oprettelsesBrev->getTotalRows();

while ($oprettelsesBrev->fetchRecord() ) {

  $title = $oprettelsesBrev->get_field('title');
  $pageContent = $oprettelsesBrev->get_field('pagecontent');

  //cleanup - automatically makes <p>s
  $pageContent = wpautop( $pageContent );

?>
 <!-- actual code -->
 <div class="paperPage">
   <h2> <?php echo $title; ?> </h2>
   <div class="pageContent">
     <?php echo $pageContent; ?>
   </div>
 </div>

<?php } ?>
<?php endwhile; ?>
<?php  endif;?>
