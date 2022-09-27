<?php 

// cu_green_function_metabox_pic_code.php
/*
 * Function creates post duplicate as a draft and redirects then to the edit post screen
 */



 
/*
 * Function creates post duplicate as a draft and redirects then to the edit post screen
 */









//// copy the below code and paste it in  function.php to add or link or include this ------ cu_green_function.php ----- file in function.php file

//// include('cu_green_function.php');


















// second posttype //////////////////////////////////







function cu_green_create_post_your_post() {
	register_post_type( 'cu_green_your_post',
		array(
      'labels'             => $labels,
		'menu_icon'	     => 'dashicons-star-half',
			'labels'       => array(
				'name'       => __( 'Wordpress green' ),
			),
      // creating category with below code
	    'taxonomies' => array('category'),
			'public'       => true,
			'hierarchical' => true,
			'has_archive'  => true,
			'supports'     => array('title','editor',	'excerpt','thumbnail','custom-fields',	), 
			//'taxonomies'   => array('post_tag',	'category',)
        // creating category with below code
	     //'taxonomies' => array('category'),
		)
	);
	//register_taxonomy_for_object_type( 'category', 'cu_green_your_post' );
	//register_taxonomy_for_object_type( 'post_tag', 'cu_green_your_post' );
}
add_action( 'init', 'cu_green_create_post_your_post' );

function cu_green_add_your_fields_meta_box() {
	add_meta_box(
		'cu_green_your_fields_meta_box', // $id
		'cu_green_Your Fields', // $title
		'cu_green_show_your_fields_meta_box', // $callback
		'cu_green_your_post', // $screen
		'normal', // $context
		'high' // $priority
	);
}
add_action( 'add_meta_boxes', 'cu_green_add_your_fields_meta_box' );









function cu_green_show_your_fields_meta_box() {
    global $post;  
    
		$meta = get_post_meta( $post->ID, 'cu_green_your_fields', true ); ?>




<div class="mypage-id-<?php echo $post->ID  ?>">


<p class="ful_n_fa_btn">
<button  type="button" onclick="myFunction()"> <span class="dashicons dashicons-fullscreen-alt"></span>Full with </button>

    
    <button class="fnt_btn"  target="popup" 
  onclick="window.open('https://fontawesome.com/v5/search?m=free&s=solid%2Cbrands%2Cregular','popup','max-width=600,height=600, top=500,left=500'); return false;">
    <img class="img-fluid faicon" src="<?php echo get_template_directory_uri(); ?>/assets/images/faicon.png" alt="bbbbb"> 
  </button> 
  <button type="button" onClick="openPopup();">User guide</button>

</p>

 
<div class=" for_hdr">


 
 <textarea type="text" name="cu_green_your_fields[hedr_tx]"  id="cu_green_your_fields" class="hdrtx_w100 cu_green_your_fields[hedr_tx]" value=""><?php if (is_array($meta) && isset($meta['hedr_tx'])) {	echo $meta['hedr_tx']; } ?> </textarea>
 <textarea type="text" name="cu_green_your_fields[hedr_tx1]"  id="cu_green_your_fields" class="hdrtx_w50 cu_green_your_fields[hedr_tx1]" value=""><?php if (is_array($meta) && isset($meta['hedr_tx1'])) {	echo $meta['hedr_tx1']; } ?> </textarea>
 <textarea type="text" name="cu_green_your_fields[hedr_tx2]"  id="cu_green_your_fields" class="hdrtx_w50 cu_green_your_fields[hedr_tx2]" value=""><?php if (is_array($meta) && isset($meta['hedr_tx2'])) {	echo $meta['hedr_tx2']; } ?> </textarea>
 
 
</div>
<input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">


 
 
 
 

<div class="txt_only">

  <input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

 
 
<section class="dual_pic">
<h1>
  <figure>
Number of dual image and text field to show</figure><figure> <input type="text" name="cu_green_your_fields[dual_pic_txt3]" id="cu_green_your_fields[dual_pic_txt3]" class="nactive greenqtyno tooltip-pure-css" data-tooltip-pure-css="don't dicress" value="<?php if (is_array($meta) && isset($meta['dual_pic_txt3'])) {	echo $meta['dual_pic_txt3']; } ?>">
<button  type="button" onclick="myFunction1()"> <span class="dashicons dashicons-arrow-down-alt2"></span></button>
</figure>


  </h1> 
<div  id="fld_open1" class=" fld_collapse 

<?php
$t = $meta['top_fld_view_qty_cntrl'];

if ($t === "1") {
  echo "one1";
} elseif ($t === "2") {
  echo "two2";
}  elseif ($t === "text") {
  echo "three3";
}elseif ($t === "text1") {
  echo "three3 text1";
}elseif ($t === "text2") {
  echo "three3 text2";
}elseif ($t === "text3") {
  echo "three3 text3";
}elseif ($t === "text4") {
  echo "three3 text4";
}elseif ($t === "text5") {
  echo "three3 text5";
}elseif ($t === "text6") {
  echo "three3 text6";
}elseif ($t === "text7") {
  echo "three3 text7";
}
elseif ($t === "text8") {
  echo "three3 text8";
}
elseif ($t === "img2text6") {
  echo "two2img";
}
elseif ($t === "img2text2") {
  echo "two2img img2text2";
}
elseif ($t === "img2text4") {
  echo "two2img img2text4";
}

else {
  echo "blue two2img  img2text2";
}
?>">

<div class="zd-flex"> 
<p  class="fld_type_qty">  
<!--<label >Number  of field type to show put  key... <button type="button" class="fncy_user_guide" onclick="openPopup();">User guide</button> </label>
 <br/>
  <label class="fld_info" > img2text2 / img2text4 / text / text1 / text8 / all  </label>
    <br/> --> 
  <label class="" > Select field type  </label>

      <input type="text"  list="txt_fld_num" name="cu_green_your_fields[top_fld_view_qty_cntrl]"  id="cu_green_your_fields" class="fld_numbr dtl_aro_psn cu_green_your_fields[top_fld_view_qty_cntrl]" value="<?php if (is_array($meta) && isset($meta['top_fld_view_qty_cntrl'])) {	echo $meta['top_fld_view_qty_cntrl']; } ?>">
      <datalist id="txt_fld_num">
  <option value="0">
  <option value="1">
  <option value="2">
  <option value="2img">
  <option value="img2text2">
  <option value="img2text4">
  <option value="img2text6">
  <option value="text2">
  <option value="text3">
  <option value="text4">
  <option value="text5">
  <option value="text6">
  <option value="text7">
  <option value="text8">
  <option value="all">
  <option value="">
                        
</datalist>
</p>
</div>


<div class="mult_pic_contnr dual_pic_contnr">







<div class="pic_txt zdnone zmultipic_cmn zdual_pic1  dual_pic_spcl_field">

<br/>
  

<?php

$multi_pic =   $meta['dual_pic_txt3']  ;
  for( $i=1; $i<=$multi_pic; $i++ )
 {
 
$dual_pic_spcl_field_va1 = 'dual_pic_spcl_field'. $i;
$dual_pic_spcl_field_va2 = 'dual_pic_spcl_field'. $i. 'a';
$dual_pic_spcl_field_va3 = 'dual_pic_spcl_field'. $i. 'b';
$dual_pic_spcl_field_va4 = 'dual_pic_spcl_field'. $i. 'c';
$dual_pic_spcl_field_va5 = 'dual_pic_spcl_field'. $i. 'd';
$dual_pic_spcl_field_va6 = 'dual_pic_spcl_field'. $i. 'e';
$dual_pic_spcl_field_mid = 'pxtxmyid'. $i;
 

 echo "<li class='listtype zusr_gide_cnt  zzzone11'> 




 
 Active <textarea type='text' name='cu_green_your_fields[$dual_pic_spcl_field_va1]' id='cu_green_your_fields[$dual_pic_spcl_field_va1]' class='sec$post->ID meta-image dual_pic_spcl_field_inp  smal_fld regular-text' value=''>$meta[$dual_pic_spcl_field_va1] </textarea>
 
  
 




 
Order <textarea type='text' name='cu_green_your_fields[$dual_pic_spcl_field_va2]' id='cu_green_your_fields[$dual_pic_spcl_field_va2]' class='dual_pic_spcl_field_inp  smal_fld regular-text' value=''> $meta[$dual_pic_spcl_field_va2]</textarea>
Hide <textarea type='text' name='cu_green_your_fields[$dual_pic_spcl_field_va3]' id='cu_green_your_fields[$dual_pic_spcl_field_va3]' class='dual_pic_spcl_field_inp regular-text  smal_fld' value=''> $meta[$dual_pic_spcl_field_va3]</textarea>
Uniq <textarea type='text' name='cu_green_your_fields[$dual_pic_spcl_field_va4]' id='cu_green_your_fields[$dual_pic_spcl_field_va4]' class='sec$post->ID dual_pic_spcl_field_inp regular-text' value=''> $meta[$dual_pic_spcl_field_va4]</textarea>
Outhers <textarea  type='text' name='cu_green_your_fields[$dual_pic_spcl_field_va5]' id='cu_green_your_fields[$dual_pic_spcl_field_va5]' class='sec$post->ID dual_pic_spcl_field_inp regular-text' value=''> $meta[$dual_pic_spcl_field_va5]</textarea>
Outhers1 <textarea  type='text' name='cu_green_your_fields[$dual_pic_spcl_field_va6]' id='cu_green_your_fields[$dual_pic_spcl_field_va6]' class='sec$post->ID dual_pic_spcl_field_inp regular-text' value=''> $meta[$dual_pic_spcl_field_va6]</textarea>
 

 
 </li> ";

 


 }  
 
 
 
 
?>

</div>


 
<div class="pic_txt multipic_cmn dual_pic1 ">

<br/>
  

<?php

$multi_pic =   $meta['dual_pic_txt3']  ;
  for( $i=1; $i<=$multi_pic; $i++ )
 {
 
$dual_pic_va1 = 'dual_pic'. $i;
$dual_pic_va2 = 'dual_pic'. $i. 'a';
$dual_pic_va3 = 'dual_pic'. $i. 'b';
$dual_pic_va4 = 'dual_pic'. $i. 'c';
$dual_pic_mid = 'pxtxmyid'. $i;
 

 echo "<li class='listtype usr_gide_cnt  one11'> 
  <p class='usr_gide  usr_gide_cnt'>  
  <button type='button' onClick='openPopup();'>User guide</button>
  </p>



 <input type='text' name='cu_green_your_fields[$dual_pic_va1]' id='cu_green_your_fields[$dual_pic_va1]' class='sec$post->ID meta-image pic_url regular-text' value='$meta[$dual_pic_va1]'>
 
 <input type='button' class='sec$post->ID button image-upload' value='Browse'>
 <div class='sec$post->ID image-preview'><img src=' $meta[$dual_pic_va1]' style='max-width: 100%;'></div>
  
 




 
<textarea type='text' name='cu_green_your_fields[$dual_pic_va2]' id='cu_green_your_fields[$dual_pic_va2]' class='regular-text' value=''> $meta[$dual_pic_va2]</textarea>
<textarea type='text' name='cu_green_your_fields[$dual_pic_va3]' id='cu_green_your_fields[$dual_pic_va3]' class='regular-text' value=''> $meta[$dual_pic_va3]</textarea>
<textarea type='text' name='cu_green_your_fields[$dual_pic_va4]' id='cu_green_your_fields[$dual_pic_va4]' class='sec$post->ID regular-text' value=''> $meta[$dual_pic_va4]</textarea>
 

 
 </li> ";

 


 }  
 
 
 
 
?>

</div>



<div class="pic_txt multipic_cmn dual_pic2  ">

<br/>
  
  <?php

 
$multi_pic =   $meta['dual_pic_txt3']  ;
  for( $i=1; $i<=$multi_pic; $i++ )
 {
 
$dual_pic_2nd_va1 = 'dual_pic_2nd'. $i;
$dual_pic_2nd_va2 = 'dual_pic_2nd'. $i. 'a';
$dual_pic_2nd_va3 = 'dual_pic_2nd'. $i. 'b';
$dual_pic_2nd_va4 = 'dual_pic_2nd'. $i. 'c';
$dual_pic_mid = 'pxtxmyid'. $i;
 

 echo "<li class='listtype  two22'> 
 



 <input type='text' name='cu_green_your_fields[$dual_pic_2nd_va1]' id='cu_green_your_fields[$dual_pic_2nd_va1]' class='meta-image pic_url regular-text' value='$meta[$dual_pic_2nd_va1]'>
 
 <input type='button' class='button image-upload' value='Browse'>
 <div class='image-preview'><img src=' $meta[$dual_pic_2nd_va1]' style='max-width: 100%;'></div>
  
 




 
 <textarea type='text' name='cu_green_your_fields[$dual_pic_2nd_va2]' id='cu_green_your_fields[$dual_pic_2nd_va2]' class='regular-text' value=''> $meta[$dual_pic_2nd_va2] </textarea>
 <textarea type='text' name='cu_green_your_fields[$dual_pic_2nd_va3]' id='cu_green_your_fields[$dual_pic_2nd_va3]' class='regular-text' value=''> $meta[$dual_pic_2nd_va3] </textarea>
 <textarea type='text' name='cu_green_your_fields[$dual_pic_2nd_va4]' id='cu_green_your_fields[$dual_pic_2nd_va4]' class='regular-text' value=''> $meta[$dual_pic_2nd_va4] </textarea>
 

 
 </li> ";

 


 }  
 
 
 
 
?>

</div>



 
 

<div class="pic_txt multipic_cmn dual_ipic_text_only dul_pic3 <?php
$t = $meta['txt_fld_picview_qty_cntrl'];

if ($t === "img1") {
  echo "one1pic";
} elseif ($t === "img4") {
  echo "four4pic";
}  elseif ($t === "text") {
  echo "three3";
} 

else {
  echo "blue";
}
?> ">



<div class="txt_fld_picview_qty d-flex">

<!-- <label>0 / img1/ img4 </label> -->
<label>Select image field</label>
<input type="text"  list="pctre_fld" name="cu_green_your_fields[txt_fld_picview_qty_cntrl]"  id="cu_green_your_fields" class="pic_fld_numbr dtl_aro_psn cu_green_your_fields[txt_fld_picview_qty_cntrl]" value="<?php if (is_array($meta) && isset($meta['txt_fld_picview_qty_cntrl'])) {	echo $meta['txt_fld_picview_qty_cntrl']; } ?>">

<datalist id="pctre_fld">
  <option value="0">
  <option value="img1">
  <option value="img4">
 
</datalist>

</div>
 

  <?php

 
$multi_pic =   $meta['dual_pic_txt3']  ;
  for( $i=1; $i<=$multi_pic; $i++ )
 {
 
$dual_pic_txt_only_va1 = 'dual_pic_txt_only'. $i;
$dual_pic_txt_only_va2 = 'dual_pic_txt_only'. $i. 'a';
$dual_pic_txt_only_va3 = 'dual_pic_txt_only'. $i. 'b';
$dual_pic_txt_only_va4 = 'dual_pic_txt_only'. $i. 'c';
$dual_pic_txt_only_va5 = 'dual_pic_txt_only'. $i. 'd';
$dual_pic_txt_only_va6 = 'dual_pic_txt_only'. $i. 'e';
$dual_pic_txt_only_va7 = 'dual_pic_txt_only'. $i. 'f';
$dual_pic_txt_only_va8 = 'dual_pic_txt_only'. $i. 'g';

$dual_pic_txt_only_va9 = 'dual_pic_txt_only'. $i. 'h';
$dual_pic_txt_only_va10 = 'dual_pic_txt_only'. $i. 'i';
$dual_pic_txt_only_va11 = 'dual_pic_txt_only'. $i. 'j';
$dual_pic_txt_only_va12 = 'dual_pic_txt_only'. $i. 'k';
$dual_pic_txt_only_va13 = 'dual_pic_txt_only'. $i. 'l';
$mydual_pic_txt_only_va30 = 'mydual_pic_txt_only'. $i. 'a';
$mydual_pic_txt_only_va31 = 'mydual_pic_txt_only'. $i. 'b';
$mydual_pic_txt_only_va32 = 'mydual_pic_txt_only'. $i. 'c';

$multi_pic_mid = 'pxtxmyid'. $i;
 

 echo "<li class='listtype  three33'> 
 
 <div class='spcl_fld_txt'> 

      Active <textarea type='text'  placeholder='A red  text..'  name='cu_green_your_fields[$dual_pic_txt_only_va9]' id='cu_green_your_fields[$dual_pic_txt_only_va9]' class='red dinline zzregular-text' value=''> $meta[$dual_pic_txt_only_va9]</textarea>
      
      Order <textarea type='text' placeholder='Order'  name='cu_green_your_fields[$dual_pic_txt_only_va10]' id='cu_green_your_fields[$dual_pic_txt_only_va10]' class='red dinline zzregular-text' value=''> $meta[$dual_pic_txt_only_va10]</textarea>
      
      Hide <textarea type='text'  placeholder='Hide' name='cu_green_your_fields[$dual_pic_txt_only_va11]' id='cu_green_your_fields[$dual_pic_txt_only_va11]' class='red dinline zzregular-text' value=''> $meta[$dual_pic_txt_only_va11]</textarea>
      
      Outhers <textarea type='text'  placeholder='Outhers' name='cu_green_your_fields[$dual_pic_txt_only_va12]' id='cu_green_your_fields[$dual_pic_txt_only_va12]' class='red dinline zzregular-text' value=''>$meta[$dual_pic_txt_only_va12] </textarea>
      

 </div>
<br/>
<div class='lot_pic'> 
      <div class='text_pic_field'> 

      <input type='text' name='cu_green_your_fields[$dual_pic_txt_only_va13]' id='cu_green_your_fields[$dual_pic_txt_only_va13]' class='sec$post->ID meta-image pic_url zregular-text' value='$meta[$dual_pic_txt_only_va13]'>
      
        <input type='button' class='sec$post->ID button image-upload' value='Browse'>
        <div class='sec$post->ID zzimage-preview' style='max-height: 150px; width:90%; margin:20px 5px; overflow:hidden;'><img src=' $meta[$dual_pic_txt_only_va13]' style='max-width: 100%;'></div>

      </div>

      <div  class='text_pic_field'> 

      <input type='text' name='cu_green_your_fields[$mydual_pic_txt_only_va30]' id='cu_green_your_fields[$mydual_pic_txt_only_va30]' class='sec$post->ID meta-image pic_url zregular-text' value='$meta[$mydual_pic_txt_only_va30]'>
      
        <input type='button' class='sec$post->ID button image-upload' value='Browse'>
        <div class='sec$post->ID zzimage-preview' style='max-height: 150px; width:90%; margin:20px 5px; overflow:hidden;'><img src=' $meta[$mydual_pic_txt_only_va30]' style='max-width: 100%;'></div>


      </div>

      <div  class='text_pic_field'> 

      <input type='text' name='cu_green_your_fields[$mydual_pic_txt_only_va31]' id='cu_green_your_fields[$mydual_pic_txt_only_va31]' class='sec$post->ID meta-image pic_url zregular-text' value='$meta[$mydual_pic_txt_only_va31]'>
      
        <input type='button' class='sec$post->ID button image-upload' value='Browse'>
        <div class='sec$post->ID zzimage-preview' style='max-height: 150px; width:90%; margin:20px 5px; overflow:hidden;'><img src=' $meta[$mydual_pic_txt_only_va31]' style='max-width: 100%;'></div>


      </div>

      <div  class='text_pic_field'> 

      <input type='text' name='cu_green_your_fields[$mydual_pic_txt_only_va32]' id='cu_green_your_fields[$mydual_pic_txt_only_va32]' class='sec$post->ID meta-image pic_url zregular-text' value='$meta[$mydual_pic_txt_only_va32]'>
      
        <input type='button' class='sec$post->ID button image-upload' value='Browse'>
        <div class='sec$post->ID zzimage-preview' style='max-height: 150px; width:90%; margin:20px 5px; overflow:hidden;'><img src=' $meta[$mydual_pic_txt_only_va32]' style='max-width: 100%;'></div>


      </div>

 
 </div>


 <textarea type='text' name='cu_green_your_fields[$dual_pic_txt_only_va1]' id='cu_green_your_fields[$dual_pic_txt_only_va1]' class='regular-text' value=''>$meta[$dual_pic_txt_only_va1] </textarea>
 
 <textarea type='text'  name='cu_green_your_fields[$dual_pic_txt_only_va2]' id='cu_green_your_fields[$dual_pic_txt_only_va2]' class='regular-text' value=''> $meta[$dual_pic_txt_only_va2]</textarea>
 
 <textarea type='text'  onClick='classList.add(active)'  name='cu_green_your_fields[$dual_pic_txt_only_va3]' id='cu_green_your_fields[$dual_pic_txt_only_va3]' class='regular-text' value=''> $meta[$dual_pic_txt_only_va3]</textarea>
 
 <textarea type='text'  onClick='classList.add(active)'  name='cu_green_your_fields[$dual_pic_txt_only_va4]' id='cu_green_your_fields[$dual_pic_txt_only_va4]' class='regular-text' value=''> $meta[$dual_pic_txt_only_va4]</textarea>
 
 <textarea type='text'  onClick='classList.add(active)'  name='cu_green_your_fields[$dual_pic_txt_only_va5]' id='cu_green_your_fields[$dual_pic_txt_only_va5]' class='regular-text' value=''>$meta[$dual_pic_txt_only_va5] </textarea>
 
 <textarea type='text'  onClick='classList.add(active)'  name='cu_green_your_fields[$dual_pic_txt_only_va6]' id='cu_green_your_fields[$dual_pic_txt_only_va6]' class='regular-text' value=''>$meta[$dual_pic_txt_only_va6] </textarea>
 
 <textarea type='text'  onClick='classList.add(active)'  name='cu_green_your_fields[$dual_pic_txt_only_va7]' id='cu_green_your_fields[$dual_pic_txt_only_va7]' class='regular-text' value=''>$meta[$dual_pic_txt_only_va7] </textarea>
 
 <textarea type='text'  onClick='classList.add(active)'  name='cu_green_your_fields[$dual_pic_txt_only_va8]' id='cu_green_your_fields[$dual_pic_txt_only_va8]' class='regular-text' value=''> $meta[$dual_pic_txt_only_va8]</textarea>
 
 

 
 </li> ";

 


 }  
 
 
 
 
?>

</div>

</div>
</div>



</section>

<section class="mult_pic">

<h1>
<figure>Number of multiple image and text field to show </figure><figure><input type="text" name="cu_green_your_fields[multi_pic_txt3]" id="cu_green_your_fields[multi_pic_txt3]" class="nactive greenqtyno tooltip-pure-css" value="<?php if (is_array($meta) && isset($meta['multi_pic_txt3'])) {	echo $meta['multi_pic_txt3']; } ?>">
<button  type="button" onclick="myFunction2()"> <span class="dashicons dashicons-arrow-down-alt2"></span></button></figure>

  </h1> 
<div  id="fld_open2" class="fld_collapse">
<div class="mult_pic_contnr">
 


<div class="pic_txt multipic_cmn multipic_text_only multipic spcl_field  ">

      <br/>
        
        <?php
      $multi_pic =   $meta['multi_pic_txt3']  ;
        for( $i=1; $i<=$multi_pic; $i++ )
      {
      
      $spcl_txt_only_va1 = 'spcl_txt_only'. $i;
      $spcl_txt_only_va2 = 'spcl_txt_only'. $i. 'a';
      $spcl_txt_only_va3 = 'spcl_txt_only'. $i. 'b';
      $spcl_txt_only_va4 = 'spcl_txt_only'. $i. 'c';
      
      $spcl_mid = 'pxtxmyid'. $i;
        
      echo "<li class='listtype usr_gide_cnt'> 
      <p class='usr_gide'>  
      <button type='button' onClick='openPopup();'>User guide</button>
      </p>
      <span class='spcl_cont'>
      <input class='spcl_lbl' type='text' value='active' readonly>
      <textarea type='text' name='cu_green_your_fields[$spcl_txt_only_va1]' id='cu_green_your_fields[$spcl_txt_only_va1]' class='regular-text spcl act_fld' value=''>$meta[$spcl_txt_only_va1] </textarea>
      <input class='spcl_lbl' type='text' value='order' readonly>
      <textarea type='text' name='cu_green_your_fields[$spcl_txt_only_va2]' id='cu_green_your_fields[$spcl_txt_only_va2]' class='regular-text spcl' value=''>$meta[$spcl_txt_only_va2] </textarea>
      <input class='spcl_lbl' type='text' value='hide' readonly>
      
      <textarea type='text' name='cu_green_your_fields[$spcl_txt_only_va3]' id='cu_green_your_fields[$spcl_txt_only_va3]' class='regular-text spcl' value=''>$meta[$spcl_txt_only_va3] </textarea>
      <input class='spcl_lbl' type='text' value='cuactive' readonly>
      
      <textarea type='text' name='cu_green_your_fields[$spcl_txt_only_va4]' id='cu_green_your_fields[$spcl_txt_only_va4]' class='regular-text spcl' value=''>$meta[$spcl_txt_only_va4] </textarea>
      </span>
      
      </li> ";
      
      }  
      
      
      ?>

</div>

<div class="pic_txt multipic_cmn multipic1  ">


<br/>
  
  <?php

 
$multi_pic =   $meta['multi_pic_txt3']  ;
  for( $i=1; $i<=$multi_pic; $i++ )
 {
 
$multi_pic_va1 = 'multi_pic'. $i;
$multi_pic_va2 = 'multi_pic'. $i. 'a';
$multi_pic_va3 = 'multi_pic'. $i. 'b';
$multi_pic_va4 = 'multi_pic'. $i. 'c';
$multi_pic_mid = 'pxtxmyid'. $i;
 

 echo "<li class='listtype'> 
 



 <input type='text' name='cu_green_your_fields[$multi_pic_va1]' id='cu_green_your_fields[$multi_pic_va1]' class='meta-image regular-text' value='$meta[$multi_pic_va1]'>
 
 <input type='button' class='button image-upload ' value='Browse'>
 
 <div title='echo &#36meta[&#36multi_pic_va1] in loop [&#36multi_pic_va1 = &#x27; multi_pic &#x27;. &#x24i;]'  class='image-preview' ><img    src=' $meta[$multi_pic_va1]' style='max-width: 100%;'></div>
  
 




 
 <textarea type='text' title='&#36meta[&#36multi_pic_va2] [&#36multi_pic_va2 = &#x27;multi_pic&#x27;.  &#x24i.&#x27;a&#x27;;]' name='cu_green_your_fields[$multi_pic_va2]' id='cu_green_your_fields[$multi_pic_va2]' class='regular-text' value=''> $meta[$multi_pic_va2]</textarea>
 <textarea type='text' title='&#36meta[&#36multi_pic_va3] [&#36multi_pic_va3 = &#x27;multi_pic&#x27;.  &#x24i.&#x27;b&#x27;;]' name='cu_green_your_fields[$multi_pic_va3]' id='cu_green_your_fields[$multi_pic_va3]' class='regular-text' value=''> $meta[$multi_pic_va3]</textarea>
 <textarea type='text' title='&#36meta[&#36multi_pic_va4] [&#36multi_pic_va4 = &#x27;multi_pic&#x27;.  &#x24i.&#x27;c&#x27;;]' name='cu_green_your_fields[$multi_pic_va4]' id='cu_green_your_fields[$multi_pic_va4]' class='regular-text' value=''> $meta[$multi_pic_va4]</textarea>
 

 
 </li> ";

 


 }  
 
 
 
 
?>

</div>



<div class="pic_txt multipic_cmn multipic2  ">

<br/>
  
  <?php

 
$multi_pic =   $meta['multi_pic_txt3']  ;
  for( $i=1; $i<=$multi_pic; $i++ )
 {
 
$multi_pic_2nd_va1 = 'multi_pic_2nd'. $i;
$multi_pic_2nd_va2 = 'multi_pic_2nd'. $i. 'a';
$multi_pic_2nd_va3 = 'multi_pic_2nd'. $i. 'b';
$multi_pic_2nd_va4 = 'multi_pic_2nd'. $i. 'c';
$multi_pic_mid = 'pxtxmyid'. $i;
 

 echo "<li class='listtype'> 
 



 <input type='text' name='cu_green_your_fields[$multi_pic_2nd_va1]' id='cu_green_your_fields[$multi_pic_2nd_va1]' class='meta-image regular-text' value='$meta[$multi_pic_2nd_va1]'>
 
 <input type='button' class='button image-upload' value='Browse'>
 <div  title='echo &#36meta[&#36$multi_pic_2nd_va1] in loop [&#36multi_pic_2nd_va1 = &#x27;multi_pic_2nd &#x27;. &#x24i;]' class='image-preview'><img  src=' $meta[$multi_pic_2nd_va1]' style='max-width: 100%;'></div>
  
 




 
 <textarea type='text'  title='&#36meta[&#36multi_pic_2nd_va2] [&#36multi_pic_2nd_va2 = &#x27;multi_pic_2nd&#x27;.  &#x24i.&#x27;a&#x27;;]' name='cu_green_your_fields[$multi_pic_2nd_va2]' id='cu_green_your_fields[$multi_pic_2nd_va2]' class='regular-text' value=''> $meta[$multi_pic_2nd_va2]</textarea>
 <textarea type='text'  title='&#36meta[&#36multi_pic_2nd_va3] [&#36multi_pic_2nd_va3 = &#x27;multi_pic_2nd&#x27;.  &#x24i.&#x27;b&#x27;;]' name='cu_green_your_fields[$multi_pic_2nd_va3]' id='cu_green_your_fields[$multi_pic_2nd_va3]' class='regular-text' value=''> $meta[$multi_pic_2nd_va3]</textarea>
 <textarea type='text' title='&#36meta[&#36multi_pic_2nd_va4] [&#36multi_pic_2nd_va4 = &#x27;multi_pic_2nd&#x27;.  &#x24i.&#x27;c&#x27;;]' name='cu_green_your_fields[$multi_pic_2nd_va4]' id='cu_green_your_fields[$multi_pic_2nd_va4]' class='regular-text' value=''> $meta[$multi_pic_2nd_va4]</textarea>
 

 
 </li> ";

 


 }  
 
 
 
 
?>

</div>




<div class="pic_txt multipic_cmn multipic3  ">

<br/>
  
  <?php

 
$multi_pic =   $meta['multi_pic_txt3']  ;
  for( $i=1; $i<=$multi_pic; $i++ )
 {
 
$multi_pic_3rd_va1 = 'multi_pic_3rd'. $i;
$multi_pic_3rd_va2 = 'multi_pic_3rd'. $i. 'a';
$multi_pic_3rd_va3 = 'multi_pic_3rd'. $i. 'b';
$multi_pic_3rd_va4 = 'multi_pic_3rd'. $i. 'c';
$multi_pic_mid = 'pxtxmyid'. $i;
 

 echo "<li class='listtype'> 
 



 <input type='text' name='cu_green_your_fields[$multi_pic_3rd_va1]' id='cu_green_your_fields[$multi_pic_3rd_va1]' class='meta-image regular-text' value='$meta[$multi_pic_3rd_va1]'>
 
 <input type='button' class='button image-upload' value='Browse'>
 <div class='image-preview'><img src=' $meta[$multi_pic_3rd_va1]' style='max-width: 100%;'></div>
  
 




 
 <textarea type='text' name='cu_green_your_fields[$multi_pic_3rd_va2]' id='cu_green_your_fields[$multi_pic_3rd_va2]' class='regular-text' value=''> $meta[$multi_pic_3rd_va2]</textarea>
 <textarea type='text' name='cu_green_your_fields[$multi_pic_3rd_va3]' id='cu_green_your_fields[$multi_pic_3rd_va3]' class='regular-text' value=''> $meta[$multi_pic_3rd_va3]</textarea>
 <textarea type='text' name='cu_green_your_fields[$multi_pic_3rd_va4]' id='cu_green_your_fields[$multi_pic_3rd_va4]' class='regular-text' value=''> $meta[$multi_pic_3rd_va4]</textarea>
 

 
 </li> ";

 


 }  
 
 
 
 
?>

</div>

<div class="pic_txt multipic_cmn multipic4  ">

<br/>
  
  <?php

 
$multi_pic =   $meta['multi_pic_txt3']  ;
  for( $i=1; $i<=$multi_pic; $i++ )
 {
 
$multi_pic_4th_va1 = 'multi_pic_4th'. $i;
$multi_pic_4th_va2 = 'multi_pic_4th'. $i. 'a';
$multi_pic_4th_va3 = 'multi_pic_4th'. $i. 'b';
$multi_pic_4th_va4 = 'multi_pic_4th'. $i. 'c';
$multi_pic_mid = 'pxtxmyid'. $i;
 

 echo "<li class='listtype'> 
 



  <input type='text' name='cu_green_your_fields[$multi_pic_4th_va1]' id='cu_green_your_fields[$multi_pic_4th_va1]' class='meta-image regular-text' value='$meta[$multi_pic_4th_va1]'> 
 
  <input type='button' class='button image-upload' value='Browse'>
 <div class='image-preview'><img src=' $meta[$multi_pic_4th_va1]' style='max-width: 100%;'></div>
  
 




 
  <textarea type='text' title='[$multi_pic_4th_va2]'  name='cu_green_your_fields[$multi_pic_4th_va2]' id='cu_green_your_fields[$multi_pic_4th_va2]' class='regular-text' value=''>$meta[$multi_pic_4th_va2] </textarea>
  <textarea type='text' title='[$multi_pic_4th_va3]'  name='cu_green_your_fields[$multi_pic_4th_va3]' id='cu_green_your_fields[$multi_pic_4th_va3]' class='regular-text' value=''>$meta[$multi_pic_4th_va3] </textarea>
  <textarea type='text' title='$meta[$multi_pic_4th_va4]'  name='cu_green_your_fields[$multi_pic_4th_va4]' id='cu_green_your_fields[$multi_pic_4th_va4]' class='regular-text' value=''>$meta[$multi_pic_4th_va4] </textarea>
 

 
 </li> ";

 


 }  
 
 
 
 
?>

</div>








<div class="pic_txt multipic_cmn multipic_text_only multipic5  ">

<br/>
  
  <?php

 
$multi_pic =   $meta['multi_pic_txt3']  ;
  for( $i=1; $i<=$multi_pic; $i++ )
 {
 
$multi_pic_txt_only_va1 = 'multi_pic_txt_only'. $i;
$multi_pic_txt_only_va2 = 'multi_pic_txt_only'. $i. 'a';
$multi_pic_txt_only_va3 = 'multi_pic_txt_only'. $i. 'b';
$multi_pic_txt_only_va4 = 'multi_pic_txt_only'. $i. 'c';
$multi_pic_txt_only_va5 = 'multi_pic_txt_only'. $i. 'd';
$multi_pic_txt_only_va6 = 'multi_pic_txt_only'. $i. 'e';
$multi_pic_txt_only_va7 = 'multi_pic_txt_only'. $i. 'f';
$multi_pic_txt_only_va8 = 'multi_pic_txt_only'. $i. 'g';
$multi_pic_mid = 'pxtxmyid'. $i;
 

 echo "<li class='listtype'> 
 


 <textarea type='text' name='cu_green_your_fields[$multi_pic_txt_only_va1]' id='cu_green_your_fields[$multi_pic_txt_only_va1]' class='regular-text' value=''> $meta[$multi_pic_txt_only_va1]</textarea>
 
  
 




 
 <textarea type='text' name='cu_green_your_fields[$multi_pic_txt_only_va2]' id='cu_green_your_fields[$multi_pic_txt_only_va2]' class='regular-text' value=''>$meta[$multi_pic_txt_only_va2] </textarea>
 <textarea type='text' name='cu_green_your_fields[$multi_pic_txt_only_va3]' id='cu_green_your_fields[$multi_pic_txt_only_va3]' class='regular-text' value=''>$meta[$multi_pic_txt_only_va3] </textarea>
 <textarea type='text' name='cu_green_your_fields[$multi_pic_txt_only_va4]' id='cu_green_your_fields[$multi_pic_txt_only_va4]' class='regular-text' value=''>$meta[$multi_pic_txt_only_va4] </textarea>
 <textarea type='text' name='cu_green_your_fields[$multi_pic_txt_only_va5]' id='cu_green_your_fields[$multi_pic_txt_only_va5]' class='regular-text' value=''>$meta[$multi_pic_txt_only_va5] </textarea>
 <textarea type='text' name='cu_green_your_fields[$multi_pic_txt_only_va6]' id='cu_green_your_fields[$multi_pic_txt_only_va6]' class='regular-text' value=''>$meta[$multi_pic_txt_only_va6] </textarea>
 <textarea type='text' name='cu_green_your_fields[$multi_pic_txt_only_va7]' id='cu_green_your_fields[$multi_pic_txt_only_va7]' class='regular-text' value=''>$meta[$multi_pic_txt_only_va7] </textarea>
 <textarea type='text' name='cu_green_your_fields[$multi_pic_txt_only_va8]' id='cu_green_your_fields[$multi_pic_txt_only_va8]' class='regular-text' value=''>$meta[$multi_pic_txt_only_va8] </textarea>


 
 </li> ";

 


 }  
 
 
 
 
?>

</div>



</div>
</div>
</section>

<div id="code_pop" class="popup">
    This is code user guide
    <div class="cancel" onclick="openPopup();">X</div>
    <h3> you can get the valu from name in inspect element inside []---
       just replace the no with $i and concat it like below</h3>
       <xmp> 
 <h1>[dual_pic1a] < ?php  echo $meta['dual_pic'. $i. 'a'];    ? > </h1>
</xmp> 
  <h5>
    bring dual pic or multi pic section put below code in requred page or 
    in html section like header or template page or page5.php or where 
    need to print for show in browser
</h5>
  <xmp> 
------------------------------------------- code start process 1----------------------------------------------
< ?php 

    $args = array('post_type' => 'cu_green_your_post', 'category_name' => 'cat_1',);  
    $your_loop = new WP_Query( $args ); if ( $your_loop->have_posts() ) : while ( $your_loop->have_posts() ) : $your_loop->the_post();
    $meta = get_post_meta( $post->ID, 'cu_green_your_fields', true ); 

? >
 
< ?php 

     $multi_pic =   $meta['dual_pic_txt3']  ; //////this  line is calling  dual pic section
     for($i = 1; $i <=$multi_pic; $i++){

 ? >  
				 
    <div class="me-3 text-light">


         <h1  class="cc text-danger">< ?php echo $meta['dual_pic'. $i. 'a']; ? ></h1>
			
         <a class="btn   btn-outline-light  " href="< ?php echo $meta['dual_pic'. $i. 'b']; ? >">stack ---- < ?php echo $meta['dual_pic'. $i. 'c']; ? > </a>

        <img src="< ?php echo $meta['dual_pic_txt_only'. $i. 'l']; ? >" class="img-fluid" alt="pic">

       
    </div>

         < ?php 
       }
       ? >

< ?php endwhile; endif; wp_reset_postdata(); ? >

	
------------------------------------------- code end process 1----------------------------------------------


------------------------------------------- code start process 2----------------------------------------------

 
<h6  class="text-danger"> gggg1  
  < ?php echo $meta['dual_pic1c'] ? > //// print static deta outside loop 

</h6>

------------------------------------------- code end process 2----------------------------------------------
      

///// as static need to use variable
$txtqt123 = $meta[$multi_pic_txt_only_va1]  ;
echo $txtqt123;
echo  $meta[$multi_pic_txt_only_va1] ;






    </xmp>
</div>

    


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







//////// my js start
    
// const numberInput = document.getElementById("number");
// const buttonAdd = document.getElementById("add");
// let number = numberInput.value;

// buttonAdd.addEventListener("click", (event) => {
//   number = ++number;
//   console.log(number);
//   numberInput.value = number;
// })



input = document.getElementById('cu_green_your_fields');
// input = document.getElementsByClassName[]("nactive");

    input.addEventListener('onload', function(e) {
      // input = document.getElementById('cu_green_your_fields');
        var searchHits = document.getElementById('search-hits');
        // var searchHits = document.getElementByClassName("search-hits");

        if (input.value.length > 0) {
            searchHits.style.display = 'block';
            searchHits.style.color = 'red';
        }
        if (input.value.length == 0) {
            searchHits.style.display = 'none';    
        }
    }
    );


//     input = document.getElementById('cu_green_your_fields');
// // input = document.getElementsByClassName[]("nactive");

//     input.addEventListener('keyup', function(e) {
//       // input = document.getElementById('cu_green_your_fields');
//         var searchHits = document.getElementById('search-hits');
//         // var searchHits = document.getElementByClassName("search-hits");

//         if (input.value.length > 0) {
//             searchHits.style.display = 'block';
//             searchHits.style.color = 'red';
//         }
//         if (input.value.length == 0) {
//             searchHits.style.display = 'none';    
//         }
//     }
//     );


//     var id = document.getElementsByClassName("hid_id");
// if (id.length > 0) {
// 	alert (id[0].value);
// }

// document.getElementsByClassName('nactive')[0].style.display = 'block';
// document.getElementsByClassName('nactive')[0].style.color = 'red';
// document.getElementsByClassName('nactive')[0].style.border = '5px solid red';





const loadMore = document.getElementById('loadmore');
const hid = [...document.querySelectorAll('.news-item.hidden')];

hid.splice(0, 3).forEach(
  elem => elem.classList.remove('hidden')
);

loadmore.addEventListener('click', function(e) {
  e.preventDefault();
  
  hid.splice(0, 3).forEach(
    elem => elem.classList.remove('hidden')
  )
  
  if (hid.length == 0) {
    loadMore.classList.add('hidden');
  }
});



function myFunction() {
   var element = document.getElementById("postbox-container-2");
   element.classList.toggle("mystyle");
}


function myFunction1() {
   var element = document.getElementById("fld_open1");
   element.classList.toggle("mystyle3");
}
 
function myFunction2() {
   var element = document.getElementById("fld_open2");
   element.classList.toggle("mystyle3");
}






function openPopup() {
    // document.getElementById('test').style.display = 'block';
    document.getElementById('code_pop').classList.toggle("code_pop");
  
}

function closePopup() {
    document.getElementById('test').style.display = 'none';
}






function zmyFunction2() {
  input = document.getElementById('search');
        var searchHits = document.getElementById('search-hits');

        if (input.value.length > 0) {
            searchHits.style.display = 'block';
        }
        if (input.value.length == 0) {
            searchHits.style.display = 'none';    
        }
}


<?php include 'custom2.js';?>


			

  </script>

  <?php }

 function cu_green_save_your_fields_meta( $post_id ) {   
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
	
	$old = get_post_meta( $post_id, 'cu_green_your_fields', true );
		if (isset($_POST['cu_green_your_fields'])) { //Fix 3
			$new = $_POST['cu_green_your_fields'];
			if ( $new && $new !== $old ) {
				update_post_meta( $post_id, 'cu_green_your_fields', $new );
			} elseif ( '' === $new && $old ) {
				delete_post_meta( $post_id, 'cu_green_your_fields', $old );
			}
		}
}

add_action( 'save_post', 'cu_green_save_your_fields_meta' );
















//////////////////////////include('cu_green_function_metabox_secondery_feature_pic.php');


//// add css for admin page style

add_action('admin_head', 'cu_green_my_custom_ccfonts');

function cu_green_my_custom_ccfonts() {
  echo '<style>
  textarea {
    resize: none;
    width:100%;
  }

  .mystyle {
    width: 100%;
    position:absolute;
    z-index:999999999999;
    
    background-color: coral;
    color: white;
    font-size: 25px;
    box-sizing: border-box;
  }
  .mystyle .regular-text{
    height:100px;
  }
  .mystyle .mult_pic .regular-text{
    height:150px;
  }
  .mult_pic .multipic5 .regular-text{
    height: 98.4px;
  }
  .mult_pic .multipic1 .regular-text, .mult_pic .multipic2 .regular-text, .mult_pic .multipic3 .regular-text, 
  .mult_pic .multipic4 .regular-text{
    height:150px;
  } 

  .mult_pic .multipic1 .image-preview, .mult_pic .multipic2 .image-preview, .mult_pic .multipic3 .image-preview, 
  .mult_pic .multipic4 .image-preview{
    height:150px;
  } 
  .fld_collapse{
    display:none !important;
  }
  #fld_open1.mystyle3.fld_collapse  {
    display:block !important;
  }
  #fld_open2.mystyle3.fld_collapse {
    display:block !important;
  }

  #container{
    display: flex;
    flex-flow: wrap;
    justify-content: space-between;
  }
  #loadmore {
    flex: 1 2 100%;
  }
  #container input{
    width:98%;
  }
 
.image-preview{
  min-height:10px;
  padding:10px;
  background:#888;
  max-width:250px;
  zmax-height:250px;
  margin:15px;
}

.pic_fild{
 
  background: #9ca2a7 !important;
  color: #1d2327 !important;
    font-size: 31px;
    padding: 5px 16px;
    margin-top: 22px;
    width: 28%;
}
.pic_fild label{
  color:#ffffff;
  display:block;
}
 
.fnt_btn{
  cursor: grab;
}
.faicon{
  width:25px;
  height:25px;
  border-radius:50%;
  cursor:link;
}
.ful_n_fa_btn{
  display:flex;
  
}
.lnk_bg{
  background: #2196f357 !important;
  color: #fff !important;
  outline: none;
    border: none !important;
}
.regular-text{
  width:100%;
  border: 2px solid #08a108;
}

.greenqtyno{
  width: 45px;
  color: #f30f0f !important;
  border: 3px solid #08a108 !important;
  text-align: center;
  border-radius: 50px !important;
  font-size: 20px;
    font-weight: 800;
}
#postcustomstuff .submit input {
  margin: 0;
  width: auto;
    color:red;

}
.listtype{
  list-style-type:number;
  margin-top:20px;
  margin-left: 10px;
}
li.listtype::marker {
  color: #ffffff;
  font-size:20px;
}
.textonly{
  background:red;
  padding:10px 1px;
}
.textpic{
  background:green;
  padding:10px 1px;
  margin-top:20px;
}

.dual_pic{
  background:#39c449;
  margin:25px 0px;
  
}

.mult_pic{
  background:#39c449;
  color:#ffffff;
}

.dual_pic h1 .dashicons-arrow-down-alt2, .mult_pic h1 .dashicons-arrow-down-alt2{
  margin-top:8px;
}
.dual_pic h1, .mult_pic h1{
  color: #ffffff;
  display: flex;
  justify-content: space-between;
}
.dual_pic h1 button, .mult_pic h1 button{
  color: #fff;
    border: none;
    outline: 2px solid #fff;
    border-radius: 20px;
    background: #08a108;
}
.dual_pic h1 figure, .mult_pic h1 figure{
  margin: 0px 15px 3px; 
}
.mult_pic_contnr{
  margin-top:20px;
  background:#a4efac;
  padding:10px 1px;
  display:flex;
  flex-wrap: wrap;
  max-height: 665px;
  overflow:scroll;
   
}
.mult_pic_contnr h1{
  
  color:#ffffff;
}

.mult_pic_contnr> div.multipic{
  width:6%;
}

.mystyle .mult_pic .mult_pic_contnr> div.multipic{
  width:4%;
}
.mult_pic_contnr> div.multipic .regular-text{
  height:201px;
}
.mult_pic_contnr> div {
  width:14%;
   
}
.mystyle .mult_pic .mult_pic_contnr> div {
  width:11%;
   
}
.mult_pic_contnr  .listtype{
  background:#7cad7c;
  margin:60px 0px;
  border-bottom:2px solid red;
  border-top:25px solid #64b964;
  list-style-type:none;
  padding:10px 1px;
   
}
.mult_pic_contnr .multipic1 .listtype{
  
  margin-left: 5px;
  padding-left: 6px;
  
   
}
.mult_pic_contnr> div input {
  width:23%;
  // margin-top:10px;
width:95%
}

.mult_pic_contnr> div.dul_pic3 input {
 
 
}

 

.mult_pic_contnr>:first-child {
   //flex: 1 0 100%;
}
.mult_pic_contnr>:last-child {
  width:36%;
}
 
.mystyle  .mult_pic .mult_pic_contnr>:last-child {
  width:52%;
}
 
.mult_pic_contnr .image-preview {
  margin: 10px 0px;
  padding: 4px;
  background: #e9dcdc;
  max-width: 250px;
  height: 55px;
  overflow: hidden;
  width: 91%;
}

.dual_pic_contnr .image-preview{
  // height: 102px;
   height: 187.5px;
}

.dual_pic_contnr>:first-child {
  width:50px !important;
  color:red;
  padding:0px 1px;
  margin-top: 70px;
}

.dual_pic_contnr .dual_pic_spcl_field .dual_pic_spcl_field_inp {
height:109.99px !important;
background:green;
color:orange;
font-size:12px;
}
.dual_pic_contnr .dual_pic_spcl_field .dual_pic_spcl_field_inp.smal_fld {
height:66px !important;
 
}

.dual_pic_contnr>:last-child {
  ///width:68%;
  width:58%;
}

.dual_pic .dual_pic1 .regular-text, .dual_pic .dual_pic2 .regular-text{
  height:115px;
} 
 
.dual_pic .dul_pic3 .regular-text{
  height: 74.9px;
}
.pic_txt .listtype{
  width:100%;
}
.pic_txt .button{
  display:block;
  color: #ffffff;
    border-color: #08a108;
    background: #08a108;
}
.pic_txt input{
  width:30%;
}
.pic_txt h1 input{
  width:45px;
}
.multipic_cmn{
  // border:2px solid #0ff;
  padding:10px 1px;
  margin-right: -4px;
  max-height: 665px;
}

.nactive{
   //pointer-events: none!important;
}

 

 .wp-editor-area{
  height: 265px !important;
 }

   
   .category_items div:nth-child(n+4) 
{
    display: none;
}


.dashicons-star-half:before {
  
   content: "\f486";
  color:#08a108 !important;
}

 #adminmenu .menu-icon-cu_green_your_post  {
 
  color: #ff4961;
}
 .menu-icon-cu_green_your_post.wp-menu-open{
  color:#ffffff !important;
 }

 .cc{background: red;padding: 10px;	border: 2px solid #ccc;}
	.active{background: green;	}

 #adminmenu li.wp-has-current-submenu.menu-icon-cu_green_your_post a.wp-has-current-submenu {
  background: #39c449;
  
}
 
.dashicons-star-half +  + .wp-menu-name{
  color:red;
 }
 .multipic{
  background:pink;
  // padding:10px;
 }
.spcl_cont{
  display: inline-block;

}
.spcl_cont{
  // border:2px solid green;
}
.spcl{
  background: #ccc;
    height: 174px !important;
    border-top: none;
    border-radius: 0px;
    color: #08a108 !important;
    font-size: 12px;

}
.spcl_lbl{
  padding: 2px !important;
    font-size: 10px;
    background: #ccc !important;
    border: none !important;
    outline: none !important;
    margin-left: 2px;
    margin-bottom: -3px;
    border-radius: 0px !important;
    // width: 35px !important;
    border-right: 2px solid #08a108 !important;
    color: red !important;
    font-weight:800;
    text-transform: capitalize;
}
.act_fld{
  position:relative;
}
.act_fld:before{
  content:"Ative";
  position:absolute;
  display:block;
  left:0px;
  top:0px;
}

///// popup start

#code_pop{
  display:none;
  right:-100%
}

.popup{

  font-family:verdana;
  font-size:13px;
  padding:10px;
  background-color:rgb(240,240,240);
  border:2px solid grey;
  z-index:100000000000000000;
  display:none;
  }
  
  .code_pop{
    
    position: fixed;
    top: 32px;
    width: 40%;
    height: 100%;
    background: #ccc;
    right: 50px;
    z-index:99999;
    display:none;
    overflow: scroll;
  }
  #code_pop.popup.code_pop{
    display:block;
  }
.cancel{
  display:relative;
  cursor:pointer;
  margin:0;
  float:right;
  height: 18px;
    width: 20px;
    padding: 5px;
    background-color: #39c449;
  padding:5px;
  background-color:red;
  text-align:center;
  font-weight:bold;
  font-size:11px;
  color:white;
  border-radius:50%;
  z-index:100000000000000000;
  }

.cancel:hover{
  background:rgb(255,50,50);
  }
.usr_gide_cnt{
  position:relative;
}
.usr_gide{
  position:absolute;
  top:-35px;
  width:85px;
}



.image-preview img{
  width: 100%;
  height: 100%;
  object-fit: cover;
}



 .fld_type_qty{
  color: #fff;
  font-size: 20px;
  margin-left: 20px;
  background: #2d8909;
  margin-right: 20px;
  padding: 10px 10px;
  margin-top:0px;
 }
 .fncy_user_guide{
  font-size: 13px;
  /* border-radius: 20px; */
  background: #39c449;
  outline: none;
  border: none;
  color: #fff;
  cursor: grabbing;
 }
.mrd{
  color:pink;
}

#fld_open1.one1 .dual_pic2, #fld_open1.one1 .dul_pic3 {
display:none !important;
}
#fld_open1.one1 .dual_pic1 {
  width: 100%;
    // display: flex;
}

#fld_open1.one1 .dual_pic1 .image-preview{
  max-width:100%;
}
#fld_open1.two2 .dual_pic2
 {
   display:none !important;
 
  }

  #fld_open1.two2 .dual_pic1{
    width:28%;
  }
  #fld_open1.two2 .dual_pic1 .image-preview{
    max-width:100%;
  }

  #fld_open1.three3 .dual_pic1,   #fld_open1.three3 .dual_pic2{
    display:none;
  }

  #fld_open1.three3 .dual_pic3{
    width:100% !important;

  }

  #fld_open1.three3 .dual_pic_contnr>:last-child{
    width:91% !important;
  }

  #fld_open1.three3.text7 .dual_pic_contnr .dul_pic3 .three33 .regular-text:nth-last-child(-n+1)  {
    // margin:20px;
    // background: red;
    display:none;
  }
  #fld_open1.three3.text6 .dual_pic_contnr .dul_pic3 .three33 .regular-text:nth-last-child(-n+2)  {
    // margin:20px;
    // background: red;
    display:none;
  }
  #fld_open1.three3.text5 .dual_pic_contnr .dul_pic3 .three33 .regular-text:nth-last-child(-n+3)  {
    // margin:20px;
    // background: red;
    display:none;
  }
  #fld_open1.three3.text4 .dual_pic_contnr .dul_pic3 .three33 .regular-text:nth-last-child(-n+4)  {
    // margin:20px;
    // background: red;
    display:none;
  }
  #fld_open1.three3.text3 .dual_pic_contnr .dul_pic3 .three33 .regular-text:nth-last-child(-n+5)  {
    // margin:20px;
    // background: red;
    display:none;
  }
  #fld_open1.three3.text2 .dual_pic_contnr .dul_pic3 .three33 .regular-text:nth-last-child(-n+6)  {
    // margin:20px;
    // background: red;
    display:none;
  }
  #fld_open1.three3.text1 .dual_pic_contnr .dul_pic3 .three33 .regular-text:nth-last-child(-n+7)  {
    // margin:20px;
    // background: red;
    display:none;
  }
  #fld_open1.two2img .dual_pic_contnr .dul_pic3 {
    display:none;
  }
  
  #fld_open1.two2img .dual_pic_contnr.mult_pic_contnr> div {
    width:45%;
  }
  #fld_open1.two2img .dual_pic_contnr.mult_pic_contnr> div .image-preview {
    // width:100%;
    max-width:100%;
  }
  #fld_open1 .dual_pic_contnr> div .image-preview{
    width:97%;
  }

  #fld_open1.three3 .dual_pic_spcl_field{
    display:none;
  }
  #fld_open1 .dul_pic3 li.listtype.three33 {
    // position: relative;
}
.spcl_fld_txt{
  display:none;
}
  #fld_open1.three3 .spcl_fld_txt{
    // position:absolute;
    top:-20px;
    width:100%;
    left:0;
    right:0;
    display:block;
    color:#fff;
    font-weight: 600;
  }
  #fld_open1.three3 .spcl_fld_txt .red.dinline{
    background: #2d8909;
    display: inline-block;
    width: 16%;
    height: 28px;
    color:orange;
    vertical-align: middle;
  }
 

  #fld_open1.one1 .dual_pic_contnr{
    flex-wrap: inherit;
  }


  #fld_open1.img2text2 .dual_pic1 .regular-text:nth-last-child(-n+3), #fld_open1.img2text2 .dual_pic2 .regular-text:nth-last-child(-n+3)  {
   height:353.5px;
    }

  #fld_open1.img2text2 .dual_pic1 .regular-text:nth-last-child(-n+2), #fld_open1.img2text2 .dual_pic2 .regular-text:nth-last-child(-n+2)  {
     display:none;
  }

  #fld_open1.img2text4 .dual_pic1 .regular-text:nth-last-child(-n+3), #fld_open1.img2text4 .dual_pic2 .regular-text:nth-last-child(-n+2)
  #fld_open1.img2text4 .dual_pic1 .regular-text:nth-last-child(-n+3), #fld_open1.img2text4 .dual_pic2 .regular-text:nth-last-child(-n+3)  {
    height:174.5px;
     
   }
 
   #fld_open1.img2text4 .dual_pic1 .regular-text:nth-last-child(-n+1), #fld_open1.img2text4 .dual_pic2 .regular-text:nth-last-child(-n+1)  {
   
     display:none;
   }

  .dual_pic_spcl_field .listtype{
    margin-top: -32px;
    border-top: 0px;
    list-style: decimal-leading-zero;
    border-top-right-radius: 10px;
  }

 

  .pic_url{
    background:red;
    height:20px !important;
  }

  .pic_fld_numbr{
    display:none;
  }

  #fld_open1.three3 .pic_fld_numbr{
    display: block;
    width: 90px;
    text-align: center;
    background: #ffffff;
    color: red;
    border-radius:20px;
  }
  .lot_pic{
    display:flex;
    display:none;
  }
  #fld_open1.three3 .one1pic .three33 .lot_pic{
    display:block;
    display:flex;
  }
  #fld_open1.three3 .one1pic .three33 .lot_pic .text_pic_field:nth-last-child(-n+3){
    display:none;
  }

  #fld_open1.three3 .four4pic  .three33 .lot_pic {
    display:block;
    display:flex;
  }
  #fld_open1.three3 .four4pic  .three33 .lot_pic .text_pic_field {
     width:25%;
  }

  #fld_open1.three3 .four4pic  .three33 .lot_pic .text_pic_field img {
    width: 100%;
    height: 100px;
    object-fit: cover;
    overflow: hidden
 }
  #fld_open1.three3 .four4pic  .three33 .lot_pic .image-upload {
    display:none;
   
  }

  .txt_fld_picview_qty{
    position: absolute;
    top: 246px;
    right: 45px;
    color: #ffffff;
    background: #39c449;
    padding: 5px 5px 5px 5px;
    border-radius: 20px;
  }
  .txt_fld_picview_qty label{
    margin: 6px 5px;
  }
  .fld_numbr{
    border-radius: 20px !important;
    border: 2px solid #39c449 !important;
    margin-top: 8px;
  }

  // .#fld_open1.three3 .dual_pic_contnr .dul_pic3 .three33 .lot_pic .text_pic_field input[type=text].regular-text.pic_url{
  //   display:block !important  !important !important;
  //   display:flex;
  // }
  .d-flex{
    display:flex;
  }

  .dtl_aro_psn::-webkit-calendar-picker-indicator {
    // display:none !important;
    color:green !important;
    margin-top:-12px;
  }
  .for_hdr {
    display: flex;
    flex-flow: wrap;
    justify-content: space-between;
}
 
.hdrtx_w50{
 width:48%;
 margin-top:10px;
}
.for_hdr input:first-child {
  flex: 1 0 100%;
}

 .dnone{
  display:none;
 }
  </style>';
}


// Remove P Tags  in wp editor and excerpt
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );



/////// below is the html part for meta box image 


////////// just cut and paste  this below html in required page

 
