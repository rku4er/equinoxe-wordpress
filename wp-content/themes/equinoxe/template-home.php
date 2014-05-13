<?php /* Template Name: Homepage */ get_header(); ?>



	<?php if(get_field('show_slider') && have_rows('seats')) :?>

	<section id="slider">

		<?php while(have_rows('seats')): the_row();?>

		<div class="slide">

			<h1 class="heading">
				<div class="inner">
					<h1 class="title"><?php the_sub_field('title'); ?></h1>
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


	<section class="midwrapper">

		<?php
		$posts = get_field('divisions');
		if(count($posts) > 0):	?>

		<section id="divisions">

			<h3 class="heading">Our Divisions</h3>

			<ul>

				<?php foreach( $posts as $post): ?>
				<?php setup_postdata($post);?>

				<li class="<?php echo $post->post_name; ?>">
					<h2 class="title">
						<a href="<?php echo get_permalink(); ?>">
							<figure>

								<?php
								$thumb = wp_get_attachment_image_src( get_field('division_icon'), 'full');
								if($thumb): ?>
								<img src="<?php echo $thumb[0]; ?>" alt="icon">
								<?php endif; ?>

							</figure>
							<span>+ <?php echo get_the_title(); ?></span>
						</a>
					</h2>
				</li>

				<?php endforeach; ?>
				<?php wp_reset_postdata();?>

			</ul>

		</section>

		<?php endif; ?>



		<?php
		$posts = get_field('services');
		if(count($posts) > 0):	?>

		<section id="tiles">

			<?php foreach( $posts as $post): ?>
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
						$bg = get_the_post_thumbnail(get_the_ID(), 'full', array(
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

		</section>

		<?php endif; ?>

	</section>



	<?php if(get_field('show_mission')) :?>

	<section id="believe">

		<div class="midwrapper">

			<div class="group">
				<h3 class="title"><?php the_field('mission_title'); ?></h3>
				<a href="<?php the_field('mission_link_url'); ?>" class="read"><?php the_field('mission_link_text'); ?></a>
			</div>

			<?php if(have_rows('mission_seats')): ?>

			<div id="quote-slider">

				<span class="prev icon-arrow-left7"></span>
				<span class="next icon-arrow-right7"></span>

				<div class="slide-holder content">

					<?php while(have_rows('mission_seats')): the_row();?>

					<blockquote>
						<?php the_sub_field('message'); ?>
					</blockquote>

					<?php endwhile; ?>

				</div>

			</div>

			<?php endif; ?>

		</div>

	</section>

	<?php endif; ?>



	<?php if(get_field('show_about')) :?>

	<section id="about">

		<div class="midwrapper">

			<div class="group">
				<h3 class="title"><?php the_field('about_title'); ?></h3>
				<a href="#readmission" class="read"><?php the_field('about_link_text'); ?></a>
			</div>
			<div class="content">
				<?php
					$post = get_page(get_ID_by_slug('about'));
					html5wp_excerpt('html5wp_custom_post');
					wp_reset_postdata($post);
				?>
			</div>

		</div>

	</section>

	<?php endif; ?>



	<?php if(get_field('show_call_us')) :?>

	<section id="givecall">

		<div class="midwrapper">

			<h4 class="title"><?php the_field('call_us_title'); ?></h4>
			<div class="phone"><?php the_field('call_us_phone'); ?></div>

		</div>

	</section>

	<?php endif; ?>



	<?php if(get_field('show_sponsors')) :?>

	<section id="sponsors">

		<div class="midwrapper">

			<h5 class="title"><?php echo get_field('sponsors_title', 'options'); ?></h5>

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



<?php get_footer(); ?>
