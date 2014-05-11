<?php /* Template Name: Contact */ get_header(); ?>

	<section id="contact">

		<div class="midwrapper">

			<ul id="sections">
				<li>
					<figure class="icon">
						<span class="icon-earth"></span>
					</figure>
					<h2 class="title">Our Address</h2>
					<p>
						Equinoxe LifeCare - Montreal <br />
						235-4999 rue Sainte-Catherine 0 <br />
						Montreal, QC H3Z 1T3
					</p>
				</li>
				<li>
					<figure class="icon">
						<span class="icon-phone"></span>
					</figure>
					<h2 class="title">Telephone</h2>
					<p>
						Tel: 514.935.2600 <br />
						Toll Free: 1.877.935.2600 <br />
						Fax: 514-935-0230
					</p>
				</li>
				<li>
					<figure class="icon">
						<span class="icon-paperclip"></span>
					</figure>
					<h2 class="title">Email</h2>
					<p>
						info@equinoxlifecare.com <br />
						press@equinoxelifecare.com
					</p>
				</li>
			</ul>

			<div class="group content headings">

				<section id="find-us">

					<h3 class="title">Find Us On</h3>

					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae tempor libero. Nam sit amet pharetra enim. Sed elit lorem, molestie eu lectus in, sagittis hendrerit tortor. Etiam nec arcu quis augue sagittis dapibus. Morbi vel odio ligula. Aliquam rhoncus aliquet pretium. Cras sagittis lectus nec ipsum tempus, non mattis augue vestibulum. Nullam libero diam, porttitor et tortor a, sagittis congue enim.</p>

				</section>

				<section id="contact-form">

					<h3 class="title">Get in Touch</h3>

					<form action="#">

						<p class="form-row">
							<input type="text" placeholder="Your Name"/>
						</p>

						<p class="form-row">
							<input type="email" placeholder="Email"/>
						</p>

						<p class="form-row">
							<textarea cols="50" rows="5" placeholder="Your Message"></textarea>
						</p>

						<p class="form-row buttons">
							<button type="submit">Submit</button>
						</p>

					</form>

				</section>

			</div>

		</div>

		<br />
		<br />
		<br />

		<div id="map_holder">

			<div class="wrapper" id="map"><img src="<?php echo get_bloginfo('template_url') ?>/img/gmap.jpg" alt="" /></div>

		</div>

	</section>

<?php get_footer(); ?>
