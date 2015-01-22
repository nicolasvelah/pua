<?php

function grid() {
	//Save data
	if (isset($_POST["update_settings"])) {
        $grid_front = esc_attr($_POST["grid_front"]);
        update_option("pua_grid_front", $grid_front);

        $grid_gen = esc_attr($_POST["grid_gen"]);
        update_option("pua_grid_general", $grid_gen);

        $grid_sp = esc_attr($_POST["grid_sp"]);
        $page_id_theme = esc_attr($_POST["page_id_theme"]);
        update_option("pua_grid_spesific", [$page_id_theme, $grid_sp]);

        ?>
            <div id="message" class="updated">Settings saved</div>
        <?php
    }

    ?>
    <!-- form builder -->
    <div class="wrap">
	    <?php screen_icon('themes'); ?> 
	    <h2>Grid selector</h2>

		<form method="POST" action="">
		<h3>Front Theme</h3>
		<?php $options = get_option( 'pua_grid_front' ); ?>
		
		<label>Theme 1</label>
		<input type="radio" name="grid_front" value="theme1" <?php checked( 'theme1' == $options ); ?> />
		<label>Theme 2</label>
		<input type="radio" name="grid_front" value="theme2" <?php checked( 'theme2' == $options ); ?> />

		<h3>Internal Theme</h3>
		<?php $options_gen = get_option( 'pua_grid_general' ); ?>
		
		<label>Theme 1</label>
		<input type="radio" name="grid_gen" value="theme1" <?php checked( 'theme1' == $options_gen ); ?> />
		<label>Theme 2</label>
		<input type="radio" name="grid_gen" value="theme2" <?php checked( 'theme2' == $options_gen ); ?> />
		<label>None</label>
		<input type="radio" name="grid_gen" value="" <?php checked( '' == $options_gen ); ?> />


		<h3>Espesific Theme</h3>

		<a href="#" id="add-spesific-theme">Add spesific theme</a> 
			
		<?php $options_sp = get_option( 'pua_grid_spesific'); 		
		//if($options_gen){
		?>
			 <table class="form-table">
	            <tr valign="top">
	                <th scope="row">
	                    <label>
	                       Page id
	                    </label>
	                </th>
	                <td>
	                    <input type="text" name="page_id_theme" value="<?php echo $options_sp[0];?>" size="25" />
	                </td>
	            </tr>                
	        </table>
			
			<label>Theme 1</label>
			<input type="radio" name="grid_sp" value="theme1" <?php checked( 'theme1' == $options_sp[1] ); ?> />
			<label>Theme 2</label>
			<input type="radio" name="grid_sp" value="theme2" <?php checked( 'theme2' == $options_sp[1] ); ?> />
			<label>None</label>
			<input type="radio" name="grid_sp" value="" <?php checked( '' == $options_sp[1] ); ?> />
		<?php //} ?>
		

		<input type="hidden" name="update_settings" value="Y" />

		<p>
            <input type="submit" value="Save settings" class="button-primary"/>
        </p> 

	</form>
	<script src="<?php bloginfo('template_url') ?>/admin/admin.js"></script>

    <?php
}