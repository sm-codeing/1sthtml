
path to create logo image dynamic in wp
---------------------------------------

  <a  class="logo top_logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"> <img src="<?php header_image();?>"> </a>
  
  



code for bring menu
-------------------
 <?php wp_nav_menu( array( 'container' => 'false','theme_location' => 'primary',
     'menu' => 'header_menu','items_wrap' => '<ul class="mainmenu nav ">%3$s</ul>'  ) ); ?>



another code for being menu specielly for wp tweenty ninteen theme 
 -------------------------------------------------------------------   
   
         <?php wp_nav_menu( array( 'container' => 'false','theme_location' => 'primary',
     'menu' => 'header_menu','menu_class' => 'nav navbar-nav'  ) ); ?>
     





another code for add class in wp menu anchor need to put in function.php
----------------------------------------------------------------



function add_menuclass($ulclass) { return preg_replace('/<a /', '<a class="list-group-item"', $ulclass); } add_filter('wp_nav_menu','add_menuclass');









code for add class in wp menu anchor need to put in function.php
----------------------------------------------------------------

 function add_link_atts($atts) {
  $atts['class'] = "menu_item nav-link slide-horizontal";
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_link_atts');





replace wp default class sub-menu only put in on function.php page
------------------------------------------------------------------


function new_submenu_class($menu) {    
    $menu = preg_replace('/ class="sub-menu"/','/ class="yourclass" /',$menu);        
    return $menu;      
}

add_filter('wp_nav_menu','new_submenu_class'); 






php.ini ....max file spload size for xampp
------------------------------------------
https://stackoverflow.com/questions/3958615/import-file-size-limit-in-phpmyadmin

max_execution_time = 5000
max_input_time = 5000
memory_limit = 1000M
post_max_size = 750M
upload_max_filesize = 750M




below is the code how to write echo in php
------------------------------------------   
echo 'soumen';




// link js & css file in wp using enque script

put this below code in function.php page
----------------------------------------



function add_theme_scripts() {
  wp_enqueue_style( 'style', get_stylesheet_uri() );
 
  wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap_v4.css');
  
 wp_enqueue_style( 'stsheet', get_template_directory_uri() . '/assets/css/stsheet.css');
 
  wp_enqueue_script( 'btscript', get_template_directory_uri() . '/assets/js/bootstrap_v4.js');
  
   wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/jquery.js');
 
   
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );






 show content only in front or home page
 ---------------------------------------
 
 <?php if ( is_front_page() ) { ?> 
// content here

<?php } ?>


if not front page
-----------------

 <?php if ( !is_front_page() ) { ?> 

// content here

<?php } ?> 








// move all js to footer 

put this below code in function.php page
----------------------------------------

function remove_head_scripts() { 
   remove_action('wp_head', 'wp_print_scripts'); 
   remove_action('wp_head', 'wp_print_head_scripts', 9); 
   remove_action('wp_head', 'wp_enqueue_scripts', 1);

   add_action('wp_footer', 'wp_print_scripts', 5);
   add_action('wp_footer', 'wp_enqueue_scripts', 5);
   add_action('wp_footer', 'wp_print_head_scripts', 5); 
} 
add_action( 'wp_enqueue_scripts', 'remove_head_scripts' );




// add js in footer

just put the below code function.php page

<?php

function add_this_script_footer(){ ?>

// below is my custom sticky nav code


<script>
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

<?php } 

add_action('wp_footer', 'add_this_script_footer'); 

?>




// add any js script in footer

just put this below code in function.php file
---------------------------------------

function wpb_adding_scripts() {
wp_register_script('my-amazing-script', get_template_directory_uri() . '/js/my-amazing-script.js','','1.1', true);
wp_enqueue_script('my-amazing-script');

wp_register_script('cu_my-amazing-script', get_template_directory_uri() . '/js/amazing-script.js','','1.1', true);
wp_enqueue_script('cu_my-amazing-script');
}
add_action( 'wp_enqueue_scripts', 'wpb_adding_scripts' );  








// to call any file from theme  root
just put this below code in function.php file
--------------------------------------


function mytheme_admin_scripts() {
     
    wp_enqueue_script( 'mytheme-gallery-js', get_template_directory_uri() . '/custom-gallery.js', array('jquery'), null, true );
     
}
add_action( 'admin_enqueue_scripts','mytheme_admin_scripts' );












//add css for admin page style
just put this below code in function.php
----------------------------------------


add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
   .my_acf #newmeta-submit {
     color:#30c;
      font-size: 12px;
    } 
	
	#enternew{
		font-size:20px;}
  </style>';
}










///add only custom field post type
just put this below code in function.php
----------------------------------------


function create_post_type() {
    register_post_type( 'acme_product',
        array(
            'labels' => array(
                'name' => __( 'field_Products' ),
                'singular_name' => __( 'Product' )
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array( 'title', 'editor', 'custom-fields' )
        )
    );
}
add_action( 'init', 'create_post_type' );



// bring category description 

<?php echo category_description(3); ?>  ///// here """"3"""" inside tha bracket is category id


//make  category or section title like about us, our service etc  editable using wp default add custom fild create with "suport" in post type i call that "mood"
/////// tutorial link    https://www.wpbeginner.com/wp-tutorials/wordpress-custom-fields-101-tips-tricks-and-hacks/  

  <?php 
	 
	 $post   = get_post( 18 ); ///// here """"18"""" inside tha bracket is post id
     $output =  get_post_meta($post->ID, 'mood', true);
     echo $output;
 
	  ?>
  
  

  
  
  
  
  
  
//remove the html filtering from category description box
just put the below code in function.php
---------------------------------------
   
	remove_filter( 'pre_term_description', 'wp_filter_kses' );
	remove_filter( 'term_description', 'wp_kses_data' );




// bring image from wp template directory
-----------------------------------------

<img class="img-fluid" src="<?php bloginfo('template_directory'); ?>/images/drp3abt_.jpg">


// show page id in browser
-----------------------


<?php the_ID(); ?>