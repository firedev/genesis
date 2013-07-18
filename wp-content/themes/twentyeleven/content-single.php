<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title-news"><?php the_title(); ?></h1>
          <p class="post-date"> <?php _e('Date : ').the_time("d-m-Y, g:i"); ?></p>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
	
	</div><!-- .entry-content -->
    <div class="content-link"> <!-- 235 [EN]  241[RU]-->
		<?php if(ICL_LANGUAGE_CODE=='en') $lnid=235;
				else $lnid=241;?>
    	<a href="<?php echo get_permalink($lnid); ?>"><?php echo _e('&lt; BACK'); ?></a>
    </div>
	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
	<!--	<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&lt;</span> BACK', 'twentyeleven' ) ); ?></span>-->
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
