<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <section class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'your-theme-textdomain'); ?> 11111</h1>
            </header><!-- .page-header -->

            <div class="page-content">
                <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'your-theme-textdomain'); ?></p>

                <?php get_search_form(); ?>

                <div class="widget widget_recent_entries">
                    <h2 class="widget-title"><?php esc_html_e('Recent Posts', 'your-theme-textdomain'); ?></h2>
                    <ul>
                        <?php
                        $recent_posts = wp_get_recent_posts(array('numberposts' => 5, 'post_status' => 'publish'));
                        foreach ($recent_posts as $post) :
                            echo '<li><a href="' . esc_url(get_permalink($post['ID'])) . '">' . esc_html(get_the_title($post['ID'])) . '</a></li>';
                        endforeach;
                        ?>
                    </ul>
                </div>

                <div class="widget widget_categories">
                    <h2 class="widget-title"><?php esc_html_e('Categories', 'your-theme-textdomain'); ?></h2>
                    <ul>
                        <?php
                        $categories = get_categories(array('orderby' => 'name', 'order' => 'ASC'));
                        foreach ($categories as $category) :
                            echo '<li><a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a></li>';
                        endforeach;
                        ?>
                    </ul>
                </div>

            </div><!-- .page-content -->
        </section><!-- .error-404 -->

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
