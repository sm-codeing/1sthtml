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

<div class="aft_process">

  ///////with AFT using large code process  
  <ul class="socl d-flex justify-content-center justify-content-md-start zp-0">
      <?php if( have_rows('in_business_many_hdr') ): ?> 
          <?php while( have_rows('in_business_many_hdr') ): the_row(); ?>                     
              <?php         
              $icon_img = get_sub_field('rpt');       
              $icon_lnk = get_sub_field('in_business_many_hdr_rpt_link');       
              ?> 
  
             
  
      
                 
                  <li><a href="<?php echo $icon_lnk ?>"> <img src="<?php echo $icon_img['url']; ?>" alt=""> </a></li>
  
              
                
          <?php endwhile; ?>
        <?php endif; ?> 
      </ul>

</div>


<div class="bring_text_from_acf_repeater_anchor_field">  

///bring text from acf repeater anchor link   ----also it can be use to bring any text from acf repeter text field
<br/>
<?php while( have_rows('in_business_many_hdr') ): the_row(); 
  
  echo get_sub_field('in_business_many_hdr_rpt_link'); 

endwhile; ?>
</div>
   

<div class="bring_text">  
///////with my code using  very smlall code  process

<br/>

<?php while( have_rows('in_business_many_hdr') ): the_row(); ?>
    
    <a href="<?php echo get_sub_field('in_business_many_hdr_rpt_link'); ?>"> <img src="<?php  echo get_sub_field('rpt')['url']; ?>" alt="AAAA"> </a>
 
    <?php    endwhile; ?>

</div>
   



///// bootstrap slider with my small coding

<br/>




<div id="demo2" class="carousel slide" data-ride="carousel">

<!-- Indicators -->
<ul class="carousel-indicators">
  <li data-target="#demo2" data-slide-to="0" class="active"></li>
  <li data-target="#demo2" data-slide-to="1"></li>
  <li data-target="#demo2" data-slide-to="2"></li>
</ul>

<!-- The slideshow -->
<div class="carousel-inner">


<?php while ( have_rows('slde_pic_cont', 58) ) : the_row(); ?>
        <div  class=" carousel-item <?php echo ($count == 0) ? 'active' : ''; ?> ">
        
       
            <img src="<?php  echo get_sub_field('rpt_sl')['url']; ?>" alt="AAAA">
            <div class="carousel-caption">
      
  
      <?php echo get_sub_field('rpt_tx'); ?>
    </div> 
        </div>
      <?php   $count++; ?>
    
      <?php  endwhile; ?>
  


  
</div>

<!-- Left and right controls -->
<a class="carousel-control-prev" href="#demo2" data-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</a>
<a class="carousel-control-next" href="#demo2" data-slide="next">
  <span class="carousel-control-next-icon"></span>
</a>

</div>



<?php get_footer(); ?>