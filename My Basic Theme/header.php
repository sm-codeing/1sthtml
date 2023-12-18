<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
    <?php wp_head(); ?>


    <style>



.navbar-nav{
/* background: #ffffffb5; */
/* position: absolute; */
    left: 0;
    right: 0;
    top: 50px;
    width: 100%;
    max-width: 1920px;
}
 .nav-link:hover {
    color: #14b7be;
}

.navbar-nav li {
	
	position:relative;
  padding-left: 15px;

}



.ftr_nv li {
	

	position:relative;

}
.ftr_nv li:not(:first-child):after {
	
	content: '|';	
	position: absolute;
    top: 8px;
	color:#fff;
	left: 0px;
}

  nav{

	padding-top: 25px;
	
	/*height: 108px;*/
	background: #335C7D;
	
	
 /* // set animation  */
  -webkit-transition: all 0.8s ease;
	transition: all 0.8s ease;
}
nav.sticky {
	position: fixed;
	top:0px;
  /*font-size: 24px;
    line-height: 48px;*/
	padding-top: 0px;
	/*height: 50px;
	width: 100%;*/
	background: #efc47D;
	opacity:0.8;
	text-align: left;
	padding-left:15px;
	z-index:999;
	
}




nav.sticky .navbar-header a {
	width:100%;
	font-size:15px;
}
  
  


.rel_pos{
	position:relative;} 
	
	.abl_pos{
		position:absolute;
		top:5px;
		left:0;
		right:0;
		 /* // set animation  */
      -webkit-transition: all 0.8s ease;
	transition: all 0.8s ease;}
	
	.navbar-light .navbar-nav .nav-link{
		color:#000;
		    font-size: 20px;}

.ftr_nv	 .nav-item .nav-link{
		color:#fff;
		    }	
	.ftr_nv	 .nav-item .nav-link.active{
		color:#ea091f;
		    }		
	.navbar-light .navbar-nav .nav-link.active {
    color: #14b7be;
}	
.cnav.msticky{
	position: inherit;}
.cnav.msticky .abl_pos{
	position: fixed;
	top:0px;
	
		}
.msticky .navbar.sticky-top.navbar-light.bg-transparent.navbar-expand-lg.abl_pos .scrl_bg.container{
	/*background-color:red;*/
	width:100%;
	max-width:1370px;
	
}

.msticky .navbar-brand img{
	width:50%;}
	
.msticky .navbar-nav .nav-link{
	color:#000;}
	

.cu_bg-transparent{
	background:transparent;}
	
.msticky .navbar.sticky-top.navbar-light.cu_bg-transparent{
	background:rgb(240 233 233 / 88%);}
.msticky .navbar{
	padding-top:5px;
	padding-bottom:5px;}

.sticky-top{
	/* // set animation   */
  -webkit-transition: all 0.8s ease;
	transition: all 0.8s ease;}

  .navbar-toggler:focus {
    text-decoration: none;
    outline: 0;
    box-shadow: inherit;
}

</style>
</head>
<body <?php body_class(); ?>>

    <header>



    
<div class=" container-fluid  max-w-1366 p-0 cnav rel_pos">
  <nav class="navbar sticky-top navbar-light  cu_bg-transparent navbar-expand-md abl_pos">
  <div class="container scrl_bg p-0">
   

    <?php
                if (function_exists('the_custom_logo')) {
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                    $logo_markup = ($logo) ? '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '" class="navbar-brand">' : '<span class="navbar-brand">' . get_bloginfo('name') . '</span>';
                    echo '<a class="navbar-brand" href="' . esc_url(home_url('/')) . '">' . $logo_markup . '</a>';
                }
                ?>
    <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon "></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
    
        <?php wp_nav_menu( array( 'container' => 'false','theme_location' => 'primary',
     'menu' => 'header_menu','items_wrap' => '<ul class="navbar-nav ml-auto justify-content-end">%3$s</ul>'  ) ); ?>
     
    </div>
  </div>
</nav>


</div>

<?php if ( is_front_page() ) { ?> 
// content here


<section class="main_banner cu_pding_top_5">



  <div class="container-fluid  p-0">
    <div class="bnner_contner p-0 ">
      <!-- <img class="img-fluid" src="./images/bnr.png"> -->
  <!-- <img  class="img-fluid " src="<?php //echo site_url();?>/wp-content/uploads/2023/12/the-garden-at-bougival-1884.jpg" alt="">  -->
  <img  class="img-fluid " src="<?php echo site_url();?>/wp-content/uploads/2023/12/bnr.png" alt=""> 
      <div class="txt_cont_bnr"> 
  <div class="cc container">
    <div class="texts_bx">
      <h1 class="brk_lne">We help your 
        brand to be
        recognizable       
      </h1>
      <p class="mt-2 brk_lne">Lorem ipsum dolor consectetur adipisicing doloremque, repudiandae
        doloremque, repudiandae delectus maxime dita laborum maxime expedita
     </p>

        <p class=" mt-2 brk_lne">Lorem ipsum dolor sit amet consectetur </p>
     <a class="btn text-light custom_bg_dark rounded-5 brk_lne px-4  mt-2" href="#">LEARN MORE</a>
    </div>

    <div class="cc d-flex">
    <div class="extra-logos w-25">
                    <?php if ($extra_logo_1 = get_theme_mod('extra_logo_1')) : ?>
                        <img class="img-fluid" src="<?php echo esc_url($extra_logo_1); ?>" alt="Extra Logo 1">
                    <?php endif; ?>
                    
                </div>

                <div class="extra-logos w-25">
                <?php if ($extra_logo_2 = get_theme_mod('extra_logo_2')) : ?>
                        <img  class="img-fluid" src="<?php echo esc_url($extra_logo_2); ?>" alt="Extra Logo 2">
                    <?php endif; ?>
                </div>
    </div>




    <div class="cc d-flex">
    <div class="other-logos w-25">
                    <?php if ($other_logo_1 = get_theme_mod('other_logo_1')) : ?>
                        <img class="img-fluid" src="<?php echo esc_url($other_logo_1); ?>" alt="other Logo 1">
                    <?php endif; ?>
                    
                </div>

                <div class="other-logos w-25">
                <?php if ($other_logo_2 = get_theme_mod('other_logo_2')) : ?>
                        <img  class="img-fluid" src="<?php echo esc_url($other_logo_2); ?>" alt="other Logo 2">
                    <?php endif; ?>
                </div>
    </div>




    <div class="custom-posts-logos zd-flex">
        <?php
        for ($i = 1; $i <= 6; $i++) {
            $custom_posts_logo = get_theme_mod("custom_posts_logo_$i");
            if ($custom_posts_logo) {
                echo '<p class="zw-25">C logo <img class="img-fluid" src="' . esc_url($custom_posts_logo) . '" alt="Custom Post Logo ' . $i . '"></p>';
            }
        }
        ?>
    </div>
     </div>
        
      
        </div>
    </div>
   
  </div>


</section>

<?php } ?>

    
<?php if ( !is_front_page() ) { ?> 

<div class="cc container-fluid container_fluid">


<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
          
  <div class="header-wrap" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat; padding-block:150px;">
  <img src="<?php //if (has_post_thumbnail()) { the_post_thumbnail('full');}?>" alt="aaaa">
 
     <header class="entry-header">
    <h1 class="entry-title"><?php the_title(); ?></h1>
     </header>
  </div>  

  <div class="search-form-container">
    <?php get_search_form(); ?>
</div>

</div>

<?php } ?> 
    </header>
