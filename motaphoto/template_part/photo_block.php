<article class="photo-block">
    <div class="container-photo-block">
         <?php 
        if (has_post_thumbnail()) {
            the_post_thumbnail('large', ['class' => 'photo-thumb']);
        }
        ?>
    </div>
</article>
