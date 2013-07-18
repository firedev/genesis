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
		<h1 class="entry-title"><?php the_title(); ?></h1>		 	     
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php twentyeleven_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	
	<div class="entry-content-project">
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
		<div class="column-right">		
		<?php $custom_post=get_post_custom($post->ID);	?>
		<?php //print_p($custom_post);?>
			<div class="showcontent">
				<div id="showcontent-sizefull">
				<?php the_content(); ?>
				</div>	
			</div>
		</div>
		
		<div class="column-left">
		<?php //print_p($custom_post);?>
	 
	 
	 <ul class="icon">
 <?php  /*if(!empty($custom_post['Twitter'][0])){ ?>
		<li class="twitter">
		<a href="<?php echo  $custom_post['Twitter'][0];?>" target="_blank"><?php echo  $custom_post['Twitter'][0];?></a>
		</li>
	<?php } */?>      
	
		<li class="twitter">
		<a href=" <?php  echo  $custom_post['Twitter'][0];?>" target="_blank"><?php echo  $custom_post['Twitter'][0]; ?></a>
		</li>
	<?php /*}*/?>    
	 <?php if(!empty($custom_post['LinkedIn'][0])){ ?>
		<li class="in">
			<a href="<?php echo  $custom_post['LinkedIn'][0];?>" target="_blank"><?php echo  $custom_post['LinkedIn'][0];?></a>
		</li>
	<?php }?>	
	<?php if(!empty($custom_post['Technorati'][0])){ ?>
		<li class="technorati">
			<a href="<?php echo  $custom_post['Technorati'][0];?>" target="_blank"><?php echo  $custom_post['Technorati'][0];?></a>
		</li>
	<?php }?>	
	<?php if(!empty($custom_post['Skype'][0])){ ?>
		<li class="skype">
			<a href="<?php echo  $custom_post['Skype'][0];?>" target="_blank"><?php echo  $custom_post['Skype'][0];?></a>
		</li>
	<?php }?>	
	<?php if(!empty($custom_post['Facebook'][0])){ ?>
		<li class="facebook">
			<a href="<?php echo  $custom_post['Facebook'][0];?>" target="_blank"><?php echo  $custom_post['Facebook'][0];?></a>
		</li>
	<?php }?>	
	<li class="facebook-lile">
			<div id="setArea-facebook">
				<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) {return;}
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
				<div class="fb-like" data-href="<?php the_permalink();?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>
		</div>
		</li>
	<?php if(!empty($custom_post['youtube'][0])){ ?>
		<li class="youtube"><span><?php _e('FIND US ON','twentyeleven'); ?></span>
		&nbsp;<a href="<?php echo  $custom_post['youtube'][0];?>" target="_blank"><?php echo  $custom_post['youtube'][0];?></a>		</li>
	 <?php }?>	
	 </ul>
	 

		
		<?php  $images=ListImage_nextGen_gallery($custom_post['gid'][0]);		?>		
	<?php if(!empty($images)) :	?>
		<div class="carousel">
						
						<div class="shown">	
						<?php for($i=0;$i<count($images);$i++){ 
							?>
							<a class="images-<?php echo $images[$i]->pid?>  
							<?php echo ($i==0)? 'active':'';?>" href="<?php echo home_url('wp-content/gallery/').$images[$i]->name.'/'.$images[$i]->filename;?>" rel="lightbox[<?php echo $post->ID?>]">
								<img src="<?php echo home_url('wp-content/gallery/').$images[$i]->name.'/'.$images[$i]->filename;?>" alt="<?php echo $images[0]->alttext;?>" title="<?php echo $images[0]->alttext;?>"  width="467" height="315">
							</a>
						<?php }
						 if($i==count($images)){?>
                         <a class="images-<?php echo $images[0]->pid?>  
							<?php echo ($i==0)? 'active':'';?>" href="<?php echo home_url('wp-content/gallery/').$images[0]->name.'/'.$images[0]			->filename;?>" rel="lightbox[<?php echo $post->ID?>]">
								<img src="<?php echo home_url('wp-content/gallery/').$images[0]->name.'/'.$images[0]->filename;?>" alt="<?php echo $images[0]->alttext;?>" title="<?php echo $images[0]->alttext;?>"  width="467" height="315">
							</a>
                         
					<?php }	?>
						

                        
                        
						</div>
						  <ul id="mycarousel" class="jcarousel-skin-tango">
							<?php for($i=0;$i<count($images);$i++){ ?>
							<?php if($i%10==0){ ?>
							<li class="list-thumb-image">
							<?php }?>
								<img id="images-<?php echo $images[$i]->pid?>" class="thumbs <?php echo ($i==0)? 'active':'';?>" src="<?php echo home_url('wp-content/gallery/').$images[$i]->name."/thumbs/thumbs_".$images[$i]->filename;?>"/>
								<?php if(((($i+1)%10)==0) && ($i!=0)){ ?> </li>
								<?php }?>
						<?php }
						if((count($images)%10)!=0){?></li>
					<?php }	?>
						</ul>
						
					</div>
		<?php else : ?>
			<?php  $image= get_the_post_thumbnail( $post->ID,'medium');	?>
			<div id="featureImage">
				<a rel="lightbox" href="<?php imageLinkFull($post->ID,'full');?>"> 
				 <?php imageShow($image,array(467,315));		?>
				</a>
			</div>
			
		
		<?php endif;?>
		
        <div id="content-form">
        <h3 class="entry-title header-mail"><?php _e('MAKE AN ENQUIRY','twentyeleven');?></h3>
			<?php if (ICL_LANGUAGE_CODE == 'en') { insert_cform('enquiry_eng'); } 						elseif (ICL_LANGUAGE_CODE == 'ru') { insert_cform('enquiry_rus'); };?>						
        	<!--<form action="" method="get">
            	<p>
                <label><?php _e('LASTNAME:','twentyeleven');?></label>
                <input name="" type="text" />
                </p>
                <p>
                <label><?php _e('EMAIL:','twentyeleven');?></label>
                <input name="" type="text" />
                <input name="" type="submit" />
                </p>
            </form>-->
        </div>		<div class="location"> 		 <a  class="googlemap-link" href="#mapshow"> 		<div style="width:200px; height: 65px"> <img width="100" height="65" src="http://www.genesisvilla.com/wp-content/uploads/2013/02/map_small.png" class="attachment-full" alt="Genesis Villa in map" title="Go to map"/>		<div style ="position:relative; left:110px; top:-50px;"> <?php echo $custom_post['Location'][0];?> </div></a>				</div>		</div> 						
		<?php 
		if(!empty($custom_post['File Upload'])){
		foreach($custom_post['File Upload'] as $val){
			if(!empty($val)) $checkFile_download=true;
		}
		if($checkFile_download==true):
		?>
		<div class="file_download">
		<h3 class="entry-title specialtxt"><?php _e('DOWNLOAD PROJECTS INFOS','twentyeleven');?></h3>
		 <?php //print_p($custom_post);
			$fname_count=0;
			foreach($custom_post['File Upload'] as $fid){
				if(!empty($fid)){
					$linkdownload=wp_get_attachment_url($fid);			?>
					<a class="icon <?php echo showFileExtension($linkdownload);?>" href="<?php echo $linkdownload;?>" target="_blank"><?php echo (empty($custom_post['File name']))? showFileExtension($linkdownload):$custom_post['File name'][$fname_count] ;?> </a>
			<?php $fname_count++; } /*end-if-fid*/
			}/*end-for*/
	
		?>
		</div>
		<?php endif;
		} ?>
		
			</div><!-- .column-left -->
			<?php 
			$tmpPOST=$post->ID;
			$tmpTitle=$post->post_title;
	$args=array(
									  'taxonomy' => 'projects-category',
									  'post_type' => 'projects',
									  'posts_per_page' => -1,
									  'caller_get_posts'=> 1,
									  'orderby'=> 'post_date',
									  'order'=> 'DESC',
									);
	$projects_query = new WP_Query($args);
		if( $projects_query->have_posts() ) {
				$i = 0;
				while ($projects_query->have_posts()) : $projects_query->the_post(); 
					if($tmpPOST!=$post->ID){
						$custompost=get_post_custom($post->ID);
						if(!empty($custompost['Googlemap-latitude'][0])&&!empty($custompost['Googlemap-longitude'][0])&&!empty($custompost['Googlemap-detail'][0])){
						$title[$i]=preg_replace("/(\r\n|\r|\n)/", "", $post->post_title);
						$latitude[$i]=preg_replace("/(\r\n|\r|\n)/", "", $custompost['Googlemap-latitude'][0]);
						$longtitude[$i]=preg_replace("/(\r\n|\r|\n)/", "", $custompost['Googlemap-longitude'][0]);
						$detail[$i]=preg_replace("/(\r\n|\r|\n)/", "", $custompost['Googlemap-detail'][0]);
						$count=$i+1;
						$i++;
						}
					}		
				endwhile; 	
		}	

?>


<script type="text/javascript">
function initialize() {
	  if (GBrowserIsCompatible()) {
		var map = new GMap2(document.getElementById("map_canvas"));
					map.setCenter(new GLatLng(<?php echo preg_replace("/(\r\n|\r|\n)/", "", $custom_post['Googlemap-latitude'][0])?>,<?php echo preg_replace("/(\r\n|\r|\n)/", "",$custom_post['Googlemap-longitude'][0])?>), 15);
					map.setMapType(G_NORMAL_MAP);
					map.setUIToDefault();
					
var here = new GIcon(G_DEFAULT_ICON);
here.image = "http://maps.google.com/mapfiles/marker_green.png";
markerOptionshere = { icon:here };

var defaults = new GIcon(G_DEFAULT_ICON);
defaults.image = "http://maps.google.com/mapfiles/marker.png";
markerOptionsDefaults = { icon:defaults };	
								
						var marker = new GMarker(new GLatLng(<?php echo preg_replace("/(\r\n|\r|\n)/", "", $custom_post['Googlemap-latitude'][0])?>,<?php echo preg_replace("/(\r\n|\r|\n)/", "",$custom_post['Googlemap-longitude'][0])?>),markerOptionshere);
					map.addOverlay(marker);

					GEvent.addListener(marker, 'click', function() {
					  var maxContentDiv = document.createElement('div');
					  maxContentDiv.innerHTML = 'Loading...'
					  marker.openInfoWindowHtml('<?php echo preg_replace("/(\r\n|\r|\n)/", "", $tmpTitle)?>',
						{maxContent: maxContentDiv, 
						 maxTitle: '<?php echo preg_replace("/(\r\n|\r|\n)/", "", $tmpTitle)?>'});

	  
					var contentString = '<?php echo preg_replace("/(\r\n|\r|\n)/", "", $custom_post['Googlemap-detail'][0])?>';

					  var iw = map.getInfoWindow();
					  GEvent.addListener(iw, "maximizeclick", function() {
						 maxContentDiv.innerHTML = contentString;
						/*GDownloadUrl("http://www.google.com", function(data) {
						   maxContentDiv.innerHTML = (data);
						 });*/
					  });
					});
	
	<?php if($count>0){ 
			for($x=0;$x<$count;$x++){
	?>
					var marker<?php echo $x?> = new GMarker(new GLatLng(<?php echo $latitude[$x]?>,<?php echo $longtitude[$x]?>),markerOptionsDefaults);
					map.addOverlay(marker<?php echo $x?>);

					GEvent.addListener(marker<?php echo $x?>, 'click', function() {
					  var maxContentDiv<?php echo $x?> = document.createElement('div');
					  maxContentDiv<?php echo $x?>.innerHTML = 'Loading...'
					  marker<?php echo $x?>.openInfoWindowHtml('<?php echo $title[$x]?>',
						{maxContent: maxContentDiv<?php echo $x?>, 
						 maxTitle: '<?php echo $title[$x]?>'});

	  
					var contentString<?php echo $x?> = '<?php echo $detail[$x]?>';

					  var iw<?php echo $x?> = map.getInfoWindow();
					  GEvent.addListener(iw<?php echo $x?>, "maximizeclick", function() {
						 maxContentDiv<?php echo $x?>.innerHTML = contentString<?php echo $x?>;
						/*GDownloadUrl("http://www.google.com", function(data) {
						   maxContentDiv1.innerHTML = (data);
						 });*/
					  });
					});
						<?php }
	} ?>
	}
}

window.onload = initialize;		
 </script>
 
<br style="clear:both"/>
<div class="gogmap">	
	<div id="mapshow">
		<div id="map_canvas"></div>
		<div id="map_large"><a href="http://maps.google.com/maps?ll=<?php echo preg_replace("/(\r\n|\r|\n)/", "", $custom_post['Googlemap-latitude'][0])?>,<?php echo preg_replace("/(\r\n|\r|\n)/", "",$custom_post['Googlemap-longitude'][0])?>&z=16&t=m&hl=<?php echo ICL_LANGUAGE_CODE?>" target="_blank"><?php _e('OPEN GOOGLE MAP &gt;','twentyeleven')?></a></div>
	</div>
</div><!-- #gogmap -->
			
	</div><!-- .entry-content -->



</article><!-- #post-<?php the_ID(); ?> -->