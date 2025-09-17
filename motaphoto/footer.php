
<footer class="site-footer">
  <div class="footer-container">
    <p><a class="btn-footer" href="<?php echo esc_url( home_url( '/mentions-legales' ) ); ?>">Mentions légales</a></p>
    <p> <a class="btn-footer" href="<?php echo esc_url( get_privacy_policy_url() ); ?>">Vie privée</a></p>
    <p class="btn-footer">Tous droits réservés</p>
  </div>
</footer>
</div>

<!-- Lightbox -->
<div id="lightbox" class="lightbox" >
  <div class="lightbox__overlay"></div>
  <button class="lightbox__close">&times;</button>
  <div class="lightbox__content">
    
    
    <div class="lightbox__img-container">
      <button class="lightbox__prev"><span> ← </span> Précedente </button>
      <img src="" alt="" class="lightbox__img">
      <button class="lightbox__next"> Suivante <span> → </span></button>
    </div>
    
    <div class="lightbox__caption">
      <div class="lightbox__info">
        <h3 class="lightbox__ref"></h3>
        <span class="lightbox__cat"></span>
      </div>
    </div>
  </div>
</div>

<?php wp_footer(); ?>
<?php get_template_part('template_part/modal-contact');?>
</body>
</html>
