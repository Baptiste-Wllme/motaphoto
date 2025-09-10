<?php 
$ref = SCF::get('reference', get_the_ID());
$ref_text = is_array($ref) && isset($ref[0]['Reference']) ? $ref[0]['Reference'] : '';

$img_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
$title   = get_the_title();
$cats    = get_the_terms(get_the_ID(), 'categorie');
$cat_name = $cats && !is_wp_error($cats) ? $cats[0]->name : '';
?>

<article class="photo-block">
    <div class="container-photo-block">
  
    <img 
      src="<?php echo esc_url($img_url); ?>" 
      alt="<?php the_title(); ?>" 
      data-ref=" Référence : <?php echo esc_attr($ref_text); ?>" 
      data-cat="<?php echo esc_attr($cat_name); ?>"
      class="photo-img"
    >
  
    <div class="photo-overlay">
      <!-- Bouton fullscreen -->
      <button class="btn-lightbox" title="Agrandir">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Icon_fullscreen.png"  class ="btn-fullscreen" alt="Agrandir">
      </button>
      
      <div class="photo-title-vision"><?php echo esc_html($title); ?></div>

      
      <div class="photo-cat"><?php echo esc_html($cat_name); ?></div>

      <!-- Bouton oeil vers la page single -->
      <a href="<?php the_permalink(); ?>" class="photo-eye" title="Voir la fiche">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Icon_eye.png" class="btn-vision" alt="Voir la photo">
      </a>
    </div>
  
    </div>
</article>
