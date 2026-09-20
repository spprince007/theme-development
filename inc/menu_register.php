<?php


register_nav_menu( 'main_menu', __('Main menu', 'prince') );


// Register Menu
register_nav_menu('main_menu', __('Main Menu', 'prince'));


// Walker Menu Description
function agp_nav_description($item_output, $item, $depth, $args) {

    if (!empty($item->description)) {

        $item_output = str_replace(
            '</a>',
            '</a><span class="walker_nav">' . esc_html($item->description) . '</span>',
            $item_output
        );

    }

    return $item_output;
}

add_filter('walker_nav_start_el', 'agp_nav_description', 10, 4);