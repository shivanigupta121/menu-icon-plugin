<?php
add_filter('wp_nav_menu_objects', 'navbar_menu_icon', 10, 2);

function navbar_menu_icon($items, $args) {
    foreach ($items as $item) {
        $icon_url = get_post_meta($item->ID, '_menu_item_icon', true);
        if (!empty($icon_url)) {
            // Check if the item is a parent or child
            $icon_image = '<img src="' . esc_url($icon_url) . '" alt="Menu Icon" style="width: 24px; margin-right: 5px;" />';
            $item->title = '<a href="' . esc_url($item->url) . '" style="display: flex; align-items: center;">' . $icon_image . $item->title . '</a>';
        }
    }
    return $items;
}



