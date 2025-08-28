<?php


// 1) Supports du thème
add_action('after_setup_theme', function () {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('custom-logo', [
    'height'      => 60,
    'width'       => 200,
    'flex-height' => true,
    'flex-width'  => true,
  ]);

  register_nav_menus([
    'primary' => __('Menu principal', 'nathalie-mota'),
    'footer'  => __('Menu pied de page', 'nathalie-mota'),
  ]);
});

// 2) Chargement CSS/JS (enqueue propre)
add_action('wp_enqueue_scripts', function () {
  wp_enqueue_style('nm-style', get_stylesheet_uri());
  wp_enqueue_script(
    'nm-scripts',
    get_template_directory_uri() . '/js/scripts.js',
    [],
    null,
    true
  );
});



add_action('wp_head', function () {

});
