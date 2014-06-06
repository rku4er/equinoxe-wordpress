<?php get_header(); ?>

    <div id="content-holder" class="single-listing">

        <div class="midwrapper group">

            <h1 id="listing-title"><?php the_title(); ?></h1>

            <?php get_sidebar(); ?>

            <section id="content" class="content heightContainer group">

    			<h1><?php echo sprintf( __( '%s Search Results for ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>

    			<?php get_template_part('loop'); ?>

    			<?php get_template_part('pagination'); ?>

            </section>

        </div>

    </div>

<?php get_footer(); ?>
