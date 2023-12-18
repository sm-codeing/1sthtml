</div>

<?php
function display_custom_field_content($post_id) {
    // Define the number of groups and custom fields per group
    $num_groups = 5;
    $fields_per_group = 4;

    // Loop through groups
    for ($group = 1; $group <= $num_groups; $group++) {
        // Loop through custom fields in the group
        for ($field = 1; $field <= $fields_per_group; $field++) {
            $field_number = ($group - 1) * 4 + $field;
            $value = get_post_meta($post_id, "_custom_field_$field_number", true);

            // Display the custom field value
            echo "<p>Group $group - Field $field: $value</p>";
        }
    }
}?>
<footer>
	<p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
</footer>

<?php wp_footer(); ?>



<script>

$(document).ready(function(){

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }
    });

});
</script>

 <script>
$(window).scroll(function() {
    if ($(this).scrollTop() > 20){  
        $('.cnav').addClass("msticky");
		 $(".cnav").show(1000); 
    }
    else{
        $('.cnav').removeClass("msticky");
		 $(".cnav").show(1000);
    }
});
</script>

<style>
section{
	overflow: hidden;
}

@media (min-width: 768px) {
  .custom-element {
    color: var(--primary);
  }
}


</style>
<!-- <script src="js/aos.js"></script>
<script  src="./script.js"></script> -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script>
  AOS.init({
   duration: 1200
  });
  
  </script>
</body>
</html>
