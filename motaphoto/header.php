
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
      
      <button id="burger-button" class="burger-button" aria-label="Menu">
        <span class="line1"></span>
        <span class="line2"></span>
        <span class="line3"></span>
      </button>
     
      
    </nav>
  </div>
</header>

<nav id="mobile-menu" class="mobile-menu">
  
  <div class="mobile-menu-header">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Logo.svg" class="title-site-burger" alt="Logo Nathalie Mota">
    <button id="close-button" class="close-button" aria-label="Fermer">✕</button>
  </div>
  <div class="menu-burger-content">
    <?php
    wp_nav_menu([
      'theme_location' => 'main-menu',
      'container' => false,
      'menu_class' => 'mobile-nav-list',
      'items_wrap' => '%3$s'  
    ]);
    ?>
  </div>
  
</nav>







