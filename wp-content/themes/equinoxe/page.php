<?php get_header(); ?>

	<div id="content-holder" class="single-listing">

		<div class="midwrapper group">

			<h1 id="listing-title"><?php the_title(); ?></h1>

			<!-- <aside id="sidebar">

				<figure class="thumb">
					<img src="images/thumb.png" alt="" />
				</figure>

				<section class="timestamp">
					<div class="wrapper">
						<span class="day">6</span>
						<span class="time">
							<span class="line-1">Thu, 6 February</span>
							<span class="line-2">7:00</span>
						</span>
					</div>
				</section>

				<section class="box content">
					<a href="#btn" class="btn">Attend</a>
				</section>

				<section class="box location">
					Convension Center <br />
					555 Main St floor 7 <br />
					New York. NY 10002
				</section>

			</aside> -->

			<?php get_sidebar(); ?>

			<section id="content" class="content group">

				<?php if (have_posts()): while (have_posts()) : the_post(); ?>

					<!-- article -->
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<?php the_content(); ?>

						<br class="clear">

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

		</div>

	</div>

<?php get_footer(); ?>
