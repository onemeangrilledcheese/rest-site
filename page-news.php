<?php
/*
Template Name: News
*/
get_header(); ?>

<div class="inner-container">
	<div id="primary news-content" class="content-area ">
		<main id="main" class="site-main" role="main">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'news-content', 'page' ); ?>

				<?php // !!! NOTE: removed comments from page.php ?>
			<?php endwhile; // end of the loop. ?>


		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .inner-container -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
