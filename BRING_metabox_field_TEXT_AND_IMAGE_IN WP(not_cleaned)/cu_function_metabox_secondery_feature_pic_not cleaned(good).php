for bring multiple feture image using wp default metabox just put this code in function.php page 
==================================================================================================






////// multiple feature image 







//init the meta box
add_action( 'after_setup_theme', 'custom_postimage_setup' );
function custom_postimage_setup(){
    add_action( 'add_meta_boxes', 'custom_postimage_meta_box' );
    add_action( 'save_post', 'custom_postimage_meta_box_save' );
}

function custom_postimage_meta_box(){
   
    //on which post types should the box appear? (post type will ned to write here)
     $post_types = array('post','page','movies','cu_your_post','your_post');

  
    foreach($post_types as $pt){
        add_meta_box('custom_postimage_meta_box',__( 'More Featured Images', 'yourdomain'),'custom_postimage_meta_box_func',$pt,'side','low');
    }
}

function custom_postimage_meta_box_func($post){

    //an array with all the images (ba meta key). The same array has to be in custom_postimage_meta_box_save($post_id) as well. (feature image field to incresing)
    $meta_keys = array('second_featured_image','third_featured_image','for_featured_image','fif_featured_image','a6_featured_image','a7_featured_image','a8_featured_image','a9_featured_image');

    foreach($meta_keys as $meta_key){
        $image_meta_val=get_post_meta( $post->ID, $meta_key, true);
        ?>
        <div class="custom_postimage_wrapper border p-2  mt-4 " id="<?php echo $meta_key; ?>_wrapper" style="margin-bottom:20px;">
        <p class="font-weight-bold">  Featured Image <?php echo ($num++) + 1; ?> </p>
       <p class="text-center" style=" font-size: 0.8rem; ">        <a class="removeimage2 p-4 text-center justify-content-center" style="cursor:pointer; display: inline-flex; color:#7c7b7b; background:#e9e9e9; display: <?php echo ($image_meta_val!=''?'none':'block'); ?>"  onclick="custom_postimage_add_image('<?php echo $meta_key; ?>');"> <?php _e('No Image Selected <br>  ClickTo Add Image ','yourdomain'); ?> </a>
</p>

            <img src="<?php echo ($image_meta_val!=''?wp_get_attachment_image_src( $image_meta_val)[0]:''); ?>" style="max-width:100%; margin:auto;z-index:9;    display: <?php echo ($image_meta_val!=''?'block':'none'); ?>" alt="">
          <div class="d-flex justify-content-center  zbgtext mt-2"> 

          <a class="addimage w-50 btn button-primary zbg-info zd-block text-white text-center rounded-0" onclick="custom_postimage_add_image('<?php echo $meta_key; ?>');"><?php _e('Add image ','yourdomain'); ?> </a> 
            <a class="removeimage w-50 button bg-dark text-center d-block z rounded-0 border-0" style="color:#fff;cursor:pointer;display: <?php echo ($image_meta_val!=''?'block':'none'); ?>" onclick="custom_postimage_remove_image('<?php echo $meta_key; ?>');"><?php _e('Remove image','yourdomain'); ?></a>
           
          </div>
         
            <input type="hidden" name="<?php echo $meta_key; ?>" id="<?php echo $meta_key; ?>" value="<?php echo $image_meta_val; ?>" />
        </div>
    <?php } ?>
    <script>
    function custom_postimage_add_image(key){

        var $wrapper = jQuery('#'+key+'_wrapper');

        custom_postimage_uploader = wp.media.frames.file_frame = wp.media({
            title: '<?php _e('select image','yourdomain'); ?>',
            button: {
                text: '<?php _e('select image','yourdomain'); ?>'
            },
            multiple: false
        });
        custom_postimage_uploader.on('select', function() {

            var attachment = custom_postimage_uploader.state().get('selection').first().toJSON();
            var img_url = attachment['url'];
            var img_id = attachment['id'];
            $wrapper.find('input#'+key).val(img_id);
            $wrapper.find('img').attr('src',img_url);
            $wrapper.find('img').show();
            $wrapper.find('a.removeimage').show();
            $wrapper.find('a.removeimage2').hide();
        });
        custom_postimage_uploader.on('open', function(){
            var selection = custom_postimage_uploader.state().get('selection');
            var selected = $wrapper.find('input#'+key).val();
            if(selected){
                selection.add(wp.media.attachment(selected));
            }
        });
        custom_postimage_uploader.open();
        return false;
    }

    function custom_postimage_remove_image(key){
        var $wrapper = jQuery('#'+key+'_wrapper');
        $wrapper.find('input#'+key).val('');
        $wrapper.find('img').hide();
        $wrapper.find('a.removeimage').hide();
        $wrapper.find('a.removeimage2').show();
        return false;
    }
    </script>
    <?php
    wp_nonce_field( 'custom_postimage_meta_box', 'custom_postimage_meta_box_nonce' );
}

function custom_postimage_meta_box_save($post_id){

    if ( ! current_user_can( 'edit_posts', $post_id ) ){ return 'not permitted'; }

    if (isset( $_POST['custom_postimage_meta_box_nonce'] ) && wp_verify_nonce($_POST['custom_postimage_meta_box_nonce'],'custom_postimage_meta_box' )){

        //same array as in custom_postimage_meta_box_func($post)  (to save incresed feature image field  )
        $meta_keys = array('second_featured_image','third_featured_image','for_featured_image','fif_featured_image','a6_featured_image','a7_featured_image','a8_featured_image','a9_featured_image');
        foreach($meta_keys as $meta_key){
            if(isset($_POST[$meta_key]) && intval($_POST[$meta_key])!=''){
                update_post_meta( $post_id, $meta_key, intval($_POST[$meta_key]));
            }else{
                update_post_meta( $post_id, $meta_key, '');
            }
        }
    }
}



//// add css for admin page style

add_action('admin_head', 'cu_my_cc_custom_ccfonts');

function cu_my_cc_custom_ccfonts() {
  echo '<style>
  



.zbgtext {
    position: relative;
    zmin-height:185px;
}

.removeimage2 {
    display:flex;
    
   
  
    
 
    
}

  </style>';
}





BELOW IS THE HTML  PART TO SHOW IN FRONTEND BROWSER
====================================================
GET DIRECT IMAGE TAG
-------------------

<h1>  this is page content here 33333333</h1>
<h1> secondary feature image</h1>

<?php echo wp_get_attachment_image(get_post_meta(get_the_ID(), 'second_featured_image', true),'full'); ?>
<?php echo wp_get_attachment_image(get_post_meta(get_the_ID(), 'third_featured_image', true),'full'); ?>
<?php echo wp_get_attachment_image(get_post_meta(get_the_ID(), 'for_featured_image', true),'full'); ?>
<?php echo wp_get_attachment_image(get_post_meta(get_the_ID(), 'fif_featured_image', true),'full'); ?>            
            <br>
<h1 class="text-danger ">meta box test 33333333333333333   33333333333</h1>


OR GET INSIDE IMAGE SRC USE BELOW CODE 
======================================



<h2> h h2 h2 h2</h2>

<?php $backgroundImg = wp_get_attachment_image_src(get_post_meta(get_the_ID(), 'fif_featured_image', true), 'full' );?>

<img src="<?php echo $backgroundImg[0]; ?>">
<br>
<br>
<h2> h h2 h2 h2</h2>