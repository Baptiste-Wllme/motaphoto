<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <article id="page-<?php the_ID(); ?>" <?php post_class('page'); ?>>
    <h1 class="page-title"><?php the_title(); ?></h1>
    <div class="page-content">
      <?php the_content(); ?>
    </div>
  </article>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
