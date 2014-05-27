<?php /* Template Name: Listings */ get_header(); ?>

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



	<section id="blog">

	<?php
	$postsPerPage = get_field('courses_to_display') ? get_field('courses_to_display') : 6;

	$args = array(
		'post_type' => 'courses',
		'order' => 'DESC',
		'orderby' => $orderby,
		'paged' => get_query_var('page'),
		'posts_per_page' => $postsPerPage
	);
	$posts = get_posts( $args );

	if( $posts ): ?>

		<ul id="listing">

	<?php foreach( $posts as $post): ?>
	<?php setup_postdata($post); ?>

			<li>
				<div class="midwrapper">
					<figure class="thumb">
						<?php
							$thumb = get_the_post_thumbnail(get_the_ID(), 'custom-size',array(
								'title' => get_the_title()
							));

							if($thumb){
								echo $thumb;
							} else{
								echo '<img src="'.get_bloginfo('template_url').'/img/thumb.png" alt="'.get_the_title().'"/>';
							}
						?>
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
					<section class="body">
						<h2 class="title">
							<a href="<?php echo get_permalink(); ?>">
								<?php echo get_the_title(); ?>
							</a>
						</h2>
						<?php echo html5wp_excerpt('html5wp_custom_post'); ?>
					</section>
				</div>
			</li>

		<?php endforeach; ?>
		<?php wp_reset_postdata();?>

		</ul>

	<?php endif;?>

	</section>

<?php get_footer(); ?>
