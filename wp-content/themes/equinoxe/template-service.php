<?php /* Template Name: Service */ get_header(); ?>

	<?php $parent = get_page($post->post_parent); ?>

	<?php if(get_field('revolution_slider')): ?>
		<section id="revolution-slider">
			<?php echo do_shortcode( get_field('revolution_slider') ) ?>
		</section>
	<?php endif; ?>

	<?php if(get_field('show_slider') && have_rows('seats')) :?>

	<section id="slider" class="<?php echo $parent->post_name; ?>">

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

	<div id="content-holder" class="heightContainer">

		<div class="midwrapper group">


			<aside id="sidenav">

				<h3 class="sidehat <?php echo $parent->post_name; ?>">
					<a href="<?php echo get_permalink($post->post_parent); ?>">
						<span><?php echo get_the_title($post->post_parent); ?></span>
						<figure>
							<?php
							$thumb = wp_get_attachment_image_src( get_field('division_icon', $post->post_parent), 'full');
							if($thumb): ?>
							<img src="<?php echo $thumb[0]; ?>" alt="icon">
							<?php endif; ?>
						</figure>
					</a>
				</h3>

				<?php
					wp_nav_menu( array(
					'theme_location' => 'header-menu',
					'sub_menu' => true,
					'menu_class' => 'sidenav'
					));
				?>

			</aside>

			<section id="content" class="group <?php echo $parent->post_name; ?>">

				<div class="content">

					<div id="heading" class="home">

						<!-- post thumbnail -->
						<?php
							if(get_field('header_image')){
								$thumbID = get_field('header_image');
							}else if(has_post_thumbnail()){
								$thumbID = get_post_thumbnail_id(get_the_ID());
							}else{
								$seats = get_field('seats');
								$firstSlide = $seats[0];

								$thumbID = $firstSlide['image'];
							}

							$src = wp_get_attachment_image_src($thumbID, 'heading', false);
						?>

						<div class="inner" style="background-image: url(<?php echo $src[0]; ?>)">

							<div class="row">

								<figure>
									<img src="<?php echo get_bloginfo('template_url'); ?>/img/bg/icon-heart.png" alt="" />
								</figure>

								<div class="holder">

									<h1 class="title"><?php the_title(); ?></h1>

								</div>

							</div>

						</div>

					</div>

					<?php if (have_posts()): while (have_posts()) : the_post(); ?>

						<!-- article -->
						<article id="post-<?php the_ID(); ?>" <?php post_class('headings'); ?>>

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

		</div>

	</div>

<?php get_footer(); ?>
