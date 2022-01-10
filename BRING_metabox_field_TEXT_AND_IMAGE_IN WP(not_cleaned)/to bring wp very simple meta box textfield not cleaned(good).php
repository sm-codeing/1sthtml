to bring wp very simple meta box textfield only put this code to  function.php page only 
========================================================================================


//Add Custom Metabox
function diwp_custom_metabox(){
 
    add_meta_box( 'diwp-metabox', 'My Custom Metabox','diwp_custom_metabox_callback', 'movies', "normal", 'high', null );	
	//'normal', // $context
	//'high' // $priority
    add_meta_box( 'diwp-metabox', 'My Custom Metabox','diwp_custom_metabox_callback', 'post', "side",  null );
    add_meta_box( 'diwp-metabox', 'My Custom Metabox','diwp_custom_metabox_callback', 'products2', "normal",  null );
    add_meta_box( 'diwp-metabox', 'My Custom Metabox','diwp_custom_metabox_callback', 'your_post', "normal",  null );
    add_meta_box( 'diwp-metabox', 'My Custom Metabox','diwp_custom_metabox_callback', 'cu_your_post', "normal",  null );
  //add_meta_box("demo-meta-box", "Custom Meta Box", "custom_meta_box_markup", "post", "side",  null);
				
}
 
add_action('add_meta_boxes', 'diwp_custom_metabox');
 
 
function diwp_custom_metabox_callback(){
     
    global $post;
     
    ?>
 
 

    <div class="zrow">
		<fieldset>  
			<legend>Field-1</legend>
        
        <div class="fields">
            <textarea  class="wid_tx-100" rows="3"  type="text" name="_diwp_reading_time" value="<?php echo get_post_meta($post->ID, 'post_reading_time', true)?>"><?php echo get_post_meta($post->ID, 'post_reading_time', true)?> </textarea>
        </div>
		</fieldset>
    </div>
    <div class="zrow">
        <div class="label">Post Reading Time</div>
        <div class="fields">
            <input class="regular-text" type="text" name="_diwp_reading_time1" value="<?php echo get_post_meta($post->ID, 'post_reading_time1', true)?>"/>
        </div>
    </div>
    <div class="zrow">
        <div class="label">Post Reading Time</div>
        <div class="fields">
            <input class="regular-text" type="text" name="_diwp_reading_time2" value="<?php echo get_post_meta($post->ID, 'post_reading_time2', true)?>"/>
        </div>
    </div>
 

	<div class="pic_fild">
  <p>
    <label for="your_fields[image]">Image Upload</label><br>
    <input type="text" name="_diwp_reading_timepic" id="post_reading_timepic" class="meta-image regular-text" value="<?php echo $meta['post_reading_timepic']; ?>">
    <input type="button" class="button image-upload" value="Browse">
  </p>
  <div class="image-preview"><img src="<?php echo $meta['post_reading_timepic']; ?>" style="max-width: 250px;"></div>

  </div>





   <div class="pic_fild">
  <p>
    <label for="your_fields[image]">Image Upload</label><br>
    <input type="text" name="your_fields[image]" id="your_fields[image]" class="meta-image regular-text" value="<?php echo $meta['image']; ?>">
    <input type="button" class="button image-upload" value="Browse">
  </p>
  <div class="image-preview"><img src="<?php echo $meta['image']; ?>" style="max-width: 250px;"></div>

  </div>
    <?php
 
}



// function add_custom_meta_box()
// {
//     //add_meta_box("demo-meta-box", "Custom Meta Box", "custom_meta_box_markup", "post", "side",  null);
//     add_meta_box("demo-meta-box", "Custom Meta Box", "diwp_custom_metabox_callback", "movies", "side",  null);
// }

// add_action("add_meta_boxes", "add_custom_meta_box");
 
function diwp_save_custom_metabox(){
 
    global $post;
 
    if(isset($_POST["_diwp_reading_time"])):
         
        update_post_meta($post->ID, 'post_reading_time', $_POST["_diwp_reading_time"]);
        
     
    endif;
    
}
 
add_action('save_post', 'diwp_save_custom_metabox');

function ndiwp_save_custom_metabox(){
 
    global $post;
 
    if(isset($_POST["_diwp_reading_time1"])):
         
        update_post_meta($post->ID, 'post_reading_time1', $_POST["_diwp_reading_time1"]);
        
     
    endif;
   
}
 
add_action('save_post', 'ndiwp_save_custom_metabox');

function mndiwp_save_custom_metabox(){
 
    global $post;
 
    if(isset($_POST["_diwp_reading_time2"])):
         
        update_post_meta($post->ID, 'post_reading_time2', $_POST["_diwp_reading_time2"]);
        
     
    endif;
   
}
 
add_action('save_post', 'mndiwp_save_custom_metabox');



function picdiwp_save_custom_metabox(){
 
    global $post;
 
    if(isset($_POST["_diwp_reading_timepic"])):
         
        update_post_meta($post->ID, 'post_reading_timepic', $_POST["_diwp_reading_timepic"]);
        
     
    endif;
   
}
 
add_action('save_post', 'picdiwp_save_custom_metabox');













//// add css for admin page style

add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
  
  .wid_tx-100  {
	color:#000;
	zbackground:#eee;
	width:100% !important;
	
	 
   } 
   
   legend {
    display: block;
   width: inherit;  
    max-width: 100%;
    padding: 0px 5px 0px 5px; 
    margin-bottom: 0.2rem;
    font-size: 1.2rem;
    line-height: inherit;
    color: inherit;
    white-space: normal;
}	

fieldset {
    min-width: 0;
    padding: 10px;
    margin: 5px;
    border: 1px solid #ccc;
}


  </style>';
}










BELOW IS THE HTML PART NEED TO PUT IN TEMPLTE OR IN PAGE TO DISPLY IN FRONTEND BROWSER 
========================================================================================



<h4>
Today's Mood: <?php echo get_post_meta($post->ID, 'post_reading_time', true)?> </h4>


<h4 class="<?php echo get_post_meta($post->ID, 'post_reading_time1', true)?>">Today's Mood 2:  <?php echo get_post_meta($post->ID, 'post_reading_time', true)?>  </h4>
<h3 class="mrk_cont">
<a href="<?php echo get_post_meta($post->ID, 'post_reading_time2', true)?>">415-955-7968</a> 

</h3>