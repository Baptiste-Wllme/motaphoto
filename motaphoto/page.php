<?php get_header(); ?>

<main id="primary" class="site-main">
  <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
      
      <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
        
        <header class="entry-header">
          <h1 class="page-title"><?php the_title(); ?></h1>
        </header>

        <div class="page-content">
          <?php the_content(); ?>
        </div>
        
      </article>

    <?php endwhile; ?>
  <?php else : ?>
    <p>Aucune page trouvée.</p>
  <?php endif; ?>
</main>

<?php get_footer(); ?>
