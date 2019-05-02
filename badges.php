<?php get_header();
/*
Template name: slider
*/

//include("config.php");
// Fetch user data from database
$host = "localhost"; /* Host name */
$user = "Darlene"; /* User */
$password = "Dgs55qhk:).."; /* Password */
$dbname = "1221s_com_magikerensrejse"; /* Database name */

//Create connection
$con = mysqli_connect($host, $user, $password,$dbname);

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
$user = 28141151; //SKAL LAVES OM SÅ DEN FINDER DEN BRUGER DER ER LOGGET IND!!!!

$fetchUser = "SELECT user.magicalName FROM user WHERE phoneNo = $user";


        $result = $con->query($fetchUser);

        if($result->num_rows > 0){
            //output data of each row
            while($row = $result->fetch_assoc()){
                //Variables to use in html
            $magicalName = $row['magicalName'];
            }
        }
        else{
            echo "0 results";
        };

        $cookie_name = "user";

        echo "<script>console.log('Cookie was set: $_COOKIE[$cookie_name]');</script>";

        

?>

    <section class="badgeIndex">
        <h2 id="welcome">Velkommen</h2>
        <div class="ribbonContainer">
            <h3 class="magicalName"><?php echo $magicalName; ?></h3>
            <img class="ribbon" src="<?php echo get_stylesheet_directory_uri();?>/img/ribbon.png" alt="Ribbon">
        </div>
        <div class="slickContainer badgeContainer">
            <div class="badge slickItem" id="magiker">
                <img class="journeyBadge" src="<?php echo get_stylesheet_directory_uri();?>/img/badges/magiker/magikerBadge.png">
                <img id="cape" class="badgeImg top-left" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/magiker/capeBadge.png">
                <img id="wand" class="badgeImg top-right" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/magiker/wandBadge.png">
                <img id="ghost" class="badgeImg bottom-left" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/magiker/ghostBadge.png">
                <img id="nordheim" class="badgeImg bottom-right" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/magiker/nordheimBadge.png">
            </div>
            <div class="badge slickItem" id="alkymist">
                <img class="journeyBadge" src="<?php echo get_stylesheet_directory_uri();?>/img/badges/alkymist/alkymistBadge.png">
                <img id="botanik" class="badgeImg top-left" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/alkymist/botanikBadge.png">
                <img id="skabninger" class="badgeImg top-right" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/alkymist/creatureBadge.png">
                <img id="eliksir" class="badgeImg bottom-left" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/alkymist/eliksirBadge.png">
                <img id="spisWand" class="badgeImg bottom-right" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/alkymist/spiswandBadge.png">
            </div>
            <div class="badge slickItem" id="quidditch">
                <img class="journeyBadge" src="<?php echo get_stylesheet_directory_uri();?>/img/badges/quidditch/qBadge.png">
                <img id="qturnering" class="badgeImg top-left" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/quidditch/qtournamentBadge.png">
                <img id="quidditch" class="badgeImg top-right" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/quidditch/quidditchBadge.png">
                <img id="kost" class="badgeImg bottom-left" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/quidditch/broomBadge.png">
                <img id="snitch" class="badgeImg bottom-right" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/quidditch/snitchBadge.png">
            </div>
            <div class="badge slickItem" id="dragetaemmer"> 
                <img class="journeyBadge" src="<?php echo get_stylesheet_directory_uri();?>/img/badges/drage/drageBadge.png">
                <img id="egg" class="badgeImg top-left" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/drage/eggBadge.png">
                <img id="foldDrage" class="badgeImg top-right" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/drage/dragonBadge.png">
                <img id="dyrsPasning" class="badgeImg bottom-left" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/drage/animalBadge.png">
                <img id="zoo" class="badgeImg bottom-right" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/drage/zooBadge.png">
            </div>
            <div class="badge slickItem" id="erfaren">
                <img class="journeyBadge" src="<?php echo get_stylesheet_directory_uri();?>/img/badges/erfaren/erfarenBadge.png">
                <img id="concert" class="badgeImg top-left" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/erfaren/concertBadge.png">
                <img id="prom" class="badgeImg top-right" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/erfaren/promBadge.png">
                <img id="storms" class="badgeImg bottom-left" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/erfaren/stormsBadge.png">
                <img id="toad" class="badgeImg bottom-right" src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/erfaren/toadBadge.png">
            </div>
            <p>
                Shouldn't be an item.
            </p>
        </div>
    </section>
    <!-- baggrundsbillede -->
    <img class="mainsectionImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/background.jpg" alt="background">

  <script type="text/javascript">
    $(document).ready(function () {
        $(".slickContainer").slick().slick('slickFilter', '.slickItem');
    });
  </script>