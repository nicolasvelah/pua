<?php

// Check that the user is allowed to update options
if (!current_user_can('manage_options')) {
    wp_die('You do not have sufficient permissions to access this page.');
}



function setup_theme_admin_menus() {
    add_menu_page('Theme settings', 'PUA', 'manage_options', 
        'tut_theme_settings', 'theme_settings_page');
         
    add_submenu_page('tut_theme_settings', 
        'Front Page Elements', 'Front Page', 'manage_options', 
        'tut_theme_settings', 'theme_settings_page'); 
}
 
function theme_settings_page() {
    ?>
    <div class="wrap">
    <?php screen_icon('themes'); ?> <h2>Front page elements</h2>
 
    <form method="POST" action="">
        <table class="form-table">
            <tr valign="top">
                <th scope="row">
                    <label for="num_elements">
                        Number of elements on a row:
                    </label>
                </th>
                <td>
                    <input type="text" name="num_elements" size="25" />
                </td>
            </tr>                
        </table>
 
        <h3>Featured posts</h3>
 
        <ul id="featured-posts-list">
        </ul>
       
        <input type="hidden" name="element-max-id" />
 
        <a href="#" id="add-featured-post">Add featured post</a>   
    </form>
     <?php $posts = get_posts(); ?>
    <li class="front-page-element" id="front-page-element-placeholder"
        style="display:none;">
        <label for="element-page-id">Featured post:</label>
        <select name="element-page-id">
            <?php foreach ($posts as $post) : ?>
                <option value="<?php echo $post->ID; ?>">
                    <?php echo $post->post_title; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <a href="#">Remove</a>
    </li>
 
</div>
<script src="<?php bloginfo('template_url') ?>/admin/admin.js"></script>
<?php
}



add_action("admin_menu", "setup_theme_admin_menus");