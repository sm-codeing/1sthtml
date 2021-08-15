

	$('.regular').slick({
  //centerMode: true,
 // autoplay: true,
 //infinite: false,
 arrows: true,
  dots: true,
  slidesToShow: 3,
  slidesToScroll: 3,
  responsive: [
    {
      breakpoint: 968,
      settings: {
        //arrows: true,
        
         slidesToShow: 2,
  slidesToScroll: 1,
      }
    },
    {
      breakpoint: 768,
      settings: {
        arrows: false,
       autoplay: true,
        slidesToShow: 1,
		slidesToScroll: 1,
      }
    }
  ]
});




	$('.regular2').slick({
  //centerMode: true,
 // autoplay: true,
 infinite: false,
 arrows: true,
  dots: true,
  slidesToShow: 3,
  slidesToScroll: 3,
  responsive: [
    {
      breakpoint: 968,
      settings: {
        //arrows: true,
        
         slidesToShow: 2,
  slidesToScroll: 1,
      }
    },
    {
      breakpoint: 768,
      settings: {
        arrows: false,
       autoplay: true,
        slidesToShow: 1,
		slidesToScroll: 1,
      }
    }
  ]
});




$(window).scroll(function() {
    if ($(this).scrollTop() > 1){  
        $('.fxd .navbar').addClass("sticky");
		   $(".dnn").hide(100);
		   $('.fxd').addClass("sticky");
		    $('.twm').addClass("mrsticky");
    }
    else{
        $('.fxd .navbar').removeClass("sticky");
		 $('.fxd').removeClass("sticky");
		 $('.twm').removeClass("mrsticky");
		   $(".dnn").show(1000); 
		
    }
});
   
 

  
  $(document).ready(function(){
     $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('#back-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
        
        $('#back-to-top').tooltip('show');

});
 





var list = document.getElementsByClassName('insrt_pic_in_bg');

for (var i = 0; i < list.length; i++) {
  var src = list[i].getAttribute('data-image-src');
  list[i].style.backgroundImage="url('" + src + "')";
}



  