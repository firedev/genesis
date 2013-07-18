<?php
/* 
Plugin Name: Webazia Developer
Version: d4-1.0
Author: P.Kittiwat
Description: For developer.
*/

define("DEVELOPERPATH",home_url("wp-content/plugins/webazia-developer/"));
define("DEVELOPERDIRPATH",ABSPATH."wp-content/plugins/webazia-developer/");
//$developer_version = "1.0"; 
require_once('numlinkfunctions.php');
## Styles
function add_developer_css(){
	//Registering admin style
		wp_register_style("add_developer_css", WP_PLUGIN_URL . "/webazia-developer/developer.css");
		wp_enqueue_style('add_developer_css');
		
		wp_register_style("add_numlink_css", WP_PLUGIN_URL . "/webazia-developer/numlinkstyle.css");
		wp_enqueue_style('add_numlink_css');
			
}
add_action('admin_print_styles', 'add_developer_css');

## Scripts
function add_developer_script(){
	//Registering admin scripts
		wp_register_script("add_developer_script", WP_PLUGIN_URL . "/webazia-developer/developer.js");
		wp_enqueue_script('add_developer_script');
		
}
add_action('admin_print_scripts', 'add_developer_script');


add_action( 'init', 'create_post_type' );
function create_post_type() {
// Projects
$args = array(  
		'labels' => array(
						'name' => __( 'Projects' ),
						'singular_name' => __( 'Projects' ),
						'all_items' => __( 'All Projects' ),
						'add_new' => __( 'Add Project' ),
						'view' => __( 'View' )
					),
		'singular_label' => __('Projects'),  
		'public' => true,  
		'show_ui' => true,  
		'capability_type' => 'post',  
		'hierarchical' => false,  
		'rewrite' => array('slug'=>'projects','with_front'=>false),
		'menu_position' => 7,  
		'supports' => array('title', 'editor', 'thumbnail')  
	   );  
register_post_type( 'projects' , $args );  
register_taxonomy("projects-category", 
	array("projects"), 
	array("hierarchical" => true, 
	"label" => "Categories", 
	"query_var" => "projects-category",
	"singular_label" => "Categories", 
	'rewrite' => true )
	);

}
// Rewrite POSTS
function change_post_menu_label() {
	global $menu;
	global $submenu;
	$menu[5][0] = 'News';
	$submenu['edit.php'][5][0] = 'All News';
	$submenu['edit.php'][10][0] = 'Add News';
	$submenu['edit.php'][16][0] = 'News Tags';
	echo '';
}
function change_post_object_label() {
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'News';
	$labels->singular_name = 'News';
	$labels->add_new = 'Add News';
	$labels->add_new_item = 'Add News';
	$labels->edit_item = 'Edit News';
	$labels->new_item = 'News';
	$labels->view_item = 'View News';
	$labels->search_items = 'Search News';
	$labels->not_found = 'No News found';
	$labels->not_found_in_trash = 'No News found in Trash';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );

/* Add_meta_box_Select_gallery_NextGen */
function nextGen_galleries_dropdown( $default = 0, $parent = 0, $level = 0 ) {
	global $wpdb, $post_ID;
	$items = $wpdb->get_results( $wpdb->prepare("SELECT gid,name FROM $wpdb->nggallery", $parent) );
	
	if ( $items ) {
		foreach ( $items as $item ) {
			// A page cannot be its own parent.
			if (!empty ( $post_ID ) ) {
				if ( $item->gid == $post_ID ) {
					continue;
				}
			}
			$pad = str_repeat( '&nbsp;', $level * 3 );
			if ( $item->gid  == $default)
				$current = ' selected="selected"';
			else
				$current = '';

			echo "\n\t<option class='level-$level' value='$item->gid' $current>$pad " .esc_html($item->name) . "</option>";
		}
	} else {
		return false;
	}
}
add_action("admin_init", "admin_init_job");
add_action('save_post', 'save_des');  


function admin_init_job(){  
	
	add_meta_box("prodInfo-meta", "Select Gallery", "meta_options_projects", "projects", "side", "low");  
	add_meta_box("prodInfo-meta", "Select Gallery", "meta_options_projects", "page", "side", "low");  
	
}  

function meta_options_projects(){  
	global $post;  
	$template = !empty($post->page_template) ? $post->page_template : false;
	$custom_post=get_post_custom($post->ID);
	
	if($template=='tpl-home.php' || $post->post_type=='projects'){
	?>
				<p>
		<label class="galleries" for="galleries">Gallery:</label>
		<select  name="gid">
			<option value="0" ><?php _e('None', 'webazia-developer')?></option>
			<?php 
			 nextGen_galleries_dropdown($custom_post['gid'][0]);
			?>
		</select>
			</p>
<?php }
}  
function save_des(){  
	global $post;  
	global $wpdb;
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return;
  if ( !current_user_can( 'edit_page', $post_id ) )
        return;

	update_post_meta($post->ID, "gid", $_POST["gid"]);  
}  

function print_p($text){
echo '<pre>';
print_r($text);
echo '</pre>';
}
function developer_twentyeleven_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Who are we?', 'twentyeleven' ),
		'id' => 'who-are-we',
		'description' => __( 'Who are we?', 'twentyeleven' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="entry-title">',
		'after_title' => '</h3>'	) );
		
	register_sidebar( array(
		'name' => __( 'What do we do?', 'twentyeleven' ),
		'id' => 'what-do-we-do',
		'description' => __( 'What do we do?', 'twentyeleven' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="entry-title">',
		'after_title' => '</h3>'	
		) );
}
add_action( 'widgets_init', 'developer_twentyeleven_widgets_init' );

/* front page */
function jquery_developer_script(){ 
   ?>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo DEVELOPERPATH?>colorbox/colorbox.css" />
<script type="text/javascript" src="<?php echo DEVELOPERPATH?>colorbox/jquery.colorbox.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo DEVELOPERPATH?>numlinkstyle-ui.css" />
<script type="text/javascript" src="<?php echo DEVELOPERPATH?>jquery.scrollTo/jquery.scrollTo-min.js"></script>

<?php if ( is_page_template('tpl-contact.php') ) {	?>
<script type="text/javascript">
function loadScript() {
  var script = document.createElement("script");
  script.type = "text/javascript";
  script.src = "http://maps.googleapis.com/maps/api/js?sensor=true&callback=initialize&language=<?php echo ICL_LANGUAGE_CODE?>";
  document.body.appendChild(script);
}
window.onload = loadScript;		
jQuery.noConflict();
			jQuery(document).ready(function(){
				jQuery('#sendbutton').after('&nbsp;&nbsp;&nbsp;<input class="resetbutton" type="reset" value="cancel" >');
			});
</script>
<?php } ?>
		<?php	if(is_singular('projects')){ ?>
<link rel="stylesheet" type="text/css" href="<?php echo DEVELOPERPATH?>jcarousel/skin.css" />
<script type="text/javascript" src="<?php echo DEVELOPERPATH?>jcarousel/jquery.jcarousel.min.js"></script>
<script type="text/javascript">
function loadScript() {
  var script = document.createElement("script");
  script.type = "text/javascript";
  script.src = "http://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize&language=<?php echo ICL_LANGUAGE_CODE?>";
  document.body.appendChild(script);
}
window.onload = loadScript;		
</script>
<?php } ?>
<?php	if( is_home() || is_front_page()){ ?>
	<script type="text/javascript" src="<?php echo DEVELOPERPATH?>cycle/jquery.cycle.lite.js"></script>	
<?php } ?>
<script type="text/javascript">
//<![CDATA[
			jQuery.noConflict();
			jQuery(document).ready(function(){
		<?php	if(is_singular('projects')){ ?>
				jQuery('#mycarousel').jcarousel({
				scroll: 1,
				animation: 1000,
				wrap: 'both'
			});
				jQuery('img','#mycarousel li').click(function(){
					jQuery('a','.shown').removeClass('active');
					jQuery('img','#mycarousel li').removeClass('active');
					jQuery(this).addClass('active');
					jQuery('a.'+jQuery(this).attr('id')+'','.shown').addClass('active');
					//jQuery('img','.shown').attr('src','<?php echo DEVELOPERPATH?>images/loading.gif')
					//jQuery.get(imgsrc).complete(function(){ jQuery('img','.shown').attr('src',imgsrc); });
				});
				
				maxHeight=jQuery('#showcontent-sizefull').height();
					if(maxHeight<190) { jQuery('.readmore-link').remove(); }
				jQuery('.readmore-link').toggle(function(){
							maxHeight=jQuery('#showcontent-sizefull').height();
							jQuery('.showcontent').animate({
								height: maxHeight+20
							  },1000);
							jQuery(this).text('READ SHORT DESCRIPTION');
				},function(){
						jQuery('.showcontent').animate({
								height: 190
							  },1000);
							jQuery(this).text('READ FULL DESCRIPTION');
				});
			
			// jquery.scrollTo
			jQuery('a.readmore-link, a.googlemap-link').click(function(){
				jQuery.scrollTo( 'body', 800 );
			});
			
			
		<?php } ?>
		<?php	if( is_home() || is_front_page()){ ?>
			jQuery("h3.entry-title").click(function(){
			jQuery(".info","#aboutlist").slideToggle(1000);
		});	 
			jQuery('#slidimg').cycle('fade');
		<?php } ?>
				jQuery(".googlemap-link").colorbox({inline:true, width:1000});
		});
// ]]>
</script>
<?php }
add_action('wp_head', 'jquery_developer_script',10);

function imageShow($image,$size){
echo preg_replace('|(width=".*").*(height=".*").*|U','width="'.$size[0].'" height="'.$size[1].'"',$image);
}

function imageLinkFull($ID,$size){
$attachment_id=get_post_custom($ID);	
$get_image_full=wp_get_attachment_image_src( $attachment_id['_thumbnail_id'][0] ,$size);
echo $get_image_full[0];
}
function showFileExtension($file){
$path_parts = pathinfo($file);
return $path_parts['extension'];
}

function the_content_replaceBR($content) {
	echo preg_replace("/\\r\n\r\n/",'<br/>',$content);
}

function showDateDMY($timestamp){
$e= explode(" ",$timestamp);
 $ee= explode("-",$e[0]);
return $ee[2].'.'.$ee[1].'.'.$ee[0];
}

function ListImage_nextGen_gallery($gid){
global $wpdb;
$images= $wpdb->get_results( "SELECT wp_ngg_gallery.name,wp_ngg_pictures.* FROM wp_ngg_gallery,wp_ngg_pictures where wp_ngg_gallery.gid=".$gid." and wp_ngg_pictures.galleryid=".$gid." order by wp_ngg_pictures.sortorder");
return $images;
}

function the_excerpt_max_charlength($charlength) {
   $excerpt = get_the_excerpt();
   $charlength++;
   if(strlen($excerpt)>$charlength) {
       $subex = substr($excerpt,0,$charlength-5);
       $exwords = explode(" ",$subex);
       $excut = -(strlen($exwords[count($exwords)-1]));
       if($excut<0) {
            echo substr($subex,0,$excut);
       } else {
       	    echo $subex;
       }
       //echo "&hellip;";
   } else {
	   echo $excerpt;
   }
}
?>