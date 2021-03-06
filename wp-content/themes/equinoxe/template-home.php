<?php /* Template Name: Homepage */ ?>

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

					$title = get_field('tile_title', $post->ID) ? get_field('tile_title', $post->ID) : get_the_title();

					if(get_field('tile_excerpt_back', $post->ID)){
						$content_back = '<p>'.get_field('tile_excerpt_back', $post->ID).'</p>';
					}else{
						$content_back = html5wp_excerpt('html5wp_tile_back');
					}

					$size = get_sub_field('full_width') ? 'tile_full_width' : 'tile_regular';

					if(has_post_thumbnail()){
						$thumbID = get_post_thumbnail_id(get_the_ID());
					}else{
						$seats = get_field('seats');
						$firstSlide = $seats[0];

						$thumbID = $firstSlide['image'];
					}

					$src = wp_get_attachment_image_src($thumbID, $size, false);
					$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
					$view_more = (true == strpos($url,'/fr/')) ? 'Voir Plus D’info' : 'View More';

					$output .= '<div class="scene" style="background-image: url('.$src[0].')">';

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
						$output .= '" class="more">'.$view_more.'</a>';
					$output .= '</div>';

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



		<section class="midwrapper heightContainer group">

			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<!-- article -->
				<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php the_content(); ?>

					<br class="clear">

					<?php edit_post_link(); ?>

				</article>
				<!-- /article -->

			<?php endwhile; ?>

			<?php else: ?>

				<!-- article -->
				<article>

					<h2><?php _e( 'Sorry, nothing to display.', 'equinoxe' ); ?></h2>

				</article>
				<!-- /article -->

			<?php endif; ?>

			<?php
			$posts = get_field('divisions');
			if(count($posts) > 0):	?>

			<section id="divisions">

				<h3 class="heading"><?php echo get_field('divisions_title'); ?></h3>

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
				/*$posts_per_page =  2;
				$offset =  0;*/
			?>

			<?php if(have_rows('services')): ?>

			<section id="tiles">

				<div class="inner">

					<?php $i = 0;  while(have_rows('services')): the_row();?>

						<?php //if($offset-1 < $i && $i - $offset < $posts_per_page): ?>

							<?php foreach( get_sub_field('page') as $post): ?>
							<?php setup_postdata($post); ?>

							<div class="tile <?php if(get_sub_field('full_width')) echo 'full-width' ?>">

								<?php
									$title = get_field('tile_title', $post->ID) ? get_field('tile_title', $post->ID) : get_the_title();

									if(get_field('tile_excerpt_back', $post->ID)){
										$content_back = '<p>'.get_field('tile_excerpt_back', $post->ID).'</p>';
									}else{
										$content_back = html5wp_excerpt('html5wp_tile_back');
									}

									$size = get_sub_field('full_width') ? 'tile_full_width' : 'tile_regular';

									if(has_post_thumbnail()){
										$thumbID = get_post_thumbnail_id(get_the_ID());
									}else{
										$seats = get_field('seats');
										$firstSlide = $seats[0];

										$thumbID = $firstSlide['image'];
									}

									$src = wp_get_attachment_image_src($thumbID, $size, false);

									$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
									$view_more = (true == strpos($url,'/fr/')) ? 'Voir Plus D’info' : 'View More';
								?>

								<div class="scene" style="background-image: url(<?php echo $src[0]; ?>)">

									<div class="face front">
										<div class="inner">
											<h3 class="title"><?php echo $title ?></h3>
										</div>
									</div>

									<div class="face back">
										<h3 class="title"><?php echo $title; ?></h3>
										<?php echo $content_back; ?>
										<a href="<?php echo get_permalink(); if(get_sub_field('hash')) echo '#'.get_sub_field('hash'); ?>" class="more"><?php echo $view_more ?></a>
									</div>
							</div>
							</div>

						<?php endforeach; ?>
						<?php wp_reset_postdata();?>

					<?php // endif; ?>

					<?php $i++; endwhile; ?>

				</div>

			</section>

			<?php //if(count(get_field('services')) > $posts_per_page): ?>
				<!-- <a href="#full" id="expander"><?php _e('View') ?> <?php echo $posts_per_page; ?> <?php _e('items more') ?> <span class="icon-arrow-down6"></span></a> -->
			<?php //endif; ?>

			<?php endif; ?>

		</section>



		<?php if(get_field('show_mission')) :?>

		<section id="believe">

			<div class="midwrapper">

				<div class="group">
					<h3 class="title"><?php the_field('mission_title'); ?></h3>
					<?php if(get_field('mission_link_url') && get_field('mission_link_text')): ?>
					<a href="<?php the_field('mission_link_url'); ?>" class="read"><?php the_field('mission_link_text'); ?></a>
					<?php endif; ?>
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
					<a href="<?php the_field('about_link_url'); ?>" class="read"><?php the_field('about_link_text'); ?></a>
				</div>
				<div class="content">
					<?php
						if(get_field('about_content')){
							echo get_field('about_content');
						} else{
							$post = get_page(get_ID_by_slug('about'));
							echo html5wp_excerpt('html5wp_custom_post');
							wp_reset_postdata($post);
						}
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



	<?php get_footer(); ?>

<?php endif; ?>