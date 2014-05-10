<?php /* Template Name: Division */ get_header(); ?>

	<?php if(get_field('show_slider')) :?>

	<section id="slider">

		<?php while(the_repeater_field('seats')): ?>

		<div class="slide">

			<h1 class="heading">
				<div class="inner">
					<h1 class="title"><?php the_sub_field('title'); ?></h1>
					<br />
					<span class="text">
						<span>
							<?php the_sub_field('sub_title'); ?>
						</span>
					</span>
				</div>
			</h1>

			<?php
			$thumb = wp_get_attachment_image_src( get_sub_field('image'), 'full');
			if($thumb): ?>

			<img src="<?php echo $thumb[0]; ?>" alt="background" class="ground">

			<?php endif; ?>

		</div>

		<?php endwhile; ?>

	</section>

	<?php endif; ?>


	<section id="article">

		<div class="midwrapper content headings">

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

		</div>

	</section>


<?php get_footer(); ?>
