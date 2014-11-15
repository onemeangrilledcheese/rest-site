<?php
/*
Template Name: Daily Specials
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

            <?php

            // check if the repeater field has rows of data
            if( have_rows('create_new_daily_special') ):

                // loop through the rows of data
                while ( have_rows('create_new_daily_special') ) : the_row();

                $image = get_sub_field('food_item_picture');

                // image attributes
                if( !empty($image) ):

                    $size = 'thumbnail';
                    $thumb = $image['sizes'][ $size ];
                    $width = $image['sizes'][ $size . '-width' ];
                    $height = $image['sizes'][ $size . '-height' ]; ?>

	                <img src="<?php echo $thumb; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />

                <?php endif; ?>

                <h2 class="food-name"><?php the_sub_field('food_item_name'); ?></h2>
                <p class="food-price"><?php the_sub_field('food_item_price'); ?></p>
                <p class="food-ingredient"><?php the_sub_field('food_item_ingredients'); ?></p>

            <?php

                endwhile;

            else :

                // no rows found

            endif;

            ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
