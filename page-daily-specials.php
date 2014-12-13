<?php
/*
Template Name: Daily Specials
*/

get_header(); ?>

    <div class="inner-container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php while ( have_posts() ) : the_post(); ?>
               <div class="daily-specials">
                <?php
                // check if the repeater field has rows of data, then loop through the rows of data
                if( have_rows('create_new_daily_special')):
                    while ( have_rows('create_new_daily_special')) : the_row(); ?>


                       <div class="daily-column">
                       <?php
                        $imageArray = get_sub_field('food_item_picture'); // Array returned by Advanced Custom Fields, allows to pull from in the next few variables
                        $imageAlt = $imageArray['alt']; // Grab, from the array, the 'alt'
                        $imageURL = $imageArray['url']; // Grab the full size version
                        $imageThumbURL = $imageArray['sizes']['medium']; //grab from the array, the 'sizes', and from it, the 'thumbnail'
                        $imageCaption = $imageArray['caption'];	?>
                        <?php if( $imageCaption ): ?>
                            <div class="wp-caption">
                        <?php endif; ?>

                            <figure class="effect-sadie">
                            <a rel="lightbox" href="<?php echo $imageURL; ?>">
                                <img class="food-picture" src="<?php echo $imageThumbURL;?>" alt="<?php echo $imageAlt; ?>">
                            </a>

                            <?php if( $imageCaption ): ?>
                                    <p class="wp-caption-text"><?php echo $imageCaption; ?></p>
                                </div>
                            <?php endif; ?>
                            <figcaption>
                              <div class="details">
                                  <h2><?php the_sub_field('food_item_name'); ?></h2>
                                  <p><?php the_sub_field('food_item_ingredients'); ?></p>
                                  <p class="food-price"><?php the_sub_field('food_item_price'); ?></p>
                              </div>
                            </figcaption>
                            </figure>
                        </div> <!-- end .row -->
                        <?php echo '<hr class="hr-seperate" />'; ?>
                    <?php
                    endwhile; // new row looop
                else : // no rows found
                endif;
                ?>
                </div>
			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
    </div><!-- .inner-container -->
<?php
get_sidebar();
get_footer();
