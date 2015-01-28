<div>
	<h2>Slider</h2>
<?php
	if ( !function_exists('media_buttons') )
		include(ABSPATH . 'wp-admin/includes/media.php');

		echo '<div id="wp-puaslider-media-buttons" class="wp-media-buttons">';
		do_action( 'media_buttons', 'puaslider' );
		echo "</div>\n";
?>
</div>