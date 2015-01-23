<?php

function grid() {
	//Save data
	if (isset($_POST["update_settings"])) {
        $grid_front = esc_attr($_POST["grid_front"]);
        update_option("pua_grid_front", $grid_front);

        $grid_gen = esc_attr($_POST["grid_gen"]);
        update_option("pua_grid_general", $grid_gen);


        $max_id = esc_attr($_POST["element-max-id"]);
        for ($i = 0; $i < $max_id; $i ++) {
            $field_name = "grid_sp-" . $i;
            $field_name2 = "page_id_theme-" . $i;

            if (isset($_POST[$field_name]) && isset($_POST[$field_name2])) {
                $pua_grid_spesific[] = [esc_attr($_POST[$field_name]), esc_attr($_POST[$field_name2])];
            }
        }
         update_option("pua_grid_spesific", $pua_grid_spesific);

        //$grid_sp = esc_attr($_POST["grid_sp"]);
        //$page_id_theme = esc_attr($_POST["page_id_theme"]);
        //update_option("pua_grid_spesific", [$page_id_theme, $grid_sp]);

        ?>
            <div id="message" class="updated">Settings saved</div>
        <?php
    }

    $element_counter = 0;

    $pua_grid_spesific = get_option("pua_grid_spesific");

    include('forms/grid_form.php');
}