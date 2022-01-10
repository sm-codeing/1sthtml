<?php 

// cu_function_metabox_pic_code.php
/*
 * Function creates post duplicate as a draft and redirects then to the edit post screen
 */



 
/*
 * Function creates post duplicate as a draft and redirects then to the edit post screen
 */









//// copy the below code and paste it in  function.php to add or link or include this ------ cu_function.php ----- file in function.php file

//// include('cu_function.php');












function create_post_your_post() {
	register_post_type( 'your_post',
		array(
			'labels'       => array(
				'name'       => __( 'Your Post' ),
			),
			'public'       => true,
			'hierarchical' => true,
			'has_archive'  => true,
			'supports'     => array(
				'title',
				'editor',
				'excerpt',
				'thumbnail',
			), 
			'taxonomies'   => array(
				'post_tag',
				'category',
			)
		)
	);
	register_taxonomy_for_object_type( 'category', 'your_post' );
	register_taxonomy_for_object_type( 'post_tag', 'your_post' );
}
add_action( 'init', 'create_post_your_post' );

function add_your_fields_meta_box() {
	add_meta_box(
		'your_fields_meta_box', // $id
		'Your Fields', // $title
		'show_your_fields_meta_box', // $callback
		'your_post', // $screen
		'normal', // $context
		'high' // $priority
	);
}
add_action( 'add_meta_boxes', 'add_your_fields_meta_box' );









function show_your_fields_meta_box() {
    global $post;  
    
		$meta = get_post_meta( $post->ID, 'your_fields', true ); ?>

  <input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

  <p>
    <label for="your_fields[text]">Input Text  Field 1</label>
    <br>
    <input type="text" name="your_fields[text1]" id="your_fields1111[text1]" class="regular-text1" value="<?php if (is_array($meta) && isset($meta['text1'])) {	echo $meta['text']; } ?>">
    
 </p>

 <p>
 <label for="your_fields2[text]">Input Text  Field 2</label>
    <br>
    <input type="text" name="your_fields[text2]" id="your_fields[text2]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['text2'])) {	echo $meta['text2']; } ?>">
 </p>
 

 <p>
 <label for="your_fields2[text]">Input Text  Field 3</label>
    <br>
    <input type="text" name="your_fields[text3]" id="your_fields[text3]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['text3'])) {	echo $meta['text3']; } ?>">
 </p>

 <p>
 <label for="your_fields2[text]">Input Text  Field 4</label>
    <br>
    <input type="text" name="your_fields[text4]" id="your_fields[text4]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['text4'])) {	echo $meta['text4']; } ?>">
 </p>

 <p>
 <label for="your_fields2[text]">Input Text  Field 5</label>
    <br>
    <input type="text" name="your_fields[text5]" id="your_fields[text5]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['text5'])) {	echo $meta['text4']; } ?>">
 </p>


  <div class="pic_fild  mt-5">
  <p>
    <label for="your_fields[image]">Image 1</label><br>
    <input type="text" name="your_fields[image1]" id="your_fields[image1]" class="meta-image regular-text" value="<?php echo $meta['image1']; ?>">
    <input type="button" class="button image-upload" value="Browse">
  </p>
  <div class="image-preview"><img src="<?php echo $meta['image1']; ?>" style="max-width: 100%;"></div>

  </div>

  <div class="pic_fild  mt-5">
  <p>
    <label for="your_fields[image]">Image 2</label><br>
    <input type="text" name="your_fields[image2]" id="your_fields[image2]" class="meta-image regular-text" value="<?php echo $meta['image2']; ?>">
    <input type="button" class="button image-upload" value="Browse">
  </p>
  <div class="image-preview"><img src="<?php echo $meta['image2']; ?>" style="max-width: 100%;"></div>

  </div>
  <div class="pic_fild  mt-5">
  <p>
    <label for="your_fields[image]">Image 3</label><br>
    <input type="text" name="your_fields[image3]" id="your_fields[image3]" class="meta-image regular-text" value="<?php echo $meta['image3']; ?>">
    <input type="button" class="button image-upload" value="Browse">
  </p>
  <div class="image-preview"><img src="<?php echo $meta['image3']; ?>" style="max-width: 100%;"></div>

  </div>

  <div class="pic_fild mt-5">
  <p>
    <label for="your_fields[image]">Image 4</label><br>
    <input type="text" name="your_fields[image4]" id="your_fields[image4]" class="meta-image regular-text" value="<?php echo $meta['image4']; ?>">
    <input type="button" class="button image-upload" value="Browse">
  </p>
  <div class="image-preview"><img src="<?php echo $meta['image4']; ?>" style="max-width: 100%;"></div>

  </div>
 

  <script>
    jQuery(document).ready(function ($) {
      // Instantiates the variable that holds the media library frame.
      var meta_image_frame;
      // Runs when the image button is clicked.
      $('.image-upload').click(function (e) {
        // Get preview pane
        var meta_image_preview = $(this).parent().parent().children('.image-preview');
        // Prevents the default action from occuring.
        e.preventDefault();
        var meta_image = $(this).parent().children('.meta-image');
        // If the frame already exists, re-open it.
        if (meta_image_frame) {
          meta_image_frame.open();
          return;
        }
        // Sets up the media library frame
        meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
          title: meta_image.title,
          button: {
            text: meta_image.button
          }
        });
        // Runs when an image is selected.
        meta_image_frame.on('select', function () {
          // Grabs the attachment selection and creates a JSON representation of the model.
          var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
          // Sends the attachment URL to our custom image input field.
          meta_image.val(media_attachment.url);
          meta_image_preview.children('img').attr('src', media_attachment.url);
        });
        // Opens the media library frame.
        meta_image_frame.open();
      });
    });
  </script>

  <?php }

 function save_your_fields_meta( $post_id ) {   
	// verify nonce
	if ( isset($_POST['your_meta_box_nonce']) 
			&& !wp_verify_nonce( $_POST['your_meta_box_nonce'], basename(__FILE__) ) ) {
			return $post_id; 
		}
	// check autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}
	// check permissions
	if (isset($_POST['post_type'])) { //Fix 2
        if ( 'page' === $_POST['post_type'] ) {
            if ( !current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            } elseif ( !current_user_can( 'edit_post', $post_id ) ) {
                return $post_id;
            }  
        }
    }
	
	$old = get_post_meta( $post_id, 'your_fields', true );
		if (isset($_POST['your_fields'])) { //Fix 3
			$new = $_POST['your_fields'];
			if ( $new && $new !== $old ) {
				update_post_meta( $post_id, 'your_fields', $new );
			} elseif ( '' === $new && $old ) {
				delete_post_meta( $post_id, 'your_fields', $old );
			}
		}
}

add_action( 'save_post', 'save_your_fields_meta' );














// second posttype //////////////////////////////////







function cu_create_post_your_post() {
	register_post_type( 'cu_your_post',
		array(
			'labels'       => array(
				'name'       => __( 'cu_Your Post' ),
			),
			'public'       => true,
			'hierarchical' => true,
			'has_archive'  => true,
			'supports'     => array('title','editor',	'excerpt','thumbnail','custom-fields',	), 
			//'taxonomies'   => array('post_tag',	'category',)
        // creating category with below code
	     //'taxonomies' => array('category'),
		)
	);
	//register_taxonomy_for_object_type( 'category', 'cu_your_post' );
	//register_taxonomy_for_object_type( 'post_tag', 'cu_your_post' );
}
add_action( 'init', 'cu_create_post_your_post' );

function cu_add_your_fields_meta_box() {
	add_meta_box(
		'cu_your_fields_meta_box', // $id
		'cu_Your Fields', // $title
		'cu_show_your_fields_meta_box', // $callback
		'cu_your_post', // $screen
		'normal', // $context
		'high' // $priority
	);
}
add_action( 'add_meta_boxes', 'cu_add_your_fields_meta_box' );









function cu_show_your_fields_meta_box() {
    global $post;  
    
		$meta = get_post_meta( $post->ID, 'cu_your_fields', true ); ?>

  <input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

  <p>
    <label for="cu_your_fields[text]">Input Text Field 1</label>
    <br>
    <input type="text" name="cu_your_fields[text1]" id="your_fields1111[text1]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['text1'])) {	echo $meta['text1']; } ?>">
    
 </p>

 <p>
 <label for="your_fields2[text]">Input Text Field 2</label>
    <br>
    <input type="text" name="cu_your_fields[text2]" id="cu_your_fields[text2]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['text2'])) {	echo $meta['text2']; } ?>">
 </p>
 

 <p>
 <label for="your_fields2[text]">Input Text Field 3</label>
    <br>
    <input type="text" name="cu_your_fields[text3]" id="cu_your_fields[text3]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['text3'])) {	echo $meta['text3']; } ?>">
 </p>

 <p>
 <label for="your_fields2[text]">Input Text Field 4</label>
    <br>
    <input type="text" name="cu_your_fields[text4]" id="cu_your_fields[text4]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['text4'])) {	echo $meta['text4']; } ?>">
 </p>
 <p>
 <label for="your_fields2[text]">Input Text Field 5</label>
    <br>
    <input type="text" name="cu_your_fields[text5]" id="cu_your_fields[text5]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['text5'])) {	echo $meta['text5']; } ?>">
 </p>


  <div class="pic_fild mt-5">
  <p>
    <label for="cu_your_fields[image]">Image 1</label><br>
    <input type="text" name="cu_your_fields[image1]" id="cu_your_fields[image1]" class="meta-image regular-text" value="<?php echo $meta['image1']; ?>">
    <input type="button" class="button image-upload" value="Browse">
  </p>
  <div class="image-preview"><img src="<?php echo $meta['image1']; ?>" style="max-width: 100%;"></div>

  </div>

  <div class="pic_fild mt-5">
  <p>
    <label for="cu_your_fields[image]">Image 2</label><br>
    <input type="text" name="cu_your_fields[image2]" id="cu_your_fields[image2]" class="meta-image regular-text" value="<?php echo $meta['image2']; ?>">
    <input type="button" class="button image-upload" value="Browse">
  </p>
  <div class="image-preview"><img src="<?php echo $meta['image2']; ?>" style="max-width: 100%;"></div>

  </div>

  <div class="pic_fild mt-5">
  <p>
    <label for="cu_your_fields[image]">Image 3</label><br>
    <input type="text" name="cu_your_fields[image3]" id="cu_your_fields[image3]" class="meta-image regular-text" value="<?php echo $meta['image3']; ?>">
    <input type="button" class="button image-upload" value="Browse">
  </p>
  <div class="image-preview"><img src="<?php echo $meta['image3']; ?>" style="max-width: 100%;"></div>

  </div>

  <div class="pic_fild mt-5">
  <p>
    <label for="cu_your_fields[image]">Image 4</label><br>
    <input type="text" name="cu_your_fields[image4]" id="cu_your_fields[image4]" class="meta-image regular-text" value="<?php echo $meta['image4']; ?>">
    <input type="button" class="button image-upload" value="Browse">
  </p>
  <div class="image-preview"><img src="<?php echo $meta['image4']; ?>" style="max-width: 100%;"></div>
  <input type="button" name="cu_your_fields[image4]" value="<?php esc_html_e( 'Remove Image', 'image4' ); ?>" class="button remove_image_button">

  </div>


 

  <script>
    jQuery(document).ready(function ($) {
      // Instantiates the variable that holds the media library frame.
      var meta_image_frame;
      // Runs when the image button is clicked.
      $('.image-upload').click(function (e) {
        // Get preview pane
        var meta_image_preview = $(this).parent().parent().children('.image-preview');
        // Prevents the default action from occuring.
        e.preventDefault();
        var meta_image = $(this).parent().children('.meta-image');
        // If the frame already exists, re-open it.
        if (meta_image_frame) {
          meta_image_frame.open();
          return;
        }
        // Sets up the media library frame
        meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
          title: meta_image.title,
          button: {
            text: meta_image.button
          }
        });
        // Runs when an image is selected.
        meta_image_frame.on('select', function () {
          // Grabs the attachment selection and creates a JSON representation of the model.
          var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
          // Sends the attachment URL to our custom image input field.
          meta_image.val(media_attachment.url);
          meta_image_preview.children('img').attr('src', media_attachment.url);
        });
        // Opens the media library frame.
        meta_image_frame.open();
      });
    });
  </script>

  <?php }

 function cu_save_your_fields_meta( $post_id ) {   
	// verify nonce
	if ( isset($_POST['your_meta_box_nonce']) 
			&& !wp_verify_nonce( $_POST['your_meta_box_nonce'], basename(__FILE__) ) ) {
			return $post_id; 
		}
	// check autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}
	// check permissions
	if (isset($_POST['post_type'])) { //Fix 2
        if ( 'page' === $_POST['post_type'] ) {
            if ( !current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            } elseif ( !current_user_can( 'edit_post', $post_id ) ) {
                return $post_id;
            }  
        }
    }
	
	$old = get_post_meta( $post_id, 'cu_your_fields', true );
		if (isset($_POST['cu_your_fields'])) { //Fix 3
			$new = $_POST['cu_your_fields'];
			if ( $new && $new !== $old ) {
				update_post_meta( $post_id, 'cu_your_fields', $new );
			} elseif ( '' === $new && $old ) {
				delete_post_meta( $post_id, 'cu_your_fields', $old );
			}
		}
}

add_action( 'save_post', 'cu_save_your_fields_meta' );




















//////////////////////////include('cu_function_metabox_secondery_feature_pic.php');


//// add css for admin page style

add_action('admin_head', 'cu_my_custom_ccfonts');

function cu_my_custom_ccfonts() {
  echo '<style>
  
.meta-image{
  zheight:200px;
  zdisplay:none;
}

.image-preview{
  min-height:10px;
  padding:10px;
  background:#ccc;
  max-width:250px;
  zmax-height:250px;
}
  </style>';
}





