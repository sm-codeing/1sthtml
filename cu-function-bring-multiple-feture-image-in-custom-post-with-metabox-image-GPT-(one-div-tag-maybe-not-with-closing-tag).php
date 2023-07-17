

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
        'Additional Thumbnails',
        'render_custom_thumbnail_metabox',
        'custom_post_type',
        'normal',
        'high'
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

    echo '<table>';
    for ( $i = 0; $i < 5; $i++ ) {
        echo '<tr>';
        echo '<td><label for="custom_thumbnail_' . $i . '">Thumbnail ' . ( $i + 1 ) . ':</label></td>';
        echo '<td>';
        echo '<div class="custom_thumbnail_preview" style="margin-bottom: 10px;">';
        if ( ! empty( $custom_thumbnails[ $i ] ) ) {
            echo '<img src="' . esc_attr( $custom_thumbnails[ $i ] ) . '" style="max-width: 100px; height: auto;" />';
        }
        echo '</div>';
        echo '<input type="hidden" class="custom_thumbnail_input" id="custom_thumbnail_' . $i . '" name="custom_thumbnails[]" value="' . esc_attr( $custom_thumbnails[ $i ] ) . '" />';
        echo '<div class="custom_thumbnail_buttons">';
        echo '<input type="button" class="custom_thumbnail_upload_button button" data-target="custom_thumbnail_' . $i . '" value="Upload Image" />';
        if ( ! empty( $custom_thumbnails[ $i ] ) ) {
            echo '<input type="button" class="custom_thumbnail_remove_button button" data-target="custom_thumbnail_' . $i . '" value="Remove Image" />';
            echo '<input type="button" class="custom_thumbnail_delete_button button" data-target="custom_thumbnail_' . $i . '" value="Delete Thumbnail Image" />';
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
                    $('#' + target).closest('td').find('.custom_thumbnail_preview').html('<img src="' + attachment.url + '" style="max-width: 100px; height: auto;" />');
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





////// below is the html part for above custom post type
////  =========================================================





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
