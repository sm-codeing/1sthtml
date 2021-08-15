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


include page 1st process
------------------------
<?php  
include('header_sm.php');

   ?>

include page 2nd process
------------------------   
   <?php
   
   get_header('header_2.php');
   ?>

diffrent footer or header in diffrent page
------------------------------------------

here page name is -----  footer-singlelisting.php  ----- but i need to pass the para meter as 'singlelisting' below is the example
<?php
get_footer('singlelisting');

}

?> 



bring image in single page from any post type
---------------------------------------------
<div class="col-sm-12"> <img src="<?php $pic1= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'full'); echo $pic=$pic1[0]; ?>" alt=""></div>

another single page create
--------------------------

default page name is  ---- single.php ----  for a new one create like this  -----single-products2.php ----- just add hipen and write post type name....

single-products2.php (here  products2  is the post type name)


----------------------------------------------------
----------------------------------------------------

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



Bread crump 
-----------


<?php
//Dynamic Breadcrumb for MCU
function breadcrumbs($separator = '<span style="color:#fff"> > </span>', $home = 'Home') {
$path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
$base = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
$breadcrumbs = Array("<a href=\"$base\">$home</a>");
$last = end(array_keys($path));
foreach ($path AS $x => $crumb) {
$title = ucwords(str_replace(Array('.php', '_'), Array('', ' '), $crumb));
if ($x != $last)
$breadcrumbs[] = "<a href=\"$base$crumb\">$title</a>";
else
$breadcrumbs[] = $title;
}
return implode($separator, $breadcrumbs);
}?>

below is the html part for bread crump
--------------------------------------
<div style="background: #006285;color: ##fff;">
<div class="container">
<div class="mcu-breadcrumb">
<?php echo "<span class='glyphicon glyphicon-home' style='color:#fff'></span>&nbsp;&nbsp;".breadcrumbs() ; ?>
</div>
</div>
</div>



bring description with pre defined letter or sentence number
-------------------------------------------------
<p class="prop_content"><?php  echo mb_strimwidth($post->post_content,0,250,"..."); ?></p>
 
 
 
 
 getting last 2/5/10 number of wp post with controlled content sentence ( using in kale theme....put this below code in page.php)
 ----------------------------------------------------------------------  
 
 
  <div class="col-sm-8 col-md-8"> 
    <!-- fetching all posts-->
    
    <?php
$lastposts = get_posts( array(
    'posts_per_page' => 2
) );
 
if ( $lastposts ) {
    foreach ( $lastposts as $post ) :
        setup_postdata( $post ); ?>
            
        <h2 style="width:100%; display:block;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
             <?php the_post_thumbnail(); ?>
        <?php //the_content(); ?>
        <div class="pos_cnt_pic">
        <?php  echo mb_strimwidth($post->post_content,0,1500,"....."); ?>
         </div>
            
          <style>
 .pos_cnt_pic img{
 display:none;}   
    
   </style>
       
            <a href="<?php the_permalink(); ?>"><span  style="color: #e55942;">View More</span></a>
            
    <?php
    endforeach; 
    wp_reset_postdata();
}


?>
    
    <!--end of fetching post-->
  </div> 
  
  
 
 
show content according  to page/post id in wp
---------------------------------------------

<h1>process 1</h1>

<?php
$my_id = 18;
$post_id_18 = get_post($my_id);
$content = $post_id_18->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]>', $content);
echo $content;

//echo get_the_ID();
?>

<h1>process 2</h1>

<?php $the_query = new WP_Query( 'post_id=18' ); ?>

<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

                       <?php the_excerpt(); ?>


     <?php endwhile;?>
     
 
 
 <h1>process 3</h1> 
    
     <?php 
	 
	 $post   = get_post( 18 );

$output =  apply_filters( 'the_content', $post->post_content );

echo $output;
	 
	  ?>
      
  <h1>process 4</h1>    
      
      <?php   
	  
	  
	  $post   = get_post( 18 );
$output =  apply_filters( 'the_content', $post->post_content );

	  
	     ?>

 
 
 
 
call a specitic page on ancher href 
====================================
 using url address
 -----------------
 <a href="<?php echo bloginfo('url');?>/need to put requred  page slug here">SEE ALL</a>
 
 using page id (here 419 is the page id)
 --------------------------------------
 
 <a href="<?php echo get_page_link(419); ?>" > text here </a>


 path to link image from uploaded file in db or call default site url
 --------------------------------------------------------------------
 
  <img  class="img-responsive center-block" src="<?php echo site_url();?>/wp-content/uploads/2019/09/snp.png" alt=""> 
  



bring lmage in wp
-----------------

<img src="<?php echo bloginfo('url');?>/wp-content/uploads/2019/11/logo_handyman.png" alt="">






path to link css in wp
----------------------

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css">


path to link js in wp
---------------------

<script src="<?php bloginfo('template_directory'); ?>/js/vendor/modernizr-2.6.2.min.js"></script>







// to call any file from  root (here root means where function.php, header.php, footer.php etc is kept)  may be need to put this in function.php
------------------------------------------------------------------------------------------------------------------------------------------------

function mytheme_admin_scripts() {
     
    wp_enqueue_script( 'mytheme-gallery-js', get_template_directory_uri() . '/custom-gallery.js', array('jquery'), null, true );
     
}
add_action( 'admin_enqueue_scripts','mytheme_admin_scripts' );





to call or link a php file in function.php file from root
---------------------------------------------------------
tutorial link
-------------

https://wordpress.stackexchange.com/questions/111628/include-a-external-php-file-into-a-wordpress-custom-template



include('2cu_function.php');




to call or link a php file in function.php file from folder like css or js
--------------------------------------------------------------------------
include('css/2cu_function.php');









path to create logo image dynamic in wp
---------------------------------------

  <a  class="logo top_logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"> <img src="<?php header_image();?>"> </a>
  
  
  
  
  
  
  
create custom widget in wp
--------------------------
tutorial link      https://codex.wordpress.org/Widgetizing_Themes
----------------------------------------------------------------- 

need to put this code in function.php
-------------------------------------

function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'widget header1 show in backend ',
		'id'            => 'identyfire_name_1',  
		
		// add this below line in html or page to show widgen beowser/display
		 /****** //     <?php dynamic_sidebar( 'identyfire_name_1' );?>     *******/
        
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );
	
	
	
	register_sidebar( array(
		'name'          => 'widget header2 show in backend',
		'id'            => 'identyfire_name_2',  
		
		// add this below line in html or page to show widgen beowser/display
		 /****** //     <?php dynamic_sidebar( 'identyfire_name_2' );?>     *******/
        
		'before_widget' => '<div class="cu_wgt_cl">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );




call or show widget in frontend / browser  so need to put this code in html
---------------------------------------------------------------------------


 <?php dynamic_sidebar( 'identyfire_name_1' );?>  //this is tha widget id







  
  
  
  
  
  
  
  

//Custom CSS Widget (create conditional css field for every page or post type in wp admin)
------------------------------------------------------------------------------------------
 or 
 --
 per page wise css field create in admin page editor field (checked and ok)
---------------------------------------------------------------------------
// tutorial link      https://digwp.com/2010/02/custom-css-per-post/   

this link  also hav page id wise css file create css file create and put 
------------------------------------------------------------------------
it in css file & call by coding in function.php (not checked)
-----------------------------------------------
need put this below code in function.php
----------------------------------------

add_action('admin_menu', 'custom_css_hooks');
add_action('save_post', 'save_custom_css');
add_action('wp_head','insert_custom_css');
function custom_css_hooks() {
	add_meta_box('custom_css', 'Custom CSS', 'custom_css_input', 'post', 'normal', 'high');
	add_meta_box('custom_css', 'Custom CSS', 'custom_css_input', 'page', 'normal', 'high');
	add_meta_box('custom_css', 'Custom CSS', 'custom_css_input', 'products1', 'normal', 'high');
}
function custom_css_input() {
	global $post;
	echo '<input type="hidden" name="custom_css_noncename" id="custom_css_noncename" value="'.wp_create_nonce('custom-css').'" />';
	echo '<textarea name="custom_css" id="custom_css" rows="5" cols="30" style="width:100%;">'.get_post_meta($post->ID,'_custom_css',true).'</textarea>';
}
function save_custom_css($post_id) {
	if (!wp_verify_nonce($_POST['custom_css_noncename'], 'custom-css')) return $post_id;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
	$custom_css = $_POST['custom_css'];
	update_post_meta($post_id, '_custom_css', $custom_css);
}
function insert_custom_css() {
	if (is_page() || is_single()) {
		if (have_posts()) : while (have_posts()) : the_post();
			echo '<style type="text/css">'.get_post_meta(get_the_ID(), '_custom_css', true).'</style>';
		endwhile; endif;
		rewind_posts();
	}
}




 
 
 create duplicate page for any page or post type from dashboard just put this in function.php
 --------------------------------------------------------------------------------------------
 tutorial link
 -------------
 https://rudrastyh.com/wordpress/duplicate-post.html
 https://hookagency.com/add-duplicating-function-to-posts-and-pages-without-a-plugin/
 https://www.quora.com/How-do-I-duplicate-a-page-in-WordPress-without-a-plugin?top_ans=58777683
 
 
Create plugin for page duplicate in wp. In kinsta (not checked)
---------------------------------------------------------------
https://kinsta.com/knowledgebase/duplicate-page-post-wordpress/
 

/*
 * Function creates post duplicate as a draft and redirects then to the edit post screen
 */
function rd_duplicate_post_as_draft(){
	global $wpdb;
	if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
		wp_die('No post to duplicate has been supplied!');
	}
 
	/*
	 * Nonce verification
	 */
	if ( !isset( $_GET['duplicate_nonce'] ) || !wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) )
		return;
 
	/*
	 * get the original post id
	 */
	$post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
	/*
	 * and all the original post data then
	 */
	$post = get_post( $post_id );
 
	/*
	 * if you don't want current user to be the new post author,
	 * then change next couple of lines to this: $new_post_author = $post->post_author;
	 */
	$current_user = wp_get_current_user();
	$new_post_author = $current_user->ID;
 
	/*
	 * if post data exists, create the post duplicate
	 */
	if (isset( $post ) && $post != null) {
 
		/*
		 * new post data array
		 */
		$args = array(
			'comment_status' => $post->comment_status,
			'ping_status'    => $post->ping_status,
			'post_author'    => $new_post_author,
			'post_content'   => $post->post_content,
			'post_excerpt'   => $post->post_excerpt,
			'post_name'      => $post->post_name,
			'post_parent'    => $post->post_parent,
			'post_password'  => $post->post_password,
			'post_status'    => 'draft',
			'post_title'     => $post->post_title,
			'post_type'      => $post->post_type,
			'to_ping'        => $post->to_ping,
			'menu_order'     => $post->menu_order
		);
 
		/*
		 * insert the post by wp_insert_post() function
		 */
		$new_post_id = wp_insert_post( $args );
 
		/*
		 * get all current post terms ad set them to the new post draft
		 */
		$taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
		foreach ($taxonomies as $taxonomy) {
			$post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
			wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
		}
 
		/*
		 * duplicate all post meta just in two SQL queries
		 */
		$post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
		if (count($post_meta_infos)!=0) {
			$sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
			foreach ($post_meta_infos as $meta_info) {
				$meta_key = $meta_info->meta_key;
				if( $meta_key == '_wp_old_slug' ) continue;
				$meta_value = addslashes($meta_info->meta_value);
				$sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
			}
			$sql_query.= implode(" UNION ALL ", $sql_query_sel);
			$wpdb->query($sql_query);
		}
 
 
		/*
		 * finally, redirect to the edit post screen for the new draft
		 */
		wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
		exit;
	} else {
		wp_die('Post creation failed, could not find original post: ' . $post_id);
	}
}
add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );
 
/*
 * Add the duplicate link to action list for post_row_actions
 */
function rd_duplicate_post_link( $actions, $post ) {
	if (current_user_can('edit_posts')) {
		$actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=rd_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Duplicate Page</a>';
	}
	return $actions;
}
 
add_filter( 'post_row_actions', 'rd_duplicate_post_link', 10, 2 );

add_filter('page_row_actions', 'rd_duplicate_post_link', 10, 2);


 
 
 
 
 
 genetate short code for any page or post type using plugin  (can define with specific page or post id)
 ------------------------------------------------------------------------------------------------------
 
 https://en.support.wordpress.com/display-posts-shortcode/    (short code adding process tutorial)
 
 https://wordpress.org/plugins/display-posts-shortcode/        (plugin download link)
  
 
 
 
 below is the short code --- for with out calling title for elementor page  with previous plugin 
 -----------------------------------------------------------------------------------------------

[display-posts post_parent="elementor" order="ASC" orderby="page" post_type="page" id="197" include_content="true" include_title="faulse"]
  
  


create my own custom short code ---- put this on outher php ot plugin page or in function.php page
--------------------------------------------------------------------------------------------------


function subscribe_co($atts, $ccontent = null) {
  
	$ccontent = '<div class="hcf_box">
	
	
								<style scoped>
									.hcf_box{
									   border:3px solid #f00;
									   margin:15px;
									}
									.hcf_field{
										background:#0f0;
										padding:25px;
									}
								</style>
								
								<h1>Below is the short code content</h1>
								<p class="hcf_field">
									<label for="hcf_author">Author</label>
									<input id="hcf_author" type="text" name="hcf_author">
								</p>
  
	
			     </div>';


    $ccontent = do_shortcode($ccontent);

    return '<div  style="color: red">' .$ccontent. '</div>';
}
add_shortcode('subscribe2', 'subscribe_co');





define short code co call
-------------------------

call using in html or php  ------- <?php echo do_shortcode( '[subscribe2]' ); ?>


call  using wp dashboard editor ------  [subscribe2] 




call a spefic page or post by id inside short code put this on outher php ot plugin page or in function.php page
---------------------------------------------------------------------------------------------------------------




 $post   = get_post( 186 );  // here 186 is the page/post id

$output =  apply_filters( 'the_content', $post->post_content );

//echo $output;
	 
	  




 $test = function () use ($output){
 
   // inside a div
   //return '<div  style="color: red">' .$output. '</div>';
   return $output;
  };
   add_shortcode('subscribe2', $test);


define short code co call
-------------------------

call using in html or php  ------- <?php echo do_shortcode( '[subscribe2]' ); ?>


call  using wp dashboard editor ------  [subscribe2] 



  
  

code for bring woocommerce short description
--------------------------------------------
<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>





code for bring woocommerce  description
--------------------------------------------



<?php echo apply_filters( 'the_content', get_post_field('post_content', $product_id) );?>



code for bring woocommerce sku and short description( SKU not  work in single product page)
-------------------------------------------------------------------------------------------
 <br /><?php echo $product->get_sku(); ?> <br /><?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>


 woocommerce single product image with deafault zoom 
 ---------------------------------------------------    
        <div id="product-<?php the_ID(); ?>" <?php wc_product_class(); ?>>
	<?php
		/**
		 * Hook: woocommerce_before_single_product_summary.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>
    
    </div>


 function to bring wp woocommerce Single product image 
 -----------------------------------------------------
   <?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>

 function to bring wp woocommerce title
 --------------------------------------
 <?php the_title(); ?>

 function to bring wp woocommerce price
 --------------------------------------
  <?php do_action( 'woocommerce_after_shop_loop_item_title' );?>
  
 
 function to bring wp woocommerce only cart btn
 ----------------------------------------------
<?php  do_action( 'woocommerce_after_shop_loop_item' ); ?>

 function to bring wp woocommerce cart btn with before top is the qty button position
 --------------------------------------------------------------------------------
<?php do_action('woocommerce_simple_add_to_cart'); ?>


code for bring menu
-------------------
 <?php wp_nav_menu( array( 'container' => 'false','theme_location' => 'primary',
     'menu' => 'header_menu','items_wrap' => '<ul class="mainmenu nav ">%3$s</ul>'  ) ); ?>



another code for being menu specielly for wp tweenty ninteen theme 
 -------------------------------------------------------------------   
   
         <?php wp_nav_menu( array( 'container' => 'false','theme_location' => 'primary',
     'menu' => 'header_menu','menu_class' => 'nav navbar-nav'  ) ); ?>
     








code for add class in wp menu anchor need to put in function.php
----------------------------------------------------------------

 function add_link_atts($atts) {
  $atts['class'] = "menu_item nav-link slide-horizontal";
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_link_atts');



tutorial links
---------------

https://stackoverflow.com/questions/42994156/wordpress-menu-add-class-to-anchors    



https://wordpress.stackexchange.com/questions/108092/adding-different-classes-to-anchor-in-navigation-menu


another code for add class in wp menu anchor need to put in function.php
----------------------------------------------------------------



function add_menuclass($ulclass) { return preg_replace('/<a /', '<a class="list-group-item"', $ulclass); } add_filter('wp_nav_menu','add_menuclass');





another code for add class in wp menu anchor need to put in function.php ( it bring many class in anchor like page id as class in anchor etc);
--------------------------------------------------------------------------------------------------------------------------




function my_walker_nav_menu_start_el($item_output, $item, $depth, $args) { $classes = implode(' ', $item->classes); $item_output = preg_replace('/<a /', '<a class="'.$classes.'"', $item_output, 1); return $item_output; } add_filter('walker_nav_menu_start_el', 'my_walker_nav_menu_start_el', 10, 4);




     
     

replace wp default class sub-menu only put in on function.php page
------------------------------------------------------------------


function new_submenu_class($menu) {    
    $menu = preg_replace('/ class="sub-menu"/','/ class="yourclass" /',$menu);        
    return $menu;      
}

add_filter('wp_nav_menu','new_submenu_class'); 


    <!-- =============== -->
 



add new menu field in menu option below  Automatically add new top-level pages to this menu, Top Menu,  Social Links Menu
-------------------------------------------------------------------------------------------------------------------------

<!-- just need to put this only in function.php page -->

function wpb_custom_new_menu() {
  register_nav_menus(
    array(
      'my-custom-menu' => __( 'My Custom Menu' ),
      'extra-menu' => __( 'Extra Menu' ),
	   'my-new_nav' => __( 'my new nav' )
    )
  );
}
add_action( 'init', 'wpb_custom_new_menu' );

<!-- -------------------------- -->












if need off canvas menu it works fine with bootstrap 3
-------------------------------------------------------
https://codepen.io/rugor/pen/eiyzh


  <!-- woocommerce product page create -->
  
  
  
    <?php
$params = array('posts_per_page' => 6, 'post_type' => 'product');
$wc_query = new WP_Query($params);
?>
<?php if ($wc_query->have_posts()) : ?>
<?php while ($wc_query->have_posts()) :
                $wc_query->the_post();
				$product = new WC_Product(get_the_ID());
				 ?>
    

                <div class="col-md-4">
        <div class="product-item">
              <div class="pi-img-wrapper">
                <!--<img src=" <?//php bloginfo('template_directory'); ?>/images/47115337_2183437105263289_7941193183606279948_n.jpg" class="img-responsive" alt="Berry Lace Dress">
               --> <?php the_post_thumbnail(); ?>
                <div>
                 <!-- <a href="<?php //the_permalink(); ?>" class="btn">Zoom</a>-->
                  <a href="<?php the_permalink(); ?>" class="btn">View</a>
                </div>
              </div>
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <div class="pi-price"><?php echo $product->get_price_html(); ?></div>
              <!--<a href="javascript:;" class="btn add2cart">Add to cart</a>-->
               <button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class=" add2cart "><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
              <div class="sticker sticker-new"></div>
            </div>
        </div>
                

<?php endwhile; ?>
                 <?php endif; ?>
				 
                 
                 
                 
                       <div class="col-md-4">
        <div class="product-item">
              <div class="pi-img-wrapper">
                <img src=" <?php bloginfo('template_directory'); ?>/images/47115337_2183437105263289_7941193183606279948_n.jpg" class="img-responsive" alt="Berry Lace Dress">
                <div>
                  <a href="#" class="btn">Zoom</a>
                  <a href="#" class="btn">View</a>
                </div>
              </div>
              <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
              <div class="pi-price">$29.00</div>
              <a href="javascript:;" class="btn add2cart">Add to cart</a>
            </div>
        </div>
        <!-- =================================================================================================================================== -->
        
        
        making slider custom
        
        <!-- =================================================================================================================================== -->
        
        
        
        
        <!-- bring id to display in browser  wp woocommerce single page  -->
        
         <?php $ID=the_ID(); ?>
		 
        <!-- ================================================================================================================================= -->
        
        
        <!-- woocommerce single product image with deafault zoom -->
        
        <div id="product-<?php the_ID(); ?>" <?php wc_product_class(); ?>>
	<?php
		/**
		 * Hook: woocommerce_before_single_product_summary.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>
    
    </div>
    
    <!-- ===================================================================================================================================== -->
     <!-- only bring the single product image in wp woocommerce -->
    
    
      <?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
      
      
    <!-- another cide.... only bring the single product image in wp woocommerce  [ google search key word is - showing featured image in wordpress] -->
    
    
    
      <?php
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
the_post_thumbnail( 'full' );
}
?>


<!-- controll the image size -->
If you want to control the size, you can change the_post_thumbnail parameter.

To display default thumbnail size (default 150px x 150px max)

the_post_thumbnail();
To display in medium size (default 300px x 300px max)

the_post_thumbnail( 'medium' );
To display in large size (default 640px x 640px max)

the_post_thumbnail( 'large' );
To display in original uploadedsize

the_post_thumbnail( 'full' );

 <!-- ===================================================================================================================================== -->
<!-- create custom post type with php code mention it as movie/movies (below code need to put in function.php page in wp and it will get from.... https://www.wpbeginner.com/wp-tutorials/how-to-create-custom-post-types-in-wordpress/)<br />
      no need to write php openning and closing code   .....only paste the code in function.php page it can be paste at the end or below of exsisting code
 -->



// Our custom post type function
function create_posttype() {
 
    register_post_type( 'movies',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Movies' ),
                'singular_name' => __( 'Movie' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'movies'),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );





/*<!--  ----- ------ -->*/

/*
* Creating a function to create our CPT
*/
 
function custom_post_type() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Movies', 'Post Type General Name', 'twentythirteen' ),
        'singular_name'       => _x( 'Movie', 'Post Type Singular Name', 'twentythirteen' ),
        'menu_name'           => __( 'Movies', 'twentythirteen' ),
        'parent_item_colon'   => __( 'Parent Movie', 'twentythirteen' ),
        'all_items'           => __( 'All Movies', 'twentythirteen' ),
        'view_item'           => __( 'View Movie', 'twentythirteen' ),
        'add_new_item'        => __( 'Add New Movie', 'twentythirteen' ),
        'add_new'             => __( 'Add New', 'twentythirteen' ),
        'edit_item'           => __( 'Edit Movie', 'twentythirteen' ),
        'update_item'         => __( 'Update Movie', 'twentythirteen' ),
        'search_items'        => __( 'Search Movie', 'twentythirteen' ),
        'not_found'           => __( 'Not Found', 'twentythirteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'movies', 'twentythirteen' ),
        'description'         => __( 'Movie news and reviews', 'twentythirteen' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'movies', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'custom_post_type', 0 );
 
 
 
 <!-- ================================================================================================================== --> 
 
 <!-- belo is the html part for movie named custom post type -->
 
 
 <div class="slider_area">
                <div class="slider_active owl-carousel">
                
                <?php 
 
        $portfolioloop1 = new WP_Query( array(  'post_type' => 'movies', 'order' => 'ASC' )  ); ?>
        
         <?php

	  while ( $portfolioloop1->have_posts() ) : $portfolioloop1->the_post(); 
	 $full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
	  ?>
    
                    <div class="single_slider slider_one" style="background: url(<?php echo $full_image_url[0]; ?>);">
                        <div class="container-fluid p-0">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <div class="slider_content">
                                      <!--  <h4>new arrivals</h4>
                                        <h1>coat hoody</h1>
                                        <a href="#">discover now</a>-->
                                        <?php the_content();?>
                                        
                                       <!--   add custom field in wp using support array element in wp post type 
                                        and show it in frontend display below is the tutorial  
                                               https://www.wpbeginner.com/wp-tutorials/wordpress-custom-fields-101-tips-tricks-and-hacks/-->                                                       
                                        <!-- below need to change the 'yyyy' as it is set in support level value in bring one content only -->
                                        <p>Today's Mood: <?php echo get_post_meta($post->ID, 'yyyy', true); ?></p>
                                        
                                        <!--  put this below code to bring in loop -->
                                        
                                        
                                        <?php 
 
$coauthors = get_post_meta($post->ID, 'yyyy', false);
if( count( $coauthors ) != 0 ) { ?>
<ul class="coauthors">
<li>Contributors</li>
<?php foreach($coauthors as $coauthors) { ?>
           <?php echo '<li>'.$coauthors.'</li>' ;
            }
            ?>
</ul>
<?php 
} else { 
// do nothing; 
}
?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php endwhile; ?>
                   <?php wp_reset_query(); ?> 
                    <!--<div class="single_slider slider_two">
                        <div class="container-fluid">
                            <div class="row align-items-center p-0">
                                <div class="col-12">
                                    <div class="slider_content">
                                        <h4>top trending</h4>
                                        <h1>pink color</h1>
                                         
                                        <a href="#">discover now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>  
            
            
            
            <!-- ========================================================================================== -->
            
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
		'supports'           => array('title','editor','thumbnail')
	);

	register_post_type( 'bt_slider', $args );
}
function wpcodex_add_excerpt_support_for_post() {
    add_post_type_support( 'bt_slider', 'excerpt' );
}
add_action( 'init', 'wpcodex_add_excerpt_support_for_post' );


<!-- below is the html part for bootstrap 3 slider -->

<div id="myCarousel" class="carousel slide" data-ride="carousel"> <!-- Indicators -->

    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <?php $slider = get_posts(array('post_type' => 'bt_slider', 'posts_per_page' => 5, 'order' => 'ASC')); ?>
      <?php $count = 0; ?>
      <?php foreach($slider as $slide): ?>
      <div class="item <?php echo ($count == 0) ? 'active' : ''; ?>"> <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($slide->ID)) ?>" alt="Chania"  class="img-responsive">
        <div class="carousel-caption">
        <?php echo $slide->post_content; ?>
         <!-- <h3>Chania</h3>
          <p>The atmosphere in Chania has a touch of Florence and Venice.</p>-->
        </div>
      </div>
      
      
      <?php $count++; ?>
    <?php endforeach; ?>
 <!--     <div class="item"> <img src="Live preview for Copy.png" alt="Chania" width="460" height="345">
        <div class="carousel-caption">
          <h1>INDIA</h1>
          <p>The atmosphere in INDIA has a touch of INCREDABLE.</p>
        </div>
      </div>
      <div class="item"> <img src="Live preview for Copy.png" alt="Chania" width="460" height="345">
        <div class="carousel-caption">
          <h2>Flowers</h2>
          <p>Beatiful flowers in Kolymbari, Crete.</p>
        </div>
      </div>-->
      <!--<div class="item"> <img src="file:///C|/Users/sm/Desktop/img_flower2.jpg" alt="Flower" width="460" height="345"> <div class="carousel-caption"> <h3>Flowers</h3> <p>Beatiful flowers in Kolymbari, Crete.</p> </div> </div>--> </div>
    <a class="imp1" href="#myCarousel" role="button" data-slide="prev"> </a> <a class="imp2" href="#myCarousel" role="button" data-slide="next"> </a> 
       <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
  
    </div>
    
    
    
    <!-- ============================================================================================================================ -->
    
    <!-- replace wp default class sub-menu -->


function new_submenu_class($menu) {    
    $menu = preg_replace('/ class="sub-menu"/','/ class="yourclass" /',$menu);        
    return $menu;      
}

add_filter('wp_nav_menu','new_submenu_class'); 


    <!-- ========================================================================================================================= -->
    
    <!-- another one process for creating custom post type in wp -->
    
    
    

add_action( 'init', 'product_register' );
function product_register() {
  $labels = array(
    'name' => _x('Products1', 'post type general name'),
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
    'menu_name' => 'PProducts'
 
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes' )
  ); 
  register_post_type('products1',$args);
}


    
    <!-- below is the html part -->
      <?php 
 
        $portfolioloop1 = new WP_Query( array(  'post_type' => 'Products1', 'order' => 'ASC' )  ); ?>
        
         <?php

	  while ( $portfolioloop1->have_posts() ) : $portfolioloop1->the_post(); 
	 $full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
	  ?>
    
  <div class="col-lg-4 col-md-4 col-sm-6 no-padding promo-wrap">
                    <div class="gst-promo gst-color-white">
                        <img src="<?php echo $full_image_url[0]; ?>" alt="" />

                        <div class="vertical-align-div gst-promo-text col-lg-8 right">
                            <div>
                                <div class="vertical-align-text">
                                 <?php the_content();?>
                                   <!-- <h2> <span class="sec-title fsz-40 wht-clr"> Women </span> <span class="light-font-3 fsz-33 thm-clr"> $250 </span> </h2>                                  
                                    <p class="fsz-18">Bikes, clothing, accessories and much more...</p>
                                    <a href="#" class="fancy-btn fancy-btn-small">Shop Now</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                 
                    <?php endwhile; ?>
                   <?php wp_reset_query(); ?> 
                   
                   
                   
<!-- =========================================================================================================================== -->



    
    <!-- another one process for creating custom post type in wp with product category -->
    
    
    
    

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
    'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes' )
  ); 
  register_post_type('products2',$args);
}



  
  
    <!-- below is the html part -->  
    
    
   <ul>
                  
                   <?php  $portfolioloop1 = new WP_Query( array(  'post_type' => 'Products2', 'category_name' => 'cat_1', 'order' => 'ASC' )  ); ?>
        
        
         <?php

	             while ( $portfolioloop1->have_posts() ) : $portfolioloop1->the_post(); 
	            
				 $full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); 
	    
		 ?>
      
      
            <li> <div class="relt_bx"> <a href="<?php the_permalink(); ?>">
              <div class="faimg"><img src="<?php echo $full_image_url[0]; ?>" alt=""></div>
              <p class="ptr_nm">  <?php the_title(); ?></p>
              </a> 
              </div>
              
              <div class="desc_prop"> <?php the_content();?></div>
              <h3 class="mrk_cont">Call or Text Mark Anthony Venegas with Coldwell Banker San Francisco to schedule an 
              appointment <a href="tel:415.495.3600">415-955-7968</a> to schedule an appointment to tour these exquisite floor plans.</h3>
              </li>
              
              
             <?php endwhile; ?>
             <?php wp_reset_query(); ?>    
              
     
          </ul> 

 <!-- ========================================================================================================================= -->

<!-- add new custom field like text field numeric field textarea field in in woocommerce  need to paste below code in function.php -->


// Display Fields
add_action('woocommerce_product_options_general_product_data', 'woocommerce_product_custom_fields');
 
// Save Fields
add_action('woocommerce_process_product_meta', 'woocommerce_product_custom_fields_save');
 
 
function woocommerce_product_custom_fields()
{
    global $woocommerce, $post;
    echo '<div class="product_custom_field">';
    // Custom Product Text Field
    woocommerce_wp_text_input(
        array(
            'id' => '_custom_product_text_field',
            'placeholder' => 'Custom Product Text Field',
            'label' => __('Custom Product Text Field', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
    //Custom Product Number Field
    woocommerce_wp_text_input(
        array(
            'id' => '_custom_product_number_field',
            'placeholder' => 'Custom Product Number Field',
            'label' => __('Custom Product Number Field', 'woocommerce'),
            'type' => 'number',
            'custom_attributes' => array(
                'step' => 'any',
                'min' => '0'
            )
        )
    );
    //Custom Product  Textarea
    woocommerce_wp_textarea_input(
        array(
            'id' => '_custom_product_textarea',
            'placeholder' => 'Custom Product Textarea',
            'label' => __('Custom Product Textarea', 'woocommerce')
        )
    );
    echo '</div>';
 
}



function woocommerce_product_custom_fields_save($post_id)
{
    // Custom Product Text Field
    $woocommerce_custom_product_text_field = $_POST['_custom_product_text_field'];
    if (!empty($woocommerce_custom_product_text_field))
        update_post_meta($post_id, '_custom_product_text_field', esc_attr($woocommerce_custom_product_text_field));
// Custom Product Number Field
    $woocommerce_custom_product_number_field = $_POST['_custom_product_number_field'];
    if (!empty($woocommerce_custom_product_number_field))
        update_post_meta($post_id, '_custom_product_number_field', esc_attr($woocommerce_custom_product_number_field));
// Custom Product Textarea Field
    $woocommerce_custom_procut_textarea = $_POST['_custom_product_textarea'];
    if (!empty($woocommerce_custom_procut_textarea))
        update_post_meta($post_id, '_custom_product_textarea', esc_html($woocommerce_custom_procut_textarea));
 
}


<!-- below is the html part -->

<div class="custom_fild">
             
  <p><!--// Display the value of custom product text field-->
    <?php  echo get_post_meta($post->ID, '_custom_product_text_field', true);?></p>
                
                <p><!--// Display the value of custom product number field-->
                <?php   echo get_post_meta(get_the_ID(), '_custom_product_number_field', true)?></p>
                
                <p><!--// Display the value of custom product text area-->
                <?php   echo get_post_meta(get_the_ID(), '_custom_product_textarea', true);
    ?></p>
              </div>

<!-- getting short description -->

<?php echo apply_filters( 'woocommerce_short_description', $product->post->post_excerpt ) ?><!-- not checked -->

<!-- ===================================================================================================================================== -->

<!-- making  tabs dynamic in wp -->


<!-- below is the code need to paste in wp function.php page -->




/** for tab pannel*/


add_action( 'init', 'product_register' );
function product_register() {
  $labels = array(
    'name' => _x('candidates', 'post type general name'),
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
    'menu_name' => 'Tabs'
 
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes' )
  ); 
  register_post_type('candidates',$args);
}



<!-- below is the html part -->

<div class="container">
  <div id="tab">
    <ul class="nav nav-tabs" role="tablist">
      <?php $loop = new WP_Query( array( 'post_type' => 'candidates', 'posts_per_page' => -1 ) ); ?>
      <?php 
        $counter = 0;
        while ( $loop->have_posts() ) : $loop->the_post(); 
            $counter++;
        ?>
      <li role="presentation" class="post-<?php the_ID(); ?> <?=($counter == 1) ? 'active' : ''?>"><a href="#post-<?php the_ID(); ?>" aria-controls="home" role="tab" data-toggle="tab"><?php the_title();?></a></li>
      <?php endwhile; wp_reset_query(); ?>
      </ul>
    <div class="tab-content">
      <?php
        $counter = 0;
        $loop = new WP_Query( array( 'post_type' => 'candidates', 'posts_per_page' => -1 ) );
        while ( $loop->have_posts() ) : $loop->the_post(); 
            $counter++;
        ?>
      <div role="tabpanel" class="tab-pane <?=($counter == 1) ? 'active' : ''?>" id="post-<?php the_ID(); ?>"><?php the_content();?></div>
      <?php endwhile; ?>
      </div>
  </div>
</div>



<!-- ==================================================================================================================================== -->

<!-- create new category in wp woocommerce or it can be use for making different design to display a product below is the code and no need any code 
                                                    to  write in function.php page  -->
                                                    
            <?php
    $args4 = array( 'post_type' => 'product', 'posts_per_page' => 6, 'product_cat' => 'my_cycle_accessories', 'order' => 'DEC' );
    $loop4 = new WP_Query( $args4 );
    while ( $loop4->have_posts() ) : $loop4->the_post();
	
	?>
    
    
    
     <div class="col-sm-3 col-md-3">
    <div class="col-sm-6 woocommerce "> 
	<?php $image4 = wp_get_attachment_image_src( get_post_thumbnail_id($loop4->post->ID), 'single-post-thumbnail' );?>
    <img src="<?php  echo $image4[0]; ?>" data-id="<?php echo $loop4->post->ID; ?>">
    
    </div>
<div class="col-sm-6">
    <h1><span class="pt"><?php the_title(); ?></span></h1>

    <p> <span><?php echo $product->get_categories( ) ?></span></p>
       <p> <span><?php echo $product->get_price_html(); ?></span></p>
        <a class="add-to-cart button btn btn-info" href="<?php echo get_permalink( $loop4->post->ID ) ?>"> ADD TO CART </a>
        
    </div>
    </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>




   <!-- ========================================================================================================================= -->
    <!--  how many  related product will show in the below single product images or any where  in product details page  --> 

/**
 * @snippet       WooCommerce Change Number of Related Products
 * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode    https://businessbloomer.com/?p=17473
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 3.3.3
 */
 
add_filter( 'woocommerce_output_related_products_args', 'bbloomer_change_number_related_products', 9999 );
 
function bbloomer_change_number_related_products( $args ) {
 $args['posts_per_page'] = 6; // # of related products
 $args['columns'] = 6; // # of columns per row
 return $args;
}





<!-- ===================================== -->

<!--cart qty-->


<a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>


    <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View my car' ); ?>"><?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?>
    </a>
    
    
    <!-- ========================================================================================================================== -->
    
    <!-- showing stock qty with number of stock, less than 10 qty stock alert, and out of stock when stock is zero -->
    
    
    <span class="stck">
  <?php 
        global $product; 
        $numleft  = $product->get_stock_quantity(); 
        if($numleft==0) {
           // out of stock
            echo "Out of stock."; 
        }
        else if($numleft<=10) {
            echo "Only ".$numleft ." item left.";
        }
        else {
            echo "".$numleft ." PCS";
        }
     ?>
                             </span>
                             
                             
   <!-- ==================================================================================================================== -->
   
            <!-- display only stock qty and stock is zero it will show out of stock only in php page (no code need in function.php) -->   
            
            
            <span class="out_of_stock_and_stock">
  <?php 
        global $product; 
        $numleft  = $product->get_stock_quantity(); 
        if($numleft==0) {
           // out of stock
            echo "Out of stock."; 
        }
        
        else {
            echo "".$numleft ." PCS";
        }
     ?>
                             </span>    
                             
      <!-- ====================================================================================================================-->  
      
      <!-- showing sold qty -->
      
      <p style="font-size:20px; ">No Of Qty Sold  - <span  style="font-size:20px; color:#06F;"><?php global $post; echo get_post_meta($post->ID, 'total_sales', true); ?></span></p>   
      
      
      
      
      
      <!-- =========================================================================================================================== -->  
      
      <!-- extra product or feature image add with the plugin dynamic feature image (https://wordpress.org/plugins/dynamic-featured-image/#description   
       or  https://ankitpokhrel.com/explore/get-more-out-of-featured-images-with-dynamic-featured-image-plugin/) and below is the code needto put in html -->    
      
      
                          <span  class="pic-2" > 
                     <?php if( class_exists('Dynamic_Featured_Image') ) {
     global $dynamic_featured_image;
     $featured_images = $dynamic_featured_image->get_featured_images( get_the_ID() );
    foreach( $featured_images as $image );         
                               
					} ?>

 <?php echo "<img src='{$image['full']}' alt='Dynamic Featured Image' >"?>
   </span>  
   
   
   
   <!-- =============================================================================================================================== -->  
   
   <!-- woocommerce SEARCH -->  
   
   
          <?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                          

  <input type="search" id="<?php echo $unique_id; ?>" class="search-field " placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'twentyseventeen' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
           <button type="submit" class="search-submit"><?php echo twentyseventeen_get_svg( array( 'icon' => 'search' ) ); ?><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'twentyseventeen' ); ?></span></button>

         
</form> 

   <!-- ================================================================================================================================== -->
   
             
             
         <!--    Login logo  change only need to put this code in function.php page -->   

function custom_loginlogo() {
echo '<style type="text/css">
h1 a {background-image: url('.get_bloginfo('template_directory').'/images/w-logo-blue.png) !important; width:100% !important; background-size: 100% !important; height:100px !important; }
</style>';
}
add_action('login_head', 'custom_loginlogo');


<!-- make dynamic login logo with main site logo  just need to replace the code inwp-login.php  -->
<!-- original start -->
<h1><a  href="<?php echo esc_url( $login_header_url ); ?>" title="<?php echo esc_attr( $login_header_title ); ?>" tabindex="-1"><?php echo $login_header_text; ?></a></h1>
        
 
 <!-- original end --> 
 <!-- below is requred and it is edited  (--- here only this style is added     style=" background-image: url(<?php header_image();?>); max-width:100%;
        height:auto;"  ---) -->
       
<h1><a  href="<?php echo esc_url( $login_header_url ); ?>" title="<?php echo esc_attr( $login_header_title ); ?>" tabindex="-1"  style=" background-image: url(<?php header_image();?>); max-width:100%;
        height:auto;"><?php echo $login_header_text; ?></a></h1>
        
        
        
<!-- -->        
        
        
 wp includs / css /adminbar min.css(for wp backend w logo) line no 342
 
 #wpadminbar #wp-admin-bar-wp-logo>.ab-item .ab-icon:before {
	content:"\f120";(need to change this)
	top:2px
}       
        
<!-- to get register page link-->    
    settings/ general/ any one can register    
        
        
        
        
        <!-- ===================================================================== -->
        
        <!-- ===================================================================== -->
        
        <!--====================================================================== -->
        
        cart details or mini cart   (need to check again)
        
        
        <div class="cus_dv"><ul class="mini-cart-content">
			<?php do_action( 'woocommerce_before_cart_contents' ); ?>

			<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<li class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">




<div class="mini-cart-content">

<style>


.mini-cart-img img{
	width:100%;}
</style>
                <div class="mini-cart-img col-sm-4 col-md-4"><!--<img src="images/product/product-cart1.png" alt="product search one">-->
                <?php
						$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

						if ( ! $product_permalink ) {
							echo $thumbnail; // PHPCS: XSS ok.
						} else {
							printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
						}
						?>
                
                </div>
                
                <div class="mini-cart-ds  col-sm-7 col-md-7">
                    <h6><a href="#single-product.html"><span class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
						<?php
						if ( ! $product_permalink ) {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
						} else {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
						}

						do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

						// Meta data.
						echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

						// Backorder notification.
						if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
						}
						?>
						</span></a></h6>
                    <span class="mini-cart-meta">
                       <span class="col-sm-6 col-md-6"> <a href="#single-product.html"><span class="product-price" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
							<?php
								echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
							?>
						</span></a>
                        </span>
                       <!-- <span class="mini-meta">-->
                           <!--<span class="mini-color">Color: <i class="orange"></i></span>-->
                           <!--<span class="mini-qty">Qty: 5</span>-->
                           
                           <span class="product-quantity mini-qty  class="col-sm-6 col-md-6"" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
						<?php
						if ( $_product->is_sold_individually() ) {
							$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
						} else {
							$product_quantity = woocommerce_quantity_input( array(
								'input_name'   => "cart[{$cart_item_key}][qty]",
								'input_value'  => $cart_item['quantity'],
								'max_value'    => $_product->get_max_purchase_quantity(),
								'min_value'    => '0',
								'product_name' => $_product->get_name(),
							), $_product, false );
						}

						echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
						?>
						</span>
                      <!--  </span>-->
                    </span>
                </div>
                
                <div class="mini-cart-delete  col-sm-1 col-md-1"><!--<img src="images/delete.png" alt="delete">-->
                
                <p><?php
								// @codingStandardsIgnoreLine
								echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
									'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
									esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
									__( 'Remove this item', 'woocommerce' ),
									esc_attr( $product_id ),
									esc_attr( $_product->get_sku() )
								), $cart_item_key );
							?></p>
                
                </div>
              </div>
						<span class="product-remove">
							<?php
								// @codingStandardsIgnoreLine
								echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
									'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
									esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
									__( 'Remove this item', 'woocommerce' ),
									esc_attr( $product_id ),
									esc_attr( $_product->get_sku() )
								), $cart_item_key );
							?>
						</span>

						<span class="product-thumbnail">
						<?php
						$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

						if ( ! $product_permalink ) {
							echo $thumbnail; // PHPCS: XSS ok.
						} else {
							printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
						}
						?>
						</span>

						<span class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
						<?php
						if ( ! $product_permalink ) {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
						} else {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
						}

						do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

						// Meta data.
						echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

						// Backorder notification.
						if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
						}
						?>
						</span>

						<span class="product-price" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
							<?php
								echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
							?>
						</span>

						<span class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
						<?php
						if ( $_product->is_sold_individually() ) {
							$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
						} else {
							$product_quantity = woocommerce_quantity_input( array(
								'input_name'   => "cart[{$cart_item_key}][qty]",
								'input_value'  => $cart_item['quantity'],
								'max_value'    => $_product->get_max_purchase_quantity(),
								'min_value'    => '0',
								'product_name' => $_product->get_name(),
							), $_product, false );
						}

						echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
						?>
						</span>

						<span class="product-subtotal" data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>">
							<?php
								echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
							?>
						</span>
					</li>
					<?php
				}
			}
			?>

			<?php do_action( 'woocommerce_cart_contents' ); ?>

			<li>
				<td colspan="6" class="actions">

					<?php if ( wc_coupons_enabled() ) { ?>
						<div class="coupon">
							<label for="coupon_code"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
							<?php do_action( 'woocommerce_cart_coupon' ); ?>
						</div>
					<?php } ?>

					<button type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

					<?php do_action( 'woocommerce_cart_actions' ); ?>

					<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
				</td>
			</li>

			<?php do_action( 'woocommerce_after_cart_contents' ); ?>
		</ul></div>
        
        
  
  
  
  
  
  
  fetch deta from db in for each loop wp & php
  ===========================================
  
  
  
  


here  show content in display / browser from wp default support array element in post type custom field all in loop 
-------------------------------------------------------------------------------------------------------------------

  <?php 
$mood = get_post_meta($post->ID, 'mood', false);  //mood is the custom field default value
//print_r($mood);die;
if( count( $mood ) != 0 ) { ?>
<p>Today's Mood:</p>
<ul>
<?php foreach($mood as $mood) {
            echo '<li>'.$mood.'</li>';
            }
            ?>
</ul>
<?php 
} else { 
// do nothing; 
}
?> 






change wp admin page style dashboard style
-----------------------------------------
tutorial link      https://css-tricks.com/snippets/wordpress/apply-custom-css-to-admin-area/

put this code in function.php and write css inside that below code style tag


add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
    body, td, textarea, input, select {
      font-family: "Lucida Grande";
      font-size: 12px;
    } 
  </style>';
}








fetch deta from db with wp code and in loop 
-------------------------------------------
<br />
<br />
<ul  class="list-inline container">

 <li class="col-sm-4"><h2>Firstname</h2></li>
 <li class="col-sm-4"><h2>Lastname</h2></li>
 <li class="col-sm-4"><h2>Points</h2></li>
</ul>

  <?php
    global $wpdb;
    $result = $wpdb->get_results ( "SELECT * FROM student" );
    foreach ( $result as $print )   {
    ?>
    <ul class="list-inline  container">
     <li class="col-sm-4"><h3> &nbsp; &nbsp;<?php echo $print-> name;?></h3></li> //here ---name--- means row or column name in student named table
     <li class="col-sm-4"> <h3>&nbsp; &nbsp;<?php echo $print-> rollno;?></h3></li> //here  --- rollno ---- means row or column name in student named table
     <li class="col-sm-4"> <h3>&nbsp; &nbsp;<?php echo $print-> class;?></h4></li>  //here ---class--- means row or column name in student named table
    </ul>
        <?php }
  ?>  
  
  
  
  
  
  
  
  
  
  
  
   
php for each loop (sumona) fetch deta from db
--------------------------------------------
<?php    





$soumen ="SELECT * FROM STUDENT";
$data = mysqli_query($conn, $soumen);  // here $conn  is for connection which is made on top of tha page
//print_r($data);die;

foreach($data as $value){
	//print_r($value);die;
  echo "<strong>student name:</strong> ". $value['name']."<br>";
  echo "<strong>sttudent roll:</strong> ". $value['class']."<br>";
}


?>



php for each loop inside table tag (sumona)
-------------------------------------------
<table>
<tr>
<th>Roll No</th>
<th>class</th>
<!--<th>Class</th>-->
</tr>




<?php

$soumen1 ="SELECT * FROM STUDENT";
$mydata = mysqli_query($conn, $soumen1);  // here $conn  is for connection which is made on top of tha page
foreach($mydata as $value){
	//print_r($value);die;
	?>
	<pre> <?php print_r($value); ?></pre>
    <?php
  echo "<tr> 
            <td>".$value['rollno']."</td>
  
             <td>".$value['class']."</td>
  
        </tr>";
 
}
?>
</table>


  
 loop tutorial end
 =======================================
        
        
create new single.php peoduct page design
-----------------------------------------

below is the path to find single.php page

C:\xampp\htdocs\cold_well_banker\wp-content\themes\cold_well_banker


put the below code after .....where header is called..................

<div>

    <?php
			/* Start the Loop */
			while ( have_posts() ) : the_post(); ?>
            
            <div class="col-sm-12"> <img src="<?php $pic1= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'full'); echo $pic=$pic1[0]; ?>" alt=""></div>
				
          <div class="pnk_bg"> <h1><?php the_title(); ?></h1></div>
            
            <div class="desc_prop"><?php the_content();?></div>
			
			<?php	get_template_part( 'template-parts/post/content', get_post_format() );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

				the_post_navigation( array(
					'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'twentyseventeen' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'twentyseventeen' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
				) );

			endwhile; // End of the loop.
			?>





<style>

/**** brlow is the css to make this page full width and hide default title and desvription ****/
.entry-title, .entry-content{
	display:none;}
	
.has-sidebar:not(.error404) #primary {
    float: inherit;
    width: 100%;
}
</style>



</div>






  
  -------------------------------------------
  SOME JS AND JQUERY NEED FOR WP MENU AND ETC
  -------------------------------------------
  
  <script>
var body = document.body;

body.classList.add("MyClass_soumen");
	
window.onload = function() {
  document.getElementById('menu').className = 'topnav';
   document.getElementById('menu-main').className = 'opnav';
};
	


function myFunction() {
  var x = document.getElementById("menu");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
			
			<script>

$('.menu-item-has-children a').click(function() {		
    $(this).nextAll('.sub-menu:first').toggle();
});
</script>
			
<script>
function myFunction(x) {
  if (x.matches) { // If media query matches
    document.body.style.backgroundColor = "yellow";
  } else {
   document.body.style.backgroundColor = "pink";
  }
}

var x = window.matchMedia("(max-width: 900px)")
myFunction(x) // Call listener function at run time
x.addListener(myFunction) // Attach listener function on state changes
</script>			
             


create back up for word press
-----------------------------

copy project folder from xampp htdocs, 
export it's detabase from xampp local host php my admin.....to create a new copy of it's detabase.


next...

put this project folder in xampp htdocs with a new name , rename its data base name in it's wp-config.php file     and below is tha path for getting --- wp-config.php file.....

C:\xampp\htdocs\cold_well_banker\wp-config.php 

and create a new data base in xampp php my admin and import the copy of database .....


next 

change two url inside data base in.... wp_options 

1) siteurl

2)home

below   option value .......with new site name url

but outher like user, password will be same....



 
in lockdown
===========


call feature image in page both for in same page not in function.php page
-------------------------------------------------------------------------



<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
          
  <div class="header-wrap" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat;">
     <header class="entry-header">
    <h1 class="entry-title"><?php the_title(); ?></h1>
     </header>
  </div>  













bring excerpt in wp
-------------------
put this below codein function.php


add_post_type_support( 'page', 'excerpt' );

