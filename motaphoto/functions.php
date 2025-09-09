<?php



add_action('wp_enqueue_scripts', function () {
  wp_enqueue_style(
    'nm-style',
    get_template_directory_uri() . '/assets/css/style.css',
    [],
    filemtime(get_template_directory() . '/assets/css/style.css')
  );
  wp_enqueue_script('jquery');
});


function nm_enqueue_scripts() {
    wp_enqueue_script(
        'nm-scripts',
        get_template_directory_uri() . '/js/scripts.js',
        ['jquery'],
        filemtime(get_template_directory() . '/js/scripts.js'),
        true
    );

    wp_localize_script('nm-scripts', 'nm_ajax', [
        'ajax_url' => admin_url('admin-ajax.php'),
    ]);
}
add_action('wp_enqueue_scripts', 'nm_enqueue_scripts');



function matophoto_register_menus() {
    register_nav_menus([
        'main-menu' => __('Menu Principal', 'matophoto'),
    ]);
}
add_action('after_setup_theme', 'matophoto_register_menus');

add_action('wp_ajax_filter_photos', 'nm_filter_photos');
add_action('wp_ajax_nopriv_filter_photos', 'nm_filter_photos');





function nm_filter_photos() {
    $category = isset($_POST['categorie']) ? sanitize_text_field($_POST['categorie']) : '';
    $format   = isset($_POST['format'])    ? sanitize_text_field($_POST['format'])   : '';
    $order    = isset($_POST['order']) && in_array($_POST['order'], ['ASC','DESC']) ? $_POST['order'] : '';
    $paged    = isset($_POST['page']) ? max(1, intval($_POST['page'])) : 1;

    $args = [
        'post_type'      => 'photo',
        'posts_per_page' => 8,
        'paged'          => $paged,
    ];

    if ($order) {
        $args['orderby'] = 'date';
        $args['order']   = $order;
    } else {
        $args['orderby'] = 'rand';
    }

    $tax_query = [];
    if ($category) {
        $tax_query[] = [
            'taxonomy' => 'categorie',
            'field'    => 'slug',
            'terms'    => $category,
        ];
    }
    if ($format) {
        $tax_query[] = [
            'taxonomy' => 'format',
            'field'    => 'slug',
            'terms'    => $format,
        ];
    }
    if (!empty($tax_query)) {
        $args['tax_query'] = $tax_query;
    }
    error_log('ARGS: ' . print_r($args, true));

    $photos = new WP_Query($args);

    if ($photos->have_posts()) {
        while ($photos->have_posts()) {
            $photos->the_post();
            get_template_part('template_part/photo_block');
        }
    } else {
        echo '<p>Aucune photo trouvée.</p>';
    }

    wp_reset_postdata();
    wp_die();
}

function nm_enqueue_lightbox() {
    wp_enqueue_script(
        'nm-lightbox',
        get_template_directory_uri() . '/js/lightbox.js',
        [],
        filemtime(get_template_directory() . '/js/lightbox.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'nm_enqueue_lightbox');




