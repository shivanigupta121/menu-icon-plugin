<?php
   
add_action('admin_enqueue_scripts', 'enqueue_scripts');
add_action('wp_nav_menu_item_custom_fields', 'menu_icon_field', 10, 4);
add_action('wp_update_nav_menu_item', 'save_menu_icon_fields', 10, 3);


function enqueue_scripts() {

    wp_enqueue_media(); 
    wp_enqueue_script('custom-plugin-scripts', plugin_dir_url(__FILE__) . 'js/admin-script.js', array('jquery'), '', true);
}

// Add custom fields in menu 
function menu_icon_field($item_id, $item, $depth, $args) {
    ?>
    <p class="field-icon-upload description description-wide">
        <label for="edit-menu-item-icon-<?php echo $item_id; ?>">
            <?php _e('Menu Icon', 'menu-icon'); ?><br />
            <input type="text" id="edit-menu-item-icon-<?php echo $item_id; ?>" class="widefat code edit-menu-item-icon" name="menu-item-icon[<?php echo $item_id; ?>]" value="<?php echo esc_attr(get_post_meta($item_id, '_menu_item_icon', true)); ?>" />
            <input type="button" class="button button-secondary upload-menu-item-icon" style= "margin-top:10px;" value="<?php _e('Upload Icon', 'menu-icon'); ?>" />
        </label>
    </p>
    <?php
}
// Save custom fields

function save_menu_icon_fields($menu_id, $menu_item_db_id, $args) {
    
    // Check if icon upload is set, save it
    if (isset($_REQUEST['menu-item-icon'][$menu_item_db_id])) {
        update_post_meta($menu_item_db_id, '_menu_item_icon', sanitize_text_field($_REQUEST['menu-item-icon'][$menu_item_db_id]));
    }
}


