<?php

include('config_frontpage.php');
include('config_grid.php');
include('config_slider.php');

// revisa si el Usuario tiene permiso de editar las opciones
/*if (!current_user_can('manage_options')) {
    wp_die('You do not have sufficient permissions to access this page.');
}*/


//Añade los menús al administrador
function setup_theme_admin_menus() {
    add_menu_page('Theme settings', 'PUA', 'manage_options', 
        'pua_settings', 'grid', get_template_directory_uri().'/admin/puaicon.png' );
         
    add_submenu_page('pua_settings', 
        'Grid', 'Grid template', 'manage_options', 
        'pua_settings', 'grid');

    add_submenu_page('pua_settings', 
        'Front Page Elements', 'Front Page', 'manage_options', 
        'front_settings', 'FrontPage');

    add_submenu_page('pua_settings', 
        'Slides Item', 'Slider', 'manage_options', 
        'slider_settings', 'slider'); 
}



add_action("admin_menu", "setup_theme_admin_menus");