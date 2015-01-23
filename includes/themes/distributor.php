<?php

$theme_sp = get_option('pua_grid_spesific');

//exit($theme_sp[0][0]);

if(is_front_page()){
	$section = "pua_grid_front";
}else{
	$section = "pua_grid_general";
}

$theme = get_option($section);

$id = pageid();
if($theme_sp){
	foreach ($theme_sp as $tsp) {
		if($tsp[1] == $id){
			$theme = $tsp[0];
		}
	}
}


	include($theme.'/header.php');
	include($theme.'/index.php');
	include($theme.'/footer.php');

	