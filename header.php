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
    <div id="page" class="hfeed site page-container">

        <header id="masthead" class="site-header" role="banner">
            <div class="site-branding">
                <div class="site-logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

                        <img src="<?php bloginfo( 'stylesheet_directory' ) ?>/lib/images/q-logo.png" alt="Jon Q">

                        <span class="site-logo-name">
                            <?php bloginfo( 'name' ); ?>
                        </span>

                    </a>
                </div>

            </div>
        </header>
        <!-- / #masthead -->

        <div id="content" class="site-content">
