<?php /* Template Name: Division */ ?>

<?php if($_POST['offset']): ?>

	<?php
		if( get_query_var('page') ) {
			$page = get_query_var( 'page' );
		} else {
			$page = 1;
		}

		$posts_per_page =  $_POST['load'];
		$offset = $_POST['offset'];
	?>

	<?php if(have_rows('services')): ?>

		<div class="wrapper">

			<?php $i = 0; while(have_rows('services')): the_row();?>

			<?php if($offset-1 < $i && $i - $offset < $posts_per_page):?>

				<?php foreach( get_sub_field('page') as $post): ?>
					<?php setup_postdata($post); ?>

					<div class="tile <?php if(get_sub_field('full_width')) echo 'full-width' ?>">
						<div class="scene">

							<?php
								$title = get_field('tile_title', $post->ID) ? get_field('tile_title', $post->ID) : get_the_title();

								if(get_field('tile_excerpt_front', $post->ID)){
									$content_front = '<p>'.get_field('tile_excerpt_front', $post->ID).'</p>';
								}else{
									$content_front = html5wp_excerpt('html5wp_tile_front');
								}
								if(get_field('tile_excerpt_back', $post->ID)){
									$content_back = '<p>'.get_field('tile_excerpt_back', $post->ID).'</p>';
								}else{
									$content_back = html5wp_excerpt('html5wp_tile_back');
								}

								$size = get_sub_field('full_width') ? 'tile_full_width' : 'tile_regular';
								$bg = get_the_post_thumbnail(get_the_ID(), $size, array(
									'title' => get_the_title(),
									'class' => 'bg'
								));
							?>

							<div class="face front">
								<div class="inner">
									<h3 class="title"><?php echo $title ?></h3>
									<?php echo $content_front; ?>
								</div>
							</div>

							<div class="face back">
								<h3 class="title"><?php echo $title; ?></h3>
								<?php echo $content_back; ?>
								<a href="<?php echo get_permalink(); if(get_sub_field('hash')) echo '#'.get_sub_field('hash'); ?>" class="more">View More</a>
							</div>

							<?php echo $bg; ?>

						</div>
					</div>

					<?php endforeach; ?>
					<?php wp_reset_postdata();?>

				<?php endif; ?>

			<?php $i++; endwhile; ?>

		</div>

	<?php endif; ?>

<?php else: ?>

	<?php get_header(); ?>

		<?php if(get_field('show_slider') && have_rows('seats')) :?>

			<section id="slider">

				<?php while(have_rows('seats')): the_row();?>

				<div class="slide">

					<div class="heading">
						<div class="inner">
							<?php $parent = get_page($post->post_parent); ?>

							<h1 class="title <?php echo $parent->post_name; ?>"><?php the_sub_field('title'); ?></h1>

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

		<?php
			$posts_per_page =  3;
			$offset =  0;
		?>

		<?php if(have_rows('services')): ?>

			<div class="midwrapper">

				<div id="tiles">

					<div class="inner">

						<?php $i = 0;  while(have_rows('services')): the_row();?>

						<?php if($offset-1 < $i && $i - $offset < $posts_per_page):?>

							<?php foreach( get_sub_field('page') as $post): ?>
							<?php setup_postdata($post); ?>

							<div class="tile <?php if(get_sub_field('full_width')) echo 'full-width' ?>">
								<div class="scene">

									<?php
										$title = get_field('tile_title', $post->ID) ? get_field('tile_title', $post->ID) : get_the_title();

										if(get_field('tile_excerpt_front', $post->ID)){
											$content_front = '<p>'.get_field('tile_excerpt_front', $post->ID).'</p>';
										}else{
											$content_front = html5wp_excerpt('html5wp_tile_front');
										}
										if(get_field('tile_excerpt_back', $post->ID)){
											$content_back = '<p>'.get_field('tile_excerpt_back', $post->ID).'</p>';
										}else{
											$content_back = html5wp_excerpt('html5wp_tile_back');
										}

										$size = get_sub_field('full_width') ? 'tile_full_width' : 'tile_regular';
										$bg = get_the_post_thumbnail(get_the_ID(), $size, array(
											'title' => get_the_title(),
											'class' => 'bg'
										));
									?>

									<div class="face front">
										<div class="inner">
											<h3 class="title"><?php echo $title ?></h3>
											<?php echo $content_front; ?>
										</div>
									</div>

									<div class="face back">
										<h3 class="title"><?php echo $title; ?></h3>
										<?php echo $content_back; ?>
										<a href="<?php echo get_permalink(); if(get_sub_field('hash')) echo '#'.get_sub_field('hash'); ?>" class="more">View More</a>
									</div>

									<?php echo $bg; ?>

								</div>
							</div>

							<?php endforeach; ?>
							<?php wp_reset_postdata();?>

						<?php endif; ?>

						<?php $i++; endwhile; ?>

					</div>

				</div>

				<?php if(count(get_field('services')) > 3): ?>
					<a href="#full" id="expander">For a full list of our services click here <span class="icon-arrow-down6"></span></a>
				<?php endif; ?>

			</div>

		<?php endif; ?>

	<?php get_footer(); ?>

<?php endif; ?>