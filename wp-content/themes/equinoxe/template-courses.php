<?php /* Template Name: Listings */ get_header(); ?>

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



	<section id="blog">

	<?php
	$args = array(
		'post_type' => 'courses',
		'order' => 'DESC',
		'orderby' => $orderby,
		'paged' => get_query_var('page'),
		'posts_per_page' => -1
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
							<span class="day"><?php echo get_the_date( 'j' ); ?></span>
							<span class="time">
								<span class="line-1"><?php echo get_the_date( 'D, j F' ); ?></span>
								<span class="line-2"><?php echo get_the_date( 'G : i' ); ?></span>
							</span>
						</div>
					</section>
					<section class="body">
						<h2 class="title">
							<a href="<?php echo get_permalink(); ?>">
								<?php echo get_the_title(); ?>
							</a>
						</h2>
						<?php html5wp_excerpt('html5wp_custom_post'); ?>
					</section>
				</div>
			</li>

		<?php endforeach; ?>
		<?php wp_reset_postdata();?>

		</ul>

	<?php endif;?>

	</section>

<?php get_footer(); ?>
