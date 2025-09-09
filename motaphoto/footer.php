
<footer class="site-footer">
  <div class="footer-container">
    <button class="btn-footer">Mention légales</button>
    <button class="btn-footer">Vie privée</button>
    <button class="btn-footer">Tous droit réservés</button>
  </div>
</footer>

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
