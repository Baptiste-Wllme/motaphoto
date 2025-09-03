document.addEventListener("DOMContentLoaded", function() {
  const openBtn = document.querySelector('.btn__contact');
  const modal   = document.querySelector('.modal');
  const overlay = document.querySelector('.modal__overlay');

  if (openBtn && modal) {
    openBtn.addEventListener('click', () => {
      modal.style.display = 'flex';
      console.log('ça marche');
    });

    overlay.addEventListener('click', () => {
      modal.style.display = 'none';
    });
  }
});

jQuery(document).ready(function($){
    $('.btn__contact').on('click', function(){
        let ref = $(this).data('ref');
        // Sélectionne le champ "Réf. Photo" dans ton formulaire Contact Form 7
        $('input[name="reference-photo"]').val(ref);
        $('.modal-contact').fadeIn(); // ouvre la modale
    });
});
