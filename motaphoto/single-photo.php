<?php get_header(); ?>

<main id="site-content" role="main">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php  
     // récupération de reference et type qui sont des arrays//
    $reference       = SCF::get('reference', get_the_ID());
    $type            = SCF::get('type');
    $categories      = get_the_terms(get_the_ID(), 'categorie');
    $formats         = get_the_terms(get_the_ID(), 'format');
    $prev_post       = get_previous_post();
    $next_post       = get_next_post();

     if (is_array($type) && isset($type[0]['Type'])) {
        $type_value = $type[0]['Type'];
    } else {
        $type_value = '';
    }

    if (is_array($reference) && isset($reference[0]['Reference'])) {
    $reference_value = $reference[0]['Reference'];
    } else {
        $reference_value = is_string($reference) ? $reference : '';
    }


    
    ?>



    <article id="post-<?php the_ID(); ?>" <?php post_class('single-photo'); ?>>

    

      <!-- Zone informations -->
    <div class="container-content">
        <div class="container-photos-infos">
            <div class="photo-infos">
                <h1 class="photo-title"><?php the_title(); ?></h1>
                <p>Référence : <?php echo esc_html($reference_value); ?> </p>
                <p>Catégorie : <?php echo esc_html($categories[0]->name); ?></p>
                <p>Format : <?php echo esc_html($formats[0]->name); ?></p>
                <p>Type : <?php echo esc_html($type_value); ?></p>
                <p>Année : <?php echo get_the_date('Y'); ?></p>
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
                <button class="btn btn__contact" data-ref="<?php echo esc_html($reference_value); ?>">
                    Contact
                </button>
            </div>
            <div class="container-next-prev">         
              <!-- Navigation entre photos -->
                <div class="photo-navigation">
                    <div class="prev">
                        <?php if ($prev_post) : ?>
                            <a href="<?php echo get_permalink($prev_post->ID); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow_left.png" alt="Précédent">
                                <span class="preview">
                                    <img src="<?php echo get_the_post_thumbnail_url($prev_post->ID, 'thumbnail'); ?>" alt="<?php echo esc_attr($prev_post->post_title); ?>">
                                </span>
                            </a>
                        <?php endif; ?>
                    </div>
                        
                    <div class="next">
                        <?php if ($next_post) : ?>
                            <a href="<?php echo get_permalink($next_post->ID); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow_right.png" alt="Suivant">
                                <span class="preview">
                                    <img src="<?php echo get_the_post_thumbnail_url($next_post->ID, 'thumbnail'); ?>" alt="<?php echo esc_attr($next_post->post_title); ?>">
                                </span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Zone photos apparentées -->
        <div class="related-photos">
            <h2>vous aimerez aussi</h2>
            <div class="related-photos-list">
                <?php
                
                $categories = wp_get_post_terms(get_the_ID(), 'categorie');

                if (!empty($categories) && !is_wp_error($categories)) {
                    $cat_id = $categories[0]->term_id;
                
                    
                    $args = [
                        'post_type'      => 'photo',
                        'posts_per_page' => 2, 
                        'post__not_in'   => [get_the_ID()], 
                        'tax_query'      => [
                            [
                                'taxonomy' => 'categorie',
                                'field'    => 'term_id',
                                'terms'    => $cat_id,
                            ],
                        ],
                    ];
                
                    $related = new WP_Query($args);
                
                    if ($related->have_posts()) {
                        while ($related->have_posts()) {
                            $related->the_post();
                            get_template_part('template_part/photo_block'); 
                        }
                        wp_reset_postdata();
                    } else {
                        echo '<p>Aucune photo apparentée.</p>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
        
        

    

    </article>

<?php
    endwhile;
endif;
?>

</main>

<?php get_footer(); ?>
