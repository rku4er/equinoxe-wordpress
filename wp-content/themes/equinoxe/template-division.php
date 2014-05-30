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
	$output = '';

	if(count(get_field('services')) > $offset + $posts_per_page){
		$empty = false;
	}else{
		$empty = true;
	}

	if(have_rows('services')){

		$output .= '<div class="wrapper">';

		$i = 0;

		while(have_rows('services')){
			the_row();

			if($offset-1 < $i && $i - $offset < $posts_per_page){

				foreach( get_sub_field('page') as $post){
					setup_postdata($post);

					$output .= '<div class="tile';

					if(get_sub_field('full_width')){
						$output .= ' full-width">';
					}else{
						$output .= '">';
					}

					$output .= '<div class="scene">';

					$title = get_field('tile_title', $post->ID) ? get_field('tile_title', $post->ID) : get_the_title();

					if(get_field('tile_excerpt_back', $post->ID)){
						$content_back = '<p>'.get_field('tile_excerpt_back', $post->ID).'</p>';
					}else{
						$content_back = html5wp_excerpt('html5wp_tile_back');
					}

					$size = get_sub_field('full_width') ? 'tile_full_width' : 'tile_regular';
					$thumb = get_the_post_thumbnail(get_the_ID(), $size, array(
						'title' => get_the_title(),
						'class' => 'bg'
					));
					$seats = get_field('seats');
					$firstSlide = $seats[0];

					if(!$thumb && $firstSlide['image']){
						$src = wp_get_attachment_image_src($firstSlide['image'], $size, false);
						$thumb = '<img src="'.$src[0].'" alt="" class="bg" />';
					}

					$output .= '<div class="face front">';
						$output .= '<div class="inner">';
							$output .= '<h3 class="title">'.$title.'</h3>';
						$output .= '</div>';
					$output .= '</div>';

					$output .= '<div class="face back">';
						$output .= '<h3 class="title">'.$title.'</h3>';
						$output .= $content_back;
						$output .= '<a href="'.get_permalink();
							if(get_sub_field('hash')) $output .= '#'.get_sub_field('hash');
						$output .= '" class="more">View More</a>';
					$output .= '</div>';

					$output .= $thumb;

					$output .= '</div>';
					$output .= '</div>';

				}

				wp_reset_postdata();
			}

			$i++;

		}

		$output .= '</div>';

	}

	$json = array(
	    'html'	=>	$output,
	    'empty'	=>	$empty
	);
	echo json_encode($json);
	exit;
?>

<?php else: ?>

	<?php get_header(); ?>

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

		<section id="article" class="<?php echo $parent->post_name; ?>">

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

			<div class="midwrapper group">

				<div id="tiles" class="<?php echo $parent->post_name; ?>">

					<div class="inner">

						<?php $i = 0;  while(have_rows('services')): the_row();?>

						<?php if($offset-1 < $i && $i - $offset < $posts_per_page):?>

							<?php foreach( get_sub_field('page') as $post): ?>
							<?php setup_postdata($post); ?>

							<div class="tile <?php if(get_sub_field('full_width')) echo 'full-width' ?>">
								<div class="scene">

									<?php
										$title = get_field('tile_title', $post->ID) ? get_field('tile_title', $post->ID) : get_the_title();

										if(get_field('tile_excerpt_back', $post->ID)){
											$content_back = '<p>'.get_field('tile_excerpt_back', $post->ID).'</p>';
										}else{
											$content_back = html5wp_excerpt('html5wp_tile_back');
										}

										$size = get_sub_field('full_width') ? 'tile_full_width' : 'tile_regular';
										$thumb = get_the_post_thumbnail(get_the_ID(), $size, array(
											'title' => get_the_title(),
											'class' => 'bg'
										));
										$seats = get_field('seats');
										$firstSlide = $seats[0];

										if(!$thumb && $firstSlide['image']){
											$src = wp_get_attachment_image_src($firstSlide['image'], $size, false);
											$thumb = '<img src="'.$src[0].'" alt="" class="bg" />';
										}

									?>

									<div class="face front">
										<div class="inner">
											<h3 class="title"><?php echo $title ?></h3>
										</div>
									</div>

									<div class="face back">
										<h3 class="title"><?php echo $title; ?></h3>
										<?php echo $content_back; ?>
										<a href="<?php echo get_permalink(); if(get_sub_field('hash')) echo '#'.get_sub_field('hash'); ?>" class="more">View More</a>
									</div>

									<?php echo $thumb; ?>

								</div>
							</div>

							<?php endforeach; ?>
							<?php wp_reset_postdata();?>

						<?php endif; ?>

						<?php $i++; endwhile; ?>

					</div>

				</div>

				<?php if(count(get_field('services')) > $posts_per_page): ?>
					<a href="#full" id="expander">For a full list of our services click here <span class="icon-arrow-down6"></span></a>
				<?php endif; ?>

			</div>

		<?php endif; ?>

	<?php get_footer(); ?>

<?php endif; ?>