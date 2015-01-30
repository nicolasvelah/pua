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
	//echo count($pua_sliders).'<br>';
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		//echo '1'.$id;
	}else if(isset($_GET['new'])){
		$id = count($pua_sliders) + 1;
		echo '2'.$id;
	}
	
	
	$element_counter = count($pua_sliders[$id]);

	//Save data
	if (isset($_POST["update_settings"])) {

		$id = $_POST['id'];
	//echo '3';

		$max_id = $_POST["element-max-id"];

		for ($i = 1; $i <= $max_id; $i ++) {
            $field_name = "img_title-" . $i;
            $field_name2 = "img_url-" . $i;
            $repeat = false;

            if (isset($_POST[$field_name]) && isset($_POST[$field_name2])) {
            	if($pua_sliders != ''){
            		if($pua_sliders[$id]){
		            	foreach ($pua_sliders[$id] as $slide) {
		            		//print_r($slide[2]);
		            		if($slide[2] == $field_name){
		            			$repeat = true;
		            			//echo 'repeat '. $repeat .' '.$field_name.' = '.$slide[2].'<br>';
		            		}
		            	}
		            }
	            }
            	if($repeat == false){
                	$pua_sliders[$id][] = [esc_attr($_POST[$field_name]), esc_attr($_POST[$field_name2]), $field_name];
            	}
            }
            $element_counter ++;
        }
        $pua_sliders[$id]['id'] = $id;
        $pua_sliders[$id]['title'] = $_POST['slider_title'];
        update_option("pua_sliders", $pua_sliders);
        ?>
            <div id="message" class="updated">Settings saved</div>
        <?php
	}

	if ( !function_exists('media_buttons') )
		include(ABSPATH . 'wp-admin/includes/media.php');
		if (is_admin()){
			echo '<div style="display:none">';
			do_action( 'media_buttons');
			echo '</div>';
		}	

	$slide_title = $pua_sliders[$id]['title'];

	include('forms/slider_form.php');
}
