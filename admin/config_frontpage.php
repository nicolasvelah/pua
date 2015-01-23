<?php

function FrontPage() {
    if (isset($_POST["update_settings"])) {
        $num_elements = esc_attr($_POST["num_elements"]);  
        update_option("theme_name_num_elements", $num_elements);

        $front_page_elements = array();
         
        $max_id = esc_attr($_POST["element-max-id"]);
        for ($i = 0; $i < $max_id; $i ++) {
            $field_name = "element-page-id-" . $i;
            if (isset($_POST[$field_name])) {
                $front_page_elements[] = esc_attr($_POST[$field_name]);
            }
        }
                 
        update_option("theme_name_front_page_elements", $front_page_elements);

        ?>
            <div id="message" class="updated">Settings saved</div>
        <?php
    }

    $num_elements = get_option("theme_name_num_elements");
    $front_page_elements = get_option("theme_name_front_page_elements");

    
    include('forms/frontpage_form.php');
}
