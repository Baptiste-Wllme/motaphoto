
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
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Logo.svg" class="title-site" href="#">
      <div class="btn-container">
          <button class="btn-nav">ACCUEIL</button>
          <button class="btn-nav btn__contact">CONCTACT</button>
          <button class="btn-nav">A PROPOS</button>
      </div>
    </nav>
  </div>
</header>







