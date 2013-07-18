<?php
/**
 * Template Name: Projects template2
 *
  echo  "<pre>";
 print_r($custom);
 echo  "</pre>";

 *
 */

get_header(); ?>

	<div id="primary">
			<div id="content" role="main">
			
			
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	   <h1 class="entry-title"><?php the_title(); ?></h1>
	   	<?php
				//get_template_part( 'loop', 'category-news' );
					
								 	$pagex = ($_GET['pagex'])? $_GET['pagex'] : 1;
									$posts_per_page=2;
									$args=array(
									  'taxonomy' => 'projects-category',
									  'term' =>  $current_slug,
									  'post_type' => 'projects',
									  'posts_per_page' => $posts_per_page,
									  'caller_get_posts'=> 1,
									  'orderby'=> 'post_date',
									  'order'=> 'DESC',
									  'paged' => $pagex 
									);
									$args2=array(
									  'taxonomy' => 'projects-category',
									  'term' =>  $current_slug,
									  'post_type' => 'projects',
									  'posts_per_page' => -1,
									  'caller_get_posts'=> 1,
									  'orderby'=> 'post_date',
									  'order'=> 'DESC',
									  'paged' => $pagex
									);
									$all_query = new WP_Query($args2);
									$my_query = null;
									$my_query = new WP_Query($args);
									 $abca = count($all_query->posts);
									?>
									<?php
			if( $my_query->have_posts() ) {
				$i = 0;
				 while ($my_query->have_posts()) : 
						$my_query->the_post(); 
						$loop = ($i==0)? 'first': NULL ;
				?>
                
                <div class="projects-list <?php echo $loop; ?>">
					  <div class="featureimage">
                                <a class="size-thumbnail" href="<?php the_permalink(); ?>"> <?php echo get_the_post_thumbnail( $post->ID ,'medium'); ?></a>
                            </div><!-- .featureimage -->
                    <div class="contents">
                         <h3> <a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h3>
                         <!--<p class="post-date"> <?php _e('Posté le: ').the_time("j M Y"); ?></p>-->
                         <p><?php  the_excerpt_max_charlength(120); //echo $post->post_content ?></p>					 
                          <!--<p><a href="<?php the_permalink(); ?>" class="link_next"><span><?php echo _e('EN SAVOIR +'); ?></span></a></p>-->
                     </div>
				</div>
				<?php		
				$i++;							
				endwhile; ?>
		
				<?php  
					numlinksFrontpage($pagex, $abca,$posts_per_page,10, $scriptname="", $get="") ;
					
                }			
				wp_reset_query(); 
				?>
</article>

			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_footer(); ?>
