<?php
/*
Plugin Name: Mnuapi
Description: A WordPress plugin to create widgets with a title, shortcode, and content fields, configurable via a settings page and directly in the Widgets section.
Version: 1.0
Author: Your Name
*/

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

  ?>

  <?php 
//////// with ou menu class and not structured

// function get_menu_items_by_name( $request ) {
//     $menu_name = $request->get_param( 'menu' );
//     $menu_items = wp_get_nav_menu_items( $menu_name );
    
//     if ( empty( $menu_items ) ) {
//         return new WP_Error( 'no_menu', 'Menu not found or empty', array( 'status' => 404 ) );
//     }

//     // Organize menu items into a hierarchical structure
//     $menu_tree = array();
//     $items_by_id = array();

//     // Index items by ID and organize by parent
//     foreach ( $menu_items as $item ) {
//         $items_by_id[$item->ID] = $item;
//         if ( $item->menu_item_parent == 0 ) {
//             $menu_tree[] = $item;
//         } else {
//             if ( !isset( $items_by_id[$item->menu_item_parent]->submenu ) ) {
//                 $items_by_id[$item->menu_item_parent]->submenu = array();
//             }
//             $items_by_id[$item->menu_item_parent]->submenu[] = $item;
//         }
//     }

//     return rest_ensure_response( $menu_tree );
// }

// function register_custom_menu_endpoint() {
//     register_rest_route( 'custom/v1', '/menu-items', array(
//         'methods' => 'GET',
//         'callback' => 'get_menu_items_by_name',
//         'args' => array(
//             'menu' => array(
//                 'required' => true,
//                 'validate_callback' => function( $param, $request, $key ) {
//                     return is_string( $param );
//                 }
//             ),
//         ),
//         'permission_callback' => '__return_true',
//     ));
// }
// add_action( 'rest_api_init', 'register_custom_menu_endpoint' );

?>








 
<?php

// ///// menu with sub menu class and structured way and menu class in array format ok

// function get_menu_with_full_classes($request) {
//     $menu_name = $request->get_param('menu');

//     // Get the menu object by name
//     $menu = wp_get_nav_menu_object($menu_name);

//     if (!$menu) {
//         return new WP_Error('no_menu', 'Menu not found or empty', array('status' => 404));
//     }

//     // Get all menu items for the specified menu
//     $menu_items = wp_get_nav_menu_items($menu->term_id);

//     if (empty($menu_items)) {
//         return new WP_Error('no_menu_items', 'No menu items found in this menu', array('status' => 404));
//     }

//     // Build a hierarchical tree with full classes
//     $menu_tree = build_menu_with_full_classes($menu_items);

//     return rest_ensure_response($menu_tree);
// }

// /**
//  * Build a hierarchical structure from menu items, including dynamic classes.
//  *
//  * @param array $menu_items Flat list of menu items.
//  * @return array Hierarchical menu structure.
//  */
// function build_menu_with_full_classes($menu_items) {
//     $menu_tree = [];
//     $menu_lookup = [];

//     // Initialize menu items with all relevant classes
//     foreach ($menu_items as $item) {
//         $default_classes = [
//             'menu-item',
//             'menu-item-' . $item->ID,
//             'menu-item-type-' . $item->type,
//             'menu-item-object-' . $item->object,
//         ];

//         // Check if this menu item has children
//         $has_children = array_reduce($menu_items, function ($carry, $child) use ($item) {
//             return $carry || $child->menu_item_parent == $item->ID;
//         }, false);

//         if ($has_children) {
//             $default_classes[] = 'menu-item-has-children----';
//         }

//         $menu_lookup[$item->ID] = [
//             'ID' => $item->ID,
//             'title' => $item->title,
//             'url' => $item->url,
//             'classes' => !empty($item->classes) ? array_merge($default_classes, $item->classes) : $default_classes,
//             'children' => [], // Placeholder for child items
//         ];
//     }

//     // Organize menu items into a hierarchy
//     foreach ($menu_items as $item) {
//         if ($item->menu_item_parent) {
//             // If the item has a parent, add it as a child
//             $menu_lookup[$item->menu_item_parent]['children'][] = &$menu_lookup[$item->ID];
//         } else {
//             // Otherwise, it's a top-level menu item
//             $menu_tree[] = &$menu_lookup[$item->ID];
//         }
//     }

//     return $menu_tree;
// }

// function register_menu_with_full_classes_endpoint() {
//     register_rest_route('custom/v1', '/menu-items', array(
//         'methods' => 'GET',
//         'callback' => 'get_menu_with_full_classes',
//         'args' => array(
//             'menu' => array(
//                 'required' => true,
//                 'validate_callback' => function($param) {
//                     return is_string($param);
//                 },
//             ),
//         ),
//         'permission_callback' => '__return_true',
//     ));
// }
// add_action('rest_api_init', 'register_menu_with_full_classes_endpoint');


?>




<?php 
  

 ///// Menu with submenu classes and structured output  with all menu class as string
 
 function get_menu_with_full_classes($request) {
     $menu_name = $request->get_param('menu');
 
     // Get the menu object by name
     $menu = wp_get_nav_menu_object($menu_name);
 
     if (!$menu) {
         return new WP_Error('no_menu', 'Menu not found or empty', array('status' => 404));
     }
 
     // Get all menu items for the specified menu
     $menu_items = wp_get_nav_menu_items($menu->term_id);
 
     if (empty($menu_items)) {
         return new WP_Error('no_menu_items', 'No menu items found in this menu', array('status' => 404));
     }
 
     // Build a hierarchical tree with full classes
     $menu_tree = build_menu_with_full_classes($menu_items);
 
     return rest_ensure_response($menu_tree);
 }
 
 /**
  * Build a hierarchical structure from menu items, including dynamic classes.
  *
  * @param array $menu_items Flat list of menu items.
  * @return array Hierarchical menu structure.
  */
 function build_menu_with_full_classes($menu_items) {
     $menu_tree = [];
     $menu_lookup = [];
 
     // Initialize menu items with all relevant classes
     foreach ($menu_items as $item) {
         $default_classes = [
             'menu-item',
             'menu-item-' . $item->ID,
             'menu-item-type-' . $item->type,
             'menu-item-object-' . $item->object,
         ];
 
         // Check if this menu item has children
         $has_children = array_reduce($menu_items, function ($carry, $child) use ($item) {
             return $carry || $child->menu_item_parent == $item->ID;
         }, false);
 
         if ($has_children) {
             $default_classes[] = 'menu-item-has-children ----';
         }
 
         // Combine default and custom classes, and join them into a single string
         $all_classes = array_merge($default_classes, $item->classes);
         $class_string = implode(' ', array_filter($all_classes)); // Filter removes empty values
 
         $menu_lookup[$item->ID] = [
             'ID' => $item->ID,
             'title' => $item->title,
             'url' => $item->url,
             'classes' => $class_string, // Concatenated class string
             'children' => [], // Placeholder for child items
         ];
     }
 
     // Organize menu items into a hierarchy
     foreach ($menu_items as $item) {
         if ($item->menu_item_parent) {
             // If the item has a parent, add it as a child
             $menu_lookup[$item->menu_item_parent]['children'][] = &$menu_lookup[$item->ID];
         } else {
             // Otherwise, it's a top-level menu item
             $menu_tree[] = &$menu_lookup[$item->ID];
         }
     }
 
     return $menu_tree;
 }
 
 function register_menu_with_full_classes_endpoint() {
     register_rest_route('custom/v1', '/menu-items', array(
         'methods' => 'GET',
         'callback' => 'get_menu_with_full_classes',
         'args' => array(
             'menu' => array(
                 'required' => true,
                 'validate_callback' => function($param) {
                     return is_string($param);
                 },
             ),
         ),
         'permission_callback' => '__return_true',
     ));
 }
 add_action('rest_api_init', 'register_menu_with_full_classes_endpoint');
 
?>
