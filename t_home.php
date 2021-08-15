<?php
/**
 * Template part for displaying page content in page.php
 *
 * Template Name: gigil home
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
get_header(); ?>


<div class="container-fluid mx_wd_1600">
  <div class="row">
    <div class="col-12 col-sm-11 col-md-11  bg_bk">
      <div class="row">
        <div class="col-12 col-sm-2 col-md-2">
          <h1 class="text-white d-flex text-capitalize  align-items-center h-100 fnt_ser_h"><span class="yel_clr  d_cnt w-100">our </span>services</h1>
        </div>
        <div class="col-12 col-sm-10 col-md-10 text-center">
          <div class="row">
          
              
                   <?php  $portfolioloop1 = new WP_Query( array(  'post_type' => 'Products2', 'category_name' => 'service', 'order' => 'ASC' )  ); ?>
        
        
         <?php

	             while ( $portfolioloop1->have_posts() ) : $portfolioloop1->the_post(); 
	            
				 $full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); 
	    
		 ?>
            <div class="col-6 col-sm-2 col-md-2 p-2 ic_ser"> <img class="img-fluid ser_rt" src="<?php echo $full_image_url[0]; ?>">
              <p> <a href="<?php the_permalink(); ?>"  class="text-white text-capitalize"> <?php the_title(); ?></a> </p>
            </div>
            
            
            <?php endwhile; ?>
             <?php wp_reset_query(); ?>     
            
            
            
            
            
            
            
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="sec_about pt-4">
  <div class="container-fluid mx_wd_1600">
  
   <?php  $portfolioloop1 = new WP_Query( array(  'post_type' => 'Products2', 'category_name' => 'about', 'order' => 'ASC' )  ); ?>
        
        
         <?php

	             while ( $portfolioloop1->have_posts() ) : $portfolioloop1->the_post(); 
	            
				 $full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); 
	    
		 ?>
  
    <div class="row">
      <div class="col-12 col-sm-6 col-md-6 ">
        <div class="d-flex  align-items-center h-100">
          <div class="mrl_15">
           <?php /*?> <h1 class="text-capitalize font-weight-bold fnt_ser_h"> about<span class="olv_grn"> gigil</span></h1>
            <h5>gigil hasbeen giving service the real estate industry since 2015</h5>
            <p> our background is public notification for development sites so our systems were bult around a product  where timings and products hav no room for error. this means our signs and marketting material are on site, on time ever time. </p><?php */?>
            
            <?php the_content();?>
            
            <a href="<?php the_permalink(); ?>" class="btn red_mor text-capitalize btn-change5"> know more</a> </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-6 text-right p-0"><img class="img-fluid" src="<?php echo $full_image_url[0]; ?>"> </div>
    </div>
    
    
    
    
      <?php endwhile; ?>
             <?php wp_reset_query(); ?>     
            
    
  </div>
</div>






<div class="gal">
  <div class="container-fluid mx_wd_1600">
    <div class="d-flex flex-wrap">
    
    
     
   <?php  $portfolioloop1 = new WP_Query( array(  'post_type' => 'Products2', 'category_name' => 'gal', 'order' => 'ASC' )  ); ?>
        
        
         <?php

	             while ( $portfolioloop1->have_posts() ) : $portfolioloop1->the_post(); 
	            
				 $full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); 
	    
		 ?>
    
      <div class="col-12 col-sm-4 col-md-4 mt-4 ">
        <div class="product-list-left-effect"> <img src="<?php echo $full_image_url[0]; ?>" class="img-fluid" />
          <div class="product-overlay">
           <?php /*?> <h3 class="text-capitalize">Property details</h3>
            <p>when its come to marketing a property</p><?php */?>
            
             <?php the_content();?>
          </div>
        </div>
      </div>
      
      
     
      <?php endwhile; ?>
             <?php wp_reset_query(); ?>      
      
      
      
    
      
      
      
    </div>
  </div>
</div>



<div class="subsc_nwsl bg_nwltr mt-5">
  <div class="container-fluid  mx_wd_1600">
    <div class="cont_subsc_nwsl_ftr mx-auto row pt-4 pb-4 d-flex">
      <div class=" col-12 col-sm-8 col-md-8  cu_border-secondary  pt-5 pb-5 ">
        <h3 class="text-uppercase clr_bk"> subscribe to our news letter </h3>
        <form action="" method="post">
          <div class="col-12 col-sm-10 col-md-10 pl-0 pb-4 pr-5 " >
            <div class="input-group">
              <input type="text" class="form-control inp_scrb" name="email" id="email"  placeholder="Email"/>
            </div>
          </div>
          <button class="btn btn-lg scrb_btn">Subscribe </button>
        </form>
      </div>
      <div class=" col-12 col-sm-4 col-md-4   pt-5 pb-5 ">
        <div class="d-flex  align-items-center h-100">
          <div class="pl-2">
            <h3 class="text-uppercase clr_bk"> connect with us</h3>
            <ul class="list-inline">
              <li class="list-inline-item"> <a href="#" class=" clr_bk ic_ser"><i class="fa fa-facebook  fa-2x ser_rt"></i></a></li>
              <li class="list-inline-item"> <a href="#"  class=" clr_bk ic_ser"><i class="fa fa-instagram  fa-2x ser_rt"></i></a></li>
              <li class="list-inline-item"> <a href="#"  class=" clr_bk ic_ser"><i class="fa 
fa-pinterest-p  fa-2x ser_rt"></i></a></li>
              <li class="list-inline-item"> <a href="#"  class=" clr_bk ic_ser"><i class="fa fa-twitter fa-2x ser_rt"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer();