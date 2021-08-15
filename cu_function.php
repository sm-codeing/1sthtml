<?php 

// cu_function.php
/*
 * Function creates post duplicate as a draft and redirects then to the edit post screen
 */



 
/*
 * Function creates post duplicate as a draft and redirects then to the edit post screen
 */









//// copy the below code and paste it in  function.php to add or link or include this ------ cu_function.php ----- file in function.php file

//// include('cu_function.php');




//// for adding or link css files in head

wp_enqueue_style( 'sty1', get_template_directory_uri() . '/assets/css/st_1.css');

wp_enqueue_style( 'sty2', get_template_directory_uri() . '/assets/css/st_2.css');

wp_enqueue_style( 'sty3', get_template_directory_uri() . '/assets/css/st_3.css');

wp_enqueue_style( 'sty4', get_template_directory_uri() . '/assets/css/st_4.css');

wp_enqueue_style( 'sty5', get_template_directory_uri() . '/assets/css/st_5.css');

wp_enqueue_style( 'sty6', get_template_directory_uri() . '/assets/css/st_6.css');








////  for adding or link js files on in head or top

wp_enqueue_script( 'scr1', get_template_directory_uri() . '/assets/js/cus1.js');
wp_enqueue_script( 'scr2', get_template_directory_uri() . '/assets/js/cu22.js');






////  for adding or link js files in head and also move all js to footer 


function add_this_script_footer(){ 

	wp_enqueue_script( 'scpt1', get_template_directory_uri() . '/assets/js/cstm_1.js');

	wp_enqueue_script( 'scpt2', get_template_directory_uri() . '/assets/js/cstm_2.js');

	wp_enqueue_script( 'scpt3', get_template_directory_uri() . '/assets/js/cstm_3.js');

	wp_enqueue_script( 'scpt4', get_template_directory_uri() . '/assets/js/cstm_4.js');

	wp_enqueue_script( 'scpt5', get_template_directory_uri() . '/assets/js/cstm_5.js');

	wp_enqueue_script( 'scpt6', get_template_directory_uri() . '/assets/js/cstm_6.js');

	wp_enqueue_script( 'scpt7', get_template_directory_uri() . '/assets/js/cstm_7.js');

	wp_enqueue_script( 'scpt8', get_template_directory_uri() . '/assets/js/cstm_8.js');



?>


<script>

//// you can right any js here for like touggle, scroll to top etc

window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>





<script>

//// you can right any js here for like touggle, scroll to top etc


</script> 


<?php

 } 

add_action('wp_footer', 'add_this_script_footer'); 













<!-- to add custom bootstrap slider paste this below code in function.php  -->
            
            


add_action( 'init', 'custom_bootstrap_slider' );
/**
 * Register a Custom post type for.
 */
function custom_bootstrap_slider() {
	$labels = array(
		'name'               => _x( 'bt_Slider', 'post type general name'),
		'singular_name'      => _x( 'Slide', 'post type singular name'),
		'menu_name'          => _x( 'Cu_Bootstrap Slider', 'admin menu'),
		'name_admin_bar'     => _x( 'Slide', 'add new on admin bar'),
		'add_new'            => _x( 'Add New', 'Slide'),
		'add_new_item'       => __( 'Name'),
		'new_item'           => __( 'New Slide'),
		'edit_item'          => __( 'Edit Slide'),
		'view_item'          => __( 'View Slide'),
		'all_items'          => __( 'All Slide'),
		'featured_image'     => __( 'Featured Image', 'text_domain' ),
		'search_items'       => __( 'Search Slide'),
		'parent_item_colon'  => __( 'Parent Slide:'),
		'not_found'          => __( 'No Slide found.'),
		'not_found_in_trash' => __( 'No Slide found in Trash.'),
	);

	$args = array(
		'labels'             => $labels,
		'menu_icon'	     => 'dashicons-star-half',
    	        'description'        => __( 'Description.'),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array('title','editor',  'excerpt',  'custom-fields', 'thumbnail')
	);

	register_post_type( 'bt_slider', $args );
}
function wpcodex_add_excerpt_support_for_post() {
    add_post_type_support( 'bt_slider', 'excerpt' );
}
add_action( 'init', 'wpcodex_add_excerpt_support_for_post' );












 
////  another one process for creating custom post type in wp with product category 
    
    
    
    

add_action( 'init', 'my_product_register' );
function my_product_register() {
  $labels = array(
    'name' => _x('Luxury condos', 'post type general name'),
    'singular_name' => _x('Product', 'post type singular name'),
    'add_new' => _x('Add New', 'Product'),
    'add_new_item' => __('Add New Product'),
    'edit_item' => __('Edit Product'),
    'new_item' => __('New Product'),
    'all_items' => __('All Products'),
    'view_item' => __('View Products'),
    'search_items' => __('Search Products'),
    'not_found' =>  __('No products found'),
    'not_found_in_trash' => __('No products found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => ' Luxury Condos For Sale '
 
  );
  $args = array(
    'labels' => $labels,
	'labels' => $labels,
    // creating category with below code
	'taxonomies' => array('category'),
	// bring menu icon if hole code not working remove this
			'menu_icon' => ( 'dashicons-share-alt' ),
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
	'hierarchical' => false,
	// Features this CPT supports in Post Editor
	//'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt',  'custom-fields', 'page-attributes' )
  ); 
  register_post_type('products2',$args);
}
















//// add this below  code for add class in wp menu anchor 


 function add_link_atts($atts) {
  $atts['class'] = "menu_item nav-link slide-horizontal";
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_link_atts');







//// add this below  code for replace wp default class sub-menu  for sub menu or nav dropdown


function new_submenu_class($menu) {    
    $menu = preg_replace('/ class="sub-menu"/','/ class="yourclass" /',$menu);        
    return $menu;      
}

add_filter('wp_nav_menu','new_submenu_class'); 











need to put this code in function.php
-------------------------------------

function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'widget header1 show in backend ',
		'id'            => 'identyfire_name_1',  
		
	
        
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );
	
	
		  // add this below line in html or page to show widgen beowser/display
		 /*******  //     <?php dynamic_sidebar( 'identyfire_name_1' );?>     *******/

	
	register_sidebar( array(
		'name'          => 'widget header2 show in backend',
		'id'            => 'identyfire_name_2',  
		
		
        
		'before_widget' => '<div class="cu_wgt_cl">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

          // add this below line in html or page to show widgen beowser/display
		 /****** //     <?php dynamic_sidebar( 'identyfire_name_2' );?>     *******/
















//// add css for admin page style

add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
  
  .my_acf  {
     color:#30c;
      
    } 
	


  </style>';
}
