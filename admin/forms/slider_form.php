<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/slider.css">
<div class="wrap">
	<h2>Slider</h2>

	<form method="POST" name="slides_form">
		<div id="poststuff">
			<div id="post-body-content">
				<div id="titlediv">
					<div id="titlewrap">
						<input type="text" name="slider_title" size="30" value="<?= $slide_title ?>" id="title" spellcheck="true" placeholder="Slider group title">
					</div>
				</div>
			</div>

			<div id="postbox-container-2" class="postbox-container">
				<input type="button" id="insert-image" class="button slideshow-insert-image-slide" value="<?php _e('Image slide', 'slideshow-plugin'); ?>" />
				<?= '<input type="hidden" name="id" value="'.$id.'" />' ?>
				<div id="duplicate-list">
				
					<?php
						$slides = get_option( 'pua_sliders');
						$frond_counter = 1;
						//echo 'id ==='.$slides[$id]['id'];

						if($slides[$id]){
							foreach ($slides[$id] as $slide) {
								if($slide != $id && $slide != $slide_title){
									echo '
									<div id="slide-element-'.$frond_counter.'" class="postbox">
										<div class="slide_image">
											<img src="'.$slide[1].'" class="image">
										</div>
										<a href="#" onclick="add_layer('."'".$frond_counter."'".')">Add layer</a>
										<input type="text" class="title" value="'.$slide[0].'" name="img_title-'.$frond_counter.'">
										<input type="text" class="url" value="'.$slide[1].'" name="img_url-'.$frond_counter.'">
										<input type="text" class="order" value="'.$slide[2].'" name="img_order-'.$frond_counter.'">
										<input type="text" class="prueba" value="'.$slide[3].'" name="img_prueba-'.$frond_counter.'">
										<a href="#" id="remove'.$frond_counter.'" onclick=" get_delete_data('.$frond_counter.','.$id.')">Remove</a>
									</div>
									';
									$frond_counter++;
								}
							}
						}

					?>




				</div>
			</div>
			
			<input type="hidden" name="element-max-id" id="element-max-id" value="<?php echo $frond_counter; ?>" />
			<input type="hidden" name="update_settings" value="Y" />

			<hr>
			<p><input type="submit" value="Save settings" class="button-primary"/></p>
		</div>
	</form>


	<div id="slide_item" class="postbox">
		<img class="imagen" width="200">
		<input type="text" class="title" value="" >
		<input type="text" class="url" value="">
		<input type="text" class="order" value="">
		<input type="text" class="prueba" value="">
		<a href="#" id="remove">Remove</a>
	</div>
	<div id="display" class="layer"></div>

	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<script type="text/javascript">
		var counter = <?= $frond_counter ?>;
		var templateUrl = '<?= get_bloginfo("template_url"); ?>';
		var slider_activate = true;
		var adminUrl = '<?= admin_url(); ?>';

		var imported = document.createElement('script');
		imported.src = templateUrl + '/admin/js/admin.js';
		document.head.appendChild(imported);
	</script>
</div>