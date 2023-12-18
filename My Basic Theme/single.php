<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php
        // Start the loop
        while (have_posts()) : the_post();

            // Display the post content
            the_content();

            // Display the featured image
            if (has_post_thumbnail()) {
                the_post_thumbnail('full'); // You can change 'full' to other image sizes as needed
            }

            // Display other post details like author, date, categories, etc.
            the_author();
            the_date();
            the_category();

            // You can customize the layout and additional content here

        endwhile; // End of the loop
        ?>

        <div class="navigation">
            <div class="nav-previous"><?php previous_post_link('&laquo; %link'); ?></div>
            <div class="nav-next"><?php next_post_link('%link &raquo;'); ?></div>
        </div>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
