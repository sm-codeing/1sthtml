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



<div class="extra_sticky_and_footer_logo dynamic">

<?php
// Initialize a variable to track the number of extra logos
$number_of_extra_logos = 0;

// Loop through each potential extra logo until one is not found
while ($extra_logo = get_theme_mod("extra_logo_" . ($number_of_extra_logos + 1))) {
    ?>
    <img class="img-fluid" src="<?php echo esc_url($extra_logo); ?>" alt="Extra Logo <?php echo $number_of_extra_logos + 1; ?>">
    <?php

    // Increment the counter for the next extra logo
    $number_of_extra_logos++;
}

// Check if any extra logos were found
if ($number_of_extra_logos === 0) {
    echo "No extra logos found.";
}
?>

  <h2>extra_sticky_and_footer_logo below dynamic</h2>
  <?php
// Assuming you have set the number of extra logos available
$number_of_extra_logos = 3;

// Loop through each extra logo
for ($i = 1; $i <= $number_of_extra_logos; $i++) {
    $extra_logo = get_theme_mod("extra_logo_$i");

    // Check if the extra logo is set and not empty
    if ($extra_logo) {
        ?>
        <img class="img-fluid" src="<?php echo esc_url($extra_logo); ?>" alt="Extra Logo <?php echo $i; ?>">
        <?php
    }
}
?>

</div>
<div class="extra_sticky_and_footer_logo">
  <h2>extra_sticky_and_footer_logo below</h2>
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
                <div class="extra-logos w-25">
                <?php if ($extra_logo_3 = get_theme_mod('extra_logo_3')) : ?>
                        <img  class="img-fluid" src="<?php echo esc_url($extra_logo_3); ?>" alt="Extra Logo 2">
                    <?php endif; ?>
                </div>
    </div>
</div>

<h1> this is About page page 24 content here <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
<div class="cc">
    <h3>custom_posts_logo below is in loop </h3>






    <div class="cntnr">




        <div class="cntnr2 row">
            <div id="carouselExampleCaptions" class="carousel slide">

                <style>
                .ccntnr {
                    border: 2px solid red;
                }

                .carousel-item img {
                    height: 200px;
                    width: 100%;
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
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>



    <div class="cslider " >










    



    <h1>test title AAAA</h1>

        <div id="cu_carouselExampleCaptions" class="carousel slide">
            <!-- <div class="carousel-indicators">
                <button type="button" data-bs-target="#cu_carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#cu_carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#cu_carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div> -->
            <div class="carousel-inner">


              

            <?php
$portfolioloop1 = new WP_Query(array('post_type' => 'custom_post_type', 'category_name' => 'mtbx_section', 'order' => 'ASC'));
$first_slide = true; // Variable to track the first iteration
$indicator_counter = 0; // Counter for carousel indicators
?>

<div id="Acu_carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">

        <?php while ($portfolioloop1->have_posts()) : $portfolioloop1->the_post(); ?>
            <?php
            $full_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');

            // Get the custom thumbnails
            $custom_thumbnails = get_post_meta(get_the_ID(), 'custom_thumbnails', true);
            $custom_thumbnails = !empty($custom_thumbnails) ? array_map('esc_attr', $custom_thumbnails) : array('', '', '', ''); // Initialize with empty values
            ?>

            <div class="carousel-item <?php echo $first_slide ? 'active' : ''; ?>">
                <img src="<?php echo $full_image_url[0]; ?>" class="d-block img-fluid" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1><?php echo get_the_title(); ?></h1>
                    <h2><?php echo get_the_content(); ?></h2>
                    <p>Some representative placeholder content for the slide.</p>
                </div>
            </div>

            <?php
            // Increment the indicator counter
            $indicator_counter++;
            // Set $first_slide to false after the first iteration
            $first_slide = false;
            ?>

        <?php endwhile; ?>

    </div>

    <div class="carousel-indicators">
        <?php
        // Reset the counter before generating indicators
        $indicator_counter = 0;
        while ($portfolioloop1->have_posts()) : $portfolioloop1->the_post();
        ?>
            <button type="button" data-bs-target="#Acu_carouselExampleCaptions" data-bs-slide-to="<?php echo $indicator_counter; ?>"
                class="<?php echo $indicator_counter === 0 ? 'active' : ''; ?>" aria-label="Slide <?php echo $indicator_counter + 1; ?>"></button>
            <?php
            $indicator_counter++;
        endwhile;
        ?>
    </div>
</div>

<?php wp_reset_postdata(); ?>
<?php wp_reset_query(); ?>


            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#Acu_carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#Acu_carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

        
        </div>





        <h1>test title end AAAA</h1>
    </div>      <!--cslider  end  -->

  
  <div class="cslider  2222">










    



    <h1>test title BBBB</h1>

        <div id="Bcu_carouselExampleCaptions" class="carousel slide">
            <!-- <div class="carousel-indicators">
                <button type="button" data-bs-target="#cu_carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#cu_carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#cu_carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div> -->
            <div class="carousel-inner">

            <?php
$taxonomy_term = 'your_taxonomy_term'; // Replace with your actual taxonomy term
$category_slug = 'mtbx_section'; // Replace with your actual category slug

$portfolioloop1 = new WP_Query(array(
    'post_type'      => 'custom_post_type',
    'tax_query'      => array(
        array(
            'taxonomy' => 'my_other_section', // Replace with your actual taxonomy slug
            'field'    => 'slug',
            'terms'    => $taxonomy_term,
        ),
    ),
    'category_name'  => $category_slug,
    'order'          => 'ASC',
));

$first_slide = true; // Variable to track the first iteration
$indicator_counter = 0; // Counter for carousel indicators
?>

<div id="Bcu_carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">

        <?php while ($portfolioloop1->have_posts()) : $portfolioloop1->the_post(); ?>
            <?php
            $full_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');

            // Get the custom thumbnails
            $custom_thumbnails = get_post_meta(get_the_ID(), 'custom_thumbnails', true);
            $custom_thumbnails = !empty($custom_thumbnails) ? array_map('esc_attr', $custom_thumbnails) : array('', '', '', ''); // Initialize with empty values
            ?>

            <div class="carousel-item <?php echo $first_slide ? 'active' : ''; ?>">
                <img src="<?php echo $full_image_url[0]; ?>" class="d-block img-fluid" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1><?php echo get_the_title(); ?></h1>
                    <h2><?php echo get_the_content(); ?></h2>
                    <p>Some representative placeholder content for the slide.</p>
                </div>
            </div>

            <?php
            // Increment the indicator counter
            $indicator_counter++;
            // Set $first_slide to false after the first iteration
            $first_slide = false;
            ?>

        <?php endwhile; ?>

    </div>

    <div class="carousel-indicators">
        <?php
        // Reset the counter before generating indicators
        $indicator_counter = 0;
        while ($portfolioloop1->have_posts()) : $portfolioloop1->the_post();
        ?>
            <button type="button" data-bs-target="#Bcu_carouselExampleCaptions" data-bs-slide-to="<?php echo $indicator_counter; ?>"
                class="<?php echo $indicator_counter === 0 ? 'active' : ''; ?>" aria-label="Slide <?php echo $indicator_counter + 1; ?>"></button>
            <?php
            $indicator_counter++;
        endwhile;
        ?>
    </div>
</div>

<?php wp_reset_postdata(); ?>
<?php wp_reset_query(); ?>


            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#Bcu_carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#Bcu_carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

        
        </div>





        <h1>test title end BBBB</h1>
    </div>      <!--cslider  end  -->

  


<!-- my cpt  start  -->  






<h2> mycpt start</h2>
<?php
// Replace 'your_service_term' with your actual service term slug
$taxonomy_term = 'your_service_term';

// Query arguments
$args = array(
    'post_type'      => 'mycpt_second',
    'posts_per_page' => -1, // Retrieve all posts
    'tax_query'      => array(
        array(
            'taxonomy' => 'service_second',
            'field'    => 'slug',
            'terms'    => $taxonomy_term,
        ),
    ),
);

// Custom query
$custom_query = new WP_Query($args);

// Check if there are posts
if ($custom_query->have_posts()) :
    while ($custom_query->have_posts()) : $custom_query->the_post();
        // Your loop content here
        ?>
        <h2><?php the_title(); ?></h2>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
        <?php
    endwhile;
    // Restore original post data
    wp_reset_postdata();
else :
    // No posts found
    echo '<p>No posts found</p>';
endif;
?>


<h2> mycpt end</h2>
<h2> mycpt second start</h2>
<?php
// Replace 'your_service_term' and 'your_category_slug' with your actual service term slug and category slug
$taxonomy_term = 'your_service_term';
$category_slug = 'your_category_slug';

// Query arguments
$args = array('post_type' => 'mycpt_second', 'posts_per_page' => -1, 'tax_query' => array( 'relation' => 'AND', 
        array('taxonomy' => 'service_second','field' => 'slug','terms' => $taxonomy_term,
        ),
    ),
    'category_name'  => $category_slug,
);

// Custom query
$custom_query = new WP_Query($args);

// Check if there are posts
if ($custom_query->have_posts()) :
    while ($custom_query->have_posts()) : $custom_query->the_post();
        // Your loop content here
        ?>
        <h2><?php the_title(); ?></h2>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
        <?php
    endwhile;
    // Restore original post data
    wp_reset_postdata();
else :
    // No posts found
    echo '<p>No posts found</p>';
endif;
?>




<h2> mycpt second end</h2>
<h2> mycpt 3rd start </h2>
<?php
// Replace 'your_service_term' and 'your_category_slug' with your actual service term slug and category slug
$taxonomy_term = 'my_ser';
$category_slug = '';

// Query arguments
$args = array('post_type' => 'mycpt_second', 'posts_per_page' => -1, 'tax_query' => array( 'relation' => 'AND', 
        array('taxonomy' => 'service_second','field' => 'slug','terms' => $taxonomy_term,
        ),
    ),
    'category_name'  => $category_slug,
);

// Custom query
$custom_query = new WP_Query($args);

// Check if there are posts
if ($custom_query->have_posts()) :
    while ($custom_query->have_posts()) : $custom_query->the_post();
        // Your loop content here
        ?>
        <h2><?php the_title(); ?></h2>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
        <?php
    endwhile;
    // Restore original post data
    wp_reset_postdata();
else :
    // No posts found
    echo '<p>No posts found</p>';
endif;
?>




<h2> mycpt 3rd end</h2>






    <section>

        <div class="container-fluid p-0">

            <div class="d-sm-flex text_bbx">
                <div class="custom_bg_dark d-flex justify-content-center align-items-center zpx-5">
                    <div class="cntnt text-light text-center ">
                        <h4 class="text-capitalize">Quality Product</h4>
                        <p class="zbrk_lne">Lorem ipsum dolor, sit amet consecteur elit ipsum
                            libero adipisicing elit. Quae, libero adipisicing.
                            libero adipisicing elit Quae, libero adipisicing elit. Quae, libe
                            elit Quae, libero adipisicing elit
                        </p>
                    </div>

                </div>
                <div class="custom_bg_info_light d-flex justify-content-center align-items-center ">
                    <div class="cntnt text-light text-center ">
                        <h4 class="text-capitalize">custom strategy</h4>
                        <p class="zbrk_lne">Lorem ipsum dolor, sit amet consecteur elit ipsum
                            libero adipisicing elit. Quae, libero adipisicing.
                            libero adipisicing elit Quae, libero adipisicing elit. Quae, libe
                            elit Quae, libero adipisicing elit
                        </p>
                    </div>

                </div>
                <div class="dark_custom_bg_info d-flex justify-content-center align-items-center ">
                    <div class="cntnt text-light text-center ">
                        <h4 class="text-capitalize">copetetive price</h4>

                        <p class="zbrk_lne">Lorem ipsum dolor, sit amet consecteur elit ipsum
                            libero adipisicing elit. Quae, libero adipisicing.
                            libero adipisicing elit Quae, libero adipisicing elit. Quae, libe
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
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam excepturi ratione, obcaecati
                        fugiat sint consequatur voluptate expedita perspiciatis eaque, corporis labore distinctio
                        veritatis maxime deserunt explicabo numquam perferendis maiores voluptatem debitis eligendi,
                        minus libero atque facere officia? Beatae nisi sint odit vel officia, nihil nam?</p>

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

                        <div class="col-12 col-md-6">
                            <img class="img-fluid pic_abt_nxt" src="./images/abt11.png">
                        </div>
                        <div class="col-12 col-md-6 cont_abt  custom_bg_info_light text-light  zas_item"
                            data-aos="example-anim1">
                            <h2 class="brk_lne text-capitalize"> doing the right
                                thing at right
                                time</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Quaerat explicabo hic quos maxime inventore unde quis cumque
                                quas iure labore.</p>

                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus hic corporis,
                                expedita exercitationem minima nesciunt architecto laboriosam reprehenderit facere odit
                                ab, tenetur vel! Neque laboriosam suscipit molestias voluptatibus obcaecati? Earum aut a
                                deleniti ullam quae.</p>

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
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam excepturi ratione, obcaecati
                            fugiat sint
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
                        <p>Lorem obcaecati fugiat sint consequatur voluptate expedita perspiciatis excepturi ratione
                            amet consectetur adipisicing elit.
                        </p>

                    </div>
                    <div class="cc py-5 px-5 col-12 col-md-4">
                        <!-- <img class="img-fluid" src="./images/fb.png"> -->
                        <div class=" d-flex justify-content-center">
                            <i class="fa fa-desktop" aria-hidden="true"></i>

                        </div>


                        <h5>Lorem ipsum service!</h5>
                        <p>Lorem obcaecati fugiat sint consequatur voluptate expedita perspiciatis excepturi ratione
                            amet consectetur adipisicing elit.
                        </p>

                    </div>
                    <div class="cc py-5 px-5 col-12 col-md-4">
                        <div class=" d-flex justify-content-center">
                            <i class="fa fa-desktop" aria-hidden="true"></i>

                        </div>

                        <h5>Lorem ipsum service!</h5>
                        <p>Lorem obcaecati fugiat sint consequatur voluptate expedita perspiciatis excepturi ratione
                            amet consectetur adipisicing elit.
                        </p>

                    </div>

                    <div class="cc pt-0  py-5 px-5 col-12 col-md-4">
                        <div class=" d-flex justify-content-center">
                            <i class="fa fa-desktop" aria-hidden="true"></i>

                        </div>

                        <h5>Lorem ipsum service!</h5>
                        <p>Lorem obcaecati fugiat sint consequatur voluptate expedita perspiciatis excepturi ratione
                            amet consectetur adipisicing elit.
                        </p>

                    </div>

                    <div class="cc pt-0  py-5 px-5 col-12 col-md-4">
                        <div class=" d-flex justify-content-center">
                            <i class="fa fa-desktop" aria-hidden="true"></i>

                        </div>

                        <h5>Lorem ipsum service!</h5>
                        <p>Lorem obcaecati fugiat sint consequatur voluptate expedita perspiciatis excepturi ratione
                            amet consectetur adipisicing elit.
                        </p>

                    </div>

                    <div class="cc pt-0 py-5 px-5 col-12 col-md-4">
                        <div class=" d-flex justify-content-center">
                            <i class="fa fa-desktop" aria-hidden="true"></i>

                        </div>

                        <h5>Lorem ipsum service!</h5>
                        <p>Lorem obcaecati fugiat sint consequatur voluptate expedita perspiciatis excepturi ratione
                            amet consectetur adipisicing elit.
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

                        <div class="col-12 col-md-6 cont_abt bg_gry ztext-light" data-aos="example-anim1">
                            <h2 class="brk_lne"> We engage positive
                                communication </h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Quaerat explicabo hic quos maxime inventore unde quis cumque
                                quas iure labore.</p>

                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus hic corporis,
                                expedita exercitationem minima nesciunt architecto laboriosam reprehenderit facere odit
                                ab, tenetur vel! Neque laboriosam suscipit molestias voluptatibus obcaecati? Earum aut a
                                deleniti ullam quae.</p>

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
                        <p class="brk_lne">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem possimus iusto
                            sapiente, et illum praesentium ea? Dicta
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
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur voluptatem voluptatum
                        temporibus placeat tempore odit.</p>
                    <a class="btn text-light custom_bg_dark rounded-0 px-4  mt-2" href="#">LEARN MORE</a>
                </div>
            </div>

        </div>

    </section>

    <?php get_footer(); ?>