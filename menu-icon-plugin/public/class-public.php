<?php
add_filter('wp_nav_menu_objects', 'navbar_menu_icon', 10, 2);

function navbar_menu_icon($items, $args) {
    foreach ($items as $item) {
        $icon_url = get_post_meta($item->ID, '_menu_item_icon', true);

        if (!empty($icon_url)) {
            // Get the file extension
            $file_extension = pathinfo($icon_url, PATHINFO_EXTENSION);
        
            if ($file_extension === 'svg') {

                $icon_image = file_get_contents(esc_url($icon_url));
                $icon_image = str_replace('<svg', '<svg width="24" height="24"', $icon_image);
            } else {
                $icon_image = '<img src="' . esc_url($icon_url) . '" alt="Menu Icon" style="width: 24px; />';
            }
        
            $item->title = '<a href="' . esc_url($item->url) . '" style="display: flex; align-items: center;">' . $icon_image . '<span style="margin-left: 5px;">' . $item->title . '</span></a>';
        }
        
        
    }
    return $items;
}
