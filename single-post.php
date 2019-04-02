<?php if( have_rows('event') ): 

    while( have_rows('event') ): the_row(); 
        
        // vars
        $title = get_sub_field('title');
        $description = get_sub_field('description');
        $badgeDesc = get_sub_field('badgedesc');
        $badgeLink = get_sub_field('badgelink');
        $url = $badgeLink['url'];
        $alt = $badgeLink['alt'];
        
        ?>
        <div id="event">
            <div class="content">
            <h2><?php echo $title ?></h2>
                <div><?php echo $description; ?></div>
                <div><?php echo $badgeDesc; ?></div>
                <a href="<?php echo $badgePage['url']; ?>">
                    <img class="badgeImg" src="<?php echo $url; ?>" alt="<?php echo $alt?> "/>
                </a>
            </div>
        </div>
        <style type="text/css">
			.badgeImg{
				width: 300px;
                height: 300px;
			}
		</style>
    <?php endwhile; ?>

<?php endif; ?>