

<?php

// function get_menu_items_by_name( $request ) {
//     $menu_name = $request->get_param( 'menu' );
//     $menu_items = wp_get_nav_menu_items( $menu_name );
    
//     if ( empty( $menu_items ) ) {
//         return new WP_Error( 'no_menu', 'Menu not found or empty', array( 'status' => 404 ) );
//     }

//     // Organize menu items into a hierarchical structure
//     $menu_tree = array();
//     $items_by_id = array();

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











////// -----    create menu api with  default menu and sub menu class  (menu class)
 

  ?>

 
<?php

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
//     register_rest_route('custom/v1', '/menu-full-classes', array(
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


































///// menu and sub menu comimg with a structured way   but class are not coming


 



















// function get_custom_menu_items( $data ) {
//     // Get the 'menu' parameter from the URL (like ?menu=header_menu)
//     $menu_slug = $data['menu'];

//     // Get the menu items by menu slug
//     $menu_items = wp_get_nav_menu_items( $menu_slug );

//     // If no menu items are found, return an error
//     if ( empty( $menu_items ) ) {
//         return new WP_Error( 'no_menu', 'Menu not found or empty', array( 'status' => 404 ) );
//     }

//     // Initialize arrays for organizing items
//     $menu_tree = array();
//     $items_by_id = array();

//     // First pass: Organize items by ID and ensure all items have the correct classes
//     foreach ( $menu_items as $item ) {
//         // Preserve all WordPress generated classes (like 'menu-item', 'current-menu-item', etc.)
//         if ( !in_array( 'menu-item', $item->classes ) ) {
//             $item->classes[] = 'menu-item-----'; // Add menu-item class if not present
//         }

//         // Add 'submenu' class to child items (submenu items)
//         if ( $item->menu_item_parent != 0 ) {
//             if ( !in_array( 'submenu', $item->classes ) ) {
//                 $item->classes[] = 'submenu'; // Add submenu class to child items
//             }
//         }

//         // Store each item by ID for easy reference
//         $items_by_id[$item->ID] = $item;

//         // Top-level items (menu_item_parent == 0) are added to the menu_tree
//         if ( $item->menu_item_parent == 0 ) {
//             $menu_tree[] = $item;
//         }
//     }

//     // Second pass: Assign children to their respective parent items
//     foreach ( $menu_tree as &$parent_item ) {
//         // Look for child items and add them to the parent
//         foreach ( $menu_items as $item ) {
//             if ( $item->menu_item_parent == $parent_item->ID ) {
//                 // If the parent has a submenu, assign child item to the submenu array
//                 if ( !isset( $parent_item->submenu ) ) {
//                     $parent_item->submenu = array();
//                 }
//                 $parent_item->submenu[] = $item;
//             }
//         }
//     }

//     // Return the structured menu tree with proper classes
//     return rest_ensure_response( $menu_tree );
// }

// function register_custom_menu_endpoint() {
//     register_rest_route( 'custom/v1', '/menu-items', array(
//         'methods' => 'GET',
//         'callback' => 'get_custom_menu_items',
//         'args' => array(
//             'menu' => array(
//                 'required' => true,
//                 'validate_callback' => function( $param, $request, $key ) {
//                     return is_string( $param ); // Validate that 'menu' is a string (slug)
//                 }
//             ),
//         ),
//         'permission_callback' => '__return_true',
//     ));
// }

// add_action( 'rest_api_init', 'register_custom_menu_endpoint' );









  
////// -----    create menu api with  default menu class


// function get_menu_items_by_name( $request ) {
//     // Get the menu name from the request parameters
//     $menu_name = $request->get_param( 'menu' );
//     $menu_items = wp_get_nav_menu_items( $menu_name );

//     if ( empty( $menu_items ) ) {
//         return new WP_Error( 'no_menu', 'Menu not found or empty', array( 'status' => 404 ) );
//     }

//     // Organize menu items into a hierarchical structure
//     $menu_tree = array();
//     $items_by_id = array();

//     foreach ( $menu_items as $item ) {
//         // Prepare item data including custom classes
//         $item_data = array(
//             'ID' => $item->ID,
//             'title' => $item->title,
//             'url' => $item->url,
//             'menu_item_parent' => $item->menu_item_parent,
//             'classes' => implode( ' ', array_merge( $item->classes, array( 'menu-item', 'menu-item-type-' . $item->type, 'menu-item-object-' . $item->object ) ) ),
//             'submenu' => array()  // Initialize submenu as an empty array
//         );

//         // Store the item by its ID for easy reference
//         $items_by_id[$item->ID] = $item_data;

//         // If the item is a top-level item (menu_item_parent == 0), add it to the main menu tree
//         if ( $item->menu_item_parent == 0 ) {
//             $menu_tree[] = $item_data;
//         } else {
//             // If the item has a parent, add it to the parent's submenu
//             if ( isset( $items_by_id[$item->menu_item_parent] ) ) {
//                 $items_by_id[$item->menu_item_parent]['submenu'][] = $item_data;
//             }
//         }
//     }

//     // Return the organized menu items with their submenus
//     return rest_ensure_response( $menu_tree );
// }

// // Register the custom REST API endpoint
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






















function get_menu_items_by_name( $request ) {
    $menu_name = $request->get_param( 'menu' );
    $menu_items = wp_get_nav_menu_items( $menu_name );
    
    if ( empty( $menu_items ) ) {
        return new WP_Error( 'no_menu', 'Menu not found or empty', array( 'status' => 404 ) );
    }

    // Organize menu items into a hierarchical structure
    $menu_tree = array();
    $items_by_id = array();

    // Index items by ID and organize by parent
    foreach ( $menu_items as $item ) {
        $items_by_id[$item->ID] = $item;
        if ( $item->menu_item_parent == 0 ) {
            $menu_tree[] = $item;
        } else {
            if ( !isset( $items_by_id[$item->menu_item_parent]->submenu ) ) {
                $items_by_id[$item->menu_item_parent]->submenu = array();
            }
            $items_by_id[$item->menu_item_parent]->submenu[] = $item;
        }
    }

    return rest_ensure_response( $menu_tree );
}

function register_custom_menu_endpoint() {
    register_rest_route( 'custom/v1', '/menu-items', array(
        'methods' => 'GET',
        'callback' => 'get_menu_items_by_name',
        'args' => array(
            'menu' => array(
                'required' => true,
                'validate_callback' => function( $param, $request, $key ) {
                    return is_string( $param );
                }
            ),
        ),
        'permission_callback' => '__return_true',
    ));
}
add_action( 'rest_api_init', 'register_custom_menu_endpoint' );
/////// below code is add ing default  class only for menu







?>