<?php
/**
 * Template Name: Contact template
 *
  echo  "<pre>";
 print_r($custom);
 echo  "</pre>";

 *
 */

get_header(); ?>
	<?php the_post(); ?>
	<div id="primary">
			<div id="content" role="main">
			
			
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header><!-- .entry-header -->
	  
	  <div class="entry-content">		
	  

		<div id="contactform">
	
			<h3 class="entry-title"><?php _e('CONTACT US','twentyeleven')?></h3>
			<div class="entry-form"><?php $admin_email = get_option('admin_email'); ?> 
			<p class="linkmail"><a href="mailto:<?php echo $admin_email?>"><?php _e('Send us an email','twentyeleven')?></a> <span><?php _e('All fields required','twentyeleven')?></span></p>
			<?php	insert_cform('Your default form');	?></div>
		</div>
		<div id="locationmap">
			<h3 class="entry-title"><?php _e('LOCATION MAP','twentyeleven')?></h3>
			<div id="map_canvas_location"></div>
		</div>
		<p><br style="clear:both"></p>
		<?php $custom_post=get_post_custom($post->ID);?>
		
		<h3 class="entry-title"><?php _e('ADDRESS','twentyeleven')?></h3>
			<?php echo $custom_post['Address'][0]?>
	</div>
	

<?php 		
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
					$custompost=get_post_custom($post->ID);
					if(!empty($custompost['Googlemap-latitude'][0])&&!empty($custompost['Googlemap-longitude'][0])&&!empty($custompost['Googlemap-detail'][0])){
					$title[$i]=preg_replace("/(\r\n|\r|\n)/", "", $post->post_title);
					$latitude[$i]=preg_replace("/(\r\n|\r|\n)/", "", $custompost['Googlemap-latitude'][0]);
					$longtitude[$i]=preg_replace("/(\r\n|\r|\n)/", "", $custompost['Googlemap-longitude'][0]);
					$detail[$i]=preg_replace("/(\r\n|\r|\n)/", "", $custompost['Googlemap-detail'][0]);
					$count=$i+1;
					$i++;
					}
						
				endwhile; 	
		}	

		// print_p($custom_post);
?>

<script type="text/javascript">
function initialize() {
	  if (GBrowserIsCompatible()) {
		var map = new GMap2(document.getElementById("map_canvas_location"));
					map.setCenter(new GLatLng(<?php echo preg_replace("/(\r\n|\r|\n)/", "", $custom_post['Googlemap-latitude'][0])?>,<?php echo preg_replace("/(\r\n|\r|\n)/", "",$custom_post['Googlemap-longitude'][0])?>), 10);
					map.setMapType(G_NORMAL_MAP);
					map.setUIToDefault();
					
var Company = new GIcon(G_DEFAULT_ICON);
Company.image = "http://maps.google.com/mapfiles/marker_greenC.png";
markerOptionsCompany = { icon:Company };

var defaults = new GIcon(G_DEFAULT_ICON);
defaults.image = "http://maps.google.com/mapfiles/marker.png";
markerOptionsDefaults = { icon:defaults };

					var marker = new GMarker(new GLatLng(<?php echo preg_replace("/(\r\n|\r|\n)/", "", $custom_post['Googlemap-latitude'][0])?>,<?php echo preg_replace("/(\r\n|\r|\n)/", "",$custom_post['Googlemap-longitude'][0])?>),markerOptionsCompany);
					map.addOverlay(marker);


					GEvent.addListener(marker, 'click', function() {
					  var maxContentDiv = document.createElement('div');
					  maxContentDiv.innerHTML = 'Loading...'
					  marker.openInfoWindowHtml('<?php echo $tmpTitle;?>',
						{maxContent: maxContentDiv, 
						 maxTitle: '<?php echo $tmpTitle;?>'});

	  
					var contentString = '<?php echo preg_replace("/(\r\n|\r|\n)/", "", $custom_post['Googlemap-detail'][0])?>';

					  var iw = map.getInfoWindow();
					  GEvent.addListener(iw, "maximizeclick", function() {
						 maxContentDiv.innerHTML = contentString;
					
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
					
					  });
					});
						<?php }
	} ?>
	}
}

window.onload = initialize;		
 </script>
	  
<footer class="entry-meta">
			<?php 
			wp_reset_query(); 
			edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); 
			?>
</footer><!-- footer-->
</article>


			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_footer(); ?>
