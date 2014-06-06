<?php get_header(); ?>

    <div id="content-holder" class="single-listing">

        <div class="midwrapper group">

            <h1 id="listing-title"><?php _e( 'Tag Archive: ', 'html5blank' ); echo single_tag_title('', false); ?></h1>

            <?php get_sidebar(); ?>

            <section id="content" class="content heightContainer group">

    			<?php get_template_part('loop'); ?>

    			<?php get_template_part('pagination'); ?>

            </section>

        </div>

    </div>

<?php get_footer(); ?>
