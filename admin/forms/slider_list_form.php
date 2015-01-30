
<h2>Sliders</h2>
<a href="admin.php?page=slider_settings&new=new">New</a><br><br>
<?php 
	foreach ($pua_sliders as $slider) {
		echo '<a href="admin.php?page=slider_settings&id='.$slider['id'].'">'.$slider['title'].'</a><hr>';
	}

?>


