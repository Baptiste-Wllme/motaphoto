<?php get_header(); ?>

<main id="primary" class="site-main">
  <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
      
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
        <header class="entry-header">
          <h1 class="entry-title"><?php the_title(); ?></h1>
        </header>

        <div class="entry-content">
          <?php the_content(); ?>
        </div>

        <footer class="entry-footer">
          <p>Publié le <?php echo get_the_date(); ?> par <?php the_author(); ?></p>
        </footer>
        
      </article>

    <?php endwhile; ?>
  <?php else : ?>
    <p>Aucun article trouvé.</p>
  <?php endif; ?>
</main>

<?php get_footer(); ?>
