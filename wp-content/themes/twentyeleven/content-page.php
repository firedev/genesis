<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title-noico"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<!-- div id="featureImage" -->
		<!-- ?php  $image= get_the_post_thumbnail( $post->ID,'medium');
			? -->
		<!-- a rel="lightbox" href="< !--?php imageLinkFull($post->ID,'full');? >" --> 
			 <!-- ?php echo $image; 		//imageShow($image,array(472,322));		? -->
				<!-- /a -->
		<!-- /div -->
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
