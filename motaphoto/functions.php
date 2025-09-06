<?php






add_action('wp_enqueue_scripts', function () {
  wp_enqueue_style(
    'nm-style',
    get_template_directory_uri() . '/assets/css/style.css',
    [],
    filemtime(get_template_directory() . '/assets/css/style.css') 
  );
  
  wp_enqueue_script('jquery');
  
  wp_enqueue_script(
    'nm-scripts',
    get_template_directory_uri() . '/js/scripts.js',
    ['jquery'],
    null,
    true
  );
  // On passe ajaxurl à JS
    wp_localize_script('nm-scripts', 'ajaxurl', admin_url('admin-ajax.php'));
});



add_action('wp_head', function () {

});


function matophoto_register_menus() {
    register_nav_menus([
        'main-menu' => __('Menu Principal', 'matophoto'),
    ]);
}
add_action('after_setup_theme', 'matophoto_register_menus');



add_action('wp_ajax_load_more_photos', 'load_more_photos');
add_action('wp_ajax_nopriv_load_more_photos', 'load_more_photos');

function load_more_photos() {
    $paged = (isset($_POST['page'])) ? intval($_POST['page']) + 1 : 2;

    $args = [
        'post_type'      => 'photo',
        'posts_per_page' => 8,
        'paged'          => $paged,

    ];

    $photos = new WP_Query($args);

    if ($photos->have_posts()) {
        while ($photos->have_posts()) {
            $photos->the_post();
            get_template_part('template_part/photo_block');
        }
    }
    wp_reset_postdata();

    wp_die();
}
