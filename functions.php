<?php
include('admin/config.php');

function pageid(){
    return get_the_ID();
}

if (is_admin()) {
    wp_enqueue_script('jquery-ui-sortable');
}



