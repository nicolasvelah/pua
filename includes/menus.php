<?php

$theme_front = get_option("pua_grid_front");
$theme_gen = get_option("pua_grid_general");
$menus_array = array();

if($theme_front == 'theme1' && $theme_gen == ''){
	$menus_array = array(
      'header-menu-t1' => __( 'Header Menu theme 1' ),
      'rigth-menu-t1' => __( 'Menu Rigth theme 1' ),
      'left-menu-t1' => __( 'Menu Left theme 1' )
    );
}else if($theme_front == 'theme2' && $theme_gen == ''){
	$menus_array = array(
      'header-menu-t2' => __( 'Header Menu theme 2' ),
      'rigth-menu-t2' => __( 'Menu Rigth theme 2' ),
      'left-menu-t2' => __( 'Menu Left theme 2' )
    );
}else if($theme_gen != ''){
  $menus_array = array(
    'header-menu-t1' => __( 'Header Menu theme 1' ),
    'rigth-menu-t1' => __( 'Menu Rigth theme 1' ),
    'left-menu-t1' => __( 'Menu Left theme 1' ),
    'header-menu-t2' => __( 'Header Menu theme 2' ),
    'rigth-menu-t2' => __( 'Menu Rigth theme 2' ),
    'left-menu-t2' => __( 'Menu Left theme 2' )
  );

}

register_my_menus($menus_array);

function register_my_menus($arg) {
  register_nav_menus($arg);
}


//Llamada desde la plantilla con el nombre del menu que desea imprimir
function menu($position){
    $arg = array(
        'theme_location'  => $position,
        'container'=> false, 
        'menu_class' => '', 
        'echo'=> true,
    );

    echo   wp_nav_menu($arg);
}