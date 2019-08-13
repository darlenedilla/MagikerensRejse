<?php 

/* CONNECT TO THE SERVER */
include("config.php");

get_header();
/*
Template name: Badge Received NEW

THIS IS THE CONFIRMATION PAGE FOR RECEIVING A BADGE MAIN FILE
*/



?>
<section class="mainsection badgeReceived">

<?php 

//$userCookie = $_COOKIE['user']; //Henter brugernavnet på den bruger, der er logget ind
$userCookie = $_COOKIE['user']; 

// $userCookie = 28141151;

//Query til at hente magiske navn via telefonnummer
$fetchUser = "SELECT user.magicalName FROM user WHERE phoneNo = $userCookie";

//Sender query med db-forbindelse
$fetchUserQuery = $con->query($fetchUser);

//Tjekker om resultat er mere end 0
if($fetchUserQuery->num_rows > 0){
  //For hver række i resultatet
  while($fetchUserRow= $fetchUserQuery->fetch_assoc()){
    //Variabler
    $magicalName = $fetchUserRow['magicalName'];
  } 
}else if($fetchUserQuery->num_rows <= 0){
    $magicalName = 'Magiker Navn';
  };
?>


<h2>This is the badge page for badge number: <?php echo $_GET['bid'];?></h2>


<script>
console.log("<?php echo $magicalName;?>");
console.log("<?php echo $userCookie;?>");
</script>


</section>



<!-- Her slutter script til lightboxes -->
<!-- baggrundsbillede -->
<img class="mainsectionImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/background.jpg" alt="background">
<?php get_footer(); ?>