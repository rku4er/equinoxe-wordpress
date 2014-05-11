<?php /* Template Name: About */ get_header(); ?>



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



	<section id="article" class="midwrapper content headings">

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

	</section>

	<section id="team">

		<div class="midwrapper headings">

			<h3>Who we are</h3>

			<ul class="group">

				<li>
					<a href="#face">
						<header>
							<figure class="face">
								<img src="images/avatar.jpg" alt="" />
							</figure>
							<span class="title">Danielle Pollack</span>
							<span class="position">Founder</span>
						</header>
						<span class="summary">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
					</a>
				</li>
				<li>
					<a href="#face">
						<header>
							<figure class="face">
								<img src="images/avatar.jpg" alt="" />
							</figure>
							<span class="title">Danielle Pollack</span>
							<span class="position">Founder</span>
						</header>
						<span class="summary">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
					</a>
				</li>
				<li>
					<a href="#face">
						<header>
							<figure class="face">
								<img src="images/avatar.jpg" alt="" />
							</figure>
							<span class="title">Danielle Pollack</span>
							<span class="position">Founder</span>
						</header>
						<span class="summary">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
					</a>
				</li>
				<li>
					<a href="#face">
						<header>
							<figure class="face">
								<img src="images/avatar.jpg" alt="" />
							</figure>
							<span class="title">Danielle Pollack</span>
							<span class="position">Founder</span>
						</header>
						<span class="summary">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
					</a>
				</li>
				<li>
					<a href="#face">
						<header>
							<figure class="face">
								<img src="images/avatar.jpg" alt="" />
							</figure>
							<span class="title">Danielle Pollack</span>
							<span class="position">Founder</span>
						</header>
						<span class="summary">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
					</a>
				</li>
				<li>
					<a href="#face">
						<header>
							<figure class="face">
								<img src="images/avatar.jpg" alt="" />
							</figure>
							<span class="title">Danielle Pollack</span>
							<span class="position">Founder</span>
						</header>
						<span class="summary">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
					</a>
				</li>
				<li>
					<a href="#face">
						<header>
							<figure class="face">
								<img src="images/avatar.jpg" alt="" />
							</figure>
							<span class="title">Danielle Pollack</span>
							<span class="position">Founder</span>
						</header>
						<span class="summary">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
					</a>
				</li>
				<li>
					<a href="#face">
						<header>
							<figure class="face">
								<img src="images/avatar.jpg" alt="" />
							</figure>
							<span class="title">Danielle Pollack</span>
							<span class="position">Founder</span>
						</header>
						<span class="summary">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
					</a>
				</li>
				<li>
					<a href="#face">
						<header>
							<figure class="face">
								<img src="images/avatar.jpg" alt="" />
							</figure>
							<span class="title">Danielle Pollack</span>
							<span class="position">Founder</span>
						</header>
						<span class="summary">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
					</a>
				</li>
				<li>
					<a href="#face">
						<header>
							<figure class="face">
								<img src="images/avatar.jpg" alt="" />
							</figure>
							<span class="title">Danielle Pollack</span>
							<span class="position">Founder</span>
						</header>
						<span class="summary">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
					</a>
				</li>
				<li>
					<a href="#face">
						<header>
							<figure class="face">
								<img src="images/avatar.jpg" alt="" />
							</figure>
							<span class="title">Danielle Pollack</span>
							<span class="position">Founder</span>
						</header>
						<span class="summary">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
					</a>
				</li>

			</ul>

		</div>

	</section>

	<section id="manage" class="midwrapper content headings group">

		<h4>How we manage care at equinoxe</h4>

		<p><img src="<?php echo get_bloginfo('template_url') ?>/img/manage-care.png" alt="manage care" class="aligncenter"/></p>

	</section>


<?php get_footer(); ?>
