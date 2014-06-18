<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJ1zeXL0klf-9NPfdZPIlPsYko6Q7k090&sensor=true" type="text/javascript"></script>
		<script>
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

		<?php
		//Fench site ONLY CSS: this tests to see if "/fr/"is in the URL
		$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
		if (true == strpos($url,'/fr/')): ?>
		<style type="text/css">
            /* Special CSS Applied to French Site Only*/
    		#mainnav{ font-size: 92%; margin-top:25px;}
    		#lang_sel_click{margin-left: 13em;}
            #mainnav >ul.menu >li.about >a{ margin-left: 18em; margin-bottom: 0.1em;}
    		#mainnav >ul.menu >li.contact >a{ margin-bottom: 0.1em;}
            .sidebar-widget input[type="search"]{ max-width: 155px; }
            #newsletter input[type="text"]:focus, #newsletter input[type="email"]:focus{ width: 250px; }
		</style>
		<?php endif; ?>

        <style type="text/css">
            /* Live Chat style correction */
            #habla_window_div .habla_offline_submit_input{
                float: none !important;
            }
            #habla_window_div #habla_panel_div{
                border-style: solid;
                border-color: #fff;
                border-width: 1px 1px 0;
                background: #fff;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }
            /* Slider Revolution Arrows style correction */
            .tp-leftarrow.tparrows.default,
            .tp-rightarrow.tparrows.default{
                top: 50% !important;
            }
        </style>

	</head>
	<body <?php body_class(); ?> data-marker="<?php echo get_field('marker_icon', get_ID_by_slug('contact')); ?>" data-latitude="<?php echo get_field('latitude', get_ID_by_slug('contact')); ?>" data-longitude="<?php echo get_field('longitude', get_ID_by_slug('contact')); ?>">

        <!-- page -->
        <div id="page">

            <!-- header -->
            <header id="header">

                <div class="midwrapper group">

                    <!-- logo -->
                    <?php if(is_front_page()): ?>
                        <h1 id="logo">
                            <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/equinoxe-life-care.svg" alt="Equinoxe LifeCare Homepage" />
                            </a>
                        </h1>
                    <?php else: ?>
                        <strong id="logo">
                            <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/equinoxe-life-care.svg" alt="Equinoxe LifeCare Homepage" />
                            </a>
                        </strong>
                    <?php endif; ?>
                    <!-- /logo -->

                    <!-- Expandable mobile menu control -->
                    <input type="checkbox" name="" class="showMenu" id="expandMainNav"/>

                    <nav id="mainnav" class="showMenuCtrl">
                        <label for="expandMainNav">
                            <span class="showText">menu <span class="icon-menu"></span></span>
                            <span class="hideText">menu <span class="icon-menu"></span></span>
                        </label>

                        <?php header_nav(); ?>

                    </nav>

                    <div id="call-mess"><?php _e('REACH US ANYTIME') ?> <span style="color:#F37123"><?php echo get_field('phone_number', 'options'); ?></span></div>

                </div>

                <!-- Lang Switch  -->
                <?php do_action('icl_language_selector'); ?>

            </header>
            <!-- /header -->

            <!-- main -->
            <div id="main" role="main">

