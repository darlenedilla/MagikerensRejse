
<?php get_header();
/*
Template Name: magiker
*/
?>
<?php
// Fetch user data from database

include("config.php");

$query = "select user.magicalName, user.name, house.name, bloodTypeName from user, house, bloodType, pets where user.phoneNo = 28141151";

        $result = $con->query($query);
        if($result->num_rows > 0){
            //output data of each row
            while($row = $result->fetch_assoc()){
                echo "<br/>" .$row['magicalName']. "-Hus:".$row['name']. "<br/>";
            }
        }
        else{
            echo "0 results";
        }
        $con->close();


?>

<!--<section class="mainsection" >
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/background.jpg" alt="background">

    <div class="profileData">
        <img id="profileImg" src="<?php echo $image_src;  ?>" >
        <h2 id="profileName"> <?php echo $name?></h2>
        <img id="petImg" src="<?php echo $image_src;?>">
        <ul>
            <li class="badges"><?php echo $badge?></li>
            <li class="badges"><?php echo $badge?></li>
            <li class="badges"><?php echo $badge?></li>
            <li class="badges"><?php echo $badge?></li>
        </ul>'
        <span><?php echo $retning?></span>
        <h4>Oplysninger</h4>
        <ul>
            <li><?php echo $hus?></li>
            <li><?php echo $blodtype?></li>
        </ul>
    </div>
</section>-->

<?php get_footer(); ?>
