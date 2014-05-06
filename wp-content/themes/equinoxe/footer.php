			</div>
			<!-- /main -->

			<!-- footer -->
			<footer id="footer" role="contentinfo">

				<section class="top-row">

					<div class="midwrapper">

						<div id="links">

							<div class="cell">

								<h5 class="title">services</h5>

								<ul>
									<li><a href="#home-care">Home Care</a></li>
									<li><a href="#organizational-care">Organizational Care</a></li>
									<li><a href="#technology-based-care">Technology-Based Care</a></li>
								</ul>

							</div>



							<div class="cell">

								<h5 class="title">connect</h5>

								<ul>
									<li><a href="#careers">Careers</a></li>
									<li><a href="listings.html">Training Courses</a></li>
									<li><a href="#resources">Resources</a></li>
									<li><a href="contact.html">Contact Us</a></li>
								</ul>

							</div>

						</div>

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

						<!-- copyright -->
						<section id="copyright">
							<p>Copyright &copy; <?php echo date('Y'); ?> - <br /> <?php bloginfo('name'); ?> - All rights Reserved.</p>
						</section>
						<!-- /copyright -->

						<section id="socials">
							<ul>
								<li><a href="#facebook" class="icon-facebook"></a></li>
								<li><a href="#twitter" class="icon-twitter"></a></li>
								<li><a href="#linkedin" class="icon-linkedin"></a></li>
							</ul>
						</section>

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
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>

	</body>
</html>
