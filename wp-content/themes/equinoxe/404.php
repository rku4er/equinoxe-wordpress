<?php get_header(); ?>

	<div id="content-holder" class="heightContainer single-listing">

		<div class="midwrapper group">

			<h1 id="listing-title">Error 404</h1>

			<?php get_sidebar(); ?>

			<section id="content" class="content group">

				<!-- article -->
				<article id="post-404">

					<h1><?php _e( 'Page not found', 'html5blank' ); ?></h1>
					<h2>
						<a href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'html5blank' ); ?></a>
					</h2>

				</article>
				<!-- /article -->

			</section>

		</div>

	</div>

<?php get_footer(); ?>
