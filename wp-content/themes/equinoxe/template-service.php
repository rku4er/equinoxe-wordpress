<?php /* Template Name: Service */ get_header(); ?>

	<div id="content-holder">

		<div class="midwrapper group">

			<?php $parent = get_page($post->post_parent); ?>

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

			<section id="content" class="group">

				<div class="content">

					<div id="heading" class="home">

						<div class="inner">

							<h1 class="title">
								<figure>
									<img src="<?php echo get_bloginfo('template_url'); ?>/img/bg/icon-heart.png" alt="" />
								</figure>
								<span><?php the_title(); ?></span>
							</h1>

							<!-- post thumbnail -->
							<?php if ( has_post_thumbnail()) :?>
								<?php the_post_thumbnail('heading'); ?>
							<?php endif; ?>

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



					<?php if(get_field('show_overview')): ?>

					<section id="colorboard">

						<h2 class="title"><?php the_field('overview_title'); ?></h2>


						<?php if(have_rows('overview_sections')): ?>
						<div class="board-wrapper">

							<?php $i = 0; while(have_rows('overview_sections')): the_row(); $i++;?>

							<div class="board color-<?php echo $i; ?>">

								<h3 class="header"><?php the_sub_field('title'); ?></h3>

								<div class="body">

									<?php the_sub_field('content'); ?>

								</div>

							</div>

							<?php endwhile; ?>

						</div>
						<?php endif; ?>

					</section>

					<?php endif; ?>

				</section>

			</div>

		</div>

<?php get_footer(); ?>
