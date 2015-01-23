<?php

function grid() {

	//Save data
	if (isset($_POST["update_settings"])) {

        $grid_front = esc_attr($_POST["grid_front"]);
        update_option("pua_grid_front", $grid_front);

        $grid_gen = esc_attr($_POST["grid_gen"]);
        update_option("pua_grid_general", $grid_gen);

        $pua_grid_spesific = get_option("pua_grid_spesific");

        $maxdel = esc_attr($_POST["max-del"]);
        $num_grid_sp = count($pua_grid_spesific);
        //echo $num_grid_sp;

        for ($e = 0; $e < $maxdel ; $e ++) {
            $itemdel = "eliminar-".$e;  
            $eliminar = esc_attr($_POST[$itemdel]);
            if($eliminar != ''){
                for ($i = 0; $i <= $num_grid_sp; $i ++) {
                    if($eliminar == $i){
                        //echo 'si<br>';
                        unset($pua_grid_spesific[$i]);
                    }else{
                        //echo 'no<br>';
                    }
                }
            }
        }
        //echo $num_grid_sp;
        $pua_grid_spesific = array_values( $pua_grid_spesific );
        Sort($pua_grid_spesific);


        $max_id = esc_attr($_POST["element-max-id"]);

        for ($i = 0; $i < $max_id; $i ++) {
            $field_name = "grid_sp-" . $i;
            $field_name2 = "page_id_theme-" . $i;

            if (isset($_POST[$field_name]) && isset($_POST[$field_name2])) {
                $pua_grid_spesific[] = [esc_attr($_POST[$field_name]), esc_attr($_POST[$field_name2])];
            }
        }
        update_option("pua_grid_spesific", $pua_grid_spesific);

        ?>
            <div id="message" class="updated">Settings saved</div>
        <?php
    }

    $element_counter = count($pua_grid_spesific) + 1;

    $pua_grid_spesific = get_option("pua_grid_spesific");


    //LIST TEMPLATES
    $path = '../wp-content/themes/pua/includes/themes';
    
    $pua_themes = [];
    $ffs = scandir($path);
    foreach($ffs as $ff){
        if($ff != '.' && $ff != '..'){
            if(is_dir($path.'/'.$ff)){
                $pua_themes[] = $ff;
            }
        }
    }
    

    include('forms/grid_form.php');
}