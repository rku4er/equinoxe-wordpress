<?php /* Template Name: About */ get_header(); ?>

    <?php if(get_field('revolution_slider')): ?>
        <section id="revolution-slider">
            <?php echo do_shortcode( get_field('revolution_slider') ) ?>
        </section>
    <?php endif; ?>

    <?php if(get_field('show_slider') && have_rows('seats')) :?>

    <section id="slider">

        <?php while(have_rows('seats')): the_row();?>

        <div class="slide">

            <div class="heading">
                <div class="inner">
                    <h1 class="title"><?php the_sub_field('title'); ?></h1>
                    <p class="text">
                        <span>
                            <?php the_sub_field('sub_title'); ?>
                        </span>
                    </p>
                </div>
            </div>

            <?php
            $thumb = wp_get_attachment_image_src( get_sub_field('image'), 'full');
            if($thumb): ?>

            <img src="<?php echo $thumb[0]; ?>" alt="background" class="ground">

            <?php endif; ?>

        </div>

        <?php endwhile; ?>

    </section>

    <?php endif; ?>

    <div class="heightContainer">

        <section id="article" class="midwrapper content headings">

            <?php if (have_posts()): while (have_posts()) : the_post(); ?>

                <!-- article -->
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <?php the_content(); ?>

                    <?php edit_post_link(); ?>

                </article>
                <!-- /article -->

            <?php endwhile; ?>

            <?php else: ?>

                <!-- article -->
                <article>

                    <h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

                </article>
                <!-- /article -->

            <?php endif; ?>

        </section>


        <?php if(get_field('show_team')) :?>

        <section id="team">

            <div class="midwrapper headings">

                <h3 class="heading"><?php echo get_field('team_title'); ?></h3>

                <?php if(have_rows('staff')): ?>

                <ul class="group">

                    <?php while(have_rows('staff')): the_row();?>

                    <li>
                        <header>
                            <figure class="face">
                                <?php
                                $thumb = wp_get_attachment_image_src( get_sub_field('thumb'), 'team-size');
                                if($thumb):
                                ?>

                                <img src="<?php echo $thumb[0]; ?>" alt="face">

                                <?php endif; ?>
                            </figure>
                            <span class="title"><?php echo get_sub_field('name') ?></span>
                            <span class="position"><?php echo get_sub_field('position') ?></span>
                        </header>
                        <div class="summary"><?php echo get_sub_field('bio'); ?></div>
                    </li>

                    <?php endwhile; ?>

                </ul>

                <?php endif; ?>

            </div>

        </section>

        <?php endif; ?>



        <?php if(get_field('show_manage_care')) :?>

        <section id="manage" class="midwrapper content headings group">

            <h4 class="heading"><?php echo get_field('manage_care_title'); ?></h4>

            <?php echo get_field('manage_care_content'); ?>

        </section>

        <?php endif; ?>



        <?php if(get_field('show_sponsors')) :?>

        <section id="sponsors">

            <div class="midwrapper">

                <div class="content headings">
                    <h5 class="heading"><?php echo get_field('sponsors_title'); ?></h5>
                </div>

                <?php if(have_rows('sponsors', 'options')): ?>

                <ul>

                    <?php while(have_rows('sponsors', 'options')): the_row();?>

                    <li>
                        <a href="<?php echo get_sub_field('url') ?>" target="_blank">
                            <?php
                            $logo = get_sub_field('logo');
                            if(count($logo) > 0) echo '<img src="'.$logo['url'].'" alt="'.$logo['title'].'"/>';
                            ?>

                            <span><?php echo get_sub_field('title') ?></span>
                        </a>
                    </li>

                    <?php endwhile; ?>

                </ul>

                <?php endif; ?>

            </div>

        </section>

        <?php endif; ?>

    </div>


<?php get_footer(); ?>
