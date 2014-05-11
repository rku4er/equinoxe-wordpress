			</div>
			<!-- /main -->

			<!-- footer -->
			<footer id="footer" role="contentinfo">

				<section class="top-row">

					<div class="midwrapper">

						<?php if(have_rows('columns', 'options')): ?>

						<div id="links">

							<?php while(have_rows('columns', 'options')): the_row();?>

							<div class="cell">

								<h5 class="title"><?php echo get_sub_field('title'); ?></h5>

								<?php
								$posts = get_sub_field('column');
								if($posts): ?>

								<ul>
									<?php foreach( $posts as $post): ?>
									<?php setup_postdata($post);?>
									<li><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></li>
									<?php endforeach; ?>
									<?php wp_reset_postdata();?>
								</ul>

								<?php endif; ?>

							</div>

							<?php endwhile; ?>

						</div>

						<?php endif; ?>



						<div id="newsletter">

							<h6 class="title">sign up for our newsletter</h6>

							<form action="#">

								<p class="form-row">
									<input type="email" placeholder="Email"/>
									<button type="submit">Submit</button>
								</p>

								<p class="form-row">
									<label>
										<input rel="icheckIgnore" type="radio" name="newsletter" value="Individual" checked="checked"/>
										Individual
									</label>
									<label>
										<input rel="icheckIgnore" type="radio" name="newsletter" value="Organizational" />
										Organizational
									</label>
									<label>
										<input rel="icheckIgnore" type="radio" name="newsletter" value="Technology" />
										Technology
									</label>
								</p>

							</form>

						</div>

					</div>

				</section>

				<section class="bottom-row">

					<div class="midwrapper">

						<section id="copyright">
							<p>Copyright &copy; <?php echo date('Y'); ?> - <br /> <?php bloginfo('name'); ?> - All rights Reserved.</p>
						</section>



						<?php if(have_rows('socials', 'options')):?>

						<section id="socials">
							<ul>

								<?php while(have_rows('socials', 'options')): the_row();?>
								<li>
									<a href="<?php echo get_sub_field('url'); ?>" class="icon-<?php echo get_sub_field('slug'); ?>"></a>
								</li>
								<?php endwhile; ?>

							</ul>
						</section>

						<?php endif; ?>

					</div>

				</section>

			</footer>
			<!-- /footer -->

		</div>
		<!-- /page -->

		<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'equinoxe.loc');
		ga('send', 'pageview');
		</script>

	</body>
</html>
