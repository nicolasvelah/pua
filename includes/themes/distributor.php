<?php

$theme_sp = get_option('pua_grid_spesific');

if(is_front_page()){
	$section = "pua_grid_front";
}else{
	$section = "pua_grid_general";
}

$theme = get_option($section);

$id = pageid();
if($theme_sp[0] == $id){
	$theme = $theme_sp[1];
}

	include($theme.'/header.php');
	include($theme.'/index.php');
	include($theme.'/footer.php');

	