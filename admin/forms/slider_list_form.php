
<h2>Sliders</h2>
<a href="admin.php?page=slider_settings&new=new">New</a><br><br>
<?php 
	foreach ($pua_sliders as $slider) {
		echo '<a href="admin.php?page=slider_settings&id='.$slider['id'].'">'.$slider['title'].'</a><br>
		<a href="#" id="remove'.$slider['id'].'" onclick=" get_delete_data(null, '.$slider['id'].')">Remove</a>
		<hr>';
	}

?>

<div id="display"></div>
<script type="text/javascript">
	var templateUrl = '<?= get_bloginfo("template_url"); ?>';
	var slider_activate = true;
	var adminUrl = '<?= admin_url(); ?>';

	var imported = document.createElement('script');
	imported.src = templateUrl + '/admin/js/admin.js';
	document.head.appendChild(imported);
</script>