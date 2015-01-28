<?php
include('admin/config.php');
include('includes/menus.php');

function pageid(){
    return get_the_ID();
}

function get_grid($zone){
	include('includes/themes/distributor.php');
}

function pua_slider(){
	
}

if (is_admin()) {
    wp_enqueue_script('jquery-ui-sortable');
}



