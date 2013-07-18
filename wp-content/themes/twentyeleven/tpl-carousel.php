<?php
/**
Template Page for the jQuery Galleria and jCarousel NextGEN integration
**/
?>
<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?><?php if (!empty ($gallery)) : ?>
<div id="wrapper">
<div id="img"></div>
<ul id="gallery" class="jcarousel-skin-tango">
	<?php foreach ( $images as $image ) : ?>
	<li><a href="<?php echo $image->imageURL ?>" title="<?php echo $image->description ?>"> <img src="<?php echo $image->thumbnailURL ?>" <?php echo $image->size ?> alt="" /></a></li>
 	<?php endforeach; ?>
</ul>
</div>
<?php endif; ?>