
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  
<header class="site-header">
  <div class="container">
    <nav class="site-nav">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" >
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Logo.svg" class="title-site" alt="Logo Nathalie Mota">
      </a>

      <div class="btn-container">
        <?php
          wp_nav_menu([
            'theme_location' => 'main-menu',
            'container' => false,
            'menu_class' => 'btn-nav-list',
            'items_wrap' => '%3$s' 
          ]);
        ?>

      </div>
    </nav>
  </div>
</header>







