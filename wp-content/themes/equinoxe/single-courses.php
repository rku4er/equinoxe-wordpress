<?php get_header(); ?>

	<div id="blog" class="single-listing">

		<div class="midwrapper group">

			<h1 id="listing-title"><?php the_title(); ?></h1>

			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<aside id="sidebar">

					<figure class="thumb">
						<!-- post thumbnail -->
						<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
							<?php the_post_thumbnail('custom-size'); // Fullsize image for the single post ?>
						<?php else:?>
							<img src="<?php echo get_bloginfo('template_url'); ?>/img/thumb.png" alt="<?php echo get_the_title(); ?>"/>
						<?php endif; ?>
						<!-- /post thumbnail -->
					</figure>

					<section class="timestamp">
						<div class="wrapper">
							<span class="day"><?php echo get_the_date( 'j' ); ?></span>
							<span class="time">
								<span class="line-1"><?php echo get_the_date( 'D, j F' ); ?></span>
								<span class="line-2"><?php echo get_the_date( 'G : i' ); ?></span>
							</span>
						</div>
					</section>

					<section class="box content">
						<a href="#btn" class="btn">Attend</a>
					</section>


					<?php if(get_field('location_text')): ?>

					<section class="box location">
						<a href="<?php the_field('location_url'); ?>" class=""></a>
						<?php the_field('location_text'); ?>
					</section>

					<?php endif; ?>

				</aside>

				<section id="content" class="content group">

					<!-- article -->
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<?php the_content(); // Dynamic Content ?>

						<p class="tags"><?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end ?></p>

						<p class="category"><?php _e( 'Categorised in: ', 'html5blank' ); the_category(', '); // Separated by commas ?></p>

						<p class="post-author"><?php _e( 'This post was written by ', 'html5blank' ); the_author(); ?></p>

						<?php edit_post_link(); // Always handy to have Edit Post Links available ?>

						<?php comments_template('', true); ?>

					</article>
					<!-- /article -->

				</section>

			<?php endwhile; ?>

			<?php else: ?>

				<section id="content" class="content group">

					<!-- article -->
					<article>

						<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

					</article>
					<!-- /article -->

				</section>

			<?php endif; ?>

		</div>

	</div>

<?php get_footer(); ?>