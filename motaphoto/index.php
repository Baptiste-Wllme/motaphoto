<?php get_header(); ?>


  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="hero">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/nathalie-0.jpeg" alt="ImagePresentation" class="photoIndex">
        <h1 class="entry-title">PHOTOGRAPHE EVENT</h1>
    </div>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
  </article>

  <p><?php _e('Aucun contenu pour le moment.', 'nathalie-mota'); ?></p>


<?php get_footer(); ?>
