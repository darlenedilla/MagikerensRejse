<?php
/*
Template Name: TEST

*/?>
<?php get_header();?>

<section class="mainsection" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/background.jpg'); background-repeat: no-repeat;background-size: cover;background-position: center;">

<?php if( have_rows('profilepic') ):
    while( have_rows('profilepic') ): the_row();
        
        // vars
        $profileimg = get_sub_field('profileimg');
        $url1 = $profileimg['url'];
        $alt1 = $profileimg['alt'];
        $wizardname = get_sub_field('wizardname');
        $badges = get_sub_field('badges');
        $retning = get_sub_field('retning');
        $oplysninger = get_sub_field('oplysninger');
    ?>

    <div class="profile">
        <div class="content">
          <img class="profileImg" src="<?php echo $url1; ?>" alt="<?php echo $alt1?> "/>
              <h2><?php echo $wizardname; ?></h2>
        </div>
    </div>
    <?php break;  ?>
      <?php endwhile;?> <!--end while for profile-->
<?php endif;?> <!--end if for profile-->

    <?php if( have_rows('badges') ):
      while( have_rows('badges') ): the_row();
        
            // vars
            $badge1 = get_sub_field('badge1');
            $url2 = $badge1['url'];
            $alt2 = $badge1['alt'];
            $badge2 = get_sub_field('badge2');
            $url3 = $badge2['url'];
            $alt3 = $badge2['alt'];
            $badge3 = get_sub_field('badge3');
            $url4 = $badge3['url'];
            $alt4 = $badge3['alt'];
            $badge4 = get_sub_field('badge4');
            $url5 = $badge4['url'];
            $alt5 = $badge4['alt'];
        ?>

        <div class="profile">
            <div class="content">
              <ul class="badges">
                <li><img class="badgeIcons" src="<?php echo $url2; ?>" alt="<?php echo $alt2?> "/></li>
                <li><img class="badgeIcons" src="<?php echo $url3; ?>" alt="<?php echo $alt3?> "/></li>
                <li><img class="badgeIcons" src="<?php echo $url4; ?>" alt="<?php echo $alt4?> "/></li>
                <li><img class="badgeIcons" src="<?php echo $url5; ?>" alt="<?php echo $alt5?> "/></li>
              </ul>
              <p><?php echo $retning ?></p>
            </div>
        </div>
        <?php break;  ?>
      <?php endwhile;?> <!--end while for badges-->
    <?php endif;?> <!--end if for badges-->

    <?php if( have_rows('statistik') ): //start oplysninger
        while( have_rows('statistik') ): the_row();
        
            // vars
            $hus = get_sub_field('hus');
            $kmgaaet = get_sub_field('km_gaet');
            $procent = get_sub_field('procent_gennemfort');
    ?>

            <div class="profile">
                <div class="content">
                    <ul class="profileInfo">
                        <li><?php echo $hus ?></li>
                        <li><?php echo $kmgaaet ?></li>
                        <li><?php echo $procent ?></li>
                    </ul>
                </div>
            </div>
            <?php break;  ?>
      <?php endwhile;?> <!--end while for oplysninger-->
    <?php endif;?> <!--end if for oplysninger-->

    </section>

<?php get_footer();?>

