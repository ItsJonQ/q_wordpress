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
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
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
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse site-navigation" id="bs-example-navbar-collapse-1">
                        <?php wp_nav_menu( array(
                            'container'         => false,
                            'menu_class'        => 'main-navigation-menu nav navbar-nav',
                            'theme_location'    => 'primary'
                            )
                            );
                            ?>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </header>
        <!-- / #masthead -->

        <div id="content" class="site-content">
