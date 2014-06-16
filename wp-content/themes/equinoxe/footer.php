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

								<?php if(have_rows('column')): ?>
								<ul>

									<?php while(have_rows('column')): the_row(); ?>

									<?php
									$posts = get_sub_field('page');
									if($posts): ?>

									<?php foreach( $posts as $post): ?>
									<?php setup_postdata($post);?>

									<?php $title = get_field('tile_title', $post->ID) ? get_field('tile_title', $post->ID) : get_the_title(); ?>

									<li><a href="<?php echo get_permalink(); if(get_sub_field('hash')) echo '#'.get_sub_field('hash'); ?>"><?php echo $title; ?></a></li>

									<?php endforeach; ?>
									<?php wp_reset_postdata();?>

									<?php endif; ?>

									<?php endwhile; ?>

								</ul>
								<?php endif; ?>


							</div>

							<?php endwhile; ?>

						</div>

						<?php endif; ?>



						<?php if(get_field('newsletter_form', 'options')): ?>

						<div id="newsletter">
							<?php
							$form = get_field('newsletter_form', 'options');
	                    	gravity_form($form->id, true, true, false, '', true, 1);
							?>
						</div>

						<?php endif;?>


					</div>

				</section>

				<section class="bottom-row">

					<div class="midwrapper">

						<section id="copyright">
							<p>Copyright &copy; <?php echo date('Y'); ?> - <br /><?php _e(bloginfo('name')) ?> - <?php _e('All rights Reserved') ?>.</p>
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

		<?php
		//Fench site ONLY CSS: this tests to see if "/fr/"is in the URL
		$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
		if (true == strpos($url,'/fr/')): ?>
			<script type='text/javascript'>
				if(typeof olark === 'function'){
		            olark.configure ('locale.welcome_title', " Vous avez des questions Chattez avec nous!");
					olark.configure ('locale.chatting_title', "Salut, nous sommes là pour vous aider à nous parler ici!.");
					olark.configure ('locale.unavailable_title', " Aide en ligne: hors ligne ");
					olark.configure ('locale.busy_title', " Aide en ligne: Occupé ");
					olark.configure ('locale.away_message', " Notre fonction de support en direct est actuellement hors-ligne, S'il vous plaît réessayer plus tard.");
					olark.configure ('locale.loading_title', " Chargement Olark ...");
					olark.configure ('locale.welcome_message', " Bienvenue sur mon site Vous pouvez utiliser cette fenêtre de chat pour discuter avec moi. ");
					olark.configure ('locale.busy_message', " Tous nos représentants sont avec d'autres clients en ce moment Nous serons avec vous sous peu. ");
					olark.configure ('locale.chat_input_text', " Tapez ici et frapper à chat");
					olark.configure ('locale.name_input_text', "et tapez votre nom");
					olark.configure ('locale.email_input_text', "et tapez votre e-mail ");
					olark.configure ('locale.offline_note_message', " Nous sommes en ligne, envoyez-nous un message");
					olark.configure ('locale.send_button_text', "Envoyer");
					olark.configure ('locale.offline_note_thankyou_text', ". Merci pour votre message Nous reviendrons vers vous dès que nous le pouvons. ");
					olark.configure ('locale.offline_note_error_text', "Vous devez remplir tous les champs et spécifier une adresse email valide");
					olark.configure ('locale.offline_note_sending_text', " Envoi en cours ...");
					olark.configure ('locale.operator_is_typing_text', " est de taper ...");
					olark.configure ('locale.operator_has_stopped_typing_text', "a cessé de taper");
					olark.configure ('locale.introduction_error_text', " S'il vous plaît laissez un nom et adresse e-mail afin que nous puissions vous contacter au cas où nous sommes déconnectés ");
					olark.configure ('locale.introduction_messages', " Bienvenue, il suffit de remplir quelques informations et cliquez sur 'Démarrer le chat' pour nous parler");
					olark.configure ('locale.introduction_submit_button_text', " Lancer le chat");
					olark.configure ('locale.disabled_input_text_when_convo_has_ended', " le chat a pris fin, pour rafraîchir nouveau chat");
					olark.configure ('locale.disabled_panel_text_when_convo_has_ended', " Cette conversation est terminée, mais tout ce que vous devez faire est de rafraîchir la page pour lancer une nouvelle! ");
					olark.configure ('locale.name_input_text', " pré-Chat Enquête NAME");
					olark.configure ('locale.phone_input_text', " Téléphone de l'enquête pré-Chat ");
					olark.configure ('locale.email_input_text', "EMAIL de l'enquête pré-Chat ");
					olark.configure ('locale.send_button_text', " pré-Chat Enquête sendButton");
		        }
	        </script>
		<?php else: ?>
			<script type='text/javascript'>
				if(typeof olark === 'function'){
		            olark.configure('locale.welcome_title', "Have questions? Chat with us!");
		            olark.configure('locale.chatting_title', "Hi we’re here to help! Talk to us right here.");
		            olark.configure('locale.unavailable_title', "Live Help: Offline");
		            olark.configure('locale.busy_title', "Live Help: Busy");
		            olark.configure('locale.away_message', "Our live support feature is currently offline, Please try again later.");
		            olark.configure('locale.loading_title', "Loading Olark...");
		            olark.configure('locale.welcome_message', "Welcome to my website.  You can use this chat window to chat with me.");
		            olark.configure('locale.busy_message', "All of our representatives are with other customers at this time. We will be with you shortly.");
		            olark.configure('locale.chat_input_text', "Type here and hit  to chat");
		            olark.configure('locale.name_input_text', " and type your Name");
		            olark.configure('locale.email_input_text', " and type your Email");
		            olark.configure('locale.offline_note_message', "We are offline, send us a message");
		            olark.configure('locale.send_button_text', "Send");
		            olark.configure('locale.offline_note_thankyou_text', "Thank you for your message.  We will get back to you as soon as we can.");
		            olark.configure('locale.offline_note_error_text', "You must complete all fields and specify a valid email address");
		            olark.configure('locale.offline_note_sending_text', "Sending...");
		            olark.configure('locale.operator_is_typing_text', "is typing...");
		            olark.configure('locale.operator_has_stopped_typing_text', "has stopped typing");
		            olark.configure('locale.introduction_error_text', "Please leave a name and email address so we can contact you in case we get disconnected");
		            olark.configure('locale.introduction_messages', "Welcome, just fill out some brief information and click 'Start chat' to talk to us");
		            olark.configure('locale.introduction_submit_button_text', "Start chat");
		            olark.configure('locale.disabled_input_text_when_convo_has_ended', "chat ended, refresh for new chat");
		            olark.configure('locale.disabled_panel_text_when_convo_has_ended', "This conversation has ended, but all you need to do is refresh the page to start a new one!");
		            olark.configure('locale.name_input_text', "Pre-Chat Survey NAME");
		            olark.configure('locale.phone_input_text', "Pre-Chat Survey PHONE");
		            olark.configure('locale.email_input_text', "Pre-Chat Survey EMAIL");
		            olark.configure('locale.send_button_text', "Pre-Chat Survey SENDBUTTON");
		        }
	        </script>
		<?php endif; ?>

		<!-- analytics -->
		<script>
		/*(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'equinoxe.loc');
		ga('send', 'pageview');*/
		</script>

	</body>
</html>
