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
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>

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
                        <span id="logo">
                            <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/equinoxe-life-care.png" alt="Equinoxe LifeCare Homepage" />
                            </a>
                        </h1>
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

                        <!-- <ul class="menu">
                            <li class="has-menu home">
                                <a href="home_health.html">Home Care</a>
                                <div class="dropdown">
                                    <ul>
                                        <li><a href="management.html">LifeCare Management</a></li>
                                        <li><a href="home_care.html">Home Care and Specialized Personal Care</a></li>
                                        <li><a href="technology.html">Technology Based Care Solutions</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="has-menu organization">
                                <a href="home_health.html">Organizational Health</a>
                                <div class="dropdown">
                                    <ul>
                                        <li><a href="technology.html">item 1</a></li>
                                        <li><a href="technology.html">item 2</a></li>
                                        <li><a href="technology.html">item 3</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="has-menu technology">
                                <a href="home_health.html">Technology-Based Care</a>
                                <div class="dropdown">
                                    <ul>
                                        <li><a href="technology.html">menu 1</a></li>
                                        <li><a href="technology.html">menu 2</a></li>
                                        <li><a href="technology.html">menu 3</a></li>
                                        <li><a href="technology.html">menu 4</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="careers"><a href="#careers">Careers</a></li>
                            <li class="training"><a href="listings.html">Training Courses</a></li>
                            <li class="about"><a href="about.html">About</a></li>
                            <li class="contact"><a href="contact.html">Contact</a></li>
                        </ul> -->
                    </nav>

                    <div id="call-mess">REACH US ANYTIME <span style="color:#F37123">1-800-890-4200</span></div>

                </div>

                <!-- Expandable mobile menu control -->
                <input type="checkbox" name="" class="showMenu" id="langSwitchCtrl"/>

                <section id="langSwitch" class="showMenuCtrl">
                    <label for="langSwitchCtrl">
                        <span class="showText">francais <span class="icon-arrow-down6"></span></span>
                        <span class="hideText">english <span class="icon-arrow-up6"></span></span>
                    </label>
                </section>

            </header>
            <!-- /header -->

            <!-- main -->
            <div id="main" role="main">
