<?php
/**
 * Template Name: Clean
 * 
 * The template for displaying clean pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package us_marcrh
 */

get_header();
?>

	<main id="primary" class="site-main container">
		<div class="row">
			<div class="col s12">
        		<?php
        		while ( have_posts() ) :
        			the_post();
        
        			get_template_part( 'template-parts/content', 'page' );
        
        			// If comments are open or we have at least one comment, load up the comment template.
        			if ( comments_open() || get_comments_number() ) :
        				comments_template();
        			endif;
        
        		endwhile; // End of the loop.
        		
        		?>
			</div>
		</div>
	</main><!-- #main -->

<?php

get_footer();
