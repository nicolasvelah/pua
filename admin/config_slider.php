<?php
function slider_list(){
	$pua_sliders = get_option("pua_sliders");
	if($pua_sliders && !isset($_GET['id']) && !isset($_GET['new'])){
		include('forms/slider_list_form.php');
	}else{
		slider();
	}
	
}

function slider(){
	//delete_option( "pua_sliders");
	$pua_sliders = get_option("pua_sliders");
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else if(isset($_GET['new'])){
		$id = count($pua_sliders) + 1;
		echo '2'.$id;
	}

	if($id == ''){$id = 1;}
	
	
	$element_counter = count($pua_sliders[$id]);

	//Save data
	if (isset($_POST["update_settings"])) {

		$id = $_POST['id'];

		unset($pua_sliders[$id]);

		$slides_holder =[];
		$numcontrol = 1;
		foreach ($_POST as $key => $value){
			$item_id = substr(htmlspecialchars($key), -1);

 			if(is_numeric($item_id)){
 				if($numcontrol != $item_id){
 					$slides_holder[] = $sl_holder;
 					unset($sl_holder);
 					$numcontrol++;
 				}

 				$sl_holder[] = $value;
 			}

 			if($key == 'slider_title' || $key == 'id' || $key == 'slider_width' || $key == 'slider_height'){
 				$slides_holder[$key] = $value;
 			}
 		}
 		if($sl_holder){$slides_holder[] = $sl_holder;}
        $pua_sliders[$id] = $slides_holder;

        print_r($pua_sliders[$id]);
        
        //update_option("pua_sliders", $pua_sliders);
        ?>
            <div id="message" class="updated">Slide saved</div>
        <?php
	}

	if ( !function_exists('media_buttons') )
		include(ABSPATH . 'wp-admin/includes/media.php');
		if (is_admin()){
			echo '<div style="display:none">';
			do_action( 'media_buttons');
			echo '</div>';
		}	

	$slide_title = $pua_sliders[$id]['slider_title'];
	$slide_width = $pua_sliders[$id]['slider_width'];
	$slide_height = $pua_sliders[$id]['slider_height'];

	

	include('forms/slider_form.php');
}


/*Eliminar slide*/

function delete_slide(){
	if($_POST['slide_id']){
		$slide_id = $_POST['slide_id'];
	}else{
		$slide_id = null;
	}
	$cat_slide_id = $_POST['cat_slide_id'];
	$id_slide = 1;
	$id_slide2 = 1;

	$pua_sliders = get_option("pua_sliders");
	$pua_sliders_holder = [];
	$$pua_sliders_tipo  = [];

	if($pua_sliders[$cat_slide_id] && $slide_id != null){
		foreach ($pua_sliders[$cat_slide_id] as $slide) {
			if(is_array ($slide)){
				if($id_slide != $slide_id){
					$slide[2] = $id_slide2;
					array_push($pua_sliders_holder, $slide);
					$id_slide2++;
				}
				$id_slide++;
			}else{
				if($slide == $pua_sliders[$cat_slide_id]['id']){
					$tipo = 'id';
				}else if($slide == $pua_sliders[$cat_slide_id]['title']){
					$tipo = 'title';
				}
				$pua_sliders_tipo[$tipo] = $slide;
			}
		}
	
		$pua_sliders[$cat_slide_id] = $pua_sliders_holder;
		$val_tipo = 1;
		foreach ($pua_sliders_tipo as $tipo) {
			if($val_tipo == 1){$tipo_t = 'title';}
			else{$tipo_t = 'id';}
			$pua_sliders[$cat_slide_id][$tipo_t] = $tipo;
			$val_tipo++;
		}

		$resp = 'slide';
	}else{
		$pua_sliders_holder[0] = '';
		foreach ($pua_sliders as $slide) {
			if($slide['title'] != $pua_sliders[$cat_slide_id]['title']){
				$slide['id'] = $id_slide;
				array_push($pua_sliders_holder, $slide);
				$id_slide++;
			}

		}
		unset($pua_sliders_holder[0]);

		$pua_sliders = $pua_sliders_holder;

		$resp = 'cat';
	}
	update_option("pua_sliders", $pua_sliders);

	echo $resp;
}


add_action('wp_ajax_delete_puaslide', 'delete_slide');
add_action('wp_ajax_nopriv_delete_puaslide', 'delete_slide');