<?php
/*
Template Name: Contact Us
*/

get_header(); ?>

<div class="inner-container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'contact-content', 'page' ); ?>

				<?php // !!! NOTE: removed comments from page.php ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .inner-container -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
