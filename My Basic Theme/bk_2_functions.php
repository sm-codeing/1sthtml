<?php
function my_basic_theme_setup() {
    add_theme_support('menus');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails'); // Add support for post thumbnails
    // add_image_size('custom_size_1', 300, 200, true); // Adjust size and crop as needed
    // add_image_size('custom_size_2', 400, 300, true); // Adjust size and crop as needed

    add_theme_support('custom-header', array(
        'default-image'      => '',
        'default-text-color' => '000',
        'width'              => 100,
        'height'             => 100,
        'flex-width'         => true,
        'flex-height'        => true,
    ));

    add_customizer_options();
    add_customizer_options2();
    add_customizer_options3();
    carousel_cont_field();
    // carousel_cont_field2();
    register_nav_menu('main-menu', __('Main Menu', 'my-basic-theme'));
    wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css', array(), '5.3.0');
    wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js', array('jquery'), '5.3.0', true);
    wp_enqueue_style('my-basic-theme-style', get_stylesheet_uri());
}
add_action('after_setup_theme', 'my_basic_theme_setup');

// Add extra logos to the Customizer
function my_basic_theme_customize_register($wp_customize) {
    $wp_customize->add_section('extra_logos_section', array(
        'title'    => __('Extra Logos For Sticky & Footer', 'my-basic-theme'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('extra_logo_1', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'extra_logo_1', array(
        'label'    => __('Extra Logo 1(Sticky)', 'my-basic-theme'),
        'section'  => 'extra_logos_section',
        'settings' => 'extra_logo_1',
    )));

    $wp_customize->add_setting('extra_logo_2', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'extra_logo_2', array(
        'label'    => __('Extra Logo 2(Footer)', 'my-basic-theme'),
        'section'  => 'extra_logos_section',
        'settings' => 'extra_logo_2',
    )));
}
add_action('customize_register', 'my_basic_theme_customize_register');






// Outher logo option

function add_customizer_options() {
    add_action('customize_register', function($wp_customize) {
        $wp_customize->add_section('other_logos_section', array(
            'title'    => __('Other Logos', 'my-basic-theme'),
            'priority' => 30,
        ));

        $wp_customize->add_setting('other_logo_1', array(
            'default' => '',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'other_logo_1', array(
            'label'    => __('Other Logo 1', 'my-basic-theme'),
            'section'  => 'other_logos_section',
            'settings' => 'other_logo_1',
        )));

        $wp_customize->add_setting('other_logo_2', array(
            'default' => '',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'other_logo_2', array(
            'label'    => __('Other Logo 2', 'my-basic-theme'),
            'section'  => 'other_logos_section',
            'settings' => 'other_logo_2',
        )));
    });
}


// try for my custom post extra 6 logo in loop


function add_customizer_options2() {
    add_action('customize_register', function($wp_customize) {
        // Existing code for main theme logos

        // New section for Custom Posts logos
        $wp_customize->add_section('custom_posts_logos_section', array(
            'title'    => __('Custom Posts Logos', 'my-basic-theme'),
            'priority' => 40, // Adjust priority as needed
        ));

        for ($i = 1; $i <= 6; $i++) {
            $wp_customize->add_setting("custom_posts_logo_$i", array(
                'default'   => '',
                'transport' => 'refresh',
            ));

            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "custom_posts_logo_$i", array(
                'label'    => __("Custom Post Logo $i", 'my-basic-theme'),
                'section'  => 'custom_posts_logos_section',
                'settings' => "custom_posts_logo_$i",
            )));
        }
    });
}


// menu 
// function my_basic_theme_setup() {
//     add_theme_support('menus');
//     add_theme_support('custom-logo'); // Add support for custom logos
//     register_nav_menu('main-menu', __('Main Menu', 'my-basic-theme'));
//     wp_enqueue_style('my-basic-theme-style', get_stylesheet_uri());
// }
// add_action('after_setup_theme', 'my_basic_theme_setup');



wp_enqueue_style( 'sty1', get_template_directory_uri() . '/assets/css/bootstrap_v5.min.css');

wp_enqueue_style( 'sty2', get_template_directory_uri() . '/assets/css/st_2.css');

wp_enqueue_style( 'sty3', get_template_directory_uri() . '/assets/css/stsheet.css');

wp_enqueue_style( 'sty4', get_template_directory_uri() . '/assets/css/aos.css');

wp_enqueue_style( 'sty5', get_template_directory_uri() . '/assets/css/style.css');

wp_enqueue_style( 'sty6', get_template_directory_uri() . '/assets/css/st_6.css');


//include('cu_function.php');


////  for adding or link js files in head and also move all js to footer 


function add_this_script_footer(){ 


	wp_enqueue_script( 'scpt2', get_template_directory_uri() . '/assets/js/jquery.js');

	wp_enqueue_script( 'scpt3', get_template_directory_uri() . '/assets/js/jquery_v1.12.0.min.js');
	wp_enqueue_script( 'scpt1', get_template_directory_uri() . '/assets/js/bootstrap_v5.min.js');


	wp_enqueue_script( 'scpt4', get_template_directory_uri() . '/assets/js/aos.js');

	wp_enqueue_script( 'scpt5', get_template_directory_uri() . '/assets/js/custom.js');

	wp_enqueue_script( 'scpt6', get_template_directory_uri() . '/assets/js/cstm_6.js');

	wp_enqueue_script( 'scpt7', get_template_directory_uri() . '/assets/js/cstm_7.js');

	wp_enqueue_script( 'scpt8', get_template_directory_uri() . '/assets/js/cstm_8.js');




    








 } 

add_action('wp_footer', 'add_this_script_footer'); 


function add_link_atts($atts) {
    $atts['class'] = "menu_item nav-link slide-horizontal";
    return $atts;
  }
  add_filter( 'nav_menu_link_attributes', 'add_link_atts');
       





 





  

// put this below code in function.php

// Register custom post type with multiple thumbnail support
function create_custom_post_type() {
    $labels = array(
        'name'               => 'Custom Posts',
        'singular_name'      => 'Custom Post',
        'menu_name'          => 'Custom Posts',
        'name_admin_bar'     => 'Custom Post',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Custom Post',
        'new_item'           => 'New Custom Post',
        'edit_item'          => 'Edit Custom Post',
        'view_item'          => 'View Custom Post',
        'all_items'          => 'All Custom Posts',
        'search_items'       => 'Search Custom Posts',
        'parent_item_colon'  => 'Parent Custom Posts:',
        'not_found'          => 'No custom posts found.',
        'not_found_in_trash' => 'No custom posts found in Trash.',
    );

    $args = array(
        'labels'              => $labels,
		'taxonomies' => array('category', 'post_tag'),
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'custom-post' ),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => null,
        'supports'            => array( 'title',  'excerpt',  'custom-fields', 'editor', 'thumbnail' ),
        'register_meta_box_cb' => 'add_custom_thumbnail_metabox',
    );

    register_post_type( 'custom_post_type', $args );
}
add_action( 'init', 'create_custom_post_type' );






// Add custom metabox for additional thumbnails
function add_custom_thumbnail_metabox() {
    add_meta_box(
        'custom_thumbnail_metabox',
        'Additional Featured image',
        'render_custom_thumbnail_metabox',
        'custom_post_type',
        // 'normal',
        // 'high', // you can Set a numerical priority here (lower number means higher priority)
        'side',
        'low'
        
    );
}

// Render the custom metabox for additional thumbnails
function render_custom_thumbnail_metabox() {
    global $post;

    $custom_thumbnails = get_post_meta( $post->ID, 'custom_thumbnails', true );
    if ( empty( $custom_thumbnails ) ) {
        $custom_thumbnails = array( '', '', '', '', ''  ); // Initialize with empty values
    }

    wp_nonce_field( 'custom_thumbnail_metabox', 'custom_thumbnail_metabox_nonce' );

    echo '<table class="thmb_cnt">';
    for ( $i = 0; $i < 5; $i++ ) {
        echo '<tr>';
        echo '<td><label for="custom_thumbnail_' . $i . '">Additional Featured image ' . ( $i + 1 ) . ':</label></td>';
        echo '<td>';
        echo '<div class="custom_thumbnail_preview" style="margin-bottom: 10px; max-height: 300px; overflow:hidden;">';
        if ( ! empty( $custom_thumbnails[ $i ] ) ) {
            echo '<img src="' . esc_attr( $custom_thumbnails[ $i ] ) . '" style="max-width: 100%; max-height: 300px;" />';
        }
        echo '</div>';
        echo '<input type="hidden" class="custom_thumbnail_input" id="custom_thumbnail_' . $i . '" name="custom_thumbnails[]" value="' . esc_attr( $custom_thumbnails[ $i ] ) . '" />';
        echo '<div class="custom_thumbnail_buttons">';
        echo '<input type="button" class="custom_thumbnail_upload_button button" data-target="custom_thumbnail_' . $i . '" value="Upload Image" />';
        if ( ! empty( $custom_thumbnails[ $i ] ) ) {
            echo '<input type="button" class="custom_thumbnail_remove_button button" data-target="custom_thumbnail_' . $i . '" value="Remove Image" />';
            echo '<input type="button" class="custom_thumbnail_delete_button button" data-target="custom_thumbnail_' . $i . '" value="Delete  Image" />';
        }
        echo '</div>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
    ?>
    <script>
        jQuery(document).ready(function($) {
            $('.custom_thumbnail_upload_button').click(function() {
                var target = $(this).data('target');
                wp.media.editor.send.attachment = function(props, attachment) {
                    $('#' + target).val(attachment.url);
                    $('#' + target).closest('td').find('.custom_thumbnail_preview').html('<img src="' + attachment.url + '" style="max-width: 100%; height: auto;" />');
                }
                wp.media.editor.open($(this));
                return false;
            });

            $('.custom_thumbnail_remove_button').click(function() {
                var target = $(this).data('target');
                $('#' + target).val('');
                $('#' + target).closest('td').find('.custom_thumbnail_preview').empty();
                return false;
            });

            $('.custom_thumbnail_delete_button').click(function() {
                var target = $(this).data('target');
                $('#' + target).val('');
                $('#' + target).closest('td').find('.custom_thumbnail_preview').empty();
                $('#' + target).closest('td').find('.custom_thumbnail_delete_button').remove();
                return false;
            });
        });
    </script>
    <style>
    .thmb_cnt tr{
        display:flex;
        flex-flow: column;
    }
    .thmb_cnt tr td label{
        font-size: 12px;
    font-weight: 600;
    }
    .custom_thumbnail_buttons input.button {
        font-size: 11px;
        padding-inline: 4px;
        background:#2271b1;
        background:#1c2225;
        color:#fff;
    }
    </style>
    <?php
}

// Save the custom metabox data
function save_custom_thumbnail_metabox( $post_id ) {
    if ( ! isset( $_POST['custom_thumbnail_metabox_nonce'] ) || ! wp_verify_nonce( $_POST['custom_thumbnail_metabox_nonce'], 'custom_thumbnail_metabox' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    $custom_thumbnails = isset( $_POST['custom_thumbnails'] ) ? $_POST['custom_thumbnails'] : array();
    $custom_thumbnails = array_map( 'sanitize_text_field', $custom_thumbnails );
    update_post_meta( $post_id, 'custom_thumbnails', $custom_thumbnails );
}
add_action( 'save_post', 'save_custom_thumbnail_metabox' );













//// custom logooooo

function add_customizer_options3() {
    add_action('customize_register', function($wp_customize) {
        // Register other logo options
        for ($i = 1; $i <= 4; $i++) {
            $wp_customize->add_section("other_logos_section_$i", array(
                'title'    => __("Other Logo $i", 'my-basic-theme'),
                'priority' => 30,
            ));

            $wp_customize->add_setting("other_logo_$i", array(
                'default'   => '',
                'transport' => 'refresh',
            ));

            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "other_logo_$i", array(
                'label'    => __("Other Logo $i Image", 'my-basic-theme'),
                'section'  => "other_logos_section_$i",
                'settings' => "other_logo_$i",
            )));

            // Add text fields for each logo
            for ($j = 1; $j <= 3; $j++) {
                $wp_customize->add_setting("other_logo_${i}_text_${j}", array(
                    'default'   => '',
                    'transport' => 'refresh',
                ));

                $wp_customize->add_control("other_logo_${i}_text_${j}", array(
                    'label'    => __("Other Logo $i Text $j", 'my-basic-theme'),
                    'section'  => "other_logos_section_$i",
                    'settings' => "other_logo_${i}_text_${j}",
                    'type'     => 'text',
                ));
            }
        }
    });
}

function add_admin_page_for_custom_post_type() {
    add_action('admin_menu', function() {
        add_menu_page(
            'Custom Post Settings',
            'Custom Post Settings',
            'manage_options',
            'custom_post_settings',
            'custom_post_settings_page'
        );
    });
}

function custom_post_settings_page() {
    ?>
    <div class="wrap">
        <h1>Custom Post Settings</h1>
        <p>Manage settings for the Custom Posts.</p>
        <!-- Add your custom settings form or content here -->
    </div>
    <?php
}





//    carousel content field try




function carousel_cont_field() {
    add_action('customize_register', function($wp_customize) {
        // Existing code for main theme logos

        // New section for Custom Posts logos
        $wp_customize->add_section('carousel_conts_section', array(
            'title'    => __('Carousel_pic_cont_field crsl', 'my-basic-theme'),
            'priority' => 40, // Adjust priority as needed
        ));

        for ($i = 1; $i <= 6; $i++) {
            // Logo Image
            $wp_customize->add_setting("carousel_cont_$i", array(
                'default'   => '',
                'transport' => 'refresh',
            ));

            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "carousel_cont_$i", array(
                'label'    => __("Carousel_pic_cont_field crsl $i", 'my-basic-theme'),
                'section'  => 'carousel_conts_section',
                'settings' => "carousel_cont_$i",
            )));

            // Text Fields for Each Logo
            for ($j = 1; $j <= 4; $j++) {
                $wp_customize->add_setting("carousel_cont_${i}_text_${j}", array(
                    'default'   => '',
                    'transport' => 'refresh',
                ));

                $wp_customize->add_control("carousel_cont_${i}_text_${j}", array(
                    'label'    => __("Carousel_pic_cont_field crsl $i Text $j", 'my-basic-theme'),
                    'section'  => 'carousel_conts_section',
                    'settings' => "carousel_cont_${i}_text_${j}",
                    'type'     => 'text',
                ));
            }
        }
    });
}





 



// custom like feature image start try

