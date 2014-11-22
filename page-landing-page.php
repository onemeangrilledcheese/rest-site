<?php
/*
Template Name: Landing Page
*/
get_header(); ?>

<div class="inner-container">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'landing-content', 'page' ); ?>

                <?php // !!! NOTE: removed comments from page.php ?>

            <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
