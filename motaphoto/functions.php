<?php






add_action('wp_enqueue_scripts', function () {
  wp_enqueue_style('nm-style', get_template_directory_uri() . '/assets/css/style.css',
    [],
    filemtime(get_template_directory() . '/assets/css/style.css') 
  );
  
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
