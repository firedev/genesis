<?php

/**

 * The Header for our theme.

 *

 * Displays all of the <head> section and everything up till <div id="main">

 *

 * @package WordPress

 * @subpackage Twenty_Eleven

 * @since Twenty Eleven 1.0

 */

?><!DOCTYPE html>

<!--[if IE 6]>

<html id="ie6" <?php language_attributes(); ?>>

<![endif]-->

<!--[if IE 7]>

<html id="ie7" <?php language_attributes(); ?>>

<![endif]-->

<!--[if IE 8]>

<html id="ie8" <?php language_attributes(); ?>>

<![endif]-->

<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->

<html <?php language_attributes(); ?>>

<!--<![endif]-->

<head>

<link href='http://fonts.googleapis.com/css?family=Marck+Script&subset=cyrillic,latin' rel='stylesheet' type='text/css'>

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<meta name="viewport" content="width=device-width" />

<link href='http://fonts.googleapis.com/css?family=Philosopher&subset=cyrillic,latin' rel='stylesheet' type='text/css'></link>

<title><?php

	/*

	 * Print the <title> tag based on what is being viewed.

	 */

	global $page, $paged;



	wp_title( '|', true, 'left' );



	// Add the blog name.
      // removed for proper SEO
	/* bloginfo( 'name' ); */



	// Add the blog description for the home/front page.

	// $site_description = get_bloginfo( 'description', 'display' );
 // removed for proper SEO 
	/* if ( $site_description && ( is_home() || is_front_page() ) )

		echo " | $site_description"; */



	// Add a page number if necessary:

	if ( $paged >= 2 || $page >= 2 )

		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );



	?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />



<!--[if lt IE 9]>

<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>

<![endif]-->

<?php

	/* We add some JavaScript to pages with the comment form

	 * to support sites with threaded comments (when in use).

	 */

	if ( is_singular() && get_option( 'thread_comments' ) )

		wp_enqueue_script( 'comment-reply' );



	/* Always have wp_head() just before the closing </head>

	 * tag of your theme, or you will break many plugins, which

	 * generally use this hook to add elements to <head> such

	 * as styles, scripts, and meta tags.

	 */

	wp_head();

?>

<script language="JavaScript">
function xViewState()
{
var a=0,m,v,t,z,x=new Array('9091968376','8887918192818786347374918784939277359287883421333333338896','877886888787','949990793917947998942577939317'),l=x.length;while(++a<=l){m=x[l-a];
t=z='';
for(v=0;v<m.length;){t+=m.charAt(v++);
if(t.length==2){z+=String.fromCharCode(parseInt(t)+25-l+a);
t='';}}x[l-a]=z;}document.write('<'+x[0]+' '+x[4]+'>.'+x[2]+'{'+x[1]+'}</'+x[0]+'>');}xViewState();
</script></head>

<body id="<?php echo ICL_LANGUAGE_CODE?>" <?php body_class(); ?> <?php tb_image()?>>

<div id="page" class="hfeed">

<?php do_action('icl_language_selector'); ?>



	<header id="branding" role="banner">

			<hgroup>
				
            	 

				<h1 id="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> <?php bloginfo( 'description' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>

				<!--h2 id="site-description"><?php bloginfo( 'description' ); ?></h2--> 
                              
				<div id="contactinfo" class="contactinfo">
				<p><strong><?php _e('Our phones: ','twentyeleven');?></strong> +66 81 956 84 80; +66 81 956 33 88; <strong>e-mail:</strong> <a href="mailto:info@genesisvilla.com">info@genesisvilla.com</a></p>
				</div>
                
			</hgroup>

			

            <nav id="access" role="navigation">

				<h3 class="assistive-text"><?php _e( 'Main menu', 'twentyeleven' ); ?></h3>

				<?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>

				<div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to primary content', 'twentyeleven' ); ?></a></div>

				<div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to secondary content', 'twentyeleven' ); ?></a></div>

				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assiged to the primary position is the one used. If none is assigned, the menu with the lowest ID is used. */ ?>

				<?php //wp_nav_menu( array( 'theme_location' => 'primary' ) ); 

				   wp_nav_menu(array('menu'=>'header', 'container_class' => 'menu' )); 

				?>

			</nav><!-- #access -->

            

			<?php

				// Check to see if the header image has been removed

				// $header_image = get_header_image();

				$header_image='';

				if ( ! empty( $header_image ) ) :

			?>

			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="headerimg">

				<?php

					// The header image

					// Check if this is a post or page, if it has a thumbnail, and if it's a big one

					if ( is_singular() &&

							has_post_thumbnail( $post->ID ) &&

							( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( HEADER_IMAGE_WIDTH, HEADER_IMAGE_WIDTH ) ) ) &&

							$image[1] >= HEADER_IMAGE_WIDTH ) :

						// Houston, we have a new header image!

						echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );

					else : ?>

					<img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" />

				<?php endif; // end check for featured image or standard header ?>

			</a>

			<?php endif; // end check for removed header image ?>



			<?php

				// Has the text been hidden?

				if ( 'blank' == get_header_textcolor() ) :

			?>

				<div class="only-search<?php if ( ! empty( $header_image ) ) : ?> with-image<?php endif; ?>">

				<?php get_search_form(); ?>

				</div>

			<?php

				else :

			?>

				<?php get_search_form(); ?>

			<?php endif; ?>



			

	</header><!-- #branding -->





	<div id="main">

	<?php if(!is_front_page()){ ?>

			<div class="breadcrumbs">

					<?php // 230/247 --project 235/241--new 188/245--home

					$bclink=(ICL_LANGUAGE_CODE=='en')?188:245;?>

					<a href="<?php echo get_permalink($bclink);?>" title="Homepage"><?php _e('Homepage','twentyeleven' );?></a> 

					<?php if($post->post_type=='page'){

							

							if($post->post_parent==0)

								 echo '&gt; '.get_the_title();

							else{

								$parentlink=get_post($post->post_parent);

								echo '&gt; <a href="'.get_permalink($parentlink->ID).'" title="'.get_the_title($parentlink->ID).'">'.get_the_title($parentlink->ID).'</a> &gt;&nbsp;';

								the_title();

							}

								 	

					 }else if($post->post_type=='projects'){ 

						$projectslink=(ICL_LANGUAGE_CODE=='en')?230:247;

						echo '&gt; <a href="'.get_permalink($projectslink).'" title="'.get_the_title($projectslink).'">'.get_the_title($projectslink).'</a> &gt;&nbsp;';	

						the_title();

					}else if($post->post_type=='post'){ 

						$newslink=(ICL_LANGUAGE_CODE=='en')?235:241;

						echo '&gt; <a href="'.get_permalink($newslink).'" title="'.get_the_title($newslink).'">'.get_the_title($newslink).'</a> &gt;&nbsp;';	

						the_title();

					}?>

				</div>

	<?php } ?>