<!doctype html>

<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
  <?php wp_head(); ?>
</head>
<body <?php body_class();?>>

<div id="pageWrapper" class="page-wrapper">
  
  <header id="pageHeader">
    <div class="container">
      <div class="row text-xs-center">

        <div class="brand col-md-3 col-md-push-9">
          <a href="<?php echo esc_url( home_url() ); ?>" id="logo">
            <img src="<?php echo esc_url( get_theme_mod("settings-logo") ); ?>" alt="לוגו">
          </a>
        </div><!-- .brand -->

      </div><!-- .row -->
    </div><!-- .container -->
  </header><!-- #pageHeader -->

  <nav class="navbar" role="navigation">
    <?php jetwp_nav(); ?>
  </nav>