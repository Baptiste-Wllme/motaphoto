<?php if ( ! defined('ABSPATH') ) exit; ?>

<div class="modal" id="modal-contact" aria-hidden="true">
  <div class="modal__overlay" ></div>
  <div class="modal__content">
    <button class="modal__close"></button>
    <h2>Contact</h2>
    <?php
    echo do_shortcode('[contact-form-7 id="3703902" title="Formulaire de contact 1"]');
    ?>
  </div>
</div>

