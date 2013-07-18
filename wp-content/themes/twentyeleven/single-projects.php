<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>
				
					<nav id="nav-single">
						<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentyeleven' ); ?></h3>
						<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'twentyeleven' ) ); ?></span>
						<span class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?></span>
					</nav><!-- #nav-single -->

					<?php get_template_part( 'content', 'single-projects' ); ?>

					<?php//comments_template( '', true ); ?>
				<?php $custom_post=get_post_custom($post->ID);
						$images=ListImage_nextGen_gallery($custom_post['gid'][0]);
						// print_p($custom_post);
						// print_p($images);
						?>
					
					
				<?php endwhile; // end of the loop. ?>
	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
	<!--	<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&lt;</span> BACK', 'twentyeleven' ) ); ?></span>-->
	</footer><!-- .entry-meta -->
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>