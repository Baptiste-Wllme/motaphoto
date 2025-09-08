<?php
/**
 * Template Name: Page d'accueil
 */

get_header();
?>

<?php

$args = [
  'post_type'      => 'photo',
  'posts_per_page' => 1,
  'orderby'        => 'rand',
  'tax_query'      => [
    [
      'taxonomy' => 'format',
      'field'    => 'slug',
      'terms'    => 'paysage',   // slug du format paysage
    ],
  ],
];
$hero_query = new WP_Query($args);

if ($hero_query->have_posts()) :
  while ($hero_query->have_posts()) : $hero_query->the_post();
    if (has_post_thumbnail()) {
      $hero_img = get_the_post_thumbnail_url(get_the_ID(), 'full');
    }
  endwhile;
  wp_reset_postdata();
endif;
?>

<main class="site-main">
  <!-- Hero -->
  <section class="hero" style="background-image: url('<?php echo esc_url($hero_img); ?>');">
    <div class="hero-overlay">
      <h1 class="hero-title">photographe event</h1>
    </div>
  </section>
  
  <!-- Zone filtres -->
  <section class="filters">
    <div id="photo-filters" class="photo-filters">
      <!-- Catégories -->
      <select name="categorie">
        <option value="">catégories</option>
        <?php
        $categories = get_terms('categorie');
        foreach ($categories as $cat) {
          echo '<option value="' . esc_attr($cat->slug) . '">' . esc_html($cat->name) . '</option>';
        }
        ?>
      </select>

      <!-- Formats -->
      <select name="format">
        <option value="">formats</option>
        <?php
        $formats = get_terms('format');
        foreach ($formats as $fmt) {
          echo '<option value="' . esc_attr($fmt->slug) . '">' . esc_html($fmt->name) . '</option>';
        }
        ?>
      </select>
    </div>

    <div class="date-filter">
      <select name="date_order" id="filter-date">
        <option value="">Trier par</option>
        <option value="DESC">Plus récentes → Plus anciennes</option>
        <option value="ASC">Plus anciennes → Plus récentes</option>
      </select>
    </div>

    
  </section>

  <!-- Liste des photos -->
  <section class="photo-list">
    <div class="container-photos">
      <?php
      $args = [
        'post_type'      => 'photo',
        'posts_per_page' => 8,
        'paged'          => 1,
        'orderby'        => 'rand'

      ];
      $photos = new WP_Query($args);

      if ($photos->have_posts()) {
        while ($photos->have_posts()) {
          $photos->the_post();
          get_template_part('template_part/photo_block');
        }
        wp_reset_postdata();
      } else {
        echo '<p>Aucune photo trouvée.</p>';
      }
      ?>
    </div>
  </section>

  <!-- Bouton Load More -->
  <section class="btn-load-more">
    <div class="load-more-container">
      <button class="btn" id="load-more" data-page="1">Charger plus</button>
    </div>
  </section>
  

  


<?php get_footer(); ?>
