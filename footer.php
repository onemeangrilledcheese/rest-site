<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Restaurant Theme
 */
?>
	</div><!-- #content -->
	</div><!-- #page -->
	<div class="push"></div>
	</div><!-- .container -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'restaurant-theme' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'restaurant-theme' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'restaurant-theme' ), 'Restaurant Theme', '<a href="http://underscores.me/" rel="designer">Chris Blackmon</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<div class="push"></div>
</div><!-- .container -->

<?php wp_footer(); ?>

</body>
</html>
