<?php get_header(); ?>

	<div id="blog" class="single-listing">

		<div class="midwrapper group">

			<h1 id="listing-title"><?php the_title(); ?></h1>

			<?php get_sidebar(); ?>

			<section id="content" class="content group">

			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<!-- post thumbnail -->
					<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
						<?php the_post_thumbnail(); // Fullsize image for the single post ?>
					<?php endif; ?>
					<!-- /post thumbnail -->

					<!-- post details -->
					<p class="meta">
						<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
						. <span class="author"><?php _e( 'Published by', 'html5blank' ); ?> <?php the_author_posts_link(); ?></span>
						. <span class="comments"><?php comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span>
					</p>
					<!-- /post details -->

					<?php the_content(); // Dynamic Content ?>

					<p class="tags"><?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end ?></p>

					<p class="category"><?php _e( 'Categorised in: ', 'html5blank' ); the_category(', '); // Separated by commas ?></p>

					<p class="post-author"><?php _e( 'This post was written by ', 'html5blank' ); the_author(); ?></p>

					<?php edit_post_link(); // Always handy to have Edit Post Links available ?>

					<?php comments_template('', true); ?>

				</article>
				<!-- /article -->

			<?php endwhile; ?>

			<?php else: ?>

				<!-- article -->
				<article>

					<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

				</article>
				<!-- /article -->

			<?php endif; ?>

			</section>

		</div>

	</div>

<?php get_footer(); ?>