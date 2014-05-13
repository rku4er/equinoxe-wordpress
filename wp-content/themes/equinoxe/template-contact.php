<?php /* Template Name: Contact */ get_header(); ?>

	<section id="contact">

		<div class="midwrapper">

			<?php if(get_field('show_contact_sections') && have_rows('contact_sections')): ?>

			<ul id="sections">

				<?php while(have_rows('contact_sections')): the_row();?>

				<li>
					<figure class="icon">
						<span class="icon-<?php echo get_sub_field('icon_slug'); ?>"></span>
					</figure>
					<h2 class="title"><?php echo get_sub_field('title'); ?></h2>
					<p><?php echo get_sub_field('content'); ?></p>
				</li>

				<?php endwhile; ?>

			</ul>

			<?php endif; ?>

			<div class="group content headings">

				<?php if(get_field('show_contacts')): ?>

				<section id="find-us">

					<h3 class="title"><?php echo get_field('contacts_title'); ?></h3>

					<?php echo get_field('contacts'); ?>

				</section>

				<?php endif; ?>



				<?php if(get_field('contact_form', 'options')): ?>

				<section id="contact-form">

					<?php
	                    $form = get_field('contact_form', 'options');
	                    gravity_form($form->id, true, true, false, '', true, 1);
	                ?>

				</section>

				<?php endif; ?>

			</div>

		</div>


		<?php if(get_field('show_maps')): ?>

		<div id="map_holder">

			<div class="wrapper" id="map">
				<?php
				$thumb = wp_get_attachment_image_src( get_field('map_placeholder'), 'full');
				if($thumb): ?>
				<img src="<?php echo $thumb[0]; ?>" alt="location" title="Click to view interactive map"/>
				<?php endif; ?>
			</div>

		</div>

		<?php endif; ?>

	</section>

<?php get_footer(); ?>
