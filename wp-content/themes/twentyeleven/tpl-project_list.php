<?php/** *  Template Name: Project_List * The template used for displaying page content in page.php * * @package WordPress * @subpackage Twenty_Eleven * @since Twenty Eleven 1.0 */?> <?php get_header(); ?>		<div id="homepage">			<div id="content" role="main">			<?php $custom_post=get_post_custom($post->ID);	?>		           		    <!---?php $custom_page=get_pages(); ? --->	
			<!--- ?php  $images=ListImage_nextGen_gallery($custom_post['gid'][0]);?	--->	             						<!--- FOR_list				                <div id="plist">					<ul>					<?php wp_list_pages('sort_column=post_date&show_date=created'); ?>					</ul>                </div> 				--->								
			
			<!--- FOR CONTENT --->
								<div id="content_main_pg">
								<?php the_post(); ?>
								<?php get_template_part( 'content', 'page' ); ?>
								</div>	
		
			<!--- FOR PROJECT LISTS--->                <div id="ppjlist">					<!---	<?php $lnid['projects']=(ICL_LANGUAGE_CODE=='en')?230:247;?>                	<h1 class="entry-title"> <a href="<?php echo get_permalink($lnid['projects']); ?>"><?php _e('PROJECTS','twentyeleven');?></a></h1>				--->
				<ul>
						<li class="odd" onclick="window.location.href='<?php echo (empty($custom_post['home-project-url'][0]))? '#':$custom_post['home-project-url'][0];?>'">						
						<div class="infonew">						
						<h3><?php echo $custom_post['home-project-title'][0]?></h3>						
						</div>
						
                         	<div class="imgnew">
							<?php 
								echo wp_get_attachment_image( $custom_post['home-project-img'][0],'full');?>                        	
							</div>                            
							<div class="infonew">
                            <div class=projinfo> 							
							<span><?php _e('Location: ','twentyeleven');?><strong><?php echo $custom_post['home-project-location'][0];?></strong></span>							<span>		</span>                            <span><?php _e('Cost: ','twentyeleven');?> <?php echo $custom_post['project_cost'][0];?> </span>							<span>		</span>							<span><?php _e('Readiness: ','twentyeleven');?> <strong><?php echo $custom_post['project_readyness'][0];?></strong></span> 							</div>
                            <p><?php echo $custom_post['home-project-shorttext'][0]?></p>                            
							</div>							
							<div class="bgHover"></div>                    </li>																	
							<li class="odd" onclick="window.location.href='<?php echo (empty($custom_post['home-project-url'][1]))? '#':$custom_post['home-project-url'][1];?>'">							
							<div class="infonew">							<h3><?php echo $custom_post['home-project-title'][1]?></h3>							</div>					
                        	<div class="imgnew">							<?php echo wp_get_attachment_image( $custom_post['home-project-img'][1],'full');?>                        	</div>                            
							<div class="infonew">                            
							<div class=projinfo>							
							<span><?php _e('Location: ','twentyeleven');?> <strong><?php echo $custom_post['home-project-location'][1];?></strong></span>                            <span>		</span>                            
							<span><?php _e('Cost: ','twentyeleven');?> <?php echo $custom_post['project_cost'][1];?></span>							<span>		</span>							
							<span><?php _e('Readiness: ','twentyeleven');?> <strong>
							<?php echo $custom_post['project_readyness'][1];?></strong></span>							
							</div>							<p><?php echo $custom_post['home-project-shorttext'][1]?></p>                            
							</div>							
							<div class="bgHover"></div>                    </li>																								
							<li class="odd" onclick="window.location.href='<?php echo (empty($custom_post['home-project-url'][2]))? '#':$custom_post['home-project-url'][2];?>'">					        
							<div class="infonew">								<h3><?php echo $custom_post['home-project-title'][2]?></h3>							</div>					         
                        	<div class="imgnew">								<?php echo wp_get_attachment_image( $custom_post['home-project-img'][2],'full');?>                        	</div>                            
							<div class="infonew">                            							
							<div class=projinfo>							
							<span><?php _e('Location: ','twentyeleven');?><strong><?php echo $custom_post['home-project-location'][2];?></strong></span>                            
							<span>		</span>                            
							<span><?php _e('Cost: ','twentyeleven');?> <?php echo $custom_post['project_cost'][2];?> </span>							
							<span>		</span>							
							<span><?php _e('Readiness: ','twentyeleven');?> <strong><?php echo $custom_post['project_readyness'][2];?></strong></span>							
							</div>                            							<p><?php echo $custom_post['home-project-shorttext'][2]?></p>                            
							</div>							
							<div class="bgHover"></div>                    </li>					                </ul>                </div>                         			
							
							
							<!-- #article -->		
							
					  <div id="feature_tab">
						 <div class="article">
							<p class="linkread"><?php $lnid['articles-sell']=(ICL_LANGUAGE_CODE=='en')?235:241;?>
                            
							<a href="<?php echo get_permalink($lnid['articles-sell']); ?>" >
							
							<h3 class="entry-title-noico">Статьи на тему</h3></a>
                            
							</p>
						</div>
						
                         <div class="info">
                         <div class="info-content">
						<?php  $args=array(
									  'taxonomy' => 'category',
									  'term' =>  'articles-sell-ru',
									  'post_type' => 'post',
									  'posts_per_page' => 3,
									  'caller_get_posts'=> 1,
									  'orderby'=> 'post_date',
									  'order'=> 'DESC',
									  'paged' => $paged 
									);
						$news_query = new WP_Query($args);
						if( $news_query->have_posts() ) {	?>
						 	<ul><?php
						 while ($news_query->have_posts()) :$news_query->the_post(); 
									?>
                       
                            	<li>
									<div class="featureimage">
									<a class="size-thumbnail" href="<?php the_permalink(); ?>"> <?php echo get_the_post_thumbnail( $post->ID ,'thumbnail'); ?></a>
									</div>
									
									<div class="contentdetailnew">
                                	<h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
                                    <span><?php the_time("j/n/Y"); ?></span>
                                    <p><?php the_excerpt_max_charlength(300); ?>
									<?php echo "..."; ?>
									</p>
									</div>
                                </li>

								  <?php  endwhile;?>
                    </ul>
					
					
                			<?php	} ?>
							</div>
                         </div>
							    
					</div>
					
							<!-- #article -->		
							
					  <div id="feature_tab">
						 <div class="article">
							<p class="linkread"><?php $lnid['articles-sell']=(ICL_LANGUAGE_CODE=='en')?235:241;?>
                            
							<a href="<?php echo get_permalink($lnid['articles-sell']); ?>" >
							
							<h3 class="entry-title-noico">Другие статьи на тему</h3></a>
                            
							</p>
						</div>
						
                         <div class="info">
                         <div class="info-content">
						<?php  $args=array(
									  'taxonomy' => 'category',
									  'term' =>  'o-articles-rent-ru',
									  'post_type' => 'post',
									  'posts_per_page' => 3,
									  'caller_get_posts'=> 1,
									  'orderby'=> 'post_date',
									  'order'=> 'DESC',
									  'paged' => $paged 
									);
						$news_query = new WP_Query($args);
						if( $news_query->have_posts() ) {	?>
						 	<ul><?php
						 while ($news_query->have_posts()) :$news_query->the_post(); 
									?>
                       
                            	<li>
									<div class="featureimage">
									<a class="size-thumbnail" href="<?php the_permalink(); ?>"> <?php echo get_the_post_thumbnail( $post->ID ,'thumbnail'); ?></a>
									</div>
								
									<div class="contentdetailnew">
                                	<h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
                                    <span><?php the_time("j/n/Y"); ?></span>
                                    <p><?php the_excerpt_max_charlength(300); ?>
									<?php echo "..."; ?>
									</p>
									</div>
                                </li>

								  <?php  endwhile;?>
                    </ul>
					
					
                			<?php	} ?>
							</div>
                         </div>
							    
					</div>
							
							<!-- #content -->		
							<!-- #primary -->
							
							<?php get_footer(); ?>