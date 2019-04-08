
<?php get_header();
/*
Template Name: magiker
*/
?>
<?php
// Fetch user data from database

include("config.php");

$query = "select user.magicalName, house.name, bloodTypeName from user, house, bloodType, pets where user.phoneNo = 28141151";

foreach ($con->query($query) as $row) {
    print  "\n";
    print $row['name'] . "\n";
    print $row['magicalName'] . "\n";
    print $row['bloodTypeName'] . "\n";
}


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
