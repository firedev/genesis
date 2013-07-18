<?php
/**
 * Template Name: News template
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
	   <h1 class="entry-title-noico"><?php the_title(); ?></h1>
       <div class="entry-news">
	   	<?php
				//get_template_part( 'loop', 'category-news' );
									 	$pagex = ($_GET['pagex'])? $_GET['pagex'] : 1;
									$posts_per_page=5;
									$args=array(
									  'taxonomy' => 'category',
									  'term' =>  $current_slug,
									  'post_type' => 'post',
									  'posts_per_page' => $posts_per_page,
									  'caller_get_posts'=> 1,
									  'orderby'=> 'post_date',
									  'order'=> 'DESC',
									  'paged' => $pagex 
									);
									$args2=array(
									  'taxonomy' => 'category',
									  'term' =>  $current_slug,
									  'post_type' => 'post',
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
                
                <div class="news-list <?php echo $loop; ?>">
                         <h3  class="entry-title-noico"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h3>
                         <p class="post-date"> <?php _e('Date : ').the_time("j-m-Y, G.i "); ?></p>
						 <div class="new-block">
						   <div class="featureimage">
                                <a class="size-thumbnail" href="<?php the_permalink(); ?>"> <?php echo get_the_post_thumbnail( $post->ID ,'thumbnail'); ?></a>
                            </div>
                            <div class="contentdetail">					
                              <p><?php  the_excerpt(); //echo $post->post_content ?></p>					 
                              <p class="linkreadmore"><a href="<?php the_permalink(); ?>" class="link_next"><span><?php echo _e('READ MORE'); ?></span></a></p>
                        	 </div>
						</div><!-- .new-block -->
                         
                </div>
				
				<?php		
				$i++;							
				endwhile; ?>
			</div>
				<?php 	numlinksFrontpage($pagex, $abca,$posts_per_page,10, $scriptname="", $get="") ;
                }
						
					
				wp_reset_query(); 
				?>
</article>

			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_footer(); ?>
