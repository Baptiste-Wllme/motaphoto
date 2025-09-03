<article class="photo-block">
    <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('medium', ['class' => 'photo-thumb']); ?>
        <h3 class="photo-title"><?php the_title(); ?></h3>
    </a>
</article>
