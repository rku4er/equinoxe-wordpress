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

	</head>
	<body <?php body_class(); ?> data-marker="<?php echo get_field('marker_icon', get_ID_by_slug('contact')); ?>" data-latitude="<?php echo get_field('latitude', get_ID_by_slug('contact')); ?>" data-longitude="<?php echo get_field('longitude', get_ID_by_slug('contact')); ?>">

        <style type="text/css">
            #habla_window_div{
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
        </style>

        <!-- page -->
        <div id="page">

            <!-- header -->
            <header id="header">

                <div class="midwrapper group">

                    <!-- logo -->
                    <?php if(is_front_page()): ?>
                        <h1 id="logo">
                            <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/equinoxe-life-care.png" alt="Equinoxe LifeCare Homepage" />
                            </a>
                        </h1>
                    <?php else: ?>
                        <strong id="logo">
                            <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/equinoxe-life-care.png" alt="Equinoxe LifeCare Homepage" />
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

                        <?php html5blank_nav(); ?>

                    </nav>

                    <div id="call-mess">REACH US ANYTIME <span style="color:#F37123">1-800-890-4200</span></div>

                </div>

                <!-- Lang Switch  -->
                <?php do_action('icl_language_selector'); ?>

            </header>
            <!-- /header -->

            <!-- main -->
            <div id="main" role="main">

