<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Restaurant Theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="landing">
        <header class="entry-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </header><!-- .entry-header -->

        <div class="slider">
            <?php echo do_shortcode("[metaslider id=46]"); ?>
        </div>

        <div class="entry-content landing-content">
            <?php the_content(); ?>
            <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'restaurant-theme' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'restaurant-theme' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</div>
</article><!-- #post-## -->
