<?php get_header(); ?>

    <div id="content-holder" class="heightContainer single-listing">

        <div class="midwrapper group">

            <h1 id="listing-title"><?php _e( 'Archives', 'html5blank' ); ?></h1>

            <?php get_sidebar(); ?>

            <section id="content" class="content group">

    			<?php get_template_part('loop'); ?>

    			<?php get_template_part('pagination'); ?>

            </section>

        </div>

    </div>

<?php get_footer(); ?>

