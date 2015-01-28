<style type="text/css">
	.puatheme{ width: 100%; float: left;}
	.theme-browser hr{ float: left; width: 100%;}
	.remove{width:100%; display:block; float:left; margin-bottom: 20px;}
	.theme_sp h3{ height: auto !important;}
	.theme_sp h3 span{ width: 100%; display:  block; font-weight: normal;}
	.theme_sp .theme-actions{height: 57px !important;}
	.theme-browser .theme:nth-child(3n){ margin-right: 4%;}
</style>

    <div class="wrap">
    	<div class="theme-browser rendered">
	    <?php screen_icon('themes'); ?> 
	    <h1>Grid selector</h1>
		
		<form method="POST" action="">

			<p>
	            <input type="submit" value="Save settings" class="button-primary"/>
	        </p>

		<div class="puatheme front">
		<h2>Front Theme</h2>
		<p>Select a theme for your frontend</p>
		<?php 
			$options = get_option( 'pua_grid_front' );

			foreach ($pua_themes as $theme) {
				echo '<div class="theme ';
				if($theme == $options){ echo 'active';}
				echo'"><div class="theme-screenshot"><img src="'.$path.'/'.$theme.'/screenshot.png" width="323" /></div>';
				echo '<h3 class="theme-name" id="pua-name">';
				echo '<input type="radio" name="grid_front" value="'.$theme.'" ';
				if($theme == $options){ echo 'checked';}
				echo ' /><span>'.$theme.'</span>';
				if($theme == $options){ echo '
					<div class="theme-actions">
						<a href="#" class="button button-primary customize load-customize hide-if-no-customize">
							Editar
						</a>
					</div>';}
				echo '</h3></div>';

			}
		?>
		
		<hr>
		</div>
		<div class="puatheme Internal">
		<h2>Internal Theme</h2>
		<p>Select a theme for the internal pages</p>
		<?php 
			$options_gen = get_option( 'pua_grid_general' );

			foreach ($pua_themes as $theme) {
				echo '<div class="theme ';
				if($theme == $options_gen){ echo 'active';}
				echo'"><div class="theme-screenshot"><img src="'.$path.'/'.$theme.'/screenshot.png" width="323" /></div>';
				echo '<h3 class="theme-name" id="pua-name">';
				echo '<input type="radio" name="grid_gen" value="'.$theme.'" ';
				if($theme == $options_gen){ echo 'checked';}
				echo ' /><span>'.$theme.'</span>';
				if($theme == $options_gen){ echo '
					<div class="theme-actions">
						<a href="#" class="button button-primary customize load-customize hide-if-no-customize">
							Editar
						</a>
					</div>';}
				echo '</h3></div>';
			}
		?>

		<hr>
		</div>
	<div class="puatheme spesific">
		<h2>Espesific Theme</h2>
		<p>Select a spesific theme for a spesific page</p>

		<div class="remove">
			<a href="#" id="add-spesific-theme" class="button button-primary">
				Add spesific theme
			</a>
		</div> 
			
		<?php $options_sp = get_option( 'pua_grid_spesific'); 		
		?>
		
		<div id="duplicate-list" class="grid-element">
			<div style="visibility:hidden; display:none;">
				<div id="front-page-element-placeholder">
					 <table class="form-table">
			            <tr valign="top">			           
			                <td>
			                    <?php
									$id_page = get_all_page_ids();
								?>
									<select name="page_id_theme" class="page_id">
										<option>Select a page</option>
								<?php
										foreach ($id_page as $id) {
											$page_data = get_page( $id );
											echo '<option value="'.$id.'">'.$page_data->post_title.'</option>';
										}	
								?>
									</select>
			                </td>
			            </tr>                
			        </table>
			        <h3>Select a theme</h3>
					<?php
						foreach ($pua_themes as $theme) {
							echo '<div class="theme"><div class="theme-screenshot"><img src="'.$path.'/'.$theme.'/screenshot.png" width="323" /></div>';
							echo '<h3 class="theme-name" id="pua-name">';
							echo '<input type="radio" name="grid_sp" value="'.$theme.'" ';
							if($theme == $options_sp[1]){ echo 'checked';}
							echo ' /><span>'.$theme.'</span></h3></div>';
						}
					?>
					
					<div class="remove">
						<a href="#" onclick="removeElement(jQuery(this).closest('.grid-element'));" class="button button-primary">
							Remove
						</a>
					</div>
					<hr>
				</div>			
			</div>
		</div>
		
		<input type="hidden" name="element-max-id" value="<?php echo $element_counter; ?>" />
		<input type="hidden" name="update_settings" value="Y" />
		</div>
		
		
		<div id="duplicate-list" class="grid-element">
					<div id="front-page-element-placeholder">
		<?php 
		$element_counter = 0; 
		foreach ($pua_grid_spesific as $element) : ?>
					<div class="theme active theme_sp">			          
						
						<?php
						$page_data = get_page( $element[1] ); 
						echo '<div class="theme-screenshot"><img src="'.$path.'/'.$element[0].'/screenshot.png" width="323" /></div>';
						echo '<h3 class="theme-name" id="pua-name">';
				        echo '<span><b>Page:</b> '.$page_data->post_title.'</span> ';
				        echo '<span><b>Theme:</b> '.$element[0].'</span>';
						?>
						<div class="theme-actions">
							<span>							
								<input type="radio" name="eliminar-<?php echo $element_counter; ?>" value="<?php echo $element_counter; ?>"/>
								<label>Eliminar</label>
							</span>
						
							<a href="#" class="button button-primary customize load-customize hide-if-no-customize">
								Editar
							</a>
						</div>

						</h3>
					</div>
					
	            
		<?php $element_counter++; endforeach; ?>
			</div>					
		</div>
		
		<input type="hidden" name="max-del" value="<?php echo $element_counter; ?>" />

		<p>
            <input type="submit" value="Save settings" class="button-primary"/>
        </p>
	</form>
	<script src="<?php bloginfo('template_url') ?>/admin/admin.js"></script>
</div>
</div>

	
	