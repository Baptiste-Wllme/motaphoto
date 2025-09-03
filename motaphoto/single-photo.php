<?php get_header(); ?>

<main id="site-content" role="main">

<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        
        $reference = get_post_meta(get_the_ID(), 'reference', true);
        $type = get_post_meta(get_the_ID(), 'type', true);

?>



    <article id="post-<?php the_ID(); ?>" <?php post_class('single-photo'); ?>>

       

      <!-- Zone informations -->
      <div class="container-content">
          <div class="container-photos-infos">
            <div class="photo-infos">
                <h1 class="photo-title"><?php the_title(); ?></h1>
                <p>Référence : <?php echo esc_html($reference); ?></p>
                <p>Catégorie : <?php the_terms(get_the_ID(), 'categorie'); ?></p>
                <p>Format : <?php the_terms(get_the_ID(), 'format'); ?></p>
                <p>Type : <?php echo esc_html($type); ?></p>
                <p>Date : <?php echo get_the_date(); ?></p>

                
            </div>

             <!-- Zone image principale -->
            <div class="photo-main">
                <?php 
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail('large', ['class' => 'photo-img']);
                }
                ?>
            </div>
          </div>

         
        <div class="container-contact-next-prev">
            <div class="container-btn-contact">
               <!-- Bouton Contact -->
                <p>Cette photo vous intéresse ?</p>
                <button class="btn__contact" data-ref="<?php echo esc_attr($reference); ?>">
                    Contact
                </button>
            </div>
            <div class="container-next-prev">         
              <!-- Navigation entre photos -->
                <div class="photo-navigation">
                    <div class="prev"><?php previous_post_link('%link', '← '); ?></div>
                    <div class="next"><?php next_post_link('%link', ' →'); ?></div>
                </div>
            </div>
        </div>

      </div>
        
        

        <!-- Zone photos apparentées -->
        <div class="related-photos">
            <h2>vous aimerez aussi</h2>
            <div class="related-grid">
                <?php
                // Récupérer les catégories de la photo courante
                $categories = wp_get_post_terms(get_the_ID(), 'categorie', ['fields' => 'ids']);

                $args = [
                    'post_type' => 'photo',
                    'posts_per_page' => 3,
                    'post__not_in' => [get_the_ID()],
                    'tax_query' => [
                        [
                            'taxonomy' => 'categorie',
                            'field'    => 'id',
                            'terms'    => $categories,
                        ]
                    ]
                ];
                $related = new WP_Query($args);

                if ( $related->have_posts() ) :
                    while ( $related->have_posts() ) : $related->the_post();
                        get_template_part('templates_parts/photo_block');
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>

    </article>

<?php
    endwhile;
endif;
?>

</main>

<?php get_footer(); ?>
