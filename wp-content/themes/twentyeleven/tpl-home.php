<?php
/**
 *  Template Name: Homepage
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
get_header(); ?>
      
		<div id="homepage">
			

			<div id="content" role="main">
 				
			<?php $custom_post=get_post_custom($post->ID);	?>		
			<?php  $images=ListImage_nextGen_gallery($custom_post['gid'][0]);?>		
			<?php if(!empty($images)) :	?>
					<!---FOR SLIDE PICTURE--->
                <div id="slidimg">
	
							<?php for($i=0;$i<count($images);$i++){ ?>
								<img class="<?php echo ($i==0)? 'active':'';?>" src="<?php echo home_url('wp-content/gallery/').$images[$i]->name."/".$images[$i]->filename;?>" width="990" height="283"/>			
						<?php } ?>		
						
						<?php //echo '<img src="'.esc_url( home_url( '/' )).'wp-content/themes/twentyeleven/images/header_pic.jpg'.'" />' ?>
                	
                </div>
			<?php endif;	?>
				

				<!--- FOR CONTENT --->
				<div id="content_main_pg">
				<?php the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				</div>		

				<noindex>
            	<div id="socialtab"> 
				
				<div class="fb-like" data-href="https://www.facebook.com/pages/GenesisVilla/197836770251707" data-send="true" data-layout="button_count" data-width="450" data-show-faces="true" data-font="verdana" data-colorscheme="dark">
				</div>
				
				<!-- Put this script tag to the place, where the Share button will be -->
				<div class="vk-like">
				<script type="text/javascript"><!--
				document.write(VK.Share.button({url: "http://www.genesisvilla.com/"},{type: "round", text: "Нравится"}));
				--></script>
				</div>
			   </div>
                
				<!--- FOR serv LISTS--->
				 <div id="pjlist2"> 
				
				<ul>
						<li class="odd" onclick="window.location.href='<?php echo (empty($custom_post['home-serv-url'][0]))? '#':$custom_post['home-serv-url'][0];?>'">
							<div class="infotitle">  
                         	<h3><?php echo $custom_post['home-serv-title'][0]?></h3> 
							</div>
							<div class="img">
							<?php 
								echo wp_get_attachment_image( $custom_post['home-serv-img'][0],'full');?>
                        	</div>
                            <div class="info">                                            
                            <p><?php echo $custom_post['home-serv-text'][0]?></p>
                            </div>
							<div class="bgHover"></div>
                    </li>
					
					<li class="even" onclick="window.location.href='<?php echo (empty($custom_post['home-serv-url'][1]))? '#':$custom_post['home-serv-url'][1];?>'">
                        	<div class="infotitle">     
							<h3><?php echo $custom_post['home-serv-title'][1]?></h3>
							</div>
							<div class="img">
							<?php 
								echo wp_get_attachment_image( $custom_post['home-serv-img'][1],'full');?>
                        	</div>
                            <div class="info">                           
                            <p><?php echo $custom_post['home-serv-text'][1]?></p>
                            </div>
							<div class="bgHover"></div>
                    </li>		
                </ul>
				</div>
                
                <!--- FOR ABOUT LISTS--->
               <div id="aboutlist">
               	<ul>
<li class="odd">
                    	<h3 class="entry-title"><?php _e('Who are we?','twentyeleven');?></h3>
                        <div class="info">
                        	<div class="info-content">
						<?php echo $custom_post['about_text'][0]?>
                            </div>
							<p class="linkread"><?php $lnid['waw']=(ICL_LANGUAGE_CODE=='en')?135:308;?>
                            <a href="<?php echo get_permalink($lnid['waw']); ?>" class="readmore"><?php echo _e('READ MORE'); ?></a>
                            </p>
                        </div>
                    </li>
					<li class="even">
                    	<h3 class="entry-title"><?php _e('What do we do?','twentyeleven');?></h3>	
                        <div class="info">
                        <div class="info-content">
                        <?php echo $custom_post['serv_text'][0]?>
                        </div>
                            <p class="linkread"><?php $lnid['wdwd']=(ICL_LANGUAGE_CODE=='en')?137:141;?>
                            <a href="<?php echo get_permalink($lnid['wdwd']); ?>" class="readmore"><?php echo _e('READ MORE'); ?></a>
                            </p>
                       	</div>
                    </li>
					</noindex>
					<li class="odd">
                    	<h3 class="entry-title"><?php _e('What\'s new?','twentyeleven');?></h3>
                         <div class="info">
                         <div class="info-content">
						<?php  $args=array(
									  'taxonomy' => 'category',
									  'term' =>  $current_slug,
									  'post_type' => 'post',
									  'posts_per_page' => 4,
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
                                	<h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
                                    <span><?php the_time("j/n/Y"); ?></span>
                                    <p><?php the_excerpt_max_charlength(130);?></p>
                                </li>

								  <?php  endwhile;?>
                    </ul>
                			<?php	} ?>
							</div>
                            <p class="linkread"><?php $lnid['news']=(ICL_LANGUAGE_CODE=='en')?235:241;?>
                            <a href="<?php echo get_permalink($lnid['news']); ?>" class="readmore"><?php echo _e('ALL THE NEWS', 'WP'); ?></a>
                            </p>
                         </div>
                    </li>
                </ul>
               </div>
			  
                          
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>
