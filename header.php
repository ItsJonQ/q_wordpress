<?php
/**
 * Header
 * @template
 *
 * @packag q_
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Page Container -->
    <div id="page" class="hfeed site page-container">

        <!-- Site Header -->
        <header id="masthead" class="site-header" role="banner">
            <!-- Header Container -->
            <div class="container">

                <!-- Site Branding -->
                <div class="site-branding">
                    <!-- Site Logo -->
                    <div class="site-logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

                            <img src="<?php bloginfo( 'stylesheet_directory' ) ?>/lib/images/q-logo.png" alt="Jon Q">

                            <span class="site-logo-name">
                                <?php bloginfo( 'name' ); ?>
                            </span>

                        </a>
                    </div>
                </div>

                <!-- Site Navigation -->
                <div class="site-navigation">

                    <!-- Site Navigation Menu -->
                    <nav id="site-navigation" class="main-navigation" role="navigation">
                        <?php wp_nav_menu( array(
                            'container'         => false,
                            'menu_class'        => 'main-navigation-menu',
                            'theme_location'    => 'primary'
                            )
                        ); ?>
                    </nav>

                </div>

            </div>

        </header>
        <!-- / #masthead -->

        <div id="content" class="site-content">
