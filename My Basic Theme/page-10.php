<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

get_header(); ?>


<!-- //// page-5    --- THIS IS THE PHP PAGE NAME page-5.php -->

<h1>  this is HOME page page 10 content here</h1>
<div class="cc">
  <h3>custom_posts_logo below is in loop </h3>
  <?php



// Get Custom Posts Logos
for ($i = 1; $i <= 6; $i++) {
    $logo_url = get_theme_mod("custom_posts_logo_$i");
    $text_fields = array();

    // Get Text Fields for Each Logo
    for ($j = 1; $j <= 4; $j++) {
        $text_fields[] = get_theme_mod("custom_posts_logo_${i}_text_${j}");
    }

    // Output the Logo and Text Fields
    if ($logo_url) {
        echo '<div class="custom-posts-logo">';
        echo '<img src="' . esc_url($logo_url) . '" alt="Custom Post Logo ' . $i . '">';

        if (!empty($text_fields)) {
            echo '<div class="custom-posts-text-fields">';
            foreach ($text_fields as $text) {
                echo '<p>' . esc_html($text) . '</p>';
            }
            echo '</div>';
        }

        echo '</div>';
    }
}
?>

<div class="cntnr">
  <img src="// here i want the image" alt="">
  <h1>here i want content of first text field</h1>
  <h2>here i want content of third text field</h2>
  <h3>here i want content of second text field</h3>
</div>






<div class="cntnr">
    <?php
    // Loop through each Custom Posts logo
    for ($i = 1; $i <= 6; $i++) {
        // Get the logo image URL
        $logo_url = get_theme_mod("custom_posts_logo_$i");

        // Get the text field values
        $text_field_1 = get_theme_mod("custom_posts_logo_${i}_text_1");
        $text_field_2 = get_theme_mod("custom_posts_logo_${i}_text_2");
        $text_field_3 = get_theme_mod("custom_posts_logo_${i}_text_3");
        $text_field_4 = get_theme_mod("custom_posts_logo_${i}_text_4");

        // Display the logo and text fields
        if ($logo_url) {
            echo '<img src="' . esc_url($logo_url) . '" alt="">';

            if ($text_field_1) {
                echo '<h1>' . esc_html($text_field_1) . '</h1>';
            }

            if ($text_field_3) {
                echo '<h2>' . esc_html($text_field_3) . '</h2>';
            }

            if ($text_field_2) {
                echo '<h3>' . esc_html($text_field_2) . '</h3>';
            }
        }
    }
    ?>
</div>



<div class="cntnr2 row">
<div id="carouselExampleCaptions" class="carousel slide">

  <style> 
  .ccntnr{
    border:2px solid red;
  }
  .carousel-item img{
    height:200px;
    width:100%;
  }
  
  </style>
  <h2>carousel_cont inside html loop can be also use as static</h2>
  <div class="carousel-inner">
    <?php
    // Loop through each Custom Posts logo
    for ($i = 1; $i <= 6; $i++) {
        // Get the logo image URL
        $logo_url = get_theme_mod("carousel_cont_$i");

        // Get the text field values
        $text_field_1 = get_theme_mod("carousel_cont_${i}_text_1");
        $text_field_2 = get_theme_mod("carousel_cont_${i}_text_2");
        $text_field_3 = get_theme_mod("carousel_cont_${i}_text_3");
        $text_field_4 = get_theme_mod("carousel_cont_${i}_text_4");


// if (!empty($text_field_1) || !empty($text_field_2) || !empty($text_field_3) || !empty($text_field_4)) {
  if (!empty($text_field_1.$text_field_2.$text_field_3.$text_field_4)){
  ?>
  <!-- <div class="ccntnr col-3 ">
<img class="img-fluid" src="<?php //echo esc_url($logo_url) ?>" alt="">
       <h1><?php //echo esc_html($text_field_1) ?> </h1>
       <h1><?php //echo esc_html($text_field_2) ?> </h1>
     
</div> -->


    <div class="carousel-item  <?= $i === 1 ? 'active' : '' ?>">
      <img src="<?php echo esc_url($logo_url) ?>" class="d-block zimg-fluid" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5><?php echo esc_html($text_field_1) ?> </h5>
        <p><?php echo esc_html($text_field_2) ?> </p>
      </div>
    </div>
  
   
 
    
    <?php  }

       
       
    }
    ?>
</div>
<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
</div>

<div class="cslider">




<div id="cu_carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#cu_carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#cu_carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#cu_carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">

<?php  
$portfolioloop1 = new WP_Query(array('post_type' => 'custom_post_type', 'category_name' => 'mtbx_section', 'order' => 'ASC'));

$count = 0; // Counter to track the loop iteration

while ($portfolioloop1->have_posts()) : $portfolioloop1->the_post();
    $full_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');

    // Get the custom thumbnails
    $custom_thumbnails = get_post_meta(get_the_ID(), 'custom_thumbnails', true);
    if (!empty($custom_thumbnails)) {
        $custom_thumbnails = array_map('esc_attr', $custom_thumbnails);
    } else {
        $custom_thumbnails = array('', '', '', ''); // Initialize with empty values
    }
?>

    <!-- <h1>test title</h1> -->
    <!-- <div class="container <?php //echo $count === 0 ? 'active' : ''; ?>"> -->

    <div class="carousel-item  <?php echo $count === 0 ? 'active' : ''; ?>">
      <img src="<?php echo $full_image_url[0]; ?>" class="d-block img-fluid" alt="...">
      <div class="carousel-caption d-none d-md-block">
      <h2><?php echo get_the_title() ?> TTL tttt <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <h2><?php echo get_the_content() ?></h2>
        <h2><?php echo get_the_excerpt() ?></h2>
       
      </div>
    </div>
       
       
      
    <!-- </div> -->


   

    

    <!-- <h1>test title end</h1> -->

<?php
    $count++; // Increment the counter
endwhile;
wp_reset_query();
?>

</div>
  <button class="carousel-control-prev" type="button" data-bs-target="#cu_carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#cu_carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>




        

<?php  
$portfolioloop1 = new WP_Query( array(  'post_type' => 'custom_post_type', 'category_name' => 'mtbx_section', 'order' => 'ASC' )  );

?>
       
       
       <?php

             while ( $portfolioloop1->have_posts() ) : $portfolioloop1->the_post(); 
            
       $full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); 
    
   ?>

<?php


    // Get the custom thumbnails
    $custom_thumbnails = get_post_meta( get_the_ID(), 'custom_thumbnails', true );
    if ( ! empty( $custom_thumbnails ) ) {
        $custom_thumbnails = array_map( 'esc_attr', $custom_thumbnails );
    } else {
        $custom_thumbnails = array( '', '', '', '' ); // Initialize with empty values
    }
?>
   
 <h1>test title</h1>
 <div class="container ">

 <h2> <?php echo get_the_title()  ?> </h2>
 <h2> <?php echo get_the_content()  ?> </h2>
 <h2> <?php echo get_the_excerpt()  ?> </h2>
 <div class="ftr_pic">
 <img style="border: 5px solid green" src="<?php echo $full_image_url[0]; ?>" alt="ftr">

 </div>
 <!-- <img style="border: 5px solid red" src="<?php //echo  $featured_image_src; ?>" alt="ftr"> -->

 <h4> dynamic ftr img below start</h4>


 <?php

$num_ftr_pic = function($p) {
 return class_exists('Dynamic_Featured_Image')?count($GLOBALS['dynamic_featured_image']->get_featured_images($p)): 0;
};

$count = $num_ftr_pic($post_id);

for ($i = 0; $i < $count; $i++) { ?>
    <div class="pic15">p5
        <img class="img-fluid" src="<?php echo esc_url($GLOBALS['dynamic_featured_image']->get_featured_images($post_id)[$i]['full']); ?>" alt="try">
    </div>
<?php } ?>

//// if need specific static image use below code, only the div tag not with loop
<div class="pic15">p5--- //// here 0 is the number of static image
        <img class="img-fluid" src="<?php echo esc_url($GLOBALS['dynamic_featured_image']->get_featured_images($post_id)[0]['full']); ?>" alt="try"> 
        </div>



 <h4> dynamic ftr img below end</h4>
<div class=" d-flex">  

<div class="cc">  

    <img src="<?php echo  $custom_thumbnails[0]; ?>" alt="">
</div>
<div class="cc">  

    <img src="<?php echo  $custom_thumbnails[1]; ?>" alt="">
</div>
<div class="cc">  

    <img src="<?php echo  $custom_thumbnails[2]; ?>" alt="">
</div>
<div class="cc">  

    <img src="<?php echo  $custom_thumbnails[3]; ?>" alt="">
</div>
<div class="cc">  

    <img src="<?php echo  $custom_thumbnails[4]; ?>" alt="">
</div>


 </div>
 </div>


 <h2> custom field deta start</h2>

 <div class="custom_fld_dta">
 <h1> test</h1>
    <p>Today's Mood: <?php echo get_post_meta($post->ID, 'yyyy', true); ?></p>
    <p>Today's Mood: <?php echo get_post_meta($post->ID, 'yyyyxx', true); ?></p>
    <h1> test 2</h1>

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
 
 <h1>test title end</h1>

    <?php
    

    // Restore the global post data
    wp_reset_postdata();

?>

<?php endwhile; ?>
<?php wp_reset_query(); ?> 


<div id="zcarouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="http://localhost/wordpress_6_4_2/wp-content/uploads/2023/12/bnr.png" class="d-block img-fluid" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="http://localhost/wordpress_6_4_2/wp-content/uploads/2023/12/bnr.png" class="d-block img-fluid" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
    <img src="http://localhost/wordpress_6_4_2/wp-content/uploads/2023/12/bnr.png" class="d-block img-fluid" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


</div>
<section>

  <div class="container-fluid p-0">

    <div class="d-sm-flex text_bbx">
      <div class="custom_bg_dark d-flex justify-content-center align-items-center zpx-5"> 
         <div class="cntnt text-light text-center ">
          <h4 class="text-capitalize">Quality Product</h4>
          <p class="zbrk_lne">Lorem ipsum dolor, sit amet consecteur elit ipsum 
            libero  adipisicing elit. Quae, libero adipisicing.
              libero  adipisicing elit Quae, libero adipisicing elit. Quae, libe
              elit Quae, libero adipisicing elit
       </p>
      </div>  
    
    </div>
      <div class="custom_bg_info_light d-flex justify-content-center align-items-center "> 
         <div class="cntnt text-light text-center ">
          <h4 class="text-capitalize">custom strategy</h4>
          <p class="zbrk_lne">Lorem ipsum dolor, sit amet consecteur elit ipsum 
            libero  adipisicing elit. Quae, libero adipisicing.
              libero  adipisicing elit Quae, libero adipisicing elit. Quae, libe
              elit Quae, libero adipisicing elit
       </p>  
        </div>  
    
    </div>
      <div class="dark_custom_bg_info d-flex justify-content-center align-items-center "> 
         <div class="cntnt text-light text-center ">
          <h4 class="text-capitalize">copetetive price</h4>
          
          <p class="zbrk_lne">Lorem ipsum dolor, sit amet consecteur elit ipsum 
            libero  adipisicing elit. Quae, libero adipisicing.
              libero  adipisicing elit Quae, libero adipisicing elit. Quae, libe
              elit Quae, libero adipisicing elit
       </p>
        </div>  
    
    </div>
    </div>
   </div>


</section>

<section>
  <div class="container-fluid">

    <div class="container text-center">
    
      <div class="abt_compny">
        <img class="img-fluid" src="./images/anchor1.png">
    <h2 class="text-capitalize my-4">about company</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam excepturi ratione, obcaecati fugiat sint consequatur voluptate expedita perspiciatis eaque, corporis labore distinctio veritatis maxime deserunt explicabo numquam perferendis maiores voluptatem debitis eligendi, minus libero atque facere officia? Beatae nisi sint odit vel officia, nihil nam?</p>
        
        <a class="btn  mt-4 border-1 border px-4" href="#">Read more</a>
      </div>
    
    
    </div>
    
    </div>
    

</section>

<section>

  <div class="container-fluid p-0 custom_bg_info_light">
    <div class="abt_next  zpy-5 ">
      <div class="container zd-flex justify-content-end">
        <div class="row">
      
          <div class="col-12 col-md-6" >
            <img class="img-fluid pic_abt_nxt" src="./images/abt11.png">
          </div>
          <div class="col-12 col-md-6 cont_abt  custom_bg_info_light text-light  zas_item" data-aos="example-anim1">
            <h2 class="brk_lne text-capitalize"> doing the right 
              thing at right 
              time</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
               Quaerat explicabo hic quos maxime inventore unde quis cumque 
               quas iure labore.</p>
            
               <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus hic corporis, expedita exercitationem minima nesciunt architecto laboriosam reprehenderit facere odit ab, tenetur vel! Neque laboriosam suscipit molestias voluptatibus obcaecati? Earum aut a deleniti ullam quae.</p>
            
               <a class="btn btn-light rounded rounded-5" href="#">Lorem ipsum</a>
                </div>
          </div>
      </div>

    </div>
  </div>


</section>

<section>
  
  
  <div class="container-fluid">
  
    <div class="sevc text-center">
  
     <div class="container">
      <div class="cu_cc">
        <!-- <img class="img-fluid" src="./images/fb.png"> -->
        <div class=" d-flex justify-content-center">
          <i class="fa fa-desktop" aria-hidden="true"></i>
        
        </div>
        
    <h2 class="text-capitalize">our service </h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam excepturi ratione, obcaecati fugiat sint
           consequatur voluptate expedita.
            </p>
        
      </div>
     </div>

  <div class="row">
    <div class="cc py-5 px-5 col-12 col-md-4">
      <div class=" d-flex justify-content-center">
        <i class="fa fa-desktop" aria-hidden="true"></i>
      
      </div>
      
  <h5>Lorem ipsum service!</h5>
      <p>Lorem obcaecati fugiat sint consequatur voluptate expedita perspiciatis excepturi ratione amet consectetur adipisicing elit.
        </p>
      
    </div>
    <div class="cc py-5 px-5 col-12 col-md-4">
      <!-- <img class="img-fluid" src="./images/fb.png"> -->
      <div class=" d-flex justify-content-center">
        <i class="fa fa-desktop" aria-hidden="true"></i>
      
      </div>


  <h5>Lorem ipsum service!</h5>
      <p>Lorem obcaecati fugiat sint consequatur voluptate expedita perspiciatis excepturi ratione amet consectetur adipisicing elit.
        </p>
      
    </div>
    <div class="cc py-5 px-5 col-12 col-md-4">
<div class=" d-flex justify-content-center">
  <i class="fa fa-desktop" aria-hidden="true"></i>

</div>

  <h5>Lorem ipsum service!</h5>
      <p>Lorem obcaecati fugiat sint consequatur voluptate expedita perspiciatis excepturi ratione amet consectetur adipisicing elit.
        </p>
      
    </div>
    
    <div class="cc pt-0  py-5 px-5 col-12 col-md-4">
<div class=" d-flex justify-content-center">
  <i class="fa fa-desktop" aria-hidden="true"></i>

</div>

  <h5>Lorem ipsum service!</h5>
      <p>Lorem obcaecati fugiat sint consequatur voluptate expedita perspiciatis excepturi ratione amet consectetur adipisicing elit.
        </p>
      
    </div>
    
    <div class="cc pt-0  py-5 px-5 col-12 col-md-4">
<div class=" d-flex justify-content-center">
  <i class="fa fa-desktop" aria-hidden="true"></i>

</div>

  <h5>Lorem ipsum service!</h5>
      <p>Lorem obcaecati fugiat sint consequatur voluptate expedita perspiciatis excepturi ratione amet consectetur adipisicing elit.
        </p>
      
    </div>
    
    <div class="cc pt-0 py-5 px-5 col-12 col-md-4">
<div class=" d-flex justify-content-center">
  <i class="fa fa-desktop" aria-hidden="true"></i>

</div>

  <h5>Lorem ipsum service!</h5>
      <p>Lorem obcaecati fugiat sint consequatur voluptate expedita perspiciatis excepturi ratione amet consectetur adipisicing elit.
        </p>
      
    </div>
    
     
    <div class="ck text-center">
      <a class="btn border border-1" href="#">Lorem ipsum</a>
  
    </div>
  </div>
    </div>
  
  
  </div>
  
</section>

<section>

  <div class="container-fluid p-0 bg_gry">
    <div class="zabt_next engage">
      <div class="container zd-flex justify-content-end">
        <div class="row">
      
          <div class="col-12 col-md-6 cont_abt bg_gry ztext-light"  data-aos="example-anim1">
            <h2 class="brk_lne"> We engage positive 
              communication </h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
               Quaerat explicabo hic quos maxime inventore unde quis cumque 
               quas iure labore.</p>
            
               <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus hic corporis, expedita exercitationem minima nesciunt architecto laboriosam reprehenderit facere odit ab, tenetur vel! Neque laboriosam suscipit molestias voluptatibus obcaecati? Earum aut a deleniti ullam quae.</p>
            
               <a class="btn custom_bg_info_light rounded rounded-5 text-light" href="#">Lorem ipsum</a>
                </div>
          <div class="col-12 col-md-6 pic_eng">
            <img class="img-fluid pic_abt_nxt" src="./images/abt22.png">
          </div>
          
          </div>
      </div>

    </div>
  </div>


</section>



<section>

  <div class="container-fluid custom_bg_info_light">
<div class="container">
  <div class="d-sm-flex justify_content_flx_start align-items-center gt_to_nkw text-light ">
    <div>
      <h2>Lorem ipsum dolor sit amet consectetur</h2>
      <p class="brk_lne">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem possimus iusto sapiente, et illum praesentium ea? Dicta 
        laudantium esse vero, velit id odit expedita earum?</p>
    </div>
    <div class="text-start px-5">
      <a class="btn btn-light rounded-5 text-info" href="#">Lorem ipsum</a>
    
    </div>
    </div>
</div>

  </div>

</section>


<section>

  <div class="container-fluid">

    <div class="container">
      <div class="text-center buns_mrkt">
        <h2 class="text-capitalize">Business and marketting</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur voluptatem voluptatum temporibus placeat tempore odit.</p>
        <a class="btn text-light custom_bg_dark rounded-0 px-4  mt-2" href="#">LEARN MORE</a>
      </div>
    </div>

  </div>

</section>

<?php get_footer(); ?>