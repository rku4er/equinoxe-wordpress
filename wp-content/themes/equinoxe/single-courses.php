<?php get_header(); ?>

	<div id="blog" class="heightContainer single-listing">

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
							<?php
								$day = date('j', get_field('location_time'));
								$date = date('D, j F', get_field('location_time'));
								$time = date('G : i', get_field('location_time'));
							?>

							<span class="day"><?php echo $day; ?></span>
							<span class="time">
								<span class="line-1"><?php echo $date; ?></span>
								<span class="line-2"><?php echo $time; ?></span>
							</span>
						</div>
					</section>

					<?php
					$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
					$attend_email = (true == strpos($url,'/fr/')) ? get_field('attend_email_french', 'options') : get_field('attend_email', 'options');
					?>

					<section class="box content">
						<a href="mailto:<?php echo $attend_email;?>" class="btn">Attend</a>
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

						<?php edit_post_link(); // Always handy to have Edit Post Links available ?>

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