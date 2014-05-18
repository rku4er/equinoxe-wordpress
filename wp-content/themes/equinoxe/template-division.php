<?php /* Template Name: Division */ get_header(); ?>

	<?php if(get_field('show_slider') && have_rows('seats')) :?>

	<section id="slider">

		<?php while(have_rows('seats')): the_row();?>

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

	<?php if(get_field('services')): ?>

	<section class="midwrapper">

		<div id="tiles">

			<?php foreach( get_field('services') as $post): ?>
			<?php setup_postdata($post); ?>

			<div class="tile">
				<div class="scene">

					<div class="face front">
						<div class="inner">
							<h3 class="title"><?php echo get_the_title(); ?></h3>
							<?php html5wp_excerpt('html5wp_tile_front'); ?>
						</div>
					</div>

					<div class="face back">
						<h3 class="title"><?php echo get_the_title(); ?></h3>
						<?php html5wp_excerpt('html5wp_tile_back'); ?>
						<a href="<?php echo get_permalink(); ?>" class="more">View More</a>
					</div>

					<?php
						$bg = get_the_post_thumbnail(get_the_ID(), 'custom-size', array(
							'title' => get_the_title(),
							'class' => 'bg'
						));

						if($bg){
							echo $bg;
						} else{
							// echo '<img src="'.get_bloginfo('template_url').'/img/thumb.png" alt="'.get_the_title().'"/>';
						}
					?>

				</div>
			</div>

			<?php endforeach; ?>
			<?php wp_reset_postdata();?>

			<a href="#full" id="expander">For a full list of our services click here <span class="icon-arrow-down6"></span></a>

		</div>

	</section>

	<?php endif; ?>


<?php get_footer(); ?>
